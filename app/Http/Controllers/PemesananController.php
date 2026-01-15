<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::with(['penumpang', 'penerbangan'])
            ->orderBy('tgl_pemesanan', 'desc')
            ->get();
        $penumpang = \App\Models\Penumpang::orderBy('nama')->get();
        $penerbangan = \App\Models\Penerbangan::orderBy('tgl_keberangkatan', 'desc')->get();
        return view('pemesanan.index', compact('pemesanan', 'penumpang', 'penerbangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemesananRequest $request)
    {
        Pemesanan::create($request->validated());
        return redirect('/pemesanan')->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        $pemesanan->update($request->validated());
        return redirect('/pemesanan')->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect('/pemesanan')->with('success', 'Booking deleted successfully!');
    }
}
