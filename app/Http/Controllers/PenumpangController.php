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
            'nik' => 'required|unique:penumpang,nik',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required'
        ]);

        Penumpang::create($request->all());
        return redirect()->route('penumpang.index');
    }

    public function edit($id)
    {
        $penumpang = Penumpang::where('id_penumpang',$id)->firstOrFail();
        return view('penumpang.edit', compact('penumpang'));
    }

    public function update(Request $request, $id)
    {
        $penumpang = Penumpang::where('id_penumpang',$id)->firstOrFail();

        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required'
        ]);

        $penumpang->update($request->all());
        return redirect()->route('penumpang.index');
    }

    public function destroy($id)
    {
        Penumpang::where('id_penumpang',$id)->delete();
        return redirect()->route('penumpang.index');
    }
}
