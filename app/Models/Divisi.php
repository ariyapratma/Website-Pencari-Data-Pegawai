<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'tbl_divisi';
    protected $primaryKey = 'Kode_divisi';
    public $incrementing = false;

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'Kode_Divisi', 'Kode_divisi');
    }
}
