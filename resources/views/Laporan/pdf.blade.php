<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Premium Sales Report - {{ $clientName }}</title>
<style>
body{font-family:Arial,sans-serif;font-size:11px;margin:20px;}
.header{text-align:center;margin-bottom:25px;border-bottom:3px solid #4f46e5;padding-bottom:15px;}
.header h1{margin:0;color:#4f46e5;font-size:22px;}
.header h2{margin:5px 0 0 0;color:#666;font-size:14px;}
.meta{background:#f0f0f0;padding:10px;border-radius:5px;margin-bottom:20px;}
.meta-row{display:flex;justify-content:space-between;margin:5px 0;}
.meta-label{font-weight:bold;color:#555;}
.meta-value{color:#333;}
table{width:100%;border-collapse:collapse;margin-top:15px;}
th,td{border:1px solid #666;padding:8px;text-align:left;}
th{background:#4f46e5;color:white;font-size:11px;text-transform:uppercase;}
tr:nth-child(even){background:#f9f9f9;}
.price{font-weight:bold;color:#4f46e5;}
.total-row{background:#e0e7ff !important;font-weight:bold;}
.footer{margin-top:30px;text-align:center;font-size:9px;color:#999;}
</style>
</head>
<body>

<div class="header">
    <h1>PREMIUM SALES REPORT</h1>
    <h2>{{ $clientName }}</h2>
</div>

<div class="meta">
    <div class="meta-row">
        <span class="meta-label">Client Name:</span>
        <span class="meta-value">{{ $clientName }}</span>
    </div>
    <div class="meta-row">
        <span class="meta-label">Total Premium Bookings:</span>
        <span class="meta-value">{{ $totalBookings }} booking(s)</span>
    </div>
    <div class="meta-row">
        <span class="meta-label">Total Revenue:</span>
        <span class="meta-value">Rp {{ number_format($totalRevenue,0,',','.') }}</span>
    </div>
    <div class="meta-row">
        <span class="meta-label">Report Generated:</span>
        <span class="meta-value">{{ date('d F Y H:i:s') }}</span>
    </div>
</div>

<h3 style="color:#4f46e5;border-bottom:2px solid #e0e7ff;padding-bottom:5px;">Booking Details</h3>

<table>
<thead>
<tr>
    <th>No</th>
    <th>Origin</th>
    <th>Destination</th>
    <th>Seat</th>
    <th>Gate</th>
    <th>Price</th>
</tr>
</thead>
<tbody>
@foreach($data as $index => $d)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $d->origin }}</td>
    <td>{{ $d->destination }}</td>
    <td>{{ $d->seat }}</td>
    <td>{{ $d->gate }}</td>
    <td class="price">Rp {{ number_format($d->harga,0,',','.') }}</td>
</tr>
@endforeach
<tr class="total-row">
    <td colspan="5" style="text-align:right;">TOTAL REVENUE:</td>
    <td class="price">Rp {{ number_format($totalRevenue,0,',','.') }}</td>
</tr>
</tbody>
</table>

<div class="footer">
    <p>This is an automatically generated report from Ayo Terbang Premium Sales Analytics System</p>
    <p>Confidential - For authorized personnel only</p>
</div>

</body>
</html>
