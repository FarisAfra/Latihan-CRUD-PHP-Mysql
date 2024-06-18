<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "latihan";

$koneksiAkun    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksiAkun) {
    die("Tidak bisa terkoneksi ke database");
}
?>