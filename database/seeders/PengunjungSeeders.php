<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengunjungSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengunjung')->insert([
            'nama_pengunjung' => "Fathurrahman",
            'NIK' => 3209022603050001,
            'tanggal_lahir' => Carbon::parse('2002-12-02'),
            'tempat_lahir' => "Jakarta Utara",
            'asal_kecamatan' => "Kebayoran lama",
            'asal_desa' => "Sukamaju",
            'alamat_lengkap' => "Jl. in aja dulu",
            'nomor_telepon' => "0893262732611",
            'jenis_kelamin' => "Laki-laki",
            'status_menikah' => "Belum Menikah",
            'nama_wali' => "Jajang C Noer",
            'nomor_teleponwali' => "089343434343",
            'asal_kecamatanwali' => "Buaran",
            'asal_desawali' => "Sukamandi",
            'alamat_lengkapwali' => "Jekardah"
        ]);
    }
}
