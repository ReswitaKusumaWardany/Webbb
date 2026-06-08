<?php
session_start();
include '../config/koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("Location: ../login.php");
    exit;
}

if($_SESSION['level'] != 'pengguna'){
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$totalPengajuan =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE id_user='$id_user'"
)
);

$diproses =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE id_user='$id_user'
AND status='Diproses'"
)
);

$selesai =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE id_user='$id_user'
AND status='Selesai'"
)
);
?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard Pengguna</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{

display:flex;

background:#f4f6f9;

}

.sidebar{

width:250px;
height:100vh;

background:#0d3b66;

padding:25px;

color:white;

position:fixed;

left:0;

top:0;

overflow-y:auto;

}

.sidebar h2{

margin-bottom:30px;

}

.sidebar a{

display:block;

color:white;

text-decoration:none;

padding:14px 18px;

margin:8px 0;

border-left:4px solid transparent;

transition:.3s;

border-radius:6px;

}

.sidebar a:hover{

background:rgba(255,255,255,.1);

}

.active{

background:rgba(255,255,255,.12);

border-left:4px solid #4fc3f7;

font-weight:bold;

}

.main{

margin-left:250px;

width:calc(100% - 250px);

padding:40px;

}
.card{

background:white;

padding:30px;

border-radius:12px;

box-shadow:0 0 15px rgba(0,0,0,.1);

}

h1{

color:#0d3b66;

margin-bottom:15px;

}

.menu-card{

display:flex;

gap:20px;

margin-top:30px;

}

.box{

background:white;

padding:25px;

width:250px;

border-radius:10px;

box-shadow:0 0 10px rgba(0,0,0,.1);

}

.box a{

text-decoration:none;

color:#0d3b66;

font-weight:bold;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>PPAT User</h2>

<a class="active" href="dashboard.php">
Dashboard
</a>

<a href="pengajuan.php">
Buat Pengajuan
</a>

<a href="pengajuan_saya.php">
Pengajuan Saya
</a>

<a href="../logout.php">
Logout
</a>

</div>

<div class="main">

<div class="card">

<h1>

Selamat Datang,
<?= $_SESSION['nama']; ?>

</h1>

<p>

Silahkan gunakan menu untuk melakukan pengajuan akta.

</p>

</div>

<div class="menu-card">

<div class="box">

<h2>

<?= $totalPengajuan ?>

</h2>

<p>Total Pengajuan</p>

</div>

<div class="box">

<h2>

<?= $diproses ?>

</h2>

<p>Sedang Diproses</p>

</div>

<div class="box">

<h2>

<?= $selesai ?>

</h2>

<p>Selesai</p>

</div>

</div>

<br><br>

<div class="menu-card">

<div class="box">

<a href="pengajuan.php">

📄 Buat Pengajuan

</a>

</div>

<div class="box">

<a href="pengajuan_saya.php">

📋 Pengajuan Saya

</a>

</div>

</div>

</div>

</body>

</html>