<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['id_user'])){
header("Location: ../login.php");
exit;
}

if($_SESSION['level']!='admin'){
header("Location: ../login.php");
exit;
}

$id=$_GET['id'];

$data=mysqli_fetch_array(
mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE id_pengajuan='$id'"
)
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Ubah Status</title>

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

display:flex;

justify-content:center;

align-items:center;

min-height:100vh;

}
.card{

background:white;

padding:40px;

width:500px;

border-radius:15px;

box-shadow:0 0 20px rgba(0,0,0,.1);

}

h1{

color:#0d3b66;

margin-bottom:25px;

text-align:center;

}

label{

font-weight:bold;

display:block;

margin-bottom:10px;

}

select{

width:100%;

padding:12px;

border:1px solid #ccc;

border-radius:8px;

margin-bottom:25px;

}

button{

width:100%;

padding:12px;

border:none;

background:#0d3b66;

color:white;

border-radius:8px;

cursor:pointer;

font-size:16px;

}

button:hover{

background:#0a2f52;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>PPAT Admin</h2>

<a href="dashboard.php">Dashboard</a>

<a href="data_pengguna.php">Data Pengguna</a>

<a class="active" href="pengajuan.php">Pengajuan Akta</a>

<a href="verifikasi.php">Verifikasi Dokumen</a>

<a href="../logout.php">Logout</a>

</div>

<div class="main">

<div class="card">

<h1>Ubah Status Pengajuan</h1>

<form action="proses.status.php"
      method="POST"
      enctype="multipart/form-data">

<input
type="hidden"
name="id_pengajuan"
value="<?= $data['id_pengajuan'] ?>">

<label>Status Pengajuan</label>

<select name="status">

<option value="Menunggu">Menunggu</option>
<option value="Diproses">Diproses</option>
<option value="Selesai">Selesai</option>
<option value="Ditolak">Ditolak</option>

</select>

<label>Upload Sertifikat (PDF/JPG)</label>

<input
type="file"
name="file_sertifikat"
style="
width:100%;
padding:10px;
margin-bottom:20px;
border:1px solid #ccc;
border-radius:8px;
">

<button type="submit" name="simpan">
Simpan Perubahan
</button>

</form>

</div>

</div>

</body>

</html>