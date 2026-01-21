<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayo Terbang - Dashboard</title>

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
    color:#4f46e5;font-weight:bold;transition:0.4s;
}
.logo:hover{transform:rotate(20deg) scale(1.15);}
.brand{font-size:20px;font-weight:700;}
.menu a{
    display:flex;align-items:center;gap:10px;color:white;text-decoration:none;
    padding:12px;border-radius:10px;margin-bottom:8px;font-weight:500;
}
.menu a:hover{background:rgba(255,255,255,0.2);}
.menu a.active{background:rgba(255,255,255,0.25);}
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
.header{font-size:26px;font-weight:700;margin-bottom:20px;}
.cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;}
.card{padding:25px;border-radius:18px;color:white;font-weight:600;}
.c1{background:linear-gradient(135deg,#6366f1,#8b5cf6);}
.c2{background:linear-gradient(135deg,#0ea5e9,#22d3ee);}
.c3{background:linear-gradient(135deg,#22c55e,#16a34a);}
.c4{background:linear-gradient(135deg,#f97316,#ea580c);}
.section{
    background:white;margin-top:30px;border-radius:15px;padding:20px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}
/* Tabel Responsif */
.table-wrapper{width:100%;overflow-x:auto;}
table{width:100%;border-collapse:collapse;table-layout:auto;min-width:400px;}
th,td{padding:12px 10px;text-align:left;font-size:13px;word-wrap:break-word;word-break:break-word;}
tr:nth-child(even){background:#f9fafb;}
.price{font-weight:700;}

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
    .menu { display: flex; gap: 5px; flex-wrap: wrap; }
    .menu a { padding: 8px 10px; margin-bottom: 0; font-size: 12px; }
    .profile-box { display: none; }
    .main { padding: 15px; }
    .cards { grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .card { padding: 15px; }
}
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
            <a href="/dashboard" class="active">Overview</a>
            <a href="/penumpang">Passenger Database</a>
            <a href="/penerbangan">Flight Schedule</a>
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

<div class="main">

    <div class="header">Dashboard</div>

    <div class="cards">
        <div class="card c1">Revenue<h2>Rp {{ number_format($revenue,0,',','.') }}</h2></div>
        <div class="card c2">Tickets Sold<h2>{{ $tickets }}</h2></div>
        <div class="card c3">Active Routes<h2>{{ $routes }}</h2></div>
        <div class="card c4">Total Users<h2>{{ $users }}</h2></div>
    </div>

    <div class="section">
        <h3>Recent Bookings</h3>
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Passenger</th>
                    <th>Seat</th>
                    <th>Price</th>
                </tr>

                @foreach($recentBookings as $b)
                <tr>
                    <td>#BK-{{ $b->id_pemesanan }}</td>
                    <td>{{ $b->penumpang->nama ?? 'N/A' }}</td>
                    <td>{{ $b->nomor_kursi }}</td>
                    <td class="price">Rp {{ number_format($b->total_harga,0,',','.') }}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>

    <div class="section">
        <h3>Incoming Flights</h3>
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>Route</th>
                    <th>Class</th>
                    <th>Departure</th>
                </tr>

                @foreach($incomingFlights as $f)
                <tr>
                    <td>{{ $f->kota_asal }} → {{ $f->kota_tujuan }}</td>
                    <td>{{ $f->kelas }}</td>
                    <td>{{ \Carbon\Carbon::parse($f->tgl_keberangkatan)->format('d M Y') }}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>

</div>
</div>

</body>
</html>
