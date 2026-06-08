<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>

<title>Logout</title>

<meta http-equiv="refresh"
content="2;url=index.php">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{

display:flex;

justify-content:center;

align-items:center;

height:100vh;

background:#f4f6f9;

}

.box{

background:white;

padding:50px;

border-radius:15px;

box-shadow:0 0 20px rgba(0,0,0,.1);

text-align:center;

width:400px;

}

.loader{

width:60px;

height:60px;

border:6px solid #ddd;

border-top:6px solid #0d3b66;

border-radius:50%;

margin:auto;

animation:putar 1s linear infinite;

}

h2{

margin-top:25px;

color:#0d3b66;

}

p{

margin-top:10px;

color:#666;

}

@keyframes putar{

0%{
transform:rotate(0deg);
}

100%{
transform:rotate(360deg);
}

}

</style>

</head>

<body>

<div class="box">

<div class="loader"></div>

<h2>Logout Berhasil</h2>

<p>

Anda akan diarahkan ke halaman utama...

</p>

</div>

</body>

</html>