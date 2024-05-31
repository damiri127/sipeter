<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class userseeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
        [
            'name' => "Petugas Ananta",
            'username' => 'petugasloket',
            'password' => bcrypt('developers'),
            'level'=> "petugas-loket"
        ], 
        // [
        //     'name' => "Poliumum Cepri",
        //     'username' => 'poliumum',
        //     'password' => bcrypt('developers'),
        //     'level'=> "poliumum"
        // ], 
        // [
        //     'name' => "PoliGizi Ananta",
        //     'username' => 'poligizi',
        //     'password' => bcrypt('developers'),
        //     'level'=> "poligizi"
        // ], 

    );
    }
}
