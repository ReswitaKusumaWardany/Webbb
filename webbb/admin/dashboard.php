<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['id_user'])){
    header("Location: ../login.php");
    exit;
}

if($_SESSION['level'] != 'admin'){
    header("Location: ../login.php");
    exit;
}

/* HITUNG DATA */

$allPengajuan =
mysqli_query(
$conn,
"SELECT p.*,u.nama
FROM pengajuan p
JOIN user u
ON p.id_user=u.id_user
ORDER BY p.id_pengajuan DESC"
);

$menunggu=
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE status='Menunggu'"
)
);

$totalUser =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM user
WHERE level='pengguna'"
)
);

$totalPengajuan =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan"
)
);

$totalDokumen =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE status='Selesai'"
)
);

$diproses =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE status='Diproses'"
)
);

$selesai =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE status='Selesai'"
)
);

$recent =
mysqli_query(
$conn,
"SELECT p.*,u.nama
FROM pengajuan p
JOIN user u
ON p.id_user=u.id_user
ORDER BY p.id_pengajuan DESC
LIMIT 5"
);

$verifikasi =
mysqli_query(
$conn,
"SELECT p.*,u.nama
FROM pengajuan p
JOIN user u
ON p.id_user=u.id_user
WHERE status='Selesai'
ORDER BY id_pengajuan DESC
LIMIT 5"
);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    display:flex;
    background:#f4f6f9;
}

.sidebar{

width:250px;

height:100vh;

background:#0d3b66;

color:white;

padding:20px;

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

.header{
    background:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}



.card h3{
    color:#0d3b66;
    margin-bottom:10px;
}

table{

width:100%;

border-collapse:collapse;

margin-top:20px;

background:white;

}

table th{

background:#0d3b66;

color:white;

padding:15px;

text-align:center;

}

table td{

padding:15px;

text-align:center;

border-bottom:1px solid #ddd;

}

table tr:hover{

background:#f2f2f2;

}

.header table{

border-radius:10px;

overflow:hidden;

}

.card-link{

text-decoration:none;

color:black;

}

.card-link:hover .card{

transform:translateY(-5px);

transition:.3s;

}

.cards{

display:flex;

gap:20px;

justify-content:space-between;

margin-bottom:20px;

}

.card-link{

text-decoration:none;

color:black;

flex:1;

}

.card{

background:white;

padding:30px 20px;

border-radius:12px;

box-shadow:0 0 10px rgba(0,0,0,.1);

text-align:center;

min-height:140px;

display:flex;

flex-direction:column;

justify-content:center;

}

.card h3{

font-size:22px;

margin-bottom:15px;

color:#0d3b66;

}

.card p{

font-size:24px;

font-weight:bold;

margin-top:5px;

}

.status{

display:inline-block;

padding:8px 15px;

border-radius:20px;

font-weight:bold;

min-width:90px;

}

.chart-box{

display:flex;

justify-content:center;

align-items:end;

gap:50px;

height:300px;

margin-top:30px;

}

.bar{

text-align:center;

}

.fill{

width:100px;

background:#0d3b66;

color:white;

display:flex;

align-items:center;

justify-content:center;

border-radius:10px 10px 0 0;

font-weight:bold;

padding:10px;

transition:.3s;

}

.fill:hover{

transform:scale(1.05);

}

.btn{

display:inline-block;

padding:8px 15px;

background:#0d3b66;

color:white;

text-decoration:none;

border-radius:8px;

}

.status{

padding:8px 15px;

border-radius:20px;

background:#e8ecff;

display:inline-block;

}

</style>

</head>
<body>

<div class="sidebar">

    <h2>PPAT Admin</h2>

    <a class="active" href="dashboard.php">Dashboard</a>
    <a href="data_pengguna.php">Data Pengguna</a>
    <a href="pengajuan.php">Pengajuan Akta</a>
    <a href="verifikasi.php">Verifikasi Dokumen</a>
    <a href="../logout.php">Logout</a>

</div>

<div class="main">

    <div class="header">
        <h2>Dashboard Admin</h2>
        <p>Selamat Datang, <?= $_SESSION['nama']; ?></p>
    </div>

    <div class="cards">

    <a href="data_pengguna.php" class="card-link">
    <div class="card">
    <h3>Pengguna</h3>
    <p><?= $totalUser ?></p>
    </div>
    </a>

    <a href="pengajuan.php" class="card-link">
    <div class="card">
    <h3>Pengajuan</h3>
    <p><?= $totalPengajuan ?></p>
    </div>
    </a>

    <a href="pengajuan.php" class="card-link">
    <div class="card">
    <h3>Diproses</h3>
    <p><?= $diproses ?></p>
    </div>
    </a>

    <a href="verifikasi.php" class="card-link">
    <div class="card">
    <h3>Selesai</h3>
    <p><?= $selesai ?></p>
    </div>
    </a>

    </div>

<br><br>

<div class="header">

<h2>Statistik Pengajuan</h2>

<div class="chart-box">

<div class="bar">

<div class="fill"
style="height:<?= $menunggu*25 ?>px">

<?= $menunggu ?>

</div>

<p>Menunggu</p>

</div>


<div class="bar">

<div class="fill"
style="height:<?= $diproses*25 ?>px">

<?= $diproses ?>

</div>

<p>Diproses</p>

</div>


<div class="bar">

<div class="fill"
style="height:<?= $selesai*25 ?>px">

<?= $selesai ?>

</div>

<p>Selesai</p>

</div>

</div>

</div>


<br>


<div class="header">

<h2>Semua Data Pengajuan</h2>

<table>

<tr>

<th>No</th>
<th>Nama</th>
<th>Akta</th>
<th>Tanggal</th>
<th>Status</th>
<th>Aksi</th>

</tr>


<?php
$no=1;

while($d=mysqli_fetch_array($allPengajuan)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama'] ?></td>

<td><?= $d['jenis_akta'] ?></td>

<td><?= $d['tanggal_pengajuan'] ?></td>

<td>

<span class="status">

<?= $d['status'] ?>

</span>

</td>

<td>

<a
class="btn"
href="edit_status.php?id=<?= $d['id_pengajuan'] ?>">

Ubah

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<br>

<div class="header">

<h2>Dokumen Siap Diverifikasi</h2>

<table>

<tr>

<th>Nama</th>
<th>Jenis Akta</th>
<th>Status</th>

</tr>

<?php while($v=mysqli_fetch_array($verifikasi)){ ?>

<tr>

<td><?= $v['nama'] ?></td>

<td><?= $v['jenis_akta'] ?></td>

<td>

<span class="status">

<?= $v['status'] ?>

</span>

</td>

</tr>

<?php } ?>

</table>

</div>