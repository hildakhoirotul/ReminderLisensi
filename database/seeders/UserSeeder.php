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
            'email' => 'Admin00@sai.id',
            'is_admin'=> true,
            'chain'=> '000000',
            'password'=> Hash::make('000000'),
        ]);
        DB::table('users')->insert([
            'nik' => '111111',
            'nama' => 'Admin 01',
            'email' => 'Admin01@sai.id',
            'is_admin' => true,
            'chain'=> '111111',
            'password' => Hash::make('111111'),
        ]);
        DB::table('users')->insert([
            'nik' => '222222',
            'nama' => 'User 02',
            'email' => 'User02@sai.id',
            'is_admin' => false,
            'chain'=> '111111',
            'password' => Hash::make('222222'),
        ]);
    }
}
