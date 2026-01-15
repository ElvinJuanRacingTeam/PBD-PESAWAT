<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkyReserve Login</title>
    <style>
        body{
            margin:0;
            font-family:Arial, sans-serif;
            background: linear-gradient(135deg,#6a5af9,#d66efd);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .card{
            background:#fff;
            width:380px;
            padding:40px;
            border-radius:20px;
            box-shadow:0 20px 40px rgba(0,0,0,.2);
            text-align:center;
        }
        .logo{
            width:60px;
            height:60px;
            background:#6a5af9;
            border-radius:12px;
            margin:0 auto 20px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-size:30px;
        }
        h2{margin:0;}
        p{color:#666;}
        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border-radius:8px;
            border:1px solid #ddd;
        }
        button{
            width:100%;
            padding:12px;
            background:#6a5af9;
            border:none;
            color:white;
            border-radius:8px;
            font-size:16px;
            cursor:pointer;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="logo">✈</div>
    <h2>Ayo Terbang</h2>
    <p>Enterprise Flight Management</p>

    <form action="/dashboard" method="GET">
        <input type="text" placeholder="Username">
        <input type="password" placeholder="Password">
        <button type="submit">Masuk ke Dashboard</button>
    </form>
</div>

</body>
</html>
