<?php

namespace App\Exports;

use App\Models\Presensi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresensiExport implements FromQuery, WithHeadings
{
    protected $month;
    protected $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function query()
    {
        return Presensi::select('NIP', DB::raw('count(*) as presences'))
            ->whereMonth('Tanggal', $this->month)
            ->whereYear('Tanggal', $this->year)
            ->groupBy('NIP');
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Jumlah Presensi'
        ];
    }
}
