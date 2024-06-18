<?php
include("Connection/KoneksiAkun.php");

$username        = "";
$email       = "";
$password     = "";
$sukses     = "";
$error      = "";


if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $delete       = "delete from akun where id = '$id'";
    $del         = mysqli_query($koneksiAkun,$delete);
    if($del){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $edit       = "select * from akun where id = '$id'";
    $edt         = mysqli_query($koneksiAkun, $edit);
    $get         = mysqli_fetch_array($edt);
    $username        = $get['username'];
    $email       = $get['email'];
    $password     = $get['password'];

    if ($email == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $username        = $_POST['username'];
    $email       = $_POST['email'];
    $password     = $_POST['password'];

    if ($username && $email && $password) {
        if ($op == 'edit') { //untuk update
            $edit       = "update mahasiswa set username = '$username',email='$email',password = '$password' where id = '$id'";
            $edt         = mysqli_query($koneksiAkun, $edit);
            if ($edt) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $add   = "insert into akun(username,email,password) values ('$username','$email','$password')";
            $ad     = mysqli_query($koneksiAkun, $add);
            if ($ad) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>