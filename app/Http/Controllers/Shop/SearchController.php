<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\SearchRepository;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    /**
     * @var SearchRepository
     */
    private $searchRepository;

    public function __construct()
    {
        parent::__construct();
        $this->searchRepository = app(SearchRepository::class);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function store(Request $request)
    {
        dd($request);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function searchCrosses(Request $request)
    {
        $data = $request->input();
        $crosses = $this->searchRepository->getCrosses($data['autopart_numb']);
        return view('search.search_crosses', compact('crosses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }/**
     * Display the specified resource.
     *
     * @param  string  $numb
     * @return \Illuminate\Http\Response
     */
    public function searchAutopart($numb)
    {
        dd(__METHOD__, $numb);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
