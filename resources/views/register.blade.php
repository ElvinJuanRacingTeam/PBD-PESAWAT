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
    background:#fbfaff;
    width:480px;
    padding:40px;
    border-radius:22px;
    box-shadow:0 15px 40px rgba(0,0,0,0.15);
    text-align:center;
}

.logo{
    width:70px;
    height:70px;
    margin:0 auto 15px;
    background:linear-gradient(135deg,#10b981,#059669);
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    color:white;
    font-weight:bold;
}

h2{
    margin:10px 0 5px;
    font-size:26px;
    color:#1f2937;
}

.subtitle{
    font-size:12px;
    letter-spacing:2px;
    color:#9ca3af;
    margin-bottom:25px;
}

.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px;
}

label{
    display:block;
    text-align:left;
    font-size:12px;
    font-weight:600;
    color:#9ca3af;
    margin-bottom:6px;
}

input{
    width:100%;
    padding:12px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    background:#f9fafb;
    font-size:14px;
}

.full{
    grid-column:1 / span 2;
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    font-weight:600;
    font-size:15px;
    cursor:pointer;
    box-shadow:0 10px 25px rgba(16,185,129,0.45);
    margin-top:10px;
}

.login-link{
    margin-top:18px;
    font-size:13px;
    color:#9ca3af;
}

.login-link a{
    color:#10b981;
    text-decoration:none;
    font-weight:600;
}

.footer{
    margin-top:25px;
    font-size:11px;
    letter-spacing:3px;
    color:#cbd5e1;
}
</style>
</head>
<body>

<div class="card">

    <div class="logo">✈</div>
    <h2>Ayo Terbang</h2>
    <div class="subtitle">CREATE ADMIN CREDENTIALS</div>

    <form method="POST" action="/register">
        @csrf

        <div class="grid">

            <div>
                <label>NIK</label>
                <input type="text" name="nik" placeholder="16-Digit NIK" required>
            </div>

            <div>
                <label>FULL NAME</label>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>

            <div class="full">
                <label>EMAIL ADDRESS</label>
                <input type="email" name="email" placeholder="admin@ayotebang.com" required>
            </div>

            <div class="full">
                <label>PASSWORD</label>
                <input type="password" name="password" placeholder="••••••••" required>
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
