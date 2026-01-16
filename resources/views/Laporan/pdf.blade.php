<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Analytics Report</title>
<style>
body{font-family:Arial;font-size:12px;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #333;padding:6px;}
th{background:#eee;}
</style>
</head>
<body>

<h2>Analytics Report</h2>
<h3>Premium Sales Analysis</h3>

<table>
<tr>
<th>CLIENT</th>
<th>ORIGIN</th>
<th>DESTINATION</th>
<th>PRICE</th>
</tr>

@foreach($data as $d)
<tr>
<td>{{ $d->client }}</td>
<td>{{ $d->origin }}</td>
<td>{{ $d->destination }}</td>
<td>Rp {{ number_format($d->harga,0,',','.') }}</td>
</tr>
@endforeach

</table>

</body>
</html>
