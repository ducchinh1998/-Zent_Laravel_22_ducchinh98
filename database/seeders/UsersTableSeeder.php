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
        DB::table ('user_infos')->truncate();

        $users = [
            [
                'user' => [
                    'name' => 'Ducchinh',
                    'avatar' => 'dc.png',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('123456'),
                    'status' => '1'
                ],
                'info' => [
                    'address' => 'Hải Dương',
                    'phone' => '0386424716'
                ],
            ],
            [
                'user' => [
                    'name' => 'Admin1',
                    'avatar' => 'nen1.png',
                    'email' => 'admin1@gmail.com',
                    'password' => bcrypt('123456'),
                    'status' => '1'
                ],
                'info' => [
                    'address' => 'Hà Nội',
                    'phone' => '0975758483'
                ],
            ],
            [
                'user' => [
                    'name' => 'Admin2',
                    'avatar' => 'nen1.png',
                    'email' => 'admin2@gmail.com',
                    'password' => bcrypt('123456'),
                    'status' => '1'
                ],
                'info' => [
                    'address' => 'Hưng Yên',
                    'phone' => '0385592322'
                ],
            ],
            [
                'user' => [
                    'name' => 'Admin3',
                    'avatar' => 'nen1.png',
                    'email' => 'admin3@gmail.com',
                    'password' => bcrypt('123456'),
                    'status' => '1'
                ],
                'info' => [
                    'address' => 'TP HCM',
                    'phone' => '0386984343'
                ],
            ],
            [
                'user' => [
                    'name' => 'Admin4',
                    'avatar' => 'nen1.png',
                    'email' => 'admin4@gmail.com',
                    'password' => bcrypt('123456'),
                    'status' => '1'
                ],
                'info' => [
                    'address' => 'Hải Phòng',
                    'phone' => '0958533221'
                ],
            ],

        ];

        foreach ($users as $user) {
            $user_id = DB::table('users')->insertGetId($user['user']);

            $user['info']['user_id'] =$user_id;
            DB::table('user_infos')->insert($user['info']);

        }
    }
}
