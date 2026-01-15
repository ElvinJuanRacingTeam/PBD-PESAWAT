<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->string('nomor_kursi');
            $table->integer('total_harga');
            $table->date('tgl_pemesanan');
            $table->string('metode_pembayaran');

            $table->unsignedBigInteger('id_penumpang');
            $table->unsignedBigInteger('id_penerbangan');

            $table->foreign('id_penumpang')
                  ->references('id_penumpang')
                  ->on('penumpang')
                  ->onDelete('cascade');

            $table->foreign('id_penerbangan')
                  ->references('id_penerbangan')
                  ->on('penerbangan')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
