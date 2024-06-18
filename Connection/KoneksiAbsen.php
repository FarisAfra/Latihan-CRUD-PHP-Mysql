<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "latihan";

$koneksiAbsen    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksiAbsen) {
    die("Tidak bisa terkoneksi ke database");
}
?>