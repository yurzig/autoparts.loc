<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Our_storagesTableSeeder extends Seeder
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
            $autopart_numb = 'original'. $i;
            $autopart_name = 'Запчасть №' . $i;
            $storage_numb = rand(1,5);
            $cell_numb = 'Ячейка хранения'. rand(1,100);

            $items[] = [
                'autopart_numb' => $autopart_numb,
                'autopart_name' => $autopart_name ,
                'storage_numb' => $storage_numb,
                'cell_numb' => $cell_numb,

            ];
        }
        \DB::table('our_storages')->insert($items);
    }
}
