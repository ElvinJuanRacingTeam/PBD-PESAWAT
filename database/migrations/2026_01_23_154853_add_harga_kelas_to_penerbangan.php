<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penerbangan', function (Blueprint $table) {
            $table->bigInteger('harga_economy')->after('maskapai');
            $table->bigInteger('harga_business')->after('harga_economy');
            $table->bigInteger('harga_first')->after('harga_business');
        });
    }

    public function down(): void
    {
        Schema::table('penerbangan', function (Blueprint $table) {
            $table->dropColumn(['harga_economy','harga_business','harga_first']);
        });
    }
};
