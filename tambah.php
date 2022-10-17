<?php 
    include_once 'apps/config/config.php';
    include 'apps/function/function.php';

    //instansiasi object class crud
    $crud = new Crud;
    
    //cek apakah tombol submit sudah di tekan atau belum
    // sudah ditekan = sudah mengisi, dan sebaliknya 
    if( isset($_POST["submit"])){
        if($crud->tambah($_POST) > 0){
            echo " 
                <script>
                    alert('Data berhasil disimpan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
        else{
            echo " 
                <script>
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
    else if(isset($_POST["cancel"])){
        echo" <script>
            document.location.href = 'index.php';
            </script>";
    }
    
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tambah Data Mahasiswa</title>
  </head>
  <body>
    
    <div class="container">
        <!-- <h3 class="text-center mt-4 mb-3 fw-bolder"> Tambah Mahasiswa</h3> -->

        <!-- form inputan -->
        <div class="card m-auto mt-4" style="width:700px;">
            <div class="card-header bg-primary text-white">
                Tambah Data Mahasiswa
            </div>
            <div class="card-body">
               
                <form action="" method="POST" enctype="multipart/form-data">      
                <div class="mb-3 row">
                        <label for="nim" class="col-sm-4 col-form-label ms-3">NIM</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="nim" name="nim" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label ms-3">Nama</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-4 col-form-label ms-3">Jenis Kelamin</label>
                        <div class="col-sm">
                        <select class="form-select" id="gender" name="gender" required>
                                <option selected disabled>Pilih</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-4 col-form-label ms-3">Alamat</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="alamat" name="alamat" required> 
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kota" class="col-sm-4 col-form-label ms-3">Kota</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="kota" name="kota" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-4 col-form-label ms-3">Email</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-4 col-form-label ms-3"> Foto</label>
                        <div class="col-sm">
                        <div class="form-text">Maksimum 3MB</div>
                        <input type="file" class="form-control" id="foto" name="foto" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                    <!-- <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
                 -->
                    <a href="index.php" class="btn btn-secondary" id="cancel">Batal</a>
                </form>
            </div>
        </div>

        <!-- akhir form -->
    </div>
 


















    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>