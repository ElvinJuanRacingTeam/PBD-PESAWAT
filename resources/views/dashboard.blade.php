<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayo Terbang - Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body {
    margin:0;
    font-family:'Poppins',sans-serif;
    background:#f4f6fb;
}
.wrapper {display:flex;height:100vh;}
.sidebar {
    width:260px;
    background:linear-gradient(180deg,#6a5af9,#8b5cf6);
    color:white;
    padding:30px 20px;
}
.logo-box {display:flex;align-items:center;gap:10px;margin-bottom:40px;}
.logo {
    width:50px;height:50px;background:white;border-radius:12px;
    display:flex;align-items:center;justify-content:center;
    font-size:28px;color:#6a5af9;transition:.3s;cursor:pointer;
}
.logo:hover {transform:rotate(15deg) scale(1.1);}
.brand {font-size:20px;font-weight:700;}
.menu a {
    display:block;color:white;text-decoration:none;
    padding:12px;border-radius:10px;margin-bottom:10px;
}
.menu a:hover {background:rgba(255,255,255,0.2);}
.main {flex:1;padding:30px;overflow-y:auto;}
.header {font-size:26px;font-weight:700;margin-bottom:20px;}
.cards {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}
.card {padding:25px;border-radius:18px;color:white;font-weight:600;}
.c1 {background:linear-gradient(135deg,#6a5af9,#8b5cf6);}
.c2 {background:linear-gradient(135deg,#2ea7ff,#1e90ff);}
.c3 {background:linear-gradient(135deg,#22c55e,#16a34a);}
.c4 {background:linear-gradient(135deg,#f97316,#ea580c);}
.section {
    background:white;margin-top:30px;border-radius:15px;
    padding:20px;box-shadow:0 4px 10px rgba(0,0,0,0.05);
}
table {width:100%;border-collapse:collapse;}
th,td {padding:12px;text-align:left;}
tr:nth-child(even){background:#f9f9f9;}
.status {
    background:#bbf7d0;color:#15803d;
    padding:5px 12px;border-radius:20px;
    font-size:12px;font-weight:700;
}
.price {font-weight:700;}
</style>
</head>
<body>

<div class="wrapper">

    <div class="sidebar">
        <div class="logo-box">
            <div class="logo">✈</div>
            <div class="brand">Ayo Terbang</div>
        </div>

        <div class="menu">
            <a href="/dashboard">Overview</a>
            <a href="/penumpang">Passenger Database</a>
            <a href="/penerbangan">Flight Schedule</a>
            <a href="/pemesanan">Ticket Bookings</a>
            <a href="/soal1">Query Soal</a>
        </div>
    </div>

    <div class="main">
        <div class="header">Dashboard</div>

        <!-- STATISTIC CARDS -->
        <div class="cards">
            <div class="card c1">Revenue<br><h2>Rp {{ number_format($totalRevenue) }}</h2></div>
            <div class="card c2">Tickets Sold<br><h2>{{ $ticketsSold }}</h2></div>
            <div class="card c3">Active Routes<br><h2>{{ $activeRoutes }}</h2></div>
            <div class="card c4">Total Users<br><h2>{{ $totalUsers }}</h2></div>
        </div>

        <!-- RECENT BOOKINGS -->
        <div class="section">
            <h3>Recent Bookings</h3>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Kursi</th>
                    <th>Status</th>
                    <th>Harga</th>
                </tr>
                @foreach($recentBookings as $b)
                <tr>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->nomor_kursi }}</td>
                    <td><span class="status">CONFIRMED</span></td>
                    <td class="price">Rp {{ number_format($b->total_harga) }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- UPCOMING FLIGHTS -->
        <div class="section">
            <h3>Incoming Flights</h3>
            <table>
                <tr>
                    <th>Rute</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                </tr>
                @foreach($upcomingFlights as $f)
                <tr>
                    <td>{{ $f->kota_asal }} → {{ $f->kota_tujuan }} ({{ $f->kelas }})</td>
                    <td>{{ $f->tgl_keberangkatan }}</td>
                    <td>{{ $f->waktu_keberangkatan }}</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

</div>

</body>
</html>
