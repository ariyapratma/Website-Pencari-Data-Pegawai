<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Divisi;
use App\Models\Pegawai;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Exports\AlamatExport;
use App\Exports\DivisiExport;
use App\Exports\PegawaiExport;
use App\Exports\PresensiExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function search(Request $request)
    {
        // Lakukan pencarian berdasarkan NIP atau kriteria lainnya
        $pegawai = Pegawai::where('NIP', $request->nip)->first();

        if ($pegawai) {
            // Jika pegawai ditemukan, atur session 'status' dengan pesan sukses dan status_type success
            session()->flash('status', 'Data Pegawai Berhasil Ditemukan');
            session()->flash('status_type', 'success');
        } else {
            // Jika tidak ditemukan, atur session 'status' dengan pesan gagal atau kosong dan status_type danger
            session()->flash('status', 'Data Pegawai Tidak Ditemukan');
            session()->flash('status_type', 'danger');
        }

        return view('pegawai.search', compact('pegawai'));
    }

    public function exportExcel($nip)
    {
        $pegawai = Pegawai::with('divisi')->where('NIP', $nip)->first();
        if (!$pegawai) {
            return redirect()->back()->with('error', 'Pegawai Tidak Ditemukan');
        }

        $nama = $pegawai->Nama;
        $kode_divisi = optional($pegawai->divisi)->Kode_Divisi;
        $fileName = 'DaftarPegawai_' . $nip . '_' . $nama . '_' . $kode_divisi . '.xlsx';

        return Excel::download(new PegawaiExport($nip), $fileName);
    }

    public function exportPdf($nip)
    {
        $pegawai = Pegawai::where('NIP', $nip)->with('divisi')->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Pegawai Tidak Ditemukan');
        }

        $nama = $pegawai->Nama;
        $kode_divisi = optional($pegawai->divisi)->Kode_Divisi;
        $fileName = 'DaftarPegawai_' . $nip . '_' . $nama . '_' . $kode_divisi . '.pdf';

        // Setup dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('defaultFont', 'Arial');

        // Instantiate Dompdf with options
        $dompdf = new Dompdf($options);

        // Load HTML content
        $html = view('pdf.DaftarPegawai', compact('pegawai'))->render();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser with custom file name
        return $dompdf->stream($fileName, array("Attachment" => false));
    }

    public function filterPresensi(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $results = Presensi::select('NIP', DB::raw('count(*) as presences'))
            ->whereMonth('Tanggal', $month)
            ->whereYear('Tanggal', $year)
            ->groupBy('NIP')
            ->get();

        return view('filter.presensi', ['results' => $results, 'filter' => 'presensi']);
    }

    public function exportToExcelPresensi(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        // Ganti PresensiExport sesuai dengan query data yang Anda butuhkan untuk filter presensi
        return Excel::download(new PresensiExport($month, $year), 'Daftar_Presensi_' . $month . '_' . $year . '.xlsx');
    }

    public function filterDivisi()
    {
        try {
            // Ambil data divisi beserta pegawainya
            $results = Divisi::with('pegawai')
                ->get();

            return view('filter.divisi', ['results' => $results, 'filter' => 'divisi']);
        } catch (\Exception $e) {
            dd($e); // Tampilkan pesan error lengkap untuk debug
        }
    }

    public function exportToExcelDivisi()
    {
        return Excel::download(new DivisiExport(), 'Daftar_Divisi.xlsx');
    }

    public function filterAlamat()
    {
        $results = Pegawai::where('Alamat', 'LIKE', '%Bogor%')->get();

        return view('filter.alamat', ['results' => $results, 'filter' => 'alamat']);
    }

    public function exportToExcelAlamat()
    {
        return Excel::download(new AlamatExport, 'Daftar_Alamat.xlsx');
    }

    public function queryA()
    {
        $results = Presensi::select('NIP', DB::raw('count(*) as presences'))
            ->whereMonth('Tanggal', 1)
            ->whereYear('Tanggal', 2018)
            ->groupBy('NIP')
            ->get();

        return $results;
    }

    public function queryB()
    {
        $results = Pegawai::select('Kode_Divisi', DB::raw('count(*) as total'))
            ->groupBy('Kode_Divisi')
            ->get();

        return $results;
    }

    public function queryC()
    {
        $results = Pegawai::where('Alamat', 'like', '%Bogor%')->get();

        return $results;
    }
}
