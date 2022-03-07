<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->truncate();
        $posts = [
            [
                'title' => 'samsung a7',
                'slug' => 'samsung-a7',
            
                'content' => 'Điện thoại sam sung',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
            [
                'title' => 'samsung s7',
                'slug' => 'samsung-s7',
                // 'image_url' => 'Điện thoại',
                'content' => 'Điện thoại sam sung',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
            [
                'title' => 'iphone 12',
                'slug' => 'iphone-12',
                // 'image_url' => 'Điện thoại',
                'content' => 'Điện thoại iphone',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
            [
                'title' => 'iphone 13 pro',
                'slug' => 'iphone-13-pro',
                // 'image_url' => 'Điện thoại',
                'content' => 'Điện thoại iphone',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
            [
                'title' => 'iphone 11',
                'slug' => 'iphone-1',
                // 'image_url' => 'Điện thoại',
                'content' => 'Điện thoại iphonr',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
            [
                'title' => 'oppo a5',
                'slug' => 'oppo-a5',
                // 'image_url' => 'Điện thoại',
                'content' => 'Điện thoại oppo',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
            [
                'title' => 'oppo s7',
                'slug' => 'oppo-s7',
                // 'image_url' => 'Điện thoại',
                'content' => 'Điện thoại oppo',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
            [
                'title' => 'asus g14',
                'slug' => 'asus-g14',
                // 'image_url' => 'Điện thoại',
                'content' => 'dong laptop của asus',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ], [
                'title' => 'macbook 16 pro',
                'slug' => 'macbook-16-pro',
                // 'image_url' => 'Điện thoại',
                'content' => 'Laptop của hãng apple',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ], [
                'title' => 'laptop lenovo',
                'slug' => 'laptop-lenovo',
                // 'image_url' => 'Điện thoại',
                'content' => 'dong laptop quốc dân',
                'user_created_id' => '1',
                 
                'category_id' => '1',
            ],
        ];
        foreach ($posts as $post) {
            DB::table('posts')->insert($post);
        }
    }
}
