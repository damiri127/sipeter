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
            'name' => "Admin Ananta",
            'username' => '2ndAnta',
            'password' => bcrypt('developers'),
            'level'=> "Admin"
        ]);
    }
}
