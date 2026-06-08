<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['id_user'])){
header("Location: ../login.php");
exit;
}

$id = $_GET['id'];

$id_user = $_SESSION['id_user'];

/* cek dulu apakah benar milik user
dan status masih menunggu */

$cek = mysqli_query(
$conn,
"SELECT * FROM pengajuan
WHERE id_pengajuan='$id'
AND id_user='$id_user'
AND status='Menunggu'"
);

if(mysqli_num_rows($cek)>0){

mysqli_query(
$conn,
"DELETE FROM pengajuan
WHERE id_pengajuan='$id'"
);

}

header("Location: pengajuan_saya.php");
exit;

?>