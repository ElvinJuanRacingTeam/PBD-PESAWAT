<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    public function index()
    {
        $penumpang = Penumpang::all();
        return view('penumpang.index', compact('penumpang'));
    }

    public function create()
    {
        return view('penumpang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:penumpangs',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        Penumpang::create($request->all());
        return redirect('/penumpang')->with('success','Data penumpang ditambahkan');
    }

    public function edit($id)
    {
        $penumpang = Penumpang::findOrFail($id);
        return view('penumpang.edit', compact('penumpang'));
    }

    public function update(Request $request, $id)
    {
        $penumpang = Penumpang::findOrFail($id);

        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        $penumpang->update($request->all());
        return redirect('/penumpang')->with('success','Data diperbarui');
    }

    public function destroy($id)
    {
        $penumpang = Penumpang::findOrFail($id);
        $penumpang->delete();

        return redirect('/penumpang')->with('success','Data dihapus');
    }
}
