<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblPresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tbl_presensi')->insert([
            ['Tanggal' => '2018-01-02', 'NIP' => 11234, 'Jam_Masuk' => '08:10:00', 'Jam_Pulang' => '17:40:00'],
            ['Tanggal' => '2018-01-02', 'NIP' => 11235, 'Jam_Masuk' => '08:00:00', 'Jam_Pulang' => '17:07:00'],
            ['Tanggal' => '2018-01-02', 'NIP' => 11236, 'Jam_Masuk' => '07:00:00', 'Jam_Pulang' => '16:30:00'],
            ['Tanggal' => '2018-01-02', 'NIP' => 11234, 'Jam_Masuk' => '07:45:00', 'Jam_Pulang' => '16:30:00'],
            ['Tanggal' => '2018-01-03', 'NIP' => 11234, 'Jam_Masuk' => '07:50:00', 'Jam_Pulang' => '16:50:00'],
            ['Tanggal' => '2018-01-04', 'NIP' => 11234, 'Jam_Masuk' => '07:55:00', 'Jam_Pulang' => '16:20:00'],
            ['Tanggal' => '2018-01-05', 'NIP' => 11234, 'Jam_Masuk' => '07:20:00', 'Jam_Pulang' => '16:20:00'],
        ]);
    }
}
