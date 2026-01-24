<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Flight Schedule</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{margin:0;font-family:'Poppins',sans-serif;background:#f5f7fb;}
.wrapper{display:flex;height:100vh;}
.sidebar{width:260px;background:linear-gradient(180deg,#4f46e5,#7c3aed);color:white;padding:25px 20px;display:flex;flex-direction:column;justify-content:space-between;}
.logo-box{display:flex;align-items:center;gap:12px;margin-bottom:40px;}
.logo{width:52px;height:52px;background:white;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:26px;color:#4f46e5;font-weight:bold;}
.brand{font-size:20px;font-weight:700;}
.menu a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;}
.menu a.active{background:rgba(255,255,255,0.25);}
.menu a:hover{background:rgba(255,255,255,0.2);}
.profile-box{background:rgba(255,255,255,0.12);border-radius:14px;padding:15px;display:flex;align-items:center;gap:10px;}
.profile-circle{width:40px;height:40px;border-radius:50%;background:#6366f1;display:flex;align-items:center;justify-content:center;font-weight:700;}
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;margin-top:8px;display:inline-block;}
.main{flex:1;padding:30px;overflow-y:auto;}
.add-btn{background:#4f46e5;color:white;padding:10px 18px;border-radius:10px;text-decoration:none;font-weight:700;display:inline-block;margin-bottom:20px;}
.flight-card{background:white;border-radius:18px;padding:18px 22px;box-shadow:0 8px 18px rgba(0,0,0,0.06);display:grid;grid-template-columns:200px 1fr 200px;align-items:center;margin-bottom:18px;}
.flight-airline-box{display:flex;align-items:center;gap:14px;}
.flight-logo{width:52px;height:52px;border-radius:14px;background:#eef2ff;display:flex;align-items:center;justify-content:center;font-size:22px;color:#4f46e5;}
.flight-airline-name{font-size:14px;font-weight:700;color:#111827;}
.flight-date{font-size:12px;color:#6b7280;}
.flight-route-box{text-align:center;}
.flight-time-big{font-size:22px;font-weight:800;color:#111827;}
.flight-route-line{font-size:14px;font-weight:600;color:#4b5563;margin-top:4px;}
.flight-gate{font-size:12px;color:#9ca3af;}
.flight-right-box{text-align:right;}
.flight-class{padding:6px 14px;border-radius:999px;font-size:11px;font-weight:800;display:inline-block;margin-bottom:8px;}
.economy{background:#dbeafe;color:#1e40af;}
.business{background:#fef3c7;color:#92400e;}
.first{background:#fce7f3;color:#9d174d;}
.price-tag{font-size:15px;font-weight:800;margin-bottom:6px;}
.price-economy{color:#1e40af;}
.price-business{color:#92400e;}
.price-first{color:#9d174d;}
.flight-action button{font-size:13px;font-weight:700;background:none;border:none;cursor:pointer;color:#dc2626;}
.modal{display:none;position:fixed;inset:0;background:rgba(15,23,42,0.55);align-items:center;justify-content:center;z-index:1000;}
.modal.show{display:flex;}
.modal-content{background:white;border-radius:18px;padding:26px 28px;width:680px;max-width:90vw;max-height:90vh;overflow-y:auto;}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;}
.modal-title{font-size:18px;font-weight:800;color:#0f172a;}
.close{font-size:22px;cursor:pointer;color:#64748b;}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.form-full{grid-column:1/-1;}
.field label{font-size:12px;font-weight:700;color:#475569;display:block;margin-bottom:4px;}
.modal-content select,.modal-content input{width:100%;padding:11px;border-radius:10px;border:1px solid #e2e8f0;font-family:'Poppins',sans-serif;font-size:13px;background:#f8fafc;}
.section-title{font-size:13px;font-weight:800;color:#0f172a;margin:8px 0 6px;}
.save-btn{margin-top:8px;background:linear-gradient(90deg,#4f46e5,#7c3aed);color:white;border:none;padding:12px;border-radius:10px;font-weight:800;font-size:13px;width:100%;cursor:pointer;}
</style>
</head>
<body>

<div class="wrapper">
<div class="sidebar">
<div>
<div class="logo-box">
<div class="logo">✈</div>
<div class="brand">Ayo Terbang</div>
</div>
<div class="menu">
<a href="/dashboard">Overview</a>
<a href="/penumpang">Passenger Database</a>
<a href="/penerbangan" class="active">Flight Schedule</a>
<a href="/pemesanan">Ticket Bookings</a>
<a href="/soal5">Analytics Report</a>
</div>
</div>
<div>
<div class="profile-box">
<div class="profile-circle">AD</div>
<div><strong>Super Admin</strong><br>Management Level</div>
</div>
<a href="/logout" class="logout">Sign Out System</a>
</div>
</div>

<div class="main">

<h2>Flight Schedule</h2>
<a href="#" class="add-btn" onclick="openAddModal();return false;">+ Add New Flight</a>

@foreach($penerbangan as $p)
<div class="flight-card">

<div class="flight-airline-box">
<div class="flight-logo">✈</div>
<div>
<div class="flight-airline-name">{{ $p->maskapai }}</div>
<div class="flight-date">{{ date('d M Y', strtotime($p->tgl_keberangkatan)) }}</div>
</div>
</div>

<div class="flight-route-box">
<div class="flight-time-big">{{ substr($p->waktu_keberangkatan,0,5) }} → {{ substr($p->waktu_tiba,0,5) }}</div>
<div class="flight-route-line">{{ $p->kota_asal }} → {{ $p->kota_tujuan }}</div>
<div class="flight-gate">Gate {{ $p->gerbang }}</div>
</div>

<div class="flight-right-box">
@if($p->kelas=='Economy')
<span class="flight-class economy">ECONOMY</span>
<div class="price-tag price-economy">Rp {{ number_format($p->harga_economy,0,',','.') }}</div>
@elseif($p->kelas=='Business')
<span class="flight-class business">BUSINESS</span>
<div class="price-tag price-business">Rp {{ number_format($p->harga_business,0,',','.') }}</div>
@else
<span class="flight-class first">FIRST</span>
<div class="price-tag price-first">Rp {{ number_format($p->harga_first,0,',','.') }}</div>
@endif

<form action="/penerbangan/{{ $p->id_penerbangan }}" method="POST">
@csrf @method('DELETE')
<button type="submit">Hapus</button>
</form>
</div>

</div>
@endforeach

</div>
</div>

<!-- MODAL -->
<div class="modal" id="flightModal">
<div class="modal-content">
<div class="modal-header">
<div class="modal-title">New Flight</div>
<div class="close" onclick="closeModal()">×</div>
</div>

<form action="/penerbangan" method="POST">
@csrf

<div class="section-title">Route</div>
<div class="form-grid">
<div class="field">
<label>Kota Asal</label>
<select name="kota_asal" id="asal" required>
<option>Bandung</option>
<option>Jakarta</option>
<option>Surabaya</option>
<option>Denpasar</option>
</select>
</div>
<div class="field">
<label>Kota Tujuan</label>
<select name="kota_tujuan" id="tujuan" required>
<option>Medan</option>
<option>Makassar</option>
<option>Yogyakarta</option>
<option>Balikpapan</option>
</select>
</div>
<div class="field form-full">
<label>Tanggal Keberangkatan</label>
<input type="date" name="tgl_keberangkatan" required>
</div>
</div>

<div class="section-title">Schedule</div>
<div class="form-grid">
<div class="field">
<label>Waktu Berangkat</label>
<select name="waktu_keberangkatan" required>
<option>06:30</option><option>08:45</option><option>10:15</option>
<option>13:00</option><option>15:20</option><option>18:10</option><option>20:45</option>
</select>
</div>
<div class="field">
<label>Waktu Tiba</label>
<select name="waktu_tiba" required>
<option>08:10</option><option>10:20</option><option>12:00</option>
<option>14:40</option><option>17:00</option><option>19:50</option><option>22:15</option>
</select>
</div>
<div class="field">
<label>Gerbang</label>
<select name="gerbang" required>
<option>A1</option><option>A2</option><option>B1</option>
<option>B2</option><option>C1</option><option>C2</option>
</select>
</div>
<div class="field">
<label>Kelas</label>
<select name="kelas" required>
<option>Economy</option>
<option>Business</option>
<option>First</option>
</select>
</div>
</div>

<div class="section-title">Airline</div>
<div class="form-grid">
<div class="field form-full">
<label>Maskapai</label>
<select name="maskapai" required>
<option>Garuda Indonesia</option>
<option>Lion Air</option>
<option>Batik Air</option>
<option>Citilink</option>
<option>AirAsia</option>
</select>
</div>
</div>

<div class="section-title">Pricing per Class</div>
<div class="form-grid">
<div class="field">
<label>Harga Economy</label>
<input type="number" name="harga_economy" id="harga_economy" readonly required>
</div>
<div class="field">
<label>Harga Business</label>
<input type="number" name="harga_business" id="harga_business" readonly required>
</div>
<div class="field form-full">
<label>Harga First</label>
<input type="number" name="harga_first" id="harga_first" readonly required>
</div>
</div>

<button type="submit" class="save-btn">SIMPAN FLIGHT</button>

</form>
</div>
</div>

<script>
function openAddModal(){document.getElementById('flightModal').classList.add('show');}
function closeModal(){document.getElementById('flightModal').classList.remove('show');}

const jarak = {
 "Bandung-Medan":1400,
 "Bandung-Makassar":1250,
 "Bandung-Yogyakarta":400,
 "Bandung-Balikpapan":1100,
 "Jakarta-Medan":1400,
 "Jakarta-Makassar":1300,
 "Surabaya-Medan":1200,
 "Denpasar-Medan":1700
};

const rate = {economy:1000,business:1800,first:2500};

const asal=document.getElementById('asal');
const tujuan=document.getElementById('tujuan');

const eco=document.getElementById('harga_economy');
const bus=document.getElementById('harga_business');
const fir=document.getElementById('harga_first');

function hitungHarga(){
 let key = asal.value+"-"+tujuan.value;
 let d = jarak[key] ?? 1000;
 eco.value = d * rate.economy;
 bus.value = d * rate.business;
 fir.value = d * rate.first;
}

asal.addEventListener('change',hitungHarga);
tujuan.addEventListener('change',hitungHarga);
hitungHarga();
</script>

</body>
</html>
