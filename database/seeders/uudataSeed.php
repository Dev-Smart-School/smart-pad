<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;
class uudataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_uudata')->insert(
        [
            'no_spt' => 1,
            'periode_spt' => '2023',
            'thn_bln' => '01', 
            'npwpd' => '72918372913',
            'rekening1' => Str::random(3),
            'rekening2' => Str::random(2),
            'rekening3' => Str::random(2),
            'panjang' => 12.3,
            'lebar' => 12.3,
            'tinggi' => 10.3,
            'luas' => 10.3,
            'jumlah' => 100,
            'nrt_urut' => 1,
            'no_kohir' => 1,
            'tgl_data1' => date('Y-m-d'),
            'tgl_data2' => date('Y-m-d'),
            'tgl_awal' => date('Y-m-d'),
            'tgl_akhir' => date('Y-m-d'),
            'tgl_tetap' => date('Y-m-d'),
            'tgl_terima' => date('Y-m-d'),
            'tgl_proses' => date('Y-m-d'),
            'tgl_bayar' => date('Y-m-d'),
            'cara_bayar' => '1',
            'stat_data' => '1',
            'stat_spt' => '1',
            'stat_rec' => '1',
            'omset' => 10,
            'setor' => 10,
            'no_spt1' => Str::random(10),
            'no_mohon' => Str::random(10),
            'no_betul' => Str::random(10),
            'omset1' => 10,
            'setor1' => 10,
            'lokasi' => Str::random(10),
             'judul' => Str::random(10),
             'lama_hari' => 5,
             'rekening4' => 'ad',
             'rekening5' => 'at'
        ]
        );
    }
}
