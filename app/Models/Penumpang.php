<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemesanan;

class Penumpang extends Model
{
    use HasFactory;

    protected $table = 'penumpang';
    protected $primaryKey = 'id_penumpang';
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tgl_lahir',
        'no_telp',
        'email',
        'alamat'
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_penumpang', 'id_penumpang');
    }
}
