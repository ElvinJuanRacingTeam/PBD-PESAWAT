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
    border-radius:14px;padding:15px;
    display:flex;align-items:center;gap:10px;
}
.profile-circle{
    width:40px;height:40px;border-radius:50%;
    background:#6366f1;display:flex;
    align-items:center;justify-content:center;font-weight:700;
}
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;margin-top:8px;display:inline-block;}

.main{flex:1;padding:30px;}

.add-btn{
    background:#4f46e5;color:white;
    padding:8px 14px;border-radius:8px;
    text-decoration:none;font-weight:600;
}

.flight-card{
    background:white;
    border-radius:14px;
    padding:18px 22px;
    margin-bottom:18px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.flight-left{
    display:flex;
    align-items:center;
    gap:15px;
}

.airline-logo{
    width:50px;height:50px;
    border-radius:10px;
    background:#f3f4f6;
    display:flex;align-items:center;justify-content:center;
    font-size:22px;
}

.flight-info small{color:#9ca3af;font-weight:600;}
.flight-info h4{margin:2px 0;font-size:15px;}

.flight-middle{
    text-align:center;
}
.flight-middle h3{margin:0;font-size:18px;}
.flight-middle small{color:#9ca3af;}

.flight-right{
    text-align:right;
}
.badge{
    padding:4px 10px;border-radius:20px;
    font-size:11px;font-weight:700;
}
.economy{background:#dbeafe;color:#1d4ed8;}
.business{background:#fef3c7;color:#92400e;}
.first{background:#fce7f3;color:#be185d;}

.action a{margin-left:12px;text-decoration:none;font-weight:600;color:#4f46e5;}
.action button{border:none;background:none;color:red;font-weight:600;cursor:pointer;}

.modal{
    display:none;position:fixed;top:0;left:0;
    width:100%;height:100%;
    background:rgba(0,0,0,0.5);
    align-items:center;justify-content:center;
}
.modal.show{display:flex;}

.modal-content{
    background:white;
    padding:25px;
    border-radius:12px;
    width:420px;
}
.modal-content select,
.modal-content input{
    width:100%;
    padding:8px;
    margin-top:6px;
    margin-bottom:14px;
    border:1px solid #ddd;
    border-radius:6px;
}
.modal-content button{
    background:#4f46e5;color:white;
    border:none;padding:8px 14px;
    border-radius:6px;font-weight:600;
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
            <div>
                <strong>Super Admin</strong><br>Management Level
            </div>
        </div>
        <a href="/logout" class="logout">Sign Out System</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<h2>Flight Schedule</h2><br>

<a href="#" class="add-btn" onclick="openAddModal();return false;">+ Add New Flight</a>
<br><br>

@foreach($penerbangan as $p)
<div class="flight-card">

    <div class="flight-left">
        <div class="airline-logo">✈</div>
        <div class="flight-info">
            <small>{{ $p->maskapai }}</small>
            <h4>{{ $p->kota_asal }} → {{ $p->kota_tujuan }}</h4>
            <small>{{ $p->tgl_keberangkatan }}</small>
        </div>
    </div>

    <div class="flight-middle">
        <h3>{{ $p->waktu_keberangkatan }} → {{ $p->waktu_tiba }}</h3>
        <small>Gate {{ $p->gerbang }}</small>
    </div>

    <div class="flight-right">
        @if($p->kelas=='Economy')
            <span class="badge economy">ECONOMY</span>
        @elseif($p->kelas=='Business')
            <span class="badge business">BUSINESS</span>
        @else
            <span class="badge first">FIRST</span>
        @endif

        <div class="action">
            <a href="#" onclick="editFlight({{ $p->id_penerbangan }});return false;">Edit</a>
            <form action="/penerbangan/{{ $p->id_penerbangan }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    </div>

</div>
@endforeach

</div>
</div>

<!-- MODAL FORM -->
<div class="modal" id="flightModal">
<div class="modal-content">
<span class="close" onclick="closeModal()">&times;</span>
<h3 id="modalTitle">New Flight</h3><br>

<form id="flightForm" method="POST">
@csrf
<input type="hidden" name="_method" id="formMethod">

<select name="kota_asal" id="kota_asal" required>
<option value="">Pilih Kota Asal</option>
<option>Bandung</option>
<option>Jakarta</option>
<option>Surabaya</option>
<option>Denpasar</option>
</select>

<select name="kota_tujuan" id="kota_tujuan" required>
<option value="">Pilih Kota Tujuan</option>
<option>Medan</option>
<option>Makassar</option>
<option>Yogyakarta</option>
<option>Balikpapan</option>
</select>

<input type="date" name="tgl_keberangkatan" id="tgl_keberangkatan" required>

<select name="waktu_keberangkatan" id="waktu_keberangkatan" required>
<option value="">Pilih Waktu Keberangkatan</option>
<option>06:30</option>
<option>08:45</option>
<option>10:15</option>
<option>13:00</option>
<option>15:20</option>
<option>18:10</option>
<option>20:45</option>
</select>

<select name="waktu_tiba" id="waktu_tiba" required>
<option value="">Pilih Waktu Tiba</option>
<option>08:10</option>
<option>10:20</option>
<option>12:00</option>
<option>14:40</option>
<option>17:00</option>
<option>19:50</option>
<option>22:15</option>
</select>

<select name="gerbang" id="gerbang" required>
<option value="">Pilih Gate</option>
<option>A1</option>
<option>A2</option>
<option>B1</option>
<option>B2</option>
<option>C1</option>
<option>C2</option>
<option>D1</option>
</select>

<select name="kelas" id="kelas" required>
<option>Economy</option>
<option>Business</option>
<option>First</option>
</select>

<select name="maskapai" id="maskapai" required>
<option value="">Pilih Airplane</option>
<option>Garuda Indonesia</option>
<option>Lion Air</option>
<option>Batik Air</option>
<option>Citilink</option>
<option>AirAsia</option>
<option>Sriwijaya Air</option>
<option>Super Air Jet</option>
</select>

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
