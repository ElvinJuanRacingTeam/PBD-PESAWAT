<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:penumpang,nik',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'password' => 'required|min:5'
        ]);

        // simpan untuk login
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // simpan juga ke tabel penumpang
        Penumpang::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);

        return redirect('/')->with('success','Register sukses');
    }
}
