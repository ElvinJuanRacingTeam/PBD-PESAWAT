<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
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
}
