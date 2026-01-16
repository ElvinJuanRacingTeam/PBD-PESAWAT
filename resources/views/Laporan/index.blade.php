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
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;}

.main{flex:1;padding:30px;}
.section{
    margin-top:20px;
    background:white;border-radius:15px;padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

table{width:100%;border-collapse:collapse;}
th,td{padding:14px;text-align:left;font-size:14px;}
th{font-weight:700;}
tr:nth-child(even){background:#f9fafb;}
.price{font-weight:700;color:#16a34a;}
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

    <h2>Analytics Report</h2>
    <p>Premium Sales Analysis — Pemesanan di atas Rp 1.000.000</p>

    <div class="section">
        <table>
            <tr>
                <th>Client Name</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Price Tier</th>
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

</div>
</div>

</body>
</html>
