<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayo Terbang - Edit Penumpang</title>

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

.main{
    flex:1;
    padding:30px;
    overflow-y:auto;
}

.section{
    background:white;
    border-radius:15px;
    padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

.form-grid{
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap:20px;
}

input,select,textarea{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
    font-size:14px;
    font-family:'Poppins',sans-serif;
}

textarea{resize:none;height:100px;}

button{
    background:#4f46e5;
    color:white;
    padding:12px 20px;
    border:none;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
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
                <a href="/soal1">Query Tugas</a>
            </div>
        </div>

        <a href="/logout" style="color:#ffb4b4;text-decoration:none;">Sign Out System</a>
    </div>


    <!-- MAIN -->
    <div class="main">

        <h2>Edit Data Penumpang</h2>
        <br>

        <div class="section">

            <form action="{{ route('penumpang.update', $penumpang->id_penumpang) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">

                    <div>
                        <label>NIK</label>
                        <input type="text" value="{{ $penumpang->nik }}" readonly>
                    </div>

                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ $penumpang->nama }}">
                    </div>

                    <div>
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            <option value="L" {{ $penumpang->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="P" {{ $penumpang->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ $penumpang->tgl_lahir }}">
                    </div>

                    <div>
                        <label>No Telepon</label>
                        <input type="text" name="no_telp" value="{{ $penumpang->no_telp }}">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $penumpang->email }}">
                    </div>

                    <div style="grid-column:1 / span 2;">
                        <label>Alamat</label>
                        <textarea name="alamat">{{ $penumpang->alamat }}</textarea>
                    </div>

                </div>

                <br>
                <button type="submit">Update Data</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>
