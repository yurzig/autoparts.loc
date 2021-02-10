<?php


namespace App\Repositories;

use App\Models\Our_storage as Model;
use stdClass;

class OurStorageRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Найти запчасть на собственных складах
     */
    public function getOurStorage(string $numb)
    {
        $columns = [
          'id',
          'brand',
          'autopart_numb',
          'autopart_name',
          'storage_numb',
          'sales_price',
          'remains'
        ];

        $parts = $this->startConditions()
                    ->select($columns)
                    ->where('autopart_numb', 'like', '%'.$numb.'%')
                    ->toBase()
                    ->get();


        $partsList = [];
        foreach ($parts as $part) {
            $std = new stdClass();
            $std->pin = $part->autopart_numb;
            $std->brand = $part->brand;
            $std->name = $part->autopart_name;
            $std->storage = 'Склад №' . $part->storage_numb;
            $std->price = $part->sales_price;
            $std->rvalue = $part->remains;
            $std->retdays = '';
            $std->analog = '';
            $partsList[] = $std;
        }
        return $partsList;
    }
}
