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
    background:rgba(255,255,255,0.12);
    border-radius:14px;
    padding:15px;
    display:flex;
    align-items:center;
    gap:10px;
}
.profile-circle{
    width:40px;height:40px;border-radius:50%;
    background:#6366f1;
    display:flex;align-items:center;justify-content:center;
    font-weight:700;
}
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;margin-top:8px;display:inline-block;}

.main{flex:1;padding:30px;overflow-y:auto;}
h2{margin:0;font-size:26px;font-weight:700;}

.section{
    margin-top:20px;
    background:white;
    border-radius:15px;
    padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

.table-wrapper{width:100%;overflow-x:auto;}
table{width:100%;border-collapse:collapse;min-width:600px;}
th,td{padding:12px 10px;text-align:left;font-size:13px;}
th{font-weight:700;border-bottom:2px solid #e5e7eb;}
tr:nth-child(even){background:#f9fafb;}
.action button{
    border:none;background:none;color:#ef4444;font-weight:600;cursor:pointer;
}

/* ===== MODAL MODERN SCROLL ===== */
.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(15,23,42,0.55);
    align-items:center;
    justify-content:center;
    z-index:1000;
}
.modal.show{display:flex;}

.modal-content{
    background:white;
    border-radius:18px;
    padding:26px 28px;
    width:680px;
    max-width:90vw;
    max-height:90vh;
    overflow-y:auto;
    box-shadow:0 20px 40px rgba(0,0,0,0.25);
}

.close{
    font-size:26px;
    cursor:pointer;
    color:#9ca3af;
    float:right;
}

.form-group{margin-bottom:16px;}
.form-group label{display:block;margin-bottom:6px;font-weight:600;}
.form-group input,.form-group select{
    width:100%;
    padding:10px;
    border:2px solid #e5e7eb;
    border-radius:8px;
    font-family:'Poppins',sans-serif;
}

.form-actions{text-align:right;}
.form-actions button{
    background:#4f46e5;
    color:white;
    border:none;
    padding:10px 16px;
    border-radius:8px;
    font-weight:600;
}

/* ===== SEAT GRID ===== */
.seat-grid{
    display:grid;
    grid-template-columns:repeat(8,1fr);
    gap:8px;
    margin-top:10px;
    max-width:360px;
}
.seat{
    background:#1f2937;
    color:white;
    padding:8px 0;
    border-radius:6px;
    font-size:11px;
    font-weight:600;
    text-align:center;
    cursor:pointer;
}
.seat:hover{background:#374151;}
.seat.taken{background:#dc2626;cursor:not-allowed;}
.seat.selected{background:#16a34a;}

.seat-info{
    margin-top:8px;
    font-size:11px;
    color:#64748b;
}
.seat-info span{
    display:inline-block;width:14px;height:14px;border-radius:3px;margin-right:4px;
}
.seat-available{background:#1f2937;}
.seat-taken{background:#dc2626;}
.seat-selected{background:#16a34a;}
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
<div>
<div class="profile-box">
<div class="profile-circle">AD</div>
<div><strong>Super Admin</strong><br>Management Level</div>
</div>
<a href="/logout" class="logout">Sign Out System</a>
</div>
</div>

<!-- MAIN -->
<div class="main">

<h2>Ticket Bookings</h2><br>

<a href="#" onclick="openModal();return false;"
style="background:#4f46e5;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;">
+ New Booking</a>

<div class="section">
<div class="table-wrapper">
<table>
<tr>
<th>ID</th>
<th>Passenger</th>
<th>Flight</th>
<th>Seat</th>
<th>Total Harga</th>
<th>Tanggal</th>
<th>Metode</th>
<th>Aksi</th>
</tr>

@foreach($pemesanan as $i => $p)
<tr>
<td>S{{ $i+1 }}</td>
<td>{{ $p->penumpang->nama }}</td>
<td>{{ $p->penerbangan->kota_asal }} → {{ $p->penerbangan->kota_tujuan }}</td>
<td>{{ $p->nomor_kursi }}</td>
<td>Rp {{ number_format($p->total_harga,0,',','.') }}</td>
<td>{{ $p->tgl_pemesanan }}</td>
<td>{{ $p->metode_pembayaran }}</td>
<td class="action">
<form method="POST" action="/pemesanan/{{ $p->id_pemesanan }}">
@csrf @method('DELETE')
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
<span class="close" onclick="closeModal()">×</span>
<h3>New Booking</h3><br>

<form method="POST" action="/pemesanan">
@csrf

<div class="form-group">
<label>Passenger</label>
<select name="id_penumpang" required>
@foreach($penumpang as $ps)
<option value="{{ $ps->id_penumpang }}">{{ $ps->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Flight</label>
<select id="flightSelect" name="id_penerbangan" required>
@foreach($penerbangan as $f)
<option value="{{ $f->id_penerbangan }}"
data-economy="{{ $f->harga_economy }}"
data-business="{{ $f->harga_business }}"
data-first="{{ $f->harga_first }}">
{{ $f->kota_asal }} → {{ $f->kota_tujuan }}
</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Kelas</label>
<select id="classSelect" required>
<option value="economy">Economy</option>
<option value="business">Business</option>
<option value="first">First</option>
</select>
</div>

<div class="form-group">
<label>Seat</label>
<input type="hidden" name="nomor_kursi" id="seatInput" required>
<div class="seat-grid" id="seatGrid"></div>
<div class="seat-info">
<span class="seat-available"></span> Available
<span class="seat-taken"></span> Taken
<span class="seat-selected"></span> Selected
</div>
</div>

<div class="form-group">
<label>Total Harga</label>
<input type="number" name="total_harga" id="priceInput" readonly required>
</div>

<div class="form-group">
<label>Tanggal Pemesanan</label>
<input type="date" name="tgl_pemesanan" required>
</div>

<div class="form-group">
<label>Metode Pembayaran</label>
<select name="metode_pembayaran" required>
<option>Credit Card</option>
<option>Transfer</option>
<option>Cash</option>
</select>
</div>

<div class="form-actions">
<button type="submit">Simpan</button>
</div>

</form>
</div>
</div>

<script>
function openModal(){
document.getElementById('bookingModal').classList.add('show');
}
function closeModal(){
document.getElementById('bookingModal').classList.remove('show');
}
</script>

<script>
const seatGrid=document.getElementById('seatGrid');
const seatInput=document.getElementById('seatInput');

['A','B','C','D','E'].forEach(r=>{
 for(let i=1;i<=8;i++){
   let code=r+i;
   let div=document.createElement('div');
   div.className='seat';
   div.innerText=code;
   div.onclick=()=>{
     document.querySelectorAll('.seat.selected').forEach(s=>s.classList.remove('selected'));
     div.classList.add('selected');
     seatInput.value=code;
   };
   seatGrid.appendChild(div);
 }
});
</script>

<script>
const flightSelect=document.getElementById('flightSelect');
const classSelect=document.getElementById('classSelect');
const priceInput=document.getElementById('priceInput');

function updatePrice(){
let opt=flightSelect.options[flightSelect.selectedIndex];
let cls=classSelect.value;
let price=0;
if(cls==='economy') price=opt.dataset.economy;
if(cls==='business') price=opt.dataset.business;
if(cls==='first') price=opt.dataset.first;
priceInput.value=price;
}
flightSelect.addEventListener('change',updatePrice);
classSelect.addEventListener('change',updatePrice);
updatePrice();
</script>

</body>
</html>
