<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Flight Schedule</title>

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
    width:52px;height:52px;
    background:white;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
    color:#4f46e5;
    font-weight:bold;
}
.brand{font-size:20px;font-weight:700;}

.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    border-radius:10px;
    margin-bottom:8px;
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

.main{flex:1;padding:30px;}

.section{
    background:white;
    border-radius:15px;
    padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

/* Tabel Responsif */
.table-wrapper{width:100%;overflow-x:auto;}
table{width:100%;border-collapse:collapse;table-layout:auto;min-width:700px;}
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

.badge{padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700;}
.economy{background:#dbeafe;color:#1d4ed8;}
.business{background:#fef3c7;color:#92400e;}
.first{background:#fce7f3;color:#be185d;}

.action a{margin-right:10px;text-decoration:none;font-weight:600;color:#4f46e5;}
.action button{border:none;background:none;color:red;font-weight:600;cursor:pointer;}

.modal{
    display:none;
    position:fixed;
    top:0;left:0;
    width:100%;height:100%;
    background:rgba(0,0,0,0.5);
    align-items:center;
    justify-content:center;
}
.modal.show{display:flex;}

.modal-content{
    background:white;
    padding:25px;
    border-radius:12px;
    width:420px;
}
.modal-content input,
.modal-content select{
    width:100%;
    padding:8px;
    margin-top:6px;
    margin-bottom:14px;
    border:1px solid #ddd;
    border-radius:6px;
}
.modal-content button{
    background:#4f46e5;
    color:white;
    border:none;
    padding:8px 14px;
    border-radius:6px;
    font-weight:600;
}
.close{float:right;font-size:22px;cursor:pointer;}
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
            <a href="/penerbangan" class="active">Flight Schedule</a>
            <a href="/pemesanan">Ticket Bookings</a>
            <a href="/soal5">Analytics Report</a>
        </div>
    </div>

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

<h2>Flight Schedule</h2><br>

<a href="#" onclick="openAddModal();return false;"
style="background:#4f46e5;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;">
+ Add New Flight
</a>

<br><br>

<div class="section">
<div class="table-wrapper">
<table>
<tr>
<th>Flight ID</th>
<th>Route</th>
<th>Departure</th>
<th>Departure Time</th>
<th>Arrival Time</th>
<th>Gate</th>
<th>Class</th>
<th>Airline</th>
<th>Aksi</th>
</tr>

@foreach($penerbangan as $index => $p)
<tr>
<td>G{{ $index+1 }}</td>
<td>{{ $p->kota_asal }} → {{ $p->kota_tujuan }}</td>
<td>{{ $p->tgl_keberangkatan }}</td>
<td>{{ $p->waktu_keberangkatan }}</td>
<td>{{ $p->waktu_tiba }}</td>
<td>{{ $p->gerbang }}</td>
<td>
@if($p->kelas=='Economy')
<span class="badge economy">ECONOMY</span>
@elseif($p->kelas=='Business')
<span class="badge business">BUSINESS</span>
@else
<span class="badge first">FIRST</span>
@endif
</td>
<td>{{ $p->maskapai }}</td>
<td class="action">
<a href="#" onclick="editFlight({{ $p->id_penerbangan }});return false;">Edit</a>

<form action="/penerbangan/{{ $p->id_penerbangan }}" method="POST" style="display:inline;">
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
<div class="modal" id="flightModal">
<div class="modal-content">
<span class="close" onclick="closeModal()">&times;</span>
<h3 id="modalTitle">New Flight</h3><br>

<form id="flightForm" method="POST">
@csrf
<input type="hidden" name="_method" id="formMethod">

<input id="kota_asal" name="kota_asal" placeholder="Kota Asal" required>
<input id="kota_tujuan" name="kota_tujuan" placeholder="Kota Tujuan" required>
<input type="date" id="tgl_keberangkatan" name="tgl_keberangkatan" required>
<input type="time" id="waktu_keberangkatan" name="waktu_keberangkatan" required>
<input type="time" id="waktu_tiba" name="waktu_tiba" required>
<input id="gerbang" name="gerbang" placeholder="Gate" required>

<select id="kelas" name="kelas" required>
<option>Economy</option>
<option>Business</option>
<option>First</option>
</select>

<input id="maskapai" name="maskapai" placeholder="Airline" required>

<button type="submit">Simpan</button>
</form>
</div>
</div>

<script>
const flightData = @json($penerbangan);

function openAddModal(){
 document.getElementById('flightModal').classList.add('show');
 document.getElementById('modalTitle').innerText = 'New Flight';
 document.getElementById('flightForm').action = '/penerbangan';
 document.getElementById('formMethod').value = 'POST';
 document.getElementById('flightForm').reset();
}

function editFlight(id){
 const f = flightData.find(x => x.id_penerbangan == id);
 if(!f) return;

 document.getElementById('flightModal').classList.add('show');
 document.getElementById('modalTitle').innerText = 'Edit Flight';
 document.getElementById('flightForm').action = '/penerbangan/' + id;
 document.getElementById('formMethod').value = 'PUT';

 document.getElementById('kota_asal').value = f.kota_asal;
 document.getElementById('kota_tujuan').value = f.kota_tujuan;
 document.getElementById('tgl_keberangkatan').value = f.tgl_keberangkatan;
 document.getElementById('waktu_keberangkatan').value = f.waktu_keberangkatan;
 document.getElementById('waktu_tiba').value = f.waktu_tiba;
 document.getElementById('gerbang').value = f.gerbang;
 document.getElementById('kelas').value = f.kelas;
 document.getElementById('maskapai').value = f.maskapai;
}

function closeModal(){
 document.getElementById('flightModal').classList.remove('show');
}
</script>

</body>
</html>
