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
        DB::table('users')->insert([
            'name' => "Petugas Ananta",
            'username' => 'petugasloket',
            'password' => bcrypt('developers'),
            'level'=> "petugas-loket"
        ]);

        DB::table('users')->insert([
            'name' => "Cepi",
            'username' => 'damiri',
            'password' => bcrypt('developers'),
            'level'=> "poliumum"
        ]);

        DB::table('users')->insert([
            'name' => "Fathur",
            'username' => 'fathur03',
            'password' => bcrypt('developers'),
            'level'=> "admin"
        ]);
    }
}
