<?php
session_start();
include 'config/koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM user
    WHERE username='$username'
    AND password='$password'
    AND level='pengguna'");

    $data = mysqli_fetch_assoc($query);

    if($data){

    $_SESSION['id_user'] = $data['id_user'];

    $_SESSION['nama'] = $data['nama'];

    $_SESSION['level'] = $data['level'];

    header("Location: pengguna/dashboard.php");

    exit;

    }else{

    echo "<script>
    alert('Username atau Password Salah');
    </script>";

    }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login PPAT</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-box{
            background:white;
            padding:30px;
            width:350px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            color:#0d3b66;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            width:100%;
            padding:10px;
            background:#0d3b66;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#0a2f52;
        }

        .register{
            text-align:center;
            margin-top:15px;
        }

        .register a{
            color:#d4af37;
            text-decoration:none;
            font-weight:bold;
        }
    </style>

</head>
<body>

<div class="login-box">

    <h2>Login PPAT</h2>

    <form method="POST">

        Username
        <input type="text" name="username" required>

        Password
        <input type="password" name="password" required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

    <div class="register">
        Belum punya akun?<br>
        <a href="register.php">Daftar Sekarang</a>
    </div>

</div>

</body>
</html>