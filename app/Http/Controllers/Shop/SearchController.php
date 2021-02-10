<?php

namespace App\Http\Controllers\Shop;

use App\Models\Search_results;
use App\Repositories\OurStorageRepository;
use App\Repositories\SearchRepository;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    /**
     * @var SearchRepository
     */
    private $searchRepository;
    private $ourStorageRepository;

    public function __construct()
    {
        parent::__construct();
        $this->searchRepository = app(SearchRepository::class);
        $this->ourStorageRepository = app(OurStorageRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('search.search_by_numb');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function store(string $numb, string $brand = null)
    {
        if ($numb) {
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = @$_SERVER['REMOTE_ADDR'];

            if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
            elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
            else $ip = $remote;

            $data = [
                'autopart_numb' => $numb,
                'brand' => $brand,
                'ip' => $ip,
                'geo' => '',
                'login' => '',
            ];
            $result = (new Search_results())->create($data);
            return $result;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function searchCrosses(Request $request)
    {
        $data = $request->input();
        $crosses = $this->searchRepository->getCrosses($data['autopart_numb']);
        if ($crosses->isEmpty()) {
            $this->store($data['autopart_numb']);
            $partsListOurStorage = $this->ourStorageRepository->getOurStorage($data['autopart_numb']);
            $partsList = $this->searchRepository->getAutoparts($data['autopart_numb']);
            $partsList = array_merge($partsListOurStorage, $partsList);
//dd($partsList);

            return view('search.search_list', compact('partsList'));

        }
        return view('search.search_crosses', compact('crosses'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $numb
     * @param string $brand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function searchAutopart(Request $request)
    {
        $data = $request->input();

        $numb = urldecode($data['numb']);
        $brand = urldecode($data['brand']);

        $this->store($numb, $brand);
        $partsListOurStorage = $this->ourStorageRepository->getOurStorage($numb);
//        dd($partsListOurStorage);
        $partsList = $this->searchRepository->getAutoparts($numb, $brand);
        $partsList = array_merge($partsListOurStorage, $partsList);
        return view('search.search_list', compact('partsList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
