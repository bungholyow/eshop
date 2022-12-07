<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // admin
            [
                'full_name' => 'Tommy Admin',
                'user_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            //vendor
            [
                'full_name' => 'Tommy Vendor',
                'user_name' => 'Vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'vendor',
                'status' => 'active',
            ],
            //costumer
            [
                'full_name' => 'Tommy Costumer',
                'user_name' => 'Costumer',
                'email' => 'costumer@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'costumer',
                'status' => 'active',
            ],
        ]);
    }
}
