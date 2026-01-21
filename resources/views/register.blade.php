<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayo Terbang - Register</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Poppins',sans-serif;
    background:linear-gradient(135deg,#4f46e5,#7c3aed,#ec4899);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.card{
    background:#ffffff;
    width:520px;
    padding:35px 40px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
    text-align:center;
}
.logo{
    width:65px;
    height:65px;
    margin:0 auto 15px;
    background:linear-gradient(135deg,#10b981,#059669);
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    color:white;
    font-weight:bold;
}
h2{margin:8px 0 4px;font-size:24px;color:#1f2937;}
.subtitle{font-size:11px;letter-spacing:2px;color:#9ca3af;margin-bottom:22px;}
.grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
label{display:block;text-align:left;font-size:11px;font-weight:600;color:#6b7280;margin-bottom:6px;}
input,select{width:100%;padding:11px;border-radius:10px;border:1px solid #e5e7eb;background:#f9fafb;font-size:14px;}
.full{grid-column:1 / span 2;}
button{
    width:100%;padding:13px;border:none;border-radius:12px;
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;font-weight:600;font-size:14px;cursor:pointer;
}
.login-link{margin-top:16px;font-size:12px;color:#9ca3af;}
.login-link a{color:#10b981;text-decoration:none;font-weight:600;}
.footer{margin-top:18px;font-size:10px;letter-spacing:3px;color:#cbd5e1;}
</style>
</head>
<body>

<div class="card">

    <div class="logo">✈</div>
    <h2>Ayo Terbang</h2>
    <div class="subtitle">CREATE ADMIN & PASSENGER DATA</div>

    <!-- FORM REVISI -->
    <form method="POST" action="/register">
        @csrf

        <div class="grid">

            <div>
                <label>NIK</label>
                <input type="text" name="nik" placeholder="16-Digit NIK" required>
            </div>

            <div>
                <label>NAMA LENGKAP</label>
                <input type="text" name="nama" placeholder="Full Name" required>
            </div>

            <div>
                <label>JENIS KELAMIN</label>
                <select name="jenis_kelamin" required>
                    <option value="">Pilih</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div>
                <label>TANGGAL LAHIR</label>
                <input type="date" name="tgl_lahir" required>
            </div>

            <div>
                <label>NO TELEPON</label>
                <input type="text" name="no_telp" placeholder="08xxxxxxxxxx" required>
            </div>

            <div>
                <label>EMAIL</label>
                <input type="email" name="email" placeholder="email@example.com" required>
            </div>

            <div class="full">
                <label>PASSWORD</label>
                <input type="password" name="password" required>
            </div>

        </div>

        <button type="submit">Complete Registration</button>
    </form>

    <div class="login-link">
        Already part of the fleet? <a href="/">Login Back</a>
    </div>

    <div class="footer">AUTHORIZED PERSONNEL ONLY</div>

</div>

</body>
</html>
