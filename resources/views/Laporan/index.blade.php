<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Analytics Report</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
body{margin:0;font-family:'Poppins',sans-serif;background:#f4f6fb;}
.wrapper{display:flex;height:100vh;}
.sidebar{
width:260px;background:linear-gradient(180deg,#4f46e5,#7c3aed);
color:white;padding:25px 20px;display:flex;flex-direction:column;justify-content:space-between;
}
.logo-box{display:flex;align-items:center;gap:12px;margin-bottom:40px;}
.logo{width:52px;height:52px;background:white;border-radius:14px;
display:flex;align-items:center;justify-content:center;font-size:26px;color:#4f46e5;font-weight:bold;}
.brand{font-size:20px;font-weight:700;}
.menu a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;}
.menu a.active{background:rgba(255,255,255,0.25);}
.menu a:hover{background:rgba(255,255,255,0.2);}
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;}

.main{flex:1;padding:30px;overflow-y:auto;}
.header h1{margin:0;font-size:26px;font-weight:700;}

.panel{
background:linear-gradient(135deg,#6366f1,#8b5cf6);
color:white;padding:25px;border-radius:15px;margin-bottom:25px;
display:flex;justify-content:space-between;align-items:center;
}

.section{
background:white;border-radius:15px;padding:25px;
box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px;
}

table{width:100%;border-collapse:collapse;}
th,td{padding:14px;text-align:left;font-size:14px;}
th{color:#94a3b8;border-bottom:2px solid #e5e7eb;}
tr:nth-child(even){background:#f9fafb;}
.price{font-weight:700;color:#4f46e5;}
.seat{font-weight:700;color:#f97316;}
.gate{font-weight:700;color:#0ea5e9;}
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
            <a href="/penerbangan">Flight Schedule</a>
            <a href="/pemesanan">Ticket Bookings</a>
            <a href="/soal5" class="active">Analytics Report</a>
        </div>
    </div>

    <a href="/logout" class="logout">Sign Out System</a>
</div>

<div class="main">

    <div class="header">
        <h1>Laporan</h1>
    </div>

    <div class="panel">
        <div>
            <h2>Analytics Intelligence Panel</h2>
            <p>Cross-database relational reporting enabled</p>
        </div>
        <button style="padding:10px 18px;border:none;border-radius:8px;background:rgba(255,255,255,0.2);color:white;font-weight:600;">Export PDF</button>
    </div>

    <!-- PREMIUM SALES -->
    <div class="section">
        <h3>Premium Sales Analysis</h3>
        <p>Pemesanan di atas Rp 1.000.000 diurutkan dari harga tertinggi</p>
        <br>

        <table>
            <tr>
                <th>CLIENT NAME</th>
                <th>ORIGIN</th>
                <th>DESTINATION</th>
                <th>PRICE</th>
            </tr>

            @foreach($data as $d)
            <tr>
                <td>{{ $d->client }}</td>
                <td>{{ $d->origin }}</td>
                <td>{{ $d->destination }}</td>
                <td class="price">Rp {{ number_format($d->harga,0,',','.') }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- HIGH SEASON MANIFEST -->
    <div class="section">
        <h3>July High-Season Manifest</h3>
        <p>Manifest pemesanan kelas premium</p>
        <br>

        <table>
            <tr>
                <th>FORMATTED IDENTITY</th>
                <th>ROUTE INFO</th>
                <th>SEAT</th>
                <th>GATE</th>
            </tr>

            @foreach($data as $d)
            <tr>
                <td>{{ strtoupper($d->client) }}</td>
                <td>{{ $d->origin }} → {{ $d->destination }}</td>
                <td class="seat">{{ $d->seat }}</td>
                <td class="gate">{{ $d->gate }}</td>
            </tr>
            @endforeach
        </table>
    </div>

</div>
</div>

</body>
</html>
