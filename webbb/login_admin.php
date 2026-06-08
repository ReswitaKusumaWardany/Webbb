<?php
session_start();
include 'config/koneksi.php';

if(isset($_POST['login'])){

$username = $_POST['username'];

$password = $_POST['password'];

$query = mysqli_query(
$conn,

"SELECT * FROM user
WHERE username='$username'
AND password='$password'
AND level='admin'"

);

$data = mysqli_fetch_assoc($query);

if($data){

$_SESSION['id_user'] = $data['id_user'];

$_SESSION['nama'] = $data['nama'];

$_SESSION['level'] = $data['level'];

header("Location: admin/dashboard.php");

exit;

}else{

echo "<script>
alert('Login Admin Gagal');
</script>";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Login Admin</title>

<style>

body{

font-family:Arial;

background:#f4f6f9;

display:flex;

justify-content:center;

align-items:center;

height:100vh;

}

.login-box{

background:white;

padding:35px;

width:380px;

border-radius:12px;

box-shadow:0 0 15px rgba(0,0,0,.1);

}

h2{

text-align:center;

margin-bottom:25px;

color:#0d3b66;

}

input{

width:100%;

padding:12px;

margin-bottom:15px;

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

}

button:hover{

background:#082947;

}

.back{

text-align:center;

margin-top:15px;

}

.back a{

text-decoration:none;

color:#d4af37;

}

</style>

</head>

<body>

<div class="login-box">

<h2>Login Admin</h2>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username Admin"
required>

<input
type="password"
name="password"
placeholder="Password Admin"
required>

<button
type="submit"
name="login">

Login Admin

</button>

</form>

<div class="back">

<a href="index.php">

Kembali ke Beranda

</a>

</div>

</div>

</body>

</html>