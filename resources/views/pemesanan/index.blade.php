<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Bookings - Ayo Terbang</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{margin:0;font-family:'Poppins',sans-serif;background:#f4f6fb;}
.wrapper{display:flex;height:100vh;}

.sidebar{
    width:260px;
    background:linear-gradient(180deg,#4f46e5,#7c3aed);
    color:white;
    padding:25px 20px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

.logo-box{display:flex;align-items:center;gap:12px;margin-bottom:40px;}
.logo{
    width:52px;height:52px;background:white;border-radius:14px;
    display:flex;align-items:center;justify-content:center;
    font-size:26px;color:#4f46e5;font-weight:bold;
}
.brand{font-size:20px;font-weight:700;}

.menu a{
    display:block;color:white;text-decoration:none;
    padding:12px;border-radius:10px;margin-bottom:8px;
}
.menu a.active{background:rgba(255,255,255,0.25);}
.menu a:hover{background:rgba(255,255,255,0.2);}

.profile-box{
    background:rgba(255,255,255,0.12);border-radius:14px;padding:15px;
    display:flex;align-items:center;gap:10px;
}
.profile-circle{
    width:40px;height:40px;border-radius:50%;background:#6366f1;
    display:flex;align-items:center;justify-content:center;font-weight:700;
}
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;margin-top:8px;display:inline-block;}


.main{flex:1;padding:30px;overflow-y:auto;}
h2{margin:0;font-size:26px;font-weight:700;}

.section{
    margin-top:20px;
    background:white;border-radius:15px;padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

/* Tabel Responsif */
.table-wrapper{width:100%;overflow-x:auto;}
table{width:100%;border-collapse:collapse;table-layout:auto;min-width:600px;}
th,td{padding:12px 10px;text-align:left;font-size:13px;word-wrap:break-word;word-break:break-word;}
th{font-weight:700;border-bottom:2px solid #e5e7eb;}
tr:nth-child(even){background:#f9fafb;}

@media (max-width: 1200px) {
    th, td { padding: 10px 8px; font-size: 12px; }
}
@media (max-width: 992px) {
    .main { padding: 20px; }
    th, td { padding: 8px 6px; font-size: 11px; }
}
@media (max-width: 768px) {
    .wrapper { flex-direction: column; }
    .sidebar { width: 100%; padding: 15px; flex-direction: row; justify-content: space-between; align-items: center; }
    .menu { display: flex; gap: 5px; }
    .menu a { padding: 8px 10px; margin-bottom: 0; font-size: 12px; }
    .profile-box { display: none; }
    .main { padding: 15px; }
}

.action a{
    margin-right:12px;
    text-decoration:none;
    font-weight:600;
    color:#4f46e5;
}
.action button{
    border:none;
    background:none;
    color:#ef4444;
    font-weight:600;
    cursor:pointer;
}

.modal{
    display:none;position:fixed;top:0;left:0;width:100%;height:100%;
    background:rgba(0,0,0,0.5);align-items:center;justify-content:center;z-index:1000;
}
.modal.show{display:flex;}
.modal-content{
    background:white;border-radius:20px;padding:30px;width:90%;max-width:600px;
}
.close{font-size:28px;cursor:pointer;color:#9ca3af;}
.form-group{margin-bottom:18px;}
.form-group label{display:block;margin-bottom:6px;font-weight:600;}
.form-group input,.form-group select{
    width:100%;padding:10px;border:2px solid #e5e7eb;border-radius:8px;
}
.form-actions{text-align:right;}
.form-actions button{
    background:#4f46e5;color:white;border:none;
    padding:8px 14px;border-radius:6px;font-weight:600;
}
</style>
</head>
<body>

<div class="wrapper">

<!-- SIDEBAR -->
<div class="sidebar">
    <div>
        <div class="logo-box">
            <div class="logo">✈</div>
            <div class="brand">Ayo Terbang</div>
        </div>

        <div class="menu">
            <a href="/dashboard">Overview</a>
            <a href="/penumpang">Passenger Database</a>
            <a href="/penerbangan">Flight Schedule</a>
            <a href="/pemesanan" class="active">Ticket Bookings</a>
            <a href="/soal5">Analytics Report</a>
        </div>
    </div>

    <!-- ADMIN BOX + LOGOUT -->
    <div>
        <div class="profile-box">
            <div class="profile-circle">AD</div>
            <div class="profile-text">
                <strong>Super Admin</strong><br>Management Level
            </div>
        </div>
        <a href="/logout" class="logout">Sign Out System</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<h2>Ticket Bookings</h2>
<br>

<a href="#" onclick="openModal('add');return false;"
style="background:#4f46e5;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;">
+ New Booking
</a>

<div class="section">
<div class="table-wrapper">
<table>
<tr>
<th>ID Pemesanan</th>
<th>ID Penumpang</th>
<th>ID Penerbangan</th>
<th>Nomor Kursi</th>
<th>Total Harga</th>
<th>Tgl Pemesanan</th>
<th>Metode Pembayaran</th>
<th>Aksi</th>
</tr>

@foreach($pemesanan as $index => $p)
<tr>
<td>S{{ $index + 1 }}</td>
<td>P{{ $p->id_penumpang }}</td>
<td>G{{ $p->id_penerbangan }}</td>
<td>{{ $p->nomor_kursi }}</td>
<td>{{ number_format($p->total_harga,0,',','') }}</td>
<td>{{ $p->tgl_pemesanan }}</td>
<td>{{ $p->metode_pembayaran }}</td>
<td class="action">
<a href="#" onclick="editBooking({{ $p->id_pemesanan }});return false;">Edit</a>

<form method="POST" action="/pemesanan/{{ $p->id_pemesanan }}" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit">Hapus</button>
</form>
</td>
</tr>
@endforeach
</table>
</div>
</div>
</div>
</div>

<!-- MODAL -->
<div class="modal" id="bookingModal">
<div class="modal-content">
<span class="close" onclick="closeModal()">&times;</span>
<h3 id="modalTitle">New Booking</h3><br>

<form id="bookingForm" method="POST">
@csrf
<input type="hidden" name="_method" id="formMethod">

<div class="form-group">
<label>Passenger</label>
<select name="id_penumpang" id="id_penumpang" required>
@foreach($penumpang as $ps)
<option value="{{ $ps->id_penumpang }}">{{ $ps->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Flight</label>
<select name="id_penerbangan" id="id_penerbangan" required>
@foreach($penerbangan as $f)
<option value="{{ $f->id_penerbangan }}">
{{ $f->kota_asal }} → {{ $f->kota_tujuan }}
</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Seat</label>
<input type="text" name="nomor_kursi" id="nomor_kursi" required>
</div>

<div class="form-group">
<label>Total Harga</label>
<input type="number" name="total_harga" id="total_harga" required>
</div>

<div class="form-group">
<label>Tanggal Pemesanan</label>
<input type="date" name="tgl_pemesanan" id="tgl_pemesanan" required>
</div>

<div class="form-group">
<label>Metode Pembayaran</label>
<select name="metode_pembayaran" id="metode_pembayaran" required>
<option value="Credit Card">Credit Card</option>
<option value="Transfer">Transfer</option>
<option value="Cash">Cash</option>
</select>
</div>

<div class="form-actions">
<button type="submit">Simpan</button>
</div>
</form>
</div>
</div>

<script>
const bookingData = @json($pemesanan);

function openModal(mode){
 document.getElementById('bookingModal').classList.add('show');
 if(mode === 'add'){
   document.getElementById('modalTitle').innerText = 'New Booking';
   document.getElementById('bookingForm').action = '/pemesanan';
   document.getElementById('formMethod').value = 'POST';
   document.getElementById('bookingForm').reset();
 }
}

function editBooking(id){
 const b = bookingData.find(x => x.id_pemesanan == id);
 if(!b) return;

 document.getElementById('bookingModal').classList.add('show');
 document.getElementById('modalTitle').innerText = 'Edit Booking';
 document.getElementById('bookingForm').action = '/pemesanan/' + id;
 document.getElementById('formMethod').value = 'PUT';

 document.getElementById('id_penumpang').value = b.id_penumpang;
 document.getElementById('id_penerbangan').value = b.id_penerbangan;
 document.getElementById('nomor_kursi').value = b.nomor_kursi;
 document.getElementById('total_harga').value = b.total_harga;
 document.getElementById('tgl_pemesanan').value = b.tgl_pemesanan;
 document.getElementById('metode_pembayaran').value = b.metode_pembayaran;
}

function closeModal(){
 document.getElementById('bookingModal').classList.remove('show');
}
</script>

</body>
</html>
