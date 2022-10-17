<?php 
    // memanggil config untuk akses database dan fungsi
    include_once 'apps/config/config.php';
    include 'apps/function/function.php';

    // instansiasi object class crud
    $crud = new Crud;
    // mengambil data mhs 
    $mahasiswa = $crud->query('SELECT * FROM tbl_mhs ORDER BY id DESC');

    // cek apakah tombol cari sudah ditekan
    if(isset($_POST["cari"])){
        $mahasiswa = $crud->Cari($_POST["keyword"]);
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- css eksternal -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Dashboard | Data Mahasiswa</title>
  </head>
  <body>

    
    <div class="container-fluid mt-3">     
        <div class="card">
            <div class="card-header fs-4 bg-primary text-white text-center" style="font-weight:600;">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-8" >

                    <!-- tombol tambah -->
                        <a href="tambah.php" style="text-decoration:none;"><button type="button" class="btn btn-primary d-inline mb-1 me-2   "><i class="bi bi-plus-lg" style="font-size: 14px;"></i> Tambah</button></a>   
                        <!-- <a href="index.php" ><button type="button" class="btn btn-secondary d-inline mb-1 me-3 "><i class="bi bi-arrow-clockwise"></i></button></a> -->
                    <!-- akhir tombol tambah -->

                    <!-- tombol cari -->
                        <form action ="" method = "POST" class="d-inline">
                            <input type="text" name="keyword" id="keyword" placeholder="Cari" autofocus autocomplete="off" size="30" class="cari rounded" style="height: 39px; padding-left:10px;"> 
                            <button type="submit" name="cari" class="btn btn-secondary" id="cari" style=" margin-bottom: 5px;" ><i class="bi bi-search"></i> Cari</button>   
                        </form> 
                        <!-- akhir tombol cari -->
                    </div>
                </div>
                

            <!-- tabel mahasiswa -->
                <div class="row ">
                    <div class="table-responsive text-center rounded">
                        <table class="table table-striped table-bordered table-hover" cellpadding="20" cellspacing="0" >
                        <tr class="table-dark">
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>

                        
                        <?php $i = 1; ?>
                        <?php foreach($mahasiswa as $row): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["nim"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["gender"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["kota"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td><img src="assets/img/<?= $row["foto"]; ?>" width="50"></td>
                            <td>

                            <a href="ubah.php?id=<?=$row["id"]; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>

                            <a href="hapus.php?id=<?=$row["id"]; ?>" class="btn btn-danger" id="hapus"><i class="bi bi-trash-fill"></i></a>

                            </td>
                        </tr>
                        <?php $i++ ?>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- akhir tabel mahasiswa -->
        </div>





    <!-- js bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- js alert online -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="assets/js/js_alert/sweetalert2.all.min.js"></script>
    <!-- js eksternal -->
    <script src="assets/js/script.js"></script>
  </body>
</html>