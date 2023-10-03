<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'nik' => '000000',
            'nama' => 'Admin 00',
            'is_admin'=> true,
            'password'=> Hash::make('000000'),
        ]);
        DB::table('users')->insert([
            'nik' => '111111',
            'nama' => 'Admin 01',
            'is_admin' => true,
            'password' => Hash::make('111111'),
        ]);
        DB::table('users')->insert([
            'nik' => '222222',
            'nama' => 'User 02',
            'is_admin' => false,
            'password' => Hash::make('222222'),
        ]);
    }
}
