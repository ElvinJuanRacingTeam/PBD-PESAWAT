<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Flight Schedule</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{margin:0;font-family:'Poppins',sans-serif;background:#f4f6fb;}
.wrapper{display:flex;height:100vh;}
.sidebar{
    width:260px;background:linear-gradient(180deg,#4f46e5,#7c3aed);
    color:white;padding:25px 20px;display:flex;flex-direction:column;justify-content:space-between;
}
.logo-box{display:flex;align-items:center;gap:12px;margin-bottom:40px;}
.logo{
    width:52px;height:52px;background:white;border-radius:14px;
    display:flex;align-items:center;justify-content:center;font-size:26px;
    color:#4f46e5;font-weight:bold;
}
.brand{font-size:20px;font-weight:700;}
.menu a{
    display:block;color:white;text-decoration:none;
    padding:12px;border-radius:10px;margin-bottom:8px;
}
.menu a.active{background:rgba(255,255,255,0.25);}
.menu a:hover{background:rgba(255,255,255,0.2);}
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;}

.main{flex:1;padding:30px;}

.section{
    background:white;border-radius:15px;padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

table{width:100%;border-collapse:collapse;}
th,td{padding:14px;text-align:left;font-size:14px;}
th{font-weight:700;border-bottom:2px solid #e5e7eb;}
tr:nth-child(even){background:#f9fafb;}

.badge{
    padding:4px 10px;border-radius:20px;
    font-size:11px;font-weight:700;
}
.economy{background:#dbeafe;color:#1d4ed8;}
.business{background:#fef3c7;color:#92400e;}
.first{background:#fce7f3;color:#be185d;}

.action a{
    margin-right:10px;
    text-decoration:none;
    font-weight:600;
    color:#4f46e5;
}
.action button{
    border:none;background:none;
    color:red;font-weight:600;cursor:pointer;
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
            <a href="/penerbangan" class="active">Flight Schedule</a>
            <a href="/pemesanan">Ticket Bookings</a>
            <a href="/soal5">Analytics Report</a>
        </div>
    </div>

    <a href="/logout" class="logout">Sign Out System</a>
</div>


<!-- MAIN -->
<div class="main">

    <h2>Flight Schedule</h2>
    <br>

    <!-- Posisi tombol sama seperti Passenger -->
    <a href="{{ route('penerbangan.create') }}"
       style="background:#4f46e5;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;">
       + Add New Flight
    </a>

    <br><br>

    <div class="section">
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

            @foreach($penerbangan as $p)
            <tr>
                <td>#FL-{{ $p->id_penerbangan }}</td>
                <td>{{ $p->kota_asal }} → {{ $p->kota_tujuan }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tgl_keberangkatan)->format('d M Y') }}</td>
                <td>{{ $p->waktu_keberangkatan }}</td>
                <td>{{ $p->waktu_tiba }}</td>
                <td>{{ $p->gerbang }}</td>
                <td>
                    @if($p->kelas == 'Economy')
                        <span class="badge economy">ECONOMY</span>
                    @elseif($p->kelas == 'Business')
                        <span class="badge business">BUSINESS</span>
                    @else
                        <span class="badge first">FIRST</span>
                    @endif
                </td>
                <td>{{ $p->maskapai }}</td>
                <td class="action">
                    <a href="{{ route('penerbangan.edit',$p->id_penerbangan) }}">Edit</a>

                    <form action="{{ route('penerbangan.destroy',$p->id_penerbangan) }}" method="POST" style="display:inline;">
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

</body>
</html>
