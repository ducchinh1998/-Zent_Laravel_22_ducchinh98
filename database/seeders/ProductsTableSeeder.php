<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for($i=1;$i < 20;$i++){
             DB::table('products')->insert([
            'name' => 'Quần áo' .$i,
            'slug' => 'quan-ao'.$i,
            'origin_price' => '250000',
            'sale_price' => '200000',
            'user_id' => 1,
            'category_id' =>1,
            'brand_id' => 1,
            'quantity' =>1,
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        }
    }
}
