<?php

session_start();

include "../config/koneksi.php";

if(!isset($_SESSION['id_user'])){

header("Location: ../login.php");

exit;

}

$id = $_GET['id'];

$query = mysqli_query($conn,"
SELECT * FROM pengajuan
WHERE id_pengajuan='$id'
");

$data = mysqli_fetch_assoc($query);

if($data['status']!="Menunggu"){

echo "Pengajuan tidak bisa diedit";

exit;

}

if(isset($_POST['update'])){

$jenis_akta = $_POST['jenis_akta'];

$lokasi = $_POST['lokasi'];

$ktp = $data['ktp'];

$kk = $data['kk'];

$sertifikat = $data['sertifikat'];

$sppt_pbb = $data['sppt_pbb'];

$npwp_penjual = $data['npwp_penjual'];

$akta_nikah = $data['akta_nikah'];

$ktp_pembeli = $data['ktp_pembeli'];

$kk_pembeli = $data['kk_pembeli'];

$npwp_pembeli = $data['npwp_pembeli'];

if($_FILES['ktp']['name']!=""){

$ktp = $_FILES['ktp']['name'];

move_uploaded_file(
$_FILES['ktp']['tmp_name'],
"../uploads/".$ktp
);

}

if($_FILES['kk']['name']!=""){

$kk = $_FILES['kk']['name'];

move_uploaded_file(
$_FILES['kk']['tmp_name'],
"../uploads/".$kk
);

}

if($_FILES['sertifikat']['name']!=""){

$sertifikat = $_FILES['sertifikat']['name'];

move_uploaded_file(
$_FILES['sertifikat']['tmp_name'],
"../uploads/".$sertifikat
);

}

if($_FILES['sppt_pbb']['name']!=""){

$sppt_pbb=$_FILES['sppt_pbb']['name'];

move_uploaded_file(
$_FILES['sppt_pbb']['tmp_name'],
"../uploads/".$sppt_pbb
);

}

if($_FILES['npwp_penjual']['name']!=""){

$npwp_penjual=$_FILES['npwp_penjual']['name'];

move_uploaded_file(
$_FILES['npwp_penjual']['tmp_name'],
"../uploads/".$npwp_penjual
);

}

if($_FILES['akta_nikah']['name']!=""){

$akta_nikah=$_FILES['akta_nikah']['name'];

move_uploaded_file(
$_FILES['akta_nikah']['tmp_name'],
"../uploads/".$akta_nikah
);

}

if($_FILES['ktp_pembeli']['name']!=""){

$ktp_pembeli=$_FILES['ktp_pembeli']['name'];

move_uploaded_file(
$_FILES['ktp_pembeli']['tmp_name'],
"../uploads/".$ktp_pembeli
);

}

if($_FILES['kk_pembeli']['name']!=""){

$kk_pembeli=$_FILES['kk_pembeli']['name'];

move_uploaded_file(
$_FILES['kk_pembeli']['tmp_name'],
"../uploads/".$kk_pembeli
);

}

if($_FILES['npwp_pembeli']['name']!=""){

$npwp_pembeli=$_FILES['npwp_pembeli']['name'];

move_uploaded_file(
$_FILES['npwp_pembeli']['tmp_name'],
"../uploads/".$npwp_pembeli
);

}

mysqli_query($conn,"
UPDATE pengajuan
SET

jenis_akta='$jenis_akta',
lokasi='$lokasi',

ktp='$ktp',
kk='$kk',
sertifikat='$sertifikat',

sppt_pbb='$sppt_pbb',
npwp_penjual='$npwp_penjual',
akta_nikah='$akta_nikah',

ktp_pembeli='$ktp_pembeli',
kk_pembeli='$kk_pembeli',
npwp_pembeli='$npwp_pembeli'

WHERE id_pengajuan='$id'
");

header("Location: pengajuan_saya.php");

exit;

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Pengajuan</title>

<style>

body{

background:#f4f6f9;

padding:40px;

font-family:Arial;

}

.card{

background:white;

padding:35px;

border-radius:15px;

box-shadow:0 0 20px rgba(0,0,0,.08);

max-width:850px;

margin:auto;

}

h1{

color:#0d3b66;

margin-bottom:30px;

}

label{

display:block;

margin-top:20px;

margin-bottom:8px;

font-weight:bold;

}

select,
input[type=text],
input[type=file]{

width:100%;

padding:12px;

border:1px solid #ccc;

border-radius:8px;

}

button{

margin-top:30px;

width:100%;

padding:14px;

border:none;

border-radius:8px;

background:#0d3b66;

color:white;

font-size:16px;

cursor:pointer;

}

button:hover{

background:#0a2f52;

}

.back-btn{

display:inline-block;

margin-bottom:25px;

background:#777;

color:white;

padding:10px 20px;

text-decoration:none;

border-radius:8px;

}

.back-btn:hover{

background:#555;

}

</style>

</head>

<body>

<div class="card">

<a
class="back-btn"
href="pengajuan_saya.php">

← Kembali

</a>

<h1>Edit Pengajuan</h1>

<form method="POST" enctype="multipart/form-data">

<label>Jenis Akta</label>

<select name="jenis_akta">

<option value="AJB"
<?= $data['jenis_akta']=="AJB"?"selected":"" ?>>

AJB

</option>

<option value="HIBAH"
<?= $data['jenis_akta']=="HIBAH"?"selected":"" ?>>

HIBAH

</option>

<option value="WARIS"
<?= $data['jenis_akta']=="WARIS"?"selected":"" ?>>

WARIS

</option>

</select>

<label>Upload ulang KTP</label>

<input type="file" name="ktp">

<label>Upload ulang KK</label>

<input type="file" name="kk">

<label>Upload ulang Sertifikat</label>

<label>Upload ulang SPPT PBB</label>
<input type="file" name="sppt_pbb">

<label>Upload ulang NPWP Penjual</label>
<input type="file" name="npwp_penjual">

<label>Upload ulang Akta Nikah</label>
<input type="file" name="akta_nikah">

<label>Upload ulang KTP Pembeli</label>
<input type="file" name="ktp_pembeli">

<label>Upload ulang KK Pembeli</label>
<input type="file" name="kk_pembeli">

<label>Upload ulang NPWP Pembeli</label>
<input type="file" name="npwp_pembeli">

<input type="file" name="sertifikat">

<label>Lokasi Tanah (Google Maps)</label>

<input
type="text"
name="lokasi"
value="<?= $data['lokasi'] ?>"
placeholder="Paste link Google Maps">

<button
type="submit"
name="update">

Simpan Perubahan

</button>

</form>

</div>

</body>

</html>