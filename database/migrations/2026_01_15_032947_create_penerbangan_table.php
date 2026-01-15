<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penerbangan', function (Blueprint $table) {
            $table->id('id_penerbangan');
            $table->string('kota_asal');
            $table->string('kota_tujuan');
            $table->date('tgl_keberangkatan');
            $table->time('waktu_keberangkatan');
            $table->time('waktu_tiba');
            $table->string('gerbang');
            $table->string('kelas');
            $table->string('maskapai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerbangan');
    }
};
