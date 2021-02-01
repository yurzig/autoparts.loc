<?php


namespace App\Repositories;

use App\Models\Cross as Model;

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
          'manufacturer_id',
          'autopart_numb_orig',
          'autopart_numb_analog',
        ];

        return $this->startConditions()
                    ->select($columns)
                    ->where('autopart_numb_orig', 'like', '%'.$numb.'%')
                    ->toBase()
                    ->get();
    }
}
