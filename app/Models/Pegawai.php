<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'tbl_pegawai';
    protected $primaryKey = 'NIP';
    public $incrementing = false;

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'Kode_Divisi', 'Kode_divisi');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'NIP', 'NIP');
    }
}
