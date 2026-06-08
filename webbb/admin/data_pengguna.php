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

$query = mysqli_query(
$conn,
"SELECT * FROM user
WHERE level='pengguna'
ORDER BY id_user DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Data Pengguna</title>

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

border-bottom:1px solid #ddd;

}

tr:hover{

background:#f2f2f2;

}

.btn{

padding:8px 15px;

background:red;

color:white;

text-decoration:none;

border-radius:5px;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>PPAT Admin</h2>

<a href="dashboard.php">Dashboard</a>

<a  class="active" href="data_pengguna.php">
Data Pengguna
</a>

<a href="pengajuan.php">
Pengajuan Akta
</a>

<a href="verifikasi.php">
Verifikasi Dokumen
</a>

<a href="../logout.php">
Logout
</a>

</div>

<div class="main">

<div class="card">

<h1>Data Pengguna</h1>

<table>

<tr>

<th>No</th>

<th>Nama</th>

<th>Username</th>

<th>Aksi</th>

</tr>

<?php
$no=1;

while($data=mysqli_fetch_array($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $data['nama'] ?></td>

<td><?= $data['username'] ?></td>

<td>

<a
class="btn"
href="hapus_user.php?id=<?= $data['id_user'] ?>">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>

</html>