<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert(
        [
            'nama' => 'user',
            'no_telpon' => '08177656352',
            'password' => Hash::make('password'), 
        ]
        ); 
    }
}
