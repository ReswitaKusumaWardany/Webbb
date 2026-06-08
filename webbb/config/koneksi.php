<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ppat_arsip"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>