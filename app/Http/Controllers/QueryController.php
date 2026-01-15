<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Penerbangan;

class QueryController extends Controller
{
    /* DASHBOARD DATA */
    public function dashboard()
    {
        $totalRevenue = Pemesanan::sum('total_harga');
        $ticketsSold  = Pemesanan::count();
        $totalUsers   = Penumpang::count();
        $activeRoutes = Penerbangan::count();

        $recentBookings = Pemesanan::join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
            ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
            ->orderBy('pemesanan.id_pemesanan','desc')
            ->limit(5)
            ->get([
                'penumpang.nama',
                'pemesanan.nomor_kursi',
                'pemesanan.total_harga'
            ]);

        $upcomingFlights = Penerbangan::orderBy('tgl_keberangkatan','asc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalRevenue',
            'ticketsSold',
            'totalUsers',
            'activeRoutes',
            'recentBookings',
            'upcomingFlights'
        ));
    }

    /* SOAL 1 */
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

    /* SOAL 2–5 placeholder */
    public function soal2(){ return response()->json([]); }
    public function soal3(){ return response()->json([]); }
    public function soal4(){ return response()->json([]); }
    public function soal5(){ return response()->json([]); }
}
