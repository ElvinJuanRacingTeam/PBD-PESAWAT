<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penumpang;
use App\Models\Penerbangan;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'nomor_kursi',
        'total_harga',
        'tgl_pemesanan',
        'metode_pembayaran',
        'id_penumpang',
        'id_penerbangan',
    ];

    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class, 'id_penumpang');
    }

    public function penerbangan()
    {
        return $this->belongsTo(Penerbangan::class, 'id_penerbangan');
    }
}
