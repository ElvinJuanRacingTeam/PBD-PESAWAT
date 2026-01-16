-- =====================================================
-- SQL INSERT QUERIES - DATA SEEDER
-- Berdasarkan gambar tabel Penumpang, Penerbangan & Pemesanan
-- =====================================================

-- =====================================================
-- 1. TABEL PENUMPANG (Gambar Tabel Penumpang 1.1)
-- =====================================================
-- Hapus data lama (opsional)
-- DELETE FROM penumpang;

INSERT INTO penumpang (id_penumpang, nik, nama, jenis_kelamin, tgl_lahir, no_telp, email, alamat) VALUES
(1, '10123129', 'Sandika', 'L', '2005-02-10', '89512345678', 'sandika@gmail.com', 'Majahya'),
(2, '10123167', 'Ryo', 'L', '2005-03-11', '81234567891', 'ryo@gmail.com', 'Moch.Toha'),
(3, '10123164', 'Elvin', 'L', '2003-04-12', '89123456789', 'elvin@gmail.com', 'Soreang'),
(4, '10123171', 'Agung', 'L', '2005-05-13', '87812345678', 'agung@gmail.com', 'Siak'),
(5, '10123170', 'Yogi', 'L', '2005-05-14', '87812345679', 'yogi@gmail.com', 'Cantigi');


-- =====================================================
-- 2. TABEL PENERBANGAN (Gambar Tabel Penerbangan 1.2)
-- =====================================================
-- Hapus data lama (opsional)
-- DELETE FROM penerbangan;

INSERT INTO penerbangan (id_penerbangan, kota_asal, kota_tujuan, tgl_keberangkatan, waktu_keberangkatan, waktu_tiba, gerbang, kelas, maskapai) VALUES
(1, 'Pekanbaru', 'Jakarta', '2025-05-12', '12:00:00', '16:00:00', 3, 'Ekonomi', 'Garuda Indonesia'),
(2, 'Jakarta', 'Denpasar', '2025-02-11', '17:00:00', '19:00:00', 2, 'Ekonomi', 'Lion Air'),
(3, 'Jakarta', 'Pekanbaru', '2025-06-03', '14:00:00', '18:00:00', 1, 'Bisnis', 'Batik Air'),
(4, 'Papua', 'Aceh', '2025-07-06', '01:00:00', '09:00:00', 4, 'Bisnis', 'Qatar Airways'),
(5, 'Jakarta', 'Jogja', '2025-08-02', '03:00:00', '04:00:00', 3, 'Ekonomi', 'Japan Air Lines');


-- =====================================================
-- 3. TABEL PEMESANAN (Gambar Tabel Pemesanan 1.3)
-- =====================================================
-- Hapus data lama (opsional)
-- DELETE FROM pemesanan;

INSERT INTO pemesanan (id_pemesanan, id_penumpang, id_penerbangan, nomor_kursi, total_harga, tgl_pemesanan, metode_pembayaran) VALUES
(1, 2, 1, 'A1', 1250000, '2025-07-12', 'Cash'),
(2, 2, 3, 'B2', 980000, '2025-06-02', 'Transfer'),
(3, 3, 5, 'C3', 1500000, '2025-05-28', 'Cash'),
(4, 1, 1, 'A2', 1250000, '2025-01-07', 'Transfer'),
(5, 4, 3, 'D1', 980000, '2025-07-07', 'Transfer');


-- =====================================================
-- CATATAN:
-- - id_penumpang: P1=1, P2=2, P3=3, P4=4, P5=5
-- - id_penerbangan: G1=1, G2=2, G3=3, G4=4, G5=5
-- - id_pemesanan: S1=1, S2=2, S3=3, S4=4, S5=5
-- - jenis_kelamin: L = Laki-laki, P = Perempuan
-- - metode_pembayaran: 'Cash' = Tunai, 'Transfer' = Transfer Bank
-- =====================================================
