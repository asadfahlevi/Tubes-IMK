<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
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
        \DB::table('members')->truncate();

        // membuat 3 paket secara manual
        \DB::table('members')->insert([
            [
                'member_name'    => 'Abi',
                'member_id'   => '1010101010101010',
                'pob'   => 'Medan',
                'dob'   => '2002-01-01',
                'address'   => 'Jl. Mawar No. 5',
                'telp_no'   => '081969690088',
            ],
            [
                'member_name'    => 'Carel',
                'member_id'   => '1010101010101234',
                'pob'   => 'Medan',
                'dob'   => '2002-08-19',
                'address'   => 'Jl. Beruang No. 3',
                'telp_no'    => '087712340865',
            ],
            [
                'member_name'    => 'Garuda',
                'member_id'   => '0000000000000001',
                'pob'   => 'Surabaya',
                'dob'   => '2002-04-03',
                'address'   => 'Jl. Durian No. 34',
                'telp_no'   => '081969694200',
            ],
        ]);
    }
}
