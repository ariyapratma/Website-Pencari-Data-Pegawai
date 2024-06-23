<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

// Route Pencarian Data Pegawai
Route::get('/', function () {
    return view('pegawai.search');
});
Route::get('/pegawai/search', [PegawaiController::class, 'search']);
Route::get('/pegawai/export/excel/{nip}', [PegawaiController::class, 'exportExcel']);
Route::get('/pegawai/export/pdf/{nip}', [PegawaiController::class, 'exportPdf']);

// Route Filter Data Pegawai
Route::get('/pegawai/filter', function () {
    return view('pegawai.filter');
});

// Route Presensi Pegawai
Route::get('/pegawai/filter/presensi', [PegawaiController::class, 'filterPresensi']);
Route::get('/pegawai/filter/presensi/export/excel', [PegawaiController::class, 'exportToExcelPresensi'])->name('ExportPresensiPegawai');

// Route Divisi Pegawai
Route::get('/pegawai/filter/divisi', [PegawaiController::class, 'filterDivisi']);
Route::get('/pegawai/filter/divisi/export/excel', [PegawaiController::class, 'exportToExcelDivisi'])->name('ExportDivisiPegawai');

// Route Alamat Pegawai
Route::get('/pegawai/filter/alamat', [PegawaiController::class, 'filterAlamat']);
Route::get('/pegawai/filter/alamat/export/excel', [PegawaiController::class, 'exportToExcelAlamat'])->name('ExportAlamatPegawai');

// Route Query
Route::get('/query/a', [PegawaiController::class, 'queryA']);
Route::get('/query/b', [PegawaiController::class, 'queryB']);
Route::get('/query/c', [PegawaiController::class, 'queryC']);
