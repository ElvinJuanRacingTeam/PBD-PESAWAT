<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'penumpang_id',
        'penerbangan_id',
        'nomor_kursi',
        'total_harga',
        'tgl_pemesanan',
        'metode_pembayaran',
    ];

    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class);
    }

    public function penerbangan()
    {
        return $this->belongsTo(Penerbangan::class);
    }
}
