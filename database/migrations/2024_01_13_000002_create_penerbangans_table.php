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
        Schema::create('penerbangans', function (Blueprint $table) {
            $table->id();
            $table->string('kota_asal');
            $table->string('kota_tujuan');
            $table->date('tgl_keberangkatan');
            $table->time('waktu_keberangkatan');
            $table->time('waktu_tiba');
            $table->string('gerbang');
            $table->enum('kelas', ['Ekonomi', 'Bisnis', 'First Class']);
            $table->string('maskapai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbangans');
    }
};
