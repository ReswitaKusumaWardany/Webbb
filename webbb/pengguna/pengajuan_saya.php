<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['id_user'])){
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$query=mysqli_query($conn,"
SELECT * FROM pengajuan
WHERE id_user='$id_user'
ORDER BY id_pengajuan DESC
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Pengajuan Saya</title>

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

margin-bottom:25px;

}

table{

width:100%;

border-collapse:collapse;

}

th{

background:#0d3b66;

color:white;

padding:15px;

}

td{

padding:15px;

text-align:center;

border-bottom:1px solid #eee;

}

.status{

padding:8px 15px;

border-radius:20px;

color:white;

font-size:14px;

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

.cancel-btn{

background:#e74c3c;

color:white;

padding:8px 12px;

text-decoration:none;

border-radius:6px;

display:inline-flex;

align-items:center;

justify-content:center;

margin-left:5px;

}

.cancel-btn:hover{

background:#c0392b;

}

.edit-btn{

background:#3498db;

color:white;

padding:8px 12px;

text-decoration:none;

border-radius:6px;

display:inline-flex;

align-items:center;

justify-content:center;

}
.edit-btn:hover{

background:#2980b9;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>PPAT User</h2>

<a href="dashboard.php">Dashboard</a>

<a href="pengajuan.php">

Buat Pengajuan

</a>

<a class="active" href="pengajuan_saya.php">

Pengajuan Saya

</a>

<a href="../logout.php">

Logout

</a>

</div>

<div class="main">

<div class="card">

<h1>Pengajuan Saya</h1>

<table>

<tr>

<th>No</th>
<th>Jenis Akta</th>
<th>Nama Pemilik</th>
<th>Luas Tanah</th>
<th>Tanggal</th>
<th>Dokumen</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</tr>

<?php

$no=1;

while($data=mysqli_fetch_array($query)){

$statusClass=strtolower($data['status']);

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $data['jenis_akta'] ?></td>

<td><?= $data['nama_pemilik'] ?></td>

<td><?= $data['luas_tanah'] ?> m²</td>

<td><?= $data['tanggal_pengajuan'] ?></td>

<td>
    <a href="detail_pengajuan.php?id=<?= $data['id_pengajuan'] ?>">
        Lihat Dokumen
    </a>
</td>

<td>
    <span class="status <?= $statusClass ?>">
        <?= $data['status'] ?>
    </span>
</td>

<td style="white-space:nowrap;">

<?php if($data['status']=="Menunggu"){ ?>

    <a class="edit-btn"
    href="edit_pengajuan.php?id=<?= $data['id_pengajuan'] ?>">
    Edit
    </a>

    <a class="cancel-btn"
    href="cancel_pengajuan.php?id=<?= $data['id_pengajuan'] ?>"
    onclick="return confirm('Batalkan pengajuan ini?')">
    Cancel
    </a>

<?php } elseif($data['status']=="Selesai" && !empty($data['file_sertifikat'])) { ?>

    <a href="../uploads/sertifikat/<?= $data['file_sertifikat'] ?>"
       class="edit-btn"
       download>
       Download
    </a>

<?php } else { ?>

    -

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>

</html>