<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota_asal',
        'kota_tujuan',
        'tgl_keberangkatan',
        'waktu_keberangkatan',
        'waktu_tiba',
        'gerbang',
        'kelas',
        'maskapai',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
