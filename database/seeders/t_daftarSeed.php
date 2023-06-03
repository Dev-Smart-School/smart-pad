<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class t_daftarSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_daftar')->insert(
        [
            'npwpd' => '763857463546000',
            'nama_bu' => 'At10 Coffe',
            'alamat_bu' => 'samata, kec Patallassang, Kab Gowa', 
            'nama_wp' => 'At10 WP',
            'alamat_wp' => 'samata, kec Patallassang, Kab Gowa',
            'no_telp' => '081355048590'
        ]
        );
    }
}
