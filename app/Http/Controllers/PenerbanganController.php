<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenerbanganRequest;
use App\Http\Requests\UpdatePenerbanganRequest;
use App\Models\Penerbangan;
use Illuminate\Http\Request;

class PenerbanganController extends Controller
{
    public function index()
    {
        $penerbangan = Penerbangan::orderBy('tgl_keberangkatan', 'desc')->get();
        return view('penerbangan.index', compact('penerbangan'));
    }

    public function create(){}

    /* fallback store */
    private function forceStore(Request $request)
    {
        Penerbangan::create([
            'kota_asal' => $request->kota_asal,
            'kota_tujuan' => $request->kota_tujuan,
            'tgl_keberangkatan' => $request->tgl_keberangkatan,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,
            'waktu_tiba' => $request->waktu_tiba,
            'gerbang' => $request->gerbang,
            'kelas' => $request->kelas,
            'maskapai' => $request->maskapai,
            'harga_economy' => $request->harga_economy,
            'harga_business' => $request->harga_business,
            'harga_first' => $request->harga_first
        ]);
    }

    public function store(StorePenerbanganRequest $request)
    {
        $data = $request->validated();

        if(count($data) > 0){
            Penerbangan::create($data);
        } else {
            $this->forceStore($request);
        }

        return redirect('/penerbangan')->with('success', 'Flight added successfully!');
    }

    public function show(Penerbangan $penerbangan){}

    public function edit(Penerbangan $penerbangan){}

    public function update(UpdatePenerbanganRequest $request, Penerbangan $penerbangan)
    {
        $data = $request->validated();

        if(count($data) > 0){
            $penerbangan->update($data);
        } else {
            $penerbangan->update([
                'kota_asal' => $request->kota_asal,
                'kota_tujuan' => $request->kota_tujuan,
                'tgl_keberangkatan' => $request->tgl_keberangkatan,
                'waktu_keberangkatan' => $request->waktu_keberangkatan,
                'waktu_tiba' => $request->waktu_tiba,
                'gerbang' => $request->gerbang,
                'kelas' => $request->kelas,
                'maskapai' => $request->maskapai,
                'harga_economy' => $request->harga_economy,
                'harga_business' => $request->harga_business,
                'harga_first' => $request->harga_first
            ]);
        }

        return redirect('/penerbangan')->with('success', 'Flight updated successfully!');
    }

    public function destroy(Penerbangan $penerbangan)
    {
        $penerbangan->delete();
        return redirect('/penerbangan')->with('success', 'Flight deleted successfully!');
    }
}
