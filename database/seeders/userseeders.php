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
        // Create User 
        DB::table('users')->insert([
            'nama' => "Fathur",
            'username' => "AdminFathur",
            'nip' => '001122334455667788',
            'password' => bcrypt('developers'),
            'level'=> "admin",
            'id_struktur_jabatan' => "1"
        ]);
    }
}
