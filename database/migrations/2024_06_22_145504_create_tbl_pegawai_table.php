<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_pegawai', function (Blueprint $table) {
            $table->id('NIP');
            $table->string('Nama');
            $table->string('Alamat');
            $table->date('Tanggal_lahir');
            $table->string('Kode_Divisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pegawai');
    }
};
