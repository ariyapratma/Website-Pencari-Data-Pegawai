<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tbl_pegawai')->insert([
            ['NIP' => 11234, 'Nama' => 'Arini Nikita', 'Alamat' => 'Jl. Dedali Putih 5A Tangerang', 'Tanggal_lahir' => '1988-01-02', 'Kode_Divisi' => 'S1'],
            ['NIP' => 11235, 'Nama' => 'Toni Purana', 'Alamat' => 'Jl. Temenggung 21B Jakarta Selatan', 'Tanggal_lahir' => '1983-04-04', 'Kode_Divisi' => 'S2'],
            ['NIP' => 11236, 'Nama' => 'Gigih Prayitno', 'Alamat' => 'Jl. Sidopekso 65 Bandung', 'Tanggal_lahir' => '1985-11-08', 'Kode_Divisi' => 'S3'],
            ['NIP' => 11237, 'Nama' => 'Hilda Rahmawa', 'Alamat' => 'Jl. Mendut 12 Bogor', 'Tanggal_lahir' => '1986-11-01', 'Kode_Divisi' => 'S2'],
            ['NIP' => 11238, 'Nama' => 'Miftachul Fauza', 'Alamat' => 'Jl. Borobudur 1 Bogor', 'Tanggal_lahir' => '1984-09-05', 'Kode_Divisi' => 'S3'],
            ['NIP' => 11239, 'Nama' => 'Katrilia Tirta', 'Alamat' => 'Jl. Kenanga 21 Jakarta Timur', 'Tanggal_lahir' => '1984-07-05', 'Kode_Divisi' => 'S1'],
        ]);
    }
}
