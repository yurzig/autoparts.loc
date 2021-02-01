<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [];


        for ($i = 1; $i <= 10; $i++) {
            $name = 'Изготовитель №' . $i;
            $brand = 'ссылка на бренд №' . $i;

            $items[] = [
                'name' => $name,
                'brand' => $brand,
            ];
        }
        \DB::table('manufacturers')->insert($items);
    }
}
