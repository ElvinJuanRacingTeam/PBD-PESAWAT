<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayo Terbang - Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Poppins',sans-serif;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#6a5af9,#a855f7,#ec4899);
}
.card{
    background:#ffffff;
    width:420px;
    padding:40px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.15);
    text-align:center;
}
.logo{
    width:70px;
    height:70px;
    margin:0 auto 15px;
    background:linear-gradient(135deg,#6a5af9,#8b5cf6);
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    color:white;
    font-weight:bold;
    transition:0.4s;
}
.logo:hover{
    transform:rotate(15deg) scale(1.1);
}
h2{
    margin:10px 0 5px;
    font-size:26px;
}
p{
    margin:0 0 25px;
    color:#555;
    font-size:14px;
}
input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #ddd;
    font-size:14px;
}
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#6a5af9,#8b5cf6);
    color:white;
    font-weight:600;
    font-size:15px;
    cursor:pointer;
}
button:hover{
    opacity:0.9;
}
.error{
    background:#fee2e2;
    color:#991b1b;
    padding:10px;
    border-radius:8px;
    font-size:13px;
    margin-bottom:15px;
}
.footer{
    margin-top:20px;
    font-size:12px;
    color:#888;
}
</style>
</head>
<body>

<div class="card">

    <div class="logo">✈</div>
    <h2>Ayo Terbang</h2>
    <p>Flight Database Management</p>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk ke Dashboard</button>
    </form>

    <div class="footer">v1.0 - Database System</div>

</div>

</body>
</html>
