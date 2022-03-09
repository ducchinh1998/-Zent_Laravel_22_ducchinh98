<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('users')->truncate();
        $users = [
            [
                'name' => 'Ducchinh',
                'avatar' => 'dc.png',
                'address' => 'Hải Dương',
                'email' => 'admin@gmail.com',
                'phone' => '0386424716',
                'password' => bcrypt('123456'),
                'status' => '1'
            ],
            [
                'name' => 'Admin1',
                'avatar' => 'nen1.png',
                'address' => 'Hà Nội',
                'email' => 'admin1@gmail.com',
                'phone' => '03363228745',
                'password' => bcrypt('123456'),
                'status' => '1'
            ],
            [
                'name' => 'Admin2',
                'avatar' => 'nen2.png',
                'address' => 'Hưng Yên',
                'email' => 'admin2@gmail.com',
                'phone' => '03331228745',
                'password' => bcrypt('123456'),
                'status' => '1'
            ],
            [
                'name' => 'Admin3',
                'avatar' => 'nen3.png',
                'address' => 'dong nai3',
                'email' => 'admin3@gmail.com',
                'phone' => '03332287245',
                'password' => bcrypt('123456'),
                'status' => '1'
            ],
            [
                'name' => 'Admin4',
                'avatar' => 'nen4.png',
                'address' => 'Bắc Ninh',
                'email' => 'admin4@gmail.com',
                'phone' => '03332238745',
                'password' => bcrypt('123456'),
                'status' => '1'
            ]

        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
