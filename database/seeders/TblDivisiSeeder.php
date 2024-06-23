<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tbl_divisi')->insert([
            ['Kode_divisi' => 'S1', 'Nama_divisi' => 'Gudang', 'Pimpinan_divisi' => 'Beni Permana, SE'],
            ['Kode_divisi' => 'S2', 'Nama_divisi' => 'Produksi', 'Pimpinan_divisi' => 'Syaiful Bachri, ST'],
            ['Kode_divisi' => 'S3', 'Nama_divisi' => 'HRD', 'Pimpinan_divisi' => 'Dr. Anggit Darmawan'],
        ]);
    }
}
