<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penumpang;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $r){
        Penumpang::create([
            'nik' => $r->nik,
            'nama' => $r->nama,
            'jenis_kelamin' => $r->jenis_kelamin,
            'tgl_lahir' => $r->tgl_lahir,
            'no_telp' => $r->no_telp,
            'email' => $r->email,
            'password' => bcrypt($r->password)
        ]);

        return redirect('/')->with('success','Register berhasil, silakan login');

    }
}
