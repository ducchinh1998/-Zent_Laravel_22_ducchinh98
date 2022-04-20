<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();
        for($i=1;$i < 10;$i++){
             DB::table('images')->insert([
            'name' => 'Quần áo' .$i,
            'path' => 'https://i.pinimg.com/originals/2e/ab/df/2eabdfb23addf1bebcb47c8a74c66dae.jpg',
            'product_id' => $i,
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        }
    }
}
