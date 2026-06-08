<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Login - PPAT</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            text-align:center;
        }

        h1{
            color:#0d3b66;
            margin-bottom:15px;
        }

        p{
            color:#666;
            margin-bottom:40px;
        }

        .card-container{
            display:flex;
            gap:30px;
        }

        .card{
            background:white;
            width:280px;
            padding:30px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        .card h2{
            color:#0d3b66;
            margin-bottom:15px;
        }

        .card p{
            margin-bottom:20px;
        }

        .btn{
            display:inline-block;
            background:#0d3b66;
            color:white;
            text-decoration:none;
            padding:10px 20px;
            border-radius:5px;
        }

        .btn:hover{
            background:#d4af37;
        }

    </style>

</head>
<body>

<div class="container">

    <h1>Pilih Login</h1>

    <p>
        Silakan pilih jenis akun yang akan digunakan.
    </p>

    <div class="card-container">

        <div class="card">
            <h2>👤 Pengguna</h2>

            <p>
                Login untuk membuat akta dan memantau status.
            </p>

            <a href="login.php" class="btn">
                Login Pengguna
            </a>
        </div>

        <div class="card">

            <h2>🛡️ Admin</h2>

            <p>

                Login untuk mengelola dan memverifikasi data pengajuan.

            </p>

            <a href="login_admin.php" class="btn">

                Login Admin

            </a>

        </div>

    </div>

</div>

</body>
</html>