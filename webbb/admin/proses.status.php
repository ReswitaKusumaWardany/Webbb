<?php
include "../config/koneksi.php";

$id = $_POST['id_pengajuan'];
$status = $_POST['status'];

$namaFile = "";

if(isset($_FILES['file_sertifikat']) && $_FILES['file_sertifikat']['name'] != ""){

    $namaFile = time().'_'.$_FILES['file_sertifikat']['name'];
    $tmpFile  = $_FILES['file_sertifikat']['tmp_name'];

    move_uploaded_file(
        $tmpFile,
        "../uploads/sertifikat/".$namaFile
    );

    mysqli_query($conn,"
        UPDATE pengajuan
        SET
        status='$status',
        file_sertifikat='$namaFile'
        WHERE id_pengajuan='$id'
    ");

}else{

    mysqli_query($conn,"
        UPDATE pengajuan
        SET status='$status'
        WHERE id_pengajuan='$id'
    ");

}

header("Location: pengajuan.php");
exit;
?>