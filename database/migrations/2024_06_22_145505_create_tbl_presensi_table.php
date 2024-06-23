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
        Schema::create('tbl_presensi', function (Blueprint $table) {
            $table->id();
            $table->date('Tanggal');
            $table->unsignedBigInteger('NIP');
            $table->time('Jam_Masuk');
            $table->time('Jam_Pulang');
            $table->timestamps();

            $table->foreign('NIP')->references('NIP')->on('tbl_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_presensi');
    }
};
