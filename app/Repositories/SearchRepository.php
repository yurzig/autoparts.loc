<?php


namespace App\Repositories;

use App\Http\Controllers\Shop\APIArmtekController;
use App\Models\Cross as Model;
use stdClass;

class SearchRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить кроссы
     */
    public function getCrosses(string $numb)
    {
        $columns = [
          'id',
          'autopart_name',
          'brand',
          'autopart_numb_orig',
          'autopart_numb_analog',
        ];

        $result = $this->startConditions()
                    ->select($columns)
                    ->where('autopart_numb_orig', 'like', '%'.$numb.'%')
                    ->toBase()
                    ->get();
        return $result;
    }

    /**
     * Получить данные от поставщика
     */
    public function getAutoparts(string $numb, string $brand=null)
    {
        $storage = 'Autopart';
        $extraCharge = 20;
        $armtek = new APIArmtekController();
        $parts = $armtek->search($numb, $brand);
        $parts = $parts->RESP;
        $partsList = [];
        if(is_object($parts) && property_exists($parts,'MSG')) {
            return $partsList;
        }
        foreach ($parts as $part) {
            $std = new stdClass();
            $std->pin = $part->PIN;
            $std->brand = $part->BRAND;
            $std->name = $part->NAME;
            $std->storage = $storage;
            $std->price = $part->PRICE * $extraCharge / 100;
            $std->rvalue = $part->RVALUE;
            $std->retdays = $part->RETDAYS;
            $std->analog = $part->ANALOG;
            $partsList[] = $std;
        }

        return $partsList;
    }
}
