<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CrossesTableSeeder extends Seeder
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
            $autopart_name = 'Запчасть №' . $i;
            $autopart_numb_orig = 'original'. $i;
            $autopart_numb_analog = 'analog'. rand(1,10);

            $items[] = [
                'autopart_name' => $autopart_name ,
                'autopart_numb_orig' => $autopart_numb_orig,
                'autopart_numb_analog' => $autopart_numb_analog,

            ];
        }
        \DB::table('crosses')->insert($items);
    }
}
