<?php

namespace App\Exports;

use App\Models\Divisi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DivisiExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Divisi::with('pegawai')->get();
    }

    public function map($divisi): array
    {
        $pegawaiList = $divisi->pegawai->pluck('Nama')->join(", ");

        return [
            $divisi->Kode_divisi,
            $divisi->Nama_divisi,
            $pegawaiList,
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Divisi',
            'Nama Divisi',
            'Pegawai',
        ];
    }
}
