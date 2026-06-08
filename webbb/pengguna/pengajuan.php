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

if(isset($_POST['simpan'])){

$namaKtp = $_FILES['ktp']['name'];
$tmpKtp = $_FILES['ktp']['tmp_name'];

$namaKk = $_FILES['kk']['name'];
$tmpKk = $_FILES['kk']['tmp_name'];

$namaSertifikat = $_FILES['sertifikat']['name'];
$tmpSertifikat = $_FILES['sertifikat']['tmp_name'];

move_uploaded_file(
$tmpKtp,
"../uploads/".$namaKtp
);

move_uploaded_file(
$tmpKk,
"../uploads/".$namaKk
);

move_uploaded_file(
$tmpSertifikat,
"../uploads/".$namaSertifikat
);

$id_user = $_SESSION['id_user'];

$jenis_akta = $_POST['jenis_akta'];

$nama_pemilik = $_POST['nama_pemilik'];

$luas_tanah = $_POST['luas_tanah'];

$alamat_tanah = $_POST['alamat_tanah'];

$latitude = $_POST['latitude'];

$longitude = $_POST['longitude'];

$query = mysqli_query($conn,"
INSERT INTO pengajuan
(
id_user,
jenis_akta,
nama_pemilik,
luas_tanah,
alamat_tanah,
tanggal_pengajuan,
status,
ktp,
kk,
sertifikat,
latitude,
longitude
)

VALUES
(
'$id_user',
'$jenis_akta',
'$nama_pemilik',
'$luas_tanah',
'$alamat_tanah',
NOW(),
'Menunggu',
'$namaKtp',
'$namaKk',
'$namaSertifikat',
'$latitude',
'$longitude'
)
");

if($query){

header("Location: dashboard.php");

exit;

}else{

echo mysqli_error($conn);

}

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Buat Pengajuan</title>

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

max-width:800px;

}

h1{

color:#0d3b66;

margin-bottom:25px;

}

label{

display:block;

margin-top:15px;

font-weight:bold;

}

select,
input[type=file],
input[type=text],
input[type=number],
textarea{

width:100%;

padding:12px;

margin-top:8px;

border:1px solid #ccc;

border-radius:6px;

}

button{

width:100%;

margin-top:25px;

padding:12px;

border:none;

background:#0d3b66;

color:white;

border-radius:6px;

cursor:pointer;

}

button:hover{

background:#0a2f52;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>PPAT User</h2>

<a href="dashboard.php">Dashboard</a>

<a  class="active" href="pengajuan.php">Buat Pengajuan</a>

<a href="pengajuan_saya.php">Pengajuan Saya</a>

<a href="../logout.php">Logout</a>

</div>


<div class="main">

<div class="card">

<h1>Buat Pengajuan Akta</h1>

<form method="POST"
enctype="multipart/form-data">

<label>Jenis Akta</label>

<select name="jenis_akta">

<option value="AJB">

Akta Jual Beli

</option>

<option value="HIBAH">

Akta Hibah

</option>

<option value="WARIS">

Akta Waris

</option>

</select>

<label>Nama Pemilik Tanah</label>
<input
type="text"
name="nama_pemilik"
placeholder="Masukkan nama pemilik tanah"
required>

<label>Luas Tanah (m²)</label>
<input
type="number"
name="luas_tanah"
placeholder="Masukkan luas tanah"
required>

<label>Alamat Tanah</label>
<textarea
name="alamat_tanah"
rows="4"
placeholder="Masukkan alamat lengkap tanah"
required></textarea>

<label>Upload KTP</label>

<input type="file"
name="ktp"
required>

<label>Upload KK</label>

<input type="file"
name="kk"
required>

<label>Upload Sertifikat</label>

<input type="file"
name="sertifikat"
required>

<label>Upload SPPT PBB</label>
<input type="file" name="sppt_pbb" required>

<label>Upload NPWP Penjual</label>
<input type="file" name="npwp_penjual" required>

<label>Upload Akta Nikah</label>
<input type="file" name="akta_nikah" required>

<label>KTP Pembeli</label>
<input type="file" name="ktp_pembeli" required>

<label>KK Pembeli</label>
<input type="file" name="kk_pembeli" required>

<label>NPWP Pembeli</label>
<input type="file" name="npwp_pembeli" required>

<label>Latitude</label>

<input
type="text"
name="latitude"
placeholder="-5.397140"
required>

<label>Longitude</label>

<input
type="text"
name="longitude"
placeholder="105.266792"
required>

<button
type="submit"
name="simpan">

Kirim Pengajuan

</button>

</form>

</div>

</div>

</body>

</html>