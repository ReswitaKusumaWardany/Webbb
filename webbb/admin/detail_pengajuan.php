<?php

session_start();

include "../config/koneksi.php";

if(!isset($_SESSION['id_user'])){

header("Location: ../login.php");

exit;

}

$id = $_GET['id'];

$query=mysqli_query($conn,"
SELECT p.*,u.nama
FROM pengajuan p
JOIN user u
ON p.id_user=u.id_user
WHERE p.id_pengajuan='$id'
");

$data=mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>

<html>

<head>

<title>Detail Dokumen</title>

<style>

body{
background:#f4f6f9;
font-family:Arial;
padding:40px;
}

.container{
max-width:1200px;
margin:auto;
}

.topbar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.back{
background:#6c757d;
color:white;
padding:10px 18px;
text-decoration:none;
border-radius:8px;
}

.card{

background:white;
padding:30px;
border-radius:15px;
box-shadow:0 0 15px rgba(0,0,0,.08);

}

.header-box{

display:flex;
justify-content:space-between;
align-items:center;

padding-bottom:20px;

border-bottom:1px solid #eee;

margin-bottom:25px;

}

.header-box h1{

color:#0d3b66;

}

.status{

padding:10px 18px;

border-radius:20px;

color:white;

font-weight:bold;

}

.info-grid{

display:grid;

grid-template-columns:1fr 1fr;

gap:20px;

margin-bottom:30px;

}

.info-item{

background:#f8fafc;

padding:18px;

border-radius:10px;

}

.label{

font-size:13px;

color:gray;

margin-bottom:8px;

}

.value{

font-weight:bold;

font-size:17px;

}

.docs{

display:grid;

grid-template-columns:

repeat(auto-fit,minmax(220px,1fr));

gap:20px;

}

.doc{

background:#f8fafc;

padding:20px;

border-radius:12px;

text-align:center;

}

.doc h3{

margin-bottom:15px;

color:#0d3b66;

}

.btn{

display:inline-block;

padding:10px 18px;

background:#0d3b66;

color:white;

text-decoration:none;

border-radius:8px;

}

</style>

</head>

<body>

<div class="container">

<div class="topbar">

<a class="back"
href="pengajuan.php">

← Kembali

</a>

</div>

<div class="card">

<div class="header-box">

<h1>Detail Pengajuan</h1>

<div class="status"

style="background:
<?= 
$data['status']=="Selesai"
?"#2ecc71":
($data['status']=="Diproses"
?"#3498db":
"#f39c12")
?>">

<?= $data['status'] ?>

</div>

</div>


<div class="info-grid">

<div class="info-item">

<div class="label">

Nama Pengaju

</div>

<div class="value">

<?= $data['nama'] ?>

</div>

</div>

<div class="info-item">

<div class="label">

Jenis Akta

</div>

<div class="value">

<?= $data['jenis_akta'] ?>

</div>

</div>

<div class="info-item">

<div class="label">

Tanggal Pengajuan

</div>

<div class="value">

<?= $data['tanggal_pengajuan'] ?>

</div>

</div>

<div class="info-item">

<div class="label">

Lokasi Tanah

</div>

<div class="value">

<a href="<?= $data['lokasi'] ?>">

Buka Maps

</a>

</div>

</div>

</div>


<h2 style="margin-bottom:20px;color:#0d3b66">

Dokumen Upload

</h2>

<div class="docs">

<div class="doc">

<h3>KTP</h3>

<a class="btn"
href="../uploads/<?= $data['ktp'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>KK</h3>

<a class="btn"
href="../uploads/<?= $data['kk'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>Sertifikat</h3>

<a class="btn"
href="../uploads/<?= $data['sertifikat'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>SPPT PBB</h3>

<a class="btn"
href="../uploads/<?= $data['sppt_pbb'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>NPWP Penjual</h3>

<a class="btn"
href="../uploads/<?= $data['npwp_penjual'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>Akta Nikah</h3>

<a class="btn"
href="../uploads/<?= $data['akta_nikah'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>KTP Pembeli</h3>

<a class="btn"
href="../uploads/<?= $data['ktp_pembeli'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>KK Pembeli</h3>

<a class="btn"
href="../uploads/<?= $data['kk_pembeli'] ?>">

Lihat File

</a>

</div>

<div class="doc">

<h3>NPWP Pembeli</h3>

<a class="btn"
href="../uploads/<?= $data['npwp_pembeli'] ?>">

Lihat File

</a>

</div>

</div>

</div>

</div>

</body>

</html>