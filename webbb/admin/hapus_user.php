<?php

include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM user
WHERE id_user='$id'"
);

header("Location: data_pengguna.php");

?>