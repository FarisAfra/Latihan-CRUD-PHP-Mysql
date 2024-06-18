<?php
include("Navbar.php");
include("Connection/koneksiAbsen.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">"
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">"
    <title>Home</title>
    <style>
        .mx-auto {
            width: 800px;
            margin-top: 75px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="mx-auto">

        <!-- Data Absen -->
        <div class="card">
            <div class="card-header text-white bg-secondary d-flex justify-content-between align-items-center">
                Data Absen
                <button type="button" class="btn btn-primary btn-sm ms-auto">+ Tambah Data</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Pulang</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dbAbsen     = "SELECT TblPresensi.Tanggal, TblPresensi.NIP, TblPegawai.Nama, TblPresensi.Jam_Masuk, TblPresensi.Jam_Pulang
                        FROM TblPresensi
                        JOIN TblPegawai ON TblPresensi.NIP = TblPegawai.NIP";
                        $resultAbsen = mysqli_query($koneksiAbsen, $dbAbsen);
                        $urut        = 1;
                        while ($readDb = mysqli_fetch_array($resultAbsen)) {
                            $tanggal    = $readDb['Tanggal'];
                            $nip        = $readDb['NIP'];
                            $nama        = $readDb['Nama'];
                            $jam_masuk  = $readDb['Jam_Masuk'];
                            $jam_pulang = $readDb['Jam_Pulang'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td><?php echo $tanggal ?></td>
                                <td><?php echo $nip ?></td>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $jam_masuk ?></td>
                                <td><?php echo $jam_pulang ?></td>
                                <td>
                                    <a href="Akun.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="Akun.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</body>
</html>