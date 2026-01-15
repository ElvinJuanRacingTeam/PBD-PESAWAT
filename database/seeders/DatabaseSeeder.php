<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penumpang;
use App\Models\Penerbangan;
use App\Models\Pemesanan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // === DATA PENUMPANG ===
        Penumpang::create([
            'nik' => '10123129',
            'nama' => 'Sandika Nur Rizki Sendi',
            'jenis_kelamin' => 'L',
            'tgl_lahir' => '2004-02-10',
            'no_telp' => '081234567890',
            'email' => 'sandika@mail.com',
            'alamat' => 'Bandung',
        ]);

        Penumpang::create([
            'nik' => '10123167',
            'nama' => 'Ryo Arya Pribadi',
            'jenis_kelamin' => 'L',
            'tgl_lahir' => '2004-05-12',
            'no_telp' => '081234567891',
            'email' => 'ryo@mail.com',
            'alamat' => 'Jakarta',
        ]);

        Penumpang::create([
            'nik' => '10123164',
            'nama' => 'Elvin Juniansha',
            'jenis_kelamin' => 'L',
            'tgl_lahir' => '2004-08-22',
            'no_telp' => '081234567892',
            'email' => 'elvin@mail.com',
            'alamat' => 'Garut',
        ]);

        // === DATA PENERBANGAN ===
        Penerbangan::create([
            'kota_asal' => 'Bandung',
            'kota_tujuan' => 'Bali',
            'tgl_keberangkatan' => '2025-07-02',
            'waktu_keberangkatan' => '08:30:00',
            'waktu_tiba' => '10:30:00',
            'gerbang' => 'A1',
            'kelas' => 'Ekonomi',
            'maskapai' => 'Garuda',
        ]);

        Penerbangan::create([
            'kota_asal' => 'Jakarta',
            'kota_tujuan' => 'Surabaya',
            'tgl_keberangkatan' => '2025-07-05',
            'waktu_keberangkatan' => '09:00:00',
            'waktu_tiba' => '10:00:00',
            'gerbang' => 'B2',
            'kelas' => 'Bisnis',
            'maskapai' => 'Lion Air',
        ]);

        // === DATA PEMESANAN ===
        Pemesanan::create([
            'nomor_kursi' => 'A01',
            'total_harga' => 1500000,
            'tgl_pemesanan' => '2025-06-02',
            'metode_pembayaran' => 'Transfer',
            'id_penumpang' => 1,
            'id_penerbangan' => 1,
        ]);

        Pemesanan::create([
            'nomor_kursi' => 'B12',
            'total_harga' => 900000,
            'tgl_pemesanan' => '2025-06-03',
            'metode_pembayaran' => 'Cash',
            'id_penumpang' => 2,
            'id_penerbangan' => 2,
        ]);
    }
}
