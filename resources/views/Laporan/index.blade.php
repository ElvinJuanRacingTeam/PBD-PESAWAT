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
.header h1{margin:0;font-size:26px;font-weight:700;}

.panel{
background:linear-gradient(135deg,#6366f1,#8b5cf6);
color:white;padding:25px;border-radius:15px;margin-bottom:25px;
}

.section{
background:white;border-radius:15px;padding:25px;
box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px;
}

/* Search Box Styling */
.search-box{
    margin-bottom:20px;
    display:flex;
    gap:10px;
    align-items:center;
}
.search-box input{
    flex:1;
    padding:12px 18px;
    border:2px solid #e5e7eb;
    border-radius:10px;
    font-size:14px;
    font-family:'Poppins',sans-serif;
    transition:all 0.3s ease;
}
.search-box input:focus{
    outline:none;
    border-color:#6366f1;
    box-shadow:0 0 0 3px rgba(99,102,241,0.1);
}
.search-box label{
    font-weight:600;
    color:#4f46e5;
}

/* Tabel Responsif */
.table-wrapper{width:100%;overflow-x:auto;}
table{width:100%;border-collapse:collapse;table-layout:auto;min-width:500px;}
th,td{padding:12px 10px;text-align:left;font-size:13px;word-wrap:break-word;word-break:break-word;}
th{color:#94a3b8;border-bottom:2px solid #e5e7eb;}
tr:nth-child(even){background:#f9fafb;}
.price{font-weight:700;color:#4f46e5;}
.seat{font-weight:700;color:#f97316;}
.gate{font-weight:700;color:#0ea5e9;}

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
    .panel { padding: 15px; }
    .section { padding: 15px; }
}

/* Export Button in Table */
.btn-export{
    display:inline-block;
    padding:8px 16px;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:12px;
    font-weight:600;
    transition:all 0.3s ease;
}
.btn-export:hover{
    transform:translateY(-2px);
    box-shadow:0 4px 12px rgba(99,102,241,0.4);
}

/* No results message */
.no-results{
    text-align:center;
    padding:40px;
    color:#94a3b8;
    font-size:16px;
    display:none;
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
            <a href="/dashboard">Overview</a>
            <a href="/penumpang">Passenger Database</a>
            <a href="/penerbangan">Flight Schedule</a>
            <a href="/pemesanan">Ticket Bookings</a>
            <a href="/soal5" class="active">Analytics Report</a>
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

    <div class="header">
        <h1>Laporan</h1>
    </div>

    <div class="panel">
        <div>
            <h2>Analytics Intelligence Panel</h2>
            <p>Cross-database relational reporting enabled</p>
        </div>
    </div>

    <!-- PREMIUM SALES -->
    <div class="section">
        <h3>Premium Sales Analysis</h3>
        <p>Pemesanan di atas Rp 1.000.000 diurutkan dari harga tertinggi</p>
        
        <!-- Search Box -->
        <div class="search-box">
            
            <input 
                type="text" 
                id="searchInput" 
                placeholder="Type client name to filter..."
                onkeyup="filterTable()"
            >
        </div>

        <div class="table-wrapper">
            <table id="premiumSalesTable">
                <thead>
                <tr>
                    <th>CLIENT NAME</th>
                    <th>ORIGIN</th>
                    <th>DESTINATION</th>
                    <th>PRICE</th>
                    <th>ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{ $d->client }}</td>
                    <td>{{ $d->origin }}</td>
                    <td>{{ $d->destination }}</td>
                    <td class="price">Rp {{ number_format($d->harga,0,',','.') }}</td>
                    <td>
                        <a href="/soal5/export-client-pdf?client={{ urlencode($d->client) }}" 
                           class="btn-export">
                            Export PDF
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="no-results" id="noResults">
            No clients found matching your search.
        </div>
    </div>

    <!-- HIGH SEASON MANIFEST -->
    <div class="section">
        <h3>July High-Season Manifest</h3>
        <p>Manifest pemesanan kelas premium</p>
        <br>

        <div class="table-wrapper">
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
</div>

<script>
function filterTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toUpperCase();
    const table = document.getElementById('premiumSalesTable');
    const tbody = table.getElementsByTagName('tbody')[0];
    const rows = tbody.getElementsByTagName('tr');
    const noResults = document.getElementById('noResults');
    
    let visibleCount = 0;
    
    for (let i = 0; i < rows.length; i++) {
        const clientCell = rows[i].getElementsByTagName('td')[0];
        if (clientCell) {
            const clientName = clientCell.textContent || clientCell.innerText;
            if (clientName.toUpperCase().indexOf(filter) > -1) {
                rows[i].style.display = '';
                visibleCount++;
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
    
    // Show/hide no results message
    if (visibleCount === 0) {
        noResults.style.display = 'block';
        table.style.display = 'none';
    } else {
        noResults.style.display = 'none';
        table.style.display = 'table';
    }
}
</script>

</body>
</html>
