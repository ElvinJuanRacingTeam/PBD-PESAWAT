<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;

class QueryController extends Controller
{
    public function soal1()
    {
        return Pemesanan::join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
        ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
        ->where('pemesanan.total_harga','>',1000000)
        ->orderBy('pemesanan.total_harga','desc')
        ->get([
            'penumpang.nama',
            'penerbangan.kota_asal',
            'penerbangan.kota_tujuan',
            'penerbangan.kelas',
            'pemesanan.total_harga'
        ]);
    }

    public function soal2()
    {
        return Pemesanan::join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
        ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
        ->get([
            'penumpang.nama',
            'penerbangan.tgl_keberangkatan',
            'pemesanan.nomor_kursi',
            'penerbangan.gerbang',
            'penerbangan.kelas'
        ]);
    }

    public function soal3()
    {
        return Pemesanan::join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
        ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
        ->where('penerbangan.kelas','Ekonomi')
        ->get()
        ->map(function($q){
            return strtoupper($q->nama)
            .'-'.$q->nik
            .'-'.$q->tgl_keberangkatan
            .'-'.$q->waktu_keberangkatan
            .'-'.$q->waktu_tiba;
        });
    }

    public function soal4()
    {
        return Pemesanan::join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
        ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
        ->whereMonth('penerbangan.tgl_keberangkatan',7)
        ->get([
            'penumpang.nama',
            'penumpang.nik',
            'penerbangan.kota_asal',
            'penerbangan.kota_tujuan',
            'penerbangan.kelas',
            'penerbangan.maskapai'
        ]);
    }

    public function soal5()
    {
        return Pemesanan::join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
        ->where('pemesanan.metode_pembayaran','Transfer')
        ->where('pemesanan.total_harga','>',1000000)
        ->get([
            'penumpang.nik',
            'penumpang.nama',
            'pemesanan.total_harga',
            'pemesanan.metode_pembayaran'
        ]);
    }
}
