<?php
include("AkunCRUD.php");
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
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $password ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
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
                    <div class="col-auto">
                        <label for="inputUsername" class="visually-hidden">Username</label>
                        <input type="text" name="cariUsername" class="form-control" id="inputUsername" placeholder="Username">
                    </div>
                    <div class="col-auto">
                        <label for="inputEmail" class="visually-hidden">Email</label>
                        <input type="text" name="cariEmail" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary d-flex justify-content-between align-items-center">
                Data Akun
            </div>
            <div class="card-body">
                <table class="table" id="exportData">
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

                        $searchResults = [];
                        if (isset($_GET['cariUsername']) || isset($_GET['cariEmail'])) {
                            $usernameSearch = trim($_GET['cariUsername']);
                            $emailSearch = trim($_GET['cariEmail']);

                            $searchQuery = "SELECT * FROM akun WHERE 1=1";
                            if (!empty($usernameSearch)) {
                                $searchQuery .= " AND username LIKE '%$usernameSearch%'";
                            }
                            if (!empty($emailSearch)) {
                                $searchQuery .= " AND email LIKE '%$emailSearch%'";
                            }

                            $searchResults = mysqli_query($koneksiAkun, $searchQuery);
                        } else {
                            $allData      = "SELECT * FROM akun order by id desc";
                            $searchResults     = mysqli_query($koneksiAkun, $allData);
                        }

                        $urut   = 1;
                        while ($readDb = mysqli_fetch_array($searchResults)) {
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
