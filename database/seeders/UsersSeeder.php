<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // kosongkan semua data di tabel pakets
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('users')->truncate();

        // membuat 3 paket secara manual
        \DB::table('users')->insert([
            [
                'user_name'    => 'Andrew',
                'address'   => 'Jl. Kepiting No. 7',
                'telp_no'    => '081234567890',
                'password' => Hash::make('123'),
            ],
            [
                'user_name'    => 'As\'ad',
                'address'   => 'Jl. Durian No. 34',
                'telp_no'   => '081969694200',
                'password' => Hash::make('asad'),
            ],
        ]);
    }
}
