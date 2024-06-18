<?php
include("MahasiswaCRUD.php");
include("Navbar.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    // header("refresh:3;url=Mahasiswa.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    // header("refresh:5;url=Mahasiswa.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="fakultas" id="fakultas">
                                <option value="">- Pilih Fakultas -</option>
                                <option value="saintek" <?php if ($fakultas == "saintek") echo "selected" ?>>saintek</option>
                                <option value="soshum" <?php if ($fakultas == "soshum") echo "selected" ?>>soshum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"/>
                        <a href="Akun.php"><button type="button" class="btn btn-danger">Reset</button></a>   
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mencari data -->
        <div class="card">
            <div class="card-header text-white bg-secondary d-flex justify-content-between align-items-center">
                Cari Data
                <a href="Akun.php"><button type="button" class="btn btn-danger">Reset</button></a>
            </div>
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-sm-2">
                        <label for="inputNim" class="visually-hidden">NIM</label>
                        <input type="text" name="cariNim" class="form-control" id="inputNim" placeholder="NIM">
                    </div>
                    <div class="col-sm-3">
                        <label for="inputNama" class="visually-hidden">Nama</label>
                        <input type="text" name="cariNama" class="form-control" id="inputNama" placeholder="Nama">
                    </div>
                    <div class="col-sm-3">
                        <label for="inputAlamat" class="visually-hidden">Alamat</label>
                        <input type="text" name="cariAlamat" class="form-control" id="inputAlamat" placeholder="Alamat">
                    </div>
                    <div class="col-auto">
                        <label for="fakultas" class="visually-hidden">Fakultas</label>
                        <div class="col-auto">
                            <select class="form-control" name="cariFakultas" id="inputFakultas">
                                <option value="">- Pilih Fakultas -</option>
                                <option value="saintek">saintek</option>
                                <option value="soshum">soshum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table" id="exportData">
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
                        $searchResults = [];
                        if (isset($_GET['cariNim']) || isset($_GET['cariNama']) || isset($_GET['cariAlamat']) || isset($_GET['cariFakultas'])) {
                            $nimSearch = trim($_GET['cariNim']);
                            $namaSearch = trim($_GET['cariNama']);
                            $alamatSearch = trim($_GET['cariAlamat']);
                            $fakultasSearch = trim($_GET['cariFakultas']);

                            $searchQuery = "SELECT * FROM mahasiswa WHERE 1=1";
                            if (!empty($nimSearch)) {
                                $searchQuery .= " AND nim LIKE '%$nimSearch%'";
                            }
                            if (!empty($namaSearch)) {
                                $searchQuery .= " AND nama LIKE '%$namaSearch%'";
                            }
                            if (!empty($alamatSearch)) {
                                $searchQuery .= " AND alamat LIKE '%$alamatSearch%'";
                            }
                            if (!empty($fakultasSearch)) {
                                $searchQuery .= " AND fakultas LIKE '%$fakultasSearch%'";
                            }

                            $searchResults = mysqli_query($koneksi, $searchQuery);
                        } else {
                            $allData      = "SELECT * FROM mahasiswa order by id desc";
                            $searchResults     = mysqli_query($koneksi, $allData);
                        }

                        $urut   = 1;
                        while ($readDb = mysqli_fetch_array($searchResults)) {
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
    </div>

    <script>
    $(document).ready(function() {
      $('#exportData').DataTable({
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
