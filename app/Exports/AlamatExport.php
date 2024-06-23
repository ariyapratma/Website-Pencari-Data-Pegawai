<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlamatExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pegawai::where('Alamat', 'LIKE', '%Bogor%')
            ->with('divisi') // Ambil relasi divisi
            ->get()
            ->map(function ($pegawai) {
                return [
                    'NIP' => $pegawai->NIP,
                    'Nama' => $pegawai->Nama,
                    'Alamat' => $pegawai->Alamat,
                    'Tanggal Lahir' => $pegawai->Tanggal_lahir,
                    'Divisi' => $pegawai->divisi->Nama_divisi, // Ambil nama divisi dari relasi
                ];
            });
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Alamat',
            'Tanggal Lahir',
            'Divisi'
        ];
    }
}
