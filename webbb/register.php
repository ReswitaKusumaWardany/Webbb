<?php
include "config/koneksi.php";

if(isset($_POST['register'])){

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

$cek = mysqli_query(
$conn,
"SELECT * FROM user
WHERE username='$username'"
);

if(mysqli_num_rows($cek)>0){

echo "
<script>

alert('Username sudah digunakan');

</script>
";

}else{

mysqli_query(
$conn,
"INSERT INTO user
(nama,username,password,level)

VALUES

('$nama','$username','$password','pengguna')
"
);

echo "

<script>

alert('Registrasi Berhasil');

window.location='login.php';

</script>

";

}

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Register Akun</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{

background:#f4f6f9;

display:flex;

justify-content:center;

align-items:center;

height:100vh;

}

.box{

background:white;

padding:40px;

width:420px;

border-radius:15px;

box-shadow:0 0 20px rgba(0,0,0,.1);

}

h2{

text-align:center;

color:#0d3b66;

margin-bottom:25px;

}

input{

width:100%;

padding:12px;

margin-bottom:18px;

border:1px solid #ccc;

border-radius:6px;

}

button{

width:100%;

padding:12px;

border:none;

background:#0d3b66;

color:white;

border-radius:6px;

cursor:pointer;

font-size:16px;

}

button:hover{

background:#0a2f52;

}

.login{

text-align:center;

margin-top:20px;

}

.login a{

text-decoration:none;

color:#d4af37;

font-weight:bold;

}

</style>

</head>

<body>

<div class="box">

<h2>Buat Akun Baru</h2>

<form method="POST">

<input
type="text"
name="nama"
placeholder="Nama Lengkap"
required>

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="register">

Daftar

</button>

</form>

<div class="login">

Sudah punya akun?

<br>

<a href="login.php">

Login Disini

</a>

</div>

</div>

</body>

</html>