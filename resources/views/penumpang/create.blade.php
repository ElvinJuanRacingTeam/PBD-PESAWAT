<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Penumpang</title>

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

/* ===== SIDEBAR ===== */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#4f46e5,#7c3aed);
    color:white;
    padding:25px 20px;
}
.logo-box{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:40px;
}
.logo{
    width:52px;
    height:52px;
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
    font-weight:500;
}
.menu a:hover{background:rgba(255,255,255,0.2);}
.menu a.active{background:rgba(255,255,255,0.25);}

/* ===== MAIN ===== */
.main{
    flex:1;
    padding:30px;
    overflow-y:auto;
}

/* ===== TOP BAR ===== */
.topbar{
    background:white;
    padding:18px 25px;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,0.05);
    margin-bottom:25px;
    font-size:22px;
    font-weight:700;
}

/* ===== FORM CARD ===== */
.form-card{
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
    max-width:100%;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

label{
    font-weight:600;
    font-size:14px;
}

input,select,textarea{
    width:100%;
    padding:12px;
    margin-top:6px;
    border-radius:8px;
    border:1px solid #ddd;
    font-size:14px;
}

textarea{resize:none;height:80px;}

.full{
    grid-column:1 / span 2;
}

button{
    background:linear-gradient(135deg,#4f46e5,#7c3aed);
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
    margin-top:10px;
}
button:hover{opacity:0.9;}
</style>
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
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

    <!-- MAIN -->
    <div class="main">

        <!-- TOP BAR -->
        <div class="topbar">
            Tambah Penumpang
        </div>

        <!-- FORM -->
        <div class="form-card">

            <form action="/penumpang" method="POST">
                @csrf

                <div class="form-grid">

                    <div>
                        <label>NIK</label>
                        <input type="text" name="nik" required>
                    </div>

                    <div>
                        <label>Nama</label>
                        <input type="text" name="nama" required>
                    </div>

                    <div>
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" required>
                    </div>

                    <div>
                        <label>No Telepon</label>
                        <input type="text" name="no_telp" required>
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="full">
                        <label>Alamat</label>
                        <textarea name="alamat" required></textarea>
                    </div>

                </div>

                <button type="submit">Simpan Data</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>
