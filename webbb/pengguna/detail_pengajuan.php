<?php

session_start();

include "../config/koneksi.php";

if(!isset($_SESSION['id_user'])){

header("Location: ../login.php");

exit;

}

$id = $_GET['id'];

$query=mysqli_query($conn,"
SELECT * FROM pengajuan
WHERE id_pengajuan='$id'
");

$data=mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>

<html>

<head>

<title>Detail Pengajuan</title>

<style>

body{

background:#f4f6f9;

font-family:Arial;

padding:40px;

}

.card{

background:white;

padding:35px;

border-radius:15px;

box-shadow:0 0 15px rgba(0,0,0,.08);

max-width:1000px;

margin:auto;

}

.top{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:30px;

}

h1{

color:#0d3b66;

}

.back{

padding:10px 18px;

background:#0d3b66;

color:white;

border-radius:8px;

text-decoration:none;

}

.info{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
margin-bottom:30px;
}

.box{

background:#f7f9fc;

padding:20px;

border-radius:10px;

}

.box h3{

font-size:14px;

color:gray;

margin-bottom:10px;

}

.box p{

font-size:22px;

font-weight:bold;

}

.status{

display:inline-block;

padding:10px 18px;

border-radius:20px;

color:white;

font-weight:bold;

}

.menunggu{

background:orange;

}

.diproses{

background:#3498db;

}

.selesai{

background:#2ecc71;

}

.ditolak{

background:#e74c3c;

}

.docs{

display:grid;

grid-template-columns:repeat(auto-fill,minmax(220px,1fr));

gap:20px;

}

.doc{

background:#fafafa;

padding:20px;

border-radius:10px;

border:1px solid #eee;

text-align:center;

}

.doc h4{

margin-bottom:15px;

}

.doc a{

display:inline-block;

padding:8px 15px;

background:#0d3b66;

color:white;

border-radius:6px;

text-decoration:none;

}

</style>

</head>

<body>

<div class="card">

<div class="top">

<h1>Detail Pengajuan</h1>

<a class="back"
href="pengajuan_saya.php">

← Kembali

</a>

</div>

<div class="info">

<div class="box">

<h3>Jenis Akta</h3>

<p><?= $data['jenis_akta'] ?></p>

</div>

<div class="box">

<h3>Status</h3>

<p>

<span class="status <?= strtolower($data['status']) ?>">

<?= $data['status'] ?>

</span>

</p>

</div>

<div class="box">

<h3>Tanggal Pengajuan</h3>

<p><?= $data['tanggal_pengajuan'] ?></p>

</div>
<div class="box">

<h3>Nama Pemilik Tanah</h3>

<p><?= $data['nama_pemilik'] ?></p>

</div>

<div class="box">

<h3>Luas Tanah</h3>

<p><?= $data['luas_tanah'] ?> m²</p>

</div>

<div class="box">

<h3>Alamat Tanah</h3>

<p><?= $data['alamat_tanah'] ?></p>

</div>

<div class="box">

<h3>Koordinat Lokasi</h3>

<p>
<?= $data['latitude'] ?> ,
<?= $data['longitude'] ?>
</p>

</div>

</div>

<h2>Lokasi Tanah</h2>

<br>

<iframe
width="100%"
height="400"
style="border:0;border-radius:10px;"
loading="lazy"
src="https://maps.google.com/maps?q=<?= $data['latitude'] ?>,<?= $data['longitude'] ?>&z=16&output=embed">
</iframe>

<br><br>

<h2>Dokumen Pengajuan</h2>

<br>

<div class="docs">

<?php

$dokumen=[

"KTP"=>$data['ktp'],

"KK"=>$data['kk'],

"Sertifikat"=>$data['sertifikat'],

"SPPT PBB"=>$data['sppt_pbb'],

"NPWP Penjual"=>$data['npwp_penjual'],

"Akta Nikah"=>$data['akta_nikah'],

"KTP Pembeli"=>$data['ktp_pembeli'],

"KK Pembeli"=>$data['kk_pembeli'],

"NPWP Pembeli"=>$data['npwp_pembeli']

];

foreach($dokumen as $nama=>$file){

?>

<div class="doc">

<h4><?= $nama ?></h4>

<a href="../uploads/<?= $file ?>" target="_blank">

Lihat File

</a>

</div>

<?php } ?>

</div>

</div>

</body>

</html>