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
.wrapper{
    display:flex;
    height:100vh;
}
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#4f46e5,#7c3aed);
    color:white;
    padding:25px 20px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.logo-box{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:40px;
}
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
.brand{font-size:20px;font-weight:700;}
.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    border-radius:10px;
    margin-bottom:8px;
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

.main{
    flex:1;
    padding:30px;
    overflow-y:auto;
}

.section{
    background:white;
    border-radius:15px;
    padding:20px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    padding:12px;
    text-align:left;
    font-size:14px;
}
tr:nth-child(even){background:#f9fafb;}

.badge{
    padding:4px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:700;
}
.male{background:#dbeafe;color:#1d4ed8;}
.female{background:#fce7f3;color:#be185d;}

.action a{
    margin-right:10px;
    text-decoration:none;
    font-weight:600;
    color:#4f46e5;
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
                <div class="profile-text">
                    <strong>Super Admin</strong><br>Management Level
                </div>
            </div>
            <a href="/logout" class="logout">Sign Out System</a>
        </div>
    </div>


    <!-- MAIN -->
    <div class="main">

        <h2>Passenger Database</h2>
        <br>

        <a href="{{ route('penumpang.create') }}" style="
            background:#4f46e5;
            color:white;
            padding:8px 14px;
            border-radius:8px;
            text-decoration:none;
            font-weight:600;">
            + Tambah Penumpang
        </a>

        <br><br>

        <div class="section">
            <table>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>

                @foreach($penumpang as $p)
                <tr>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>
                        @if($p->jenis_kelamin == 'L')
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

                        <a href="{{ route('penumpang.edit', $p->id_penumpang) }}">Edit</a>

                        <form action="{{ route('penumpang.destroy', $p->id_penumpang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:none;background:none;color:red;font-weight:600;cursor:pointer;">
                                Hapus
                            </button>
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
