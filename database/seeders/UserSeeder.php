<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'telephone' => '000000000000',
            'role' =>  'Admin',
        ]);

        DB::table('users')->insert([
            'name' => 'customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('12345678'),
            'telephone' => '000000000001',
            'role' =>  'Customer',
        ]);
    }
}
