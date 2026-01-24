<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penerbangan', function (Blueprint $table) {
            $table->integer('harga_economy')->default(0)->change();
            $table->integer('harga_business')->default(0)->change();
            $table->integer('harga_first')->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('penerbangan', function (Blueprint $table) {
            $table->integer('harga_economy')->change();
            $table->integer('harga_business')->change();
            $table->integer('harga_first')->change();
        });
    }
};
