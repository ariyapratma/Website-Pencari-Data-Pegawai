<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PegawaiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $nip;

    public function __construct($nip)
    {
        $this->nip = $nip;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pegawai::with('divisi')
            ->where('NIP', $this->nip)
            ->get();
    }

    /**
     * @param mixed $pegawai
     * @return array
     */
    public function map($pegawai): array
    {
        return [
            $pegawai->NIP,
            $pegawai->Nama,
            $pegawai->Alamat,
            $pegawai->Tanggal_lahir,
            $pegawai->divisi->Nama_divisi,
            $pegawai->divisi->Kode_divisi,
        ];
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Alamat',
            'Tanggal Lahir',
            'Divisi',
            'Kode Divisi'
        ];
    }
}
