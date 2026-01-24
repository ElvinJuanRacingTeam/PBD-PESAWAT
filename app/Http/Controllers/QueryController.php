<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Penerbangan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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

    /* PREMIUM SALES ANALYSIS (SEMUA PEMESANAN) */
    public function soal1()
    {
        $data = DB::table('pemesanan')
            ->join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
            ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
            ->orderBy('pemesanan.total_harga','desc')
            ->get();

        return view('query.soal1', compact('data'));
    }

    public function soal2(){ return response()->json([]); }
    public function soal3(){ return response()->json([]); }
    public function soal4(){ return response()->json([]); }

    /* ANALYTICS REPORT PAGE */
    public function soal5()
    {
        $data = DB::table('pemesanan')
            ->join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
            ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
            ->select(
                'penumpang.nama as client',
                'penerbangan.kota_asal as origin',
                'penerbangan.kota_tujuan as destination',
                'pemesanan.total_harga as harga',
                'pemesanan.nomor_kursi as seat',
                'penerbangan.gerbang as gate'
            )
            ->orderBy('pemesanan.total_harga','desc')
            ->get();

        return view('laporan.index', compact('data'));
    }

    /* EXPORT CLIENT PDF (SEMUA PEMESANAN CLIENT) */
    public function exportClientPDF()
    {
        $clientName = request()->query('client');
        
        if (!$clientName) {
            return redirect()->back()->with('error', 'Client name is required');
        }

        $data = DB::table('pemesanan')
            ->join('penumpang','pemesanan.id_penumpang','=','penumpang.id_penumpang')
            ->join('penerbangan','pemesanan.id_penerbangan','=','penerbangan.id_penerbangan')
            ->select(
                'penumpang.nama as client',
                'penerbangan.kota_asal as origin',
                'penerbangan.kota_tujuan as destination',
                'pemesanan.total_harga as harga',
                'pemesanan.nomor_kursi as seat',
                'penerbangan.gerbang as gate'
            )
            ->where('penumpang.nama', $clientName)
            ->orderBy('pemesanan.total_harga','desc')
            ->get();

        $totalBookings = $data->count();
        $totalRevenue = $data->sum('harga');

        $pdf = Pdf::loadView('laporan.pdf', compact('data', 'clientName', 'totalBookings', 'totalRevenue'));
        
        $filename = str_replace(' ', '_', $clientName) . '_Sales_Report.pdf';
        
        return $pdf->download($filename);
    }
}
