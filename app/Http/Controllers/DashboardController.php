<?php

namespace App\Http\Controllers;

use App\Models\Penerbangan;
use App\Models\Pemesanan;
use App\Models\Penumpang;

class DashboardController extends Controller
{
    public function index()
    {
        // Total revenue
        $revenue = Pemesanan::sum('total_harga');

        // Tickets sold
        $tickets = Pemesanan::count();

        // Active routes
        $routes = Penerbangan::count();

        // Total users
        $users = Penumpang::count();

        // Recent bookings
        $recentBookings = Pemesanan::with('penumpang')
            ->orderBy('created_at','desc')
            ->limit(4)
            ->get();

        // Incoming flights (FIXED COLUMN)
        $incomingFlights = Penerbangan::orderBy('tgl_keberangkatan','asc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'revenue',
            'tickets',
            'routes',
            'users',
            'recentBookings',
            'incomingFlights'
        ));
    }
}
