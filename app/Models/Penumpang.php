<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tgl_lahir',
        'no_telp',
        'email',
        'alamat',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
