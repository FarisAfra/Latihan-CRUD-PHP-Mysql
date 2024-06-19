<?php
include("Navbar.php");
include("Connection/KoneksiAkademik.php");
include("Connection/KoneksiAkun.php");
include("Connection/KoneksiAbsen.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">"
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">"
    <title>Home</title>
    <style>
        .mx-auto {
            width: 800px;
            margin-top: 75px;
            margin-bottom: 25px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="mx-auto">

        <!-- Data Mahasiswa -->
        <div class="card">
            <div class="card-header text-white bg-secondary d-flex justify-content-between align-items-center">
                Data Mahasiswa
                <a href="Mahasiswa.php"><button type="button" class="btn btn-primary btn-sm ms-auto">+ Tambah Data</button></a>
            </div>
            <div class="card-body">
                <table class="table" id="exportDataMahasiswa">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dbMahasiswa   = "select * from mahasiswa order by id desc";
                        $koneksi     = mysqli_query($koneksi, $dbMahasiswa);
                        $urut   = 1;
                        while ($readDb = mysqli_fetch_array($koneksi)) {
                            $id         = $readDb['id'];
                            $nim        = $readDb['nim'];
                            $nama       = $readDb['nama'];
                            $alamat     = $readDb['alamat'];
                            $fakultas   = $readDb['fakultas'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nim ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $fakultas ?></td>
                                <td scope="row">
                                    <a href="Mahasiswa.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="Mahasiswa.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>

        <!-- Data Akun -->
        <div class="card">
            <div class="card-header text-white bg-secondary d-flex justify-content-between align-items-center">
                Data Akun
                <button type="button" class="btn btn-primary btn-sm ms-auto">+ Tambah Data</button>
            </div>
            <div class="card-body">
                <table class="table" id="exportDataAkun">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dbAkun      = "select * from akun order by id desc";
                        $koneksiAkun     = mysqli_query($koneksiAkun, $dbAkun);
                        $urut   = 1;
                        while ($readDb = mysqli_fetch_array($koneksiAkun)) {
                            $id         = $readDb['id'];
                            $username   = $readDb['username'];
                            $email      = $readDb['email'];
                            $password   = $readDb['password'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $username ?></td>
                                <td scope="row"><?php echo $email ?></td>
                                <td scope="row"><?php echo $password ?></td>
                                <td scope="row">
                                    <a href="Akun.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="Akun.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>

        <!-- Data Absen -->
        <div class="card">
            <div class="card-header text-white bg-secondary d-flex justify-content-between align-items-center">
                Data Absen
                <button type="button" class="btn btn-primary btn-sm ms-auto">+ Tambah Data</button>
            </div>
            <div class="card-body">
                <table class="table" id="exportDataAbsen">
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

    <script>
    $(document).ready(function() {
      $('#exportDataMahasiswa').DataTable({
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excel',
            text: 'Export to Excel',
          },
          {
            extend: 'csv',
            text: 'Export to CSV',
          },
          {
            extend: 'pdf',
            text: 'Export to PDF',
          }
        ],
        searching: false
      });
    });
  </script>

<script>
    $(document).ready(function() {
      $('#exportDataAkun').DataTable({
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excel',
            text: 'Export to Excel',
          },
          {
            extend: 'csv',
            text: 'Export to CSV',
          },
          {
            extend: 'pdf',
            text: 'Export to PDF',
          }
        ],
        searching: false
      });
    });
  </script>

<script>
    $(document).ready(function() {
      $('#exportDataAbsen').DataTable({
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excel',
            text: 'Export to Excel',
          },
          {
            extend: 'csv',
            text: 'Export to CSV',
          },
          {
            extend: 'pdf',
            text: 'Export to PDF',
          }
        ],
        searching: false
      });
    });
  </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>
</html>