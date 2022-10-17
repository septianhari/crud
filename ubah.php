<?php 
    include_once 'apps/config/config.php';
    include 'apps/function/function.php';
    //cek apakah tombol submit sudah di tekan atau belum
    // sudah ditekan = sudah mengisi, dan sebaliknya
    $crud = new Crud;
    // meanngkap id melalui method GET / url
    $id = $_GET["id"];
    // ambil data mahasiswa berdasarkan id
    // array numerik
    // penulisan [0] -> ketika proses pencarian agar langsung ke index ke 0
    $ambilMahasiswa = $crud->query("SELECT * FROM tbl_mhs WHERE id = $id ")[0];

    if(isset($_POST["submit"])){
        // cek apakah data diubah
        if($crud->ubah($_POST) > 0){
            echo " <script> 
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                    </script>
                    ";  
        }
        else{
            echo " 
                <script>
                    alert('Data gagal diubah!');
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Update Mahasiswa</title>
  </head>
  <body>
    
    <div class="container">
        <!-- <h3 class="text-center mt-4 mb-3 fw-bolder"> Update Mahasiswa</h3> -->

        
        <div class="card m-auto mt-4" style="width:700px;">
            <div class="card-header bg-primary text-white">
                Perbarui Data Mahasiswa
            </div>
            
            <div class="card-body">

        <!-- form inputan ubah data mahasiswa-->
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- menangkap gambar lama berdasarkan id -->
                    <div class="mb-3">
                        <input type="hidden" name="id" value=" <?= $ambilMahasiswa["id"]; ?> ">
                        <input type="hidden" name="fotoLama" value="<?= $ambilMahasiswa["foto"]; ?> ">
                    </div>

                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-4 col-form-label ms-3">NIM</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="nim" value="<?= $ambilMahasiswa["nim"]; ?>" name="nim">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label ms-3">Nama</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="nama" value="<?= $ambilMahasiswa["nama"]; ?>" name="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-4 col-form-label ms-3">Jenis Kelamin</label>
                        <div class="col-sm">
                        <select class="form-select" id="gender" name="gender" >
                                <option disabled value="<?= $ambilMahasiswa["gender"]; ?>">Pilih</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-4 col-form-label ms-3">Alamat</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="alamat" value="<?= $ambilMahasiswa["alamat"]; ?>" name="alamat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kota" class="col-sm-4 col-form-label ms-3">Kota</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="kota" value="<?= $ambilMahasiswa["kota"]; ?>" name="kota">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-4 col-form-label ms-3">Email</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="email" value="<?= $ambilMahasiswa["email"]; ?>" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-4 col-form-label ms-3"> Foto</label>
                        <div class="col-sm">
                        <img src="assets/img/<?= $ambilMahasiswa["foto"]; ?>" width="70">
                        <div class="form-text">Maksimum 3MB</div>
                        <input type="file" class="form-control" id="foto" name="foto" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end ms-3 mt-3" name="submit" id="ubah">Ubah</button>
                    <button type="submit" class="btn btn-secondary float-end mt-3" name="cancel" id="tambah">Batal</button>
                </form>
            </div>
        </div>
    </div>
 


















    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- js eksternal -->
    <script src="assets/js/script.js"></script>
  </body>
</html>