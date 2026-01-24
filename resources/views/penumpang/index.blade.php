<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayo Terbang - Passenger Database</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Poppins',sans-serif;
    background:#f4f6fb;
}
.wrapper{display:flex;height:100vh}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#4f46e5,#7c3aed);
    color:white;
    padding:25px 20px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.logo-box{display:flex;align-items:center;gap:12px;margin-bottom:40px}
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
.brand{font-size:20px;font-weight:700}
.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    border-radius:10px;
    margin-bottom:8px;
}
.menu a.active{background:rgba(255,255,255,0.25)}
.menu a:hover{background:rgba(255,255,255,0.18)}

.profile-box{
    background:rgba(255,255,255,0.12);
    border-radius:14px;
    padding:15px;
    display:flex;
    align-items:center;
    gap:10px;
}
.profile-circle{
    width:40px;height:40px;
    border-radius:50%;
    background:#6366f1;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}
.logout{
    color:#ffb4b4;
    text-decoration:none;
    font-size:13px;
    margin-top:8px;
    display:inline-block;
}

/* MAIN */
.main{flex:1;padding:30px;overflow-y:auto}
.add-btn{
    background:#4f46e5;
    color:white;
    padding:10px 16px;
    border-radius:10px;
    text-decoration:none;
    font-weight:700;
    display:inline-block;
    margin-bottom:18px;
    box-shadow:0 4px 10px rgba(79,70,229,.35);
}

/* TABLE */
.table-card{
    background:white;
    border-radius:16px;
    padding:18px;
    box-shadow:0 6px 14px rgba(0,0,0,.06);
}
table{width:100%;border-collapse:collapse}
th{
    font-size:13px;
    font-weight:700;
    color:#475569;
    padding:12px;
    border-bottom:2px solid #e2e8f0;
    text-align:left;
}
td{padding:12px;font-size:13px;color:#111827}
tr:nth-child(even){background:#f8fafc}

.badge{
    padding:5px 11px;
    border-radius:999px;
    font-size:10px;
    font-weight:700;
}
.male{background:#dbeafe;color:#1e40af}
.female{background:#fce7f3;color:#9d174d}

.action a,.action button{
    font-size:13px;
    font-weight:600;
    background:none;
    border:none;
    cursor:pointer;
    text-decoration:none;
    margin-right:10px;
}
.action a{color:#2563eb}
.action button{color:#dc2626}

/* MODAL */
.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(15,23,42,.55);
    align-items:center;
    justify-content:center;
    z-index:999;
}
.modal.show{display:flex}

.modal-content{
    background:white;
    border-radius:20px;
    padding:26px 28px;
    width:560px;
    max-width:92vw;
    box-shadow:0 20px 45px rgba(0,0,0,.25);
}

.modal-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:14px;
}
.modal-title{
    font-size:18px;
    font-weight:800;
    color:#0f172a;
}
.close{
    font-size:22px;
    cursor:pointer;
    color:#64748b;
}

/* FORM GRID */
.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;   /* <-- JARAK FIELD DIPERBESAR */
}

.form-full{grid-column:1/-1}

.field label{
    font-size:12px;
    font-weight:700;
    margin-bottom:6px;
    display:block;
    color:#334155;
}

.field input,
.field select,
.field textarea{
    width:100%;
    padding:12px;
    border-radius:12px;
    border:1.5px solid #e2e8f0;
    font-family:Poppins;
    font-size:13px;
    background:#f9fafb;   /* <-- KONTRAS INPUT */
}

.field input:focus,
.field select:focus,
.field textarea:focus{
    outline:none;
    border-color:#6366f1;
    background:white;
    box-shadow:0 0 0 3px rgba(99,102,241,.15);
}

.save-btn{
    margin-top:14px;
    background:linear-gradient(90deg,#4f46e5,#7c3aed);
    color:white;
    border:none;
    padding:13px;
    border-radius:12px;
    font-weight:800;
    width:100%;
    cursor:pointer;
    font-size:13px;
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
      <a href="/penumpang" class="active">Passenger Database</a>
      <a href="/penerbangan">Flight Schedule</a>
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

<!-- MAIN -->
<div class="main">

<h2>Passenger Database</h2>
<a href="#" class="add-btn" onclick="openAdd();return false;">+ Tambah Penumpang</a>

<div class="table-card">
<table>
<tr>
<th>ID</th><th>NIK</th><th>Nama</th><th>Gender</th><th>Tanggal Lahir</th><th>No Telepon</th><th>Email</th><th>Alamat</th><th>Aksi</th>
</tr>

@foreach($penumpang as $i => $p)
<tr>
<td>P{{ $i+1 }}</td>
<td>{{ $p->nik }}</td>
<td>{{ $p->nama }}</td>
<td>
@if($p->jenis_kelamin=='L')
<span class="badge male">LAKI-LAKI</span>
@else
<span class="badge female">PEREMPUAN</span>
@endif
</td>
<td>{{ \Carbon\Carbon::parse($p->tgl_lahir)->format('d M Y') }}</td>
<td>{{ $p->no_telp }}</td>
<td>{{ $p->email }}</td>
<td>{{ $p->alamat }}</td>
<td class="action">
<a href="#" onclick='openEdit(@json($p));return false;'>Edit</a>
<form action="{{ route('penumpang.destroy',$p->id_penumpang) }}" method="POST" style="display:inline;">
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

<!-- MODAL -->
<div class="modal" id="penumpangModal">
<div class="modal-content">

<div class="modal-header">
<div class="modal-title" id="modalTitle">Tambah Penumpang</div>
<div class="close" onclick="closeModal()">×</div>
</div>

<form id="penumpangForm" method="POST">
@csrf
<div id="methodField"></div>

<div class="form-grid">

<div class="field">
<label>NIK</label>
<input type="text" name="nik" id="nik" required>
</div>

<div class="field">
<label>Nama</label>
<input type="text" name="nama" id="nama" required>
</div>

<div class="field">
<label>Jenis Kelamin</label>
<select name="jenis_kelamin" id="jenis_kelamin">
<option value="L">Laki-laki</option>
<option value="P">Perempuan</option>
</select>
</div>

<div class="field">
<label>Tanggal Lahir</label>
<input type="date" name="tgl_lahir" id="tgl_lahir" required>
</div>

<div class="field">
<label>No Telepon</label>
<input type="text" name="no_telp" id="no_telp" required>
</div>

<div class="field">
<label>Email</label>
<input type="email" name="email" id="email">
</div>

<div class="field form-full">
<label>Alamat</label>
<textarea name="alamat" id="alamat" rows="3"></textarea>
</div>

</div>

<button class="save-btn">SIMPAN DATA</button>
</form>

</div>
</div>

<script>
function openAdd(){
 document.getElementById('modalTitle').innerText='Tambah Penumpang';
 document.getElementById('penumpangForm').action='/penumpang';
 document.getElementById('methodField').innerHTML='';
 document.getElementById('penumpangForm').reset();
 document.getElementById('penumpangModal').classList.add('show');
}

function openEdit(data){
 document.getElementById('modalTitle').innerText='Edit Penumpang';
 document.getElementById('penumpangForm').action='/penumpang/'+data.id_penumpang;
 document.getElementById('methodField').innerHTML='@method("PUT")';
 document.getElementById('nik').value=data.nik;
 document.getElementById('nama').value=data.nama;
 document.getElementById('jenis_kelamin').value=data.jenis_kelamin;
 document.getElementById('tgl_lahir').value=data.tgl_lahir;
 document.getElementById('no_telp').value=data.no_telp;
 document.getElementById('email').value=data.email;
 document.getElementById('alamat').value=data.alamat;
 document.getElementById('penumpangModal').classList.add('show');
}

function closeModal(){
 document.getElementById('penumpangModal').classList.remove('show');
}
</script>

</body>
</html>
