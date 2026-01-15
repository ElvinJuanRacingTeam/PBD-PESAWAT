<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemesanan;

class Penerbangan extends Model
{
    use HasFactory;

    protected $table = 'penerbangan';
    protected $primaryKey = 'id_penerbangan';

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
        return $this->hasMany(Pemesanan::class, 'id_penerbangan');
    }
}
