<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('categories')->truncate();
        $categories = [
            [
                'name' => 'Điện thoại',
             
            ],
            [
                'name' => 'máy tính',
              
            ],
            [
                'name' => 'Thiết bị',
             
            ],
            [
                'name' => 'Mạng',
              
            ]
            ];
            foreach ($categories as $category) {
                DB::table('categories')->insert($category);
            }
    }
}
