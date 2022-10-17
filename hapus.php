<?php 
// memanggil config untuk akses db dan akses fungsi
include_once 'apps/config/config.php';
include 'apps/function/function.php';

//instansiasi object class crud
$crud = new Crud;

// mengambil / menangkap id melalui url
$id = $_GET["id"];

// id yang sudah ditangkap akan dikirimkan ke fungsi hapus()
if($crud->hapus($id) > 0){
    // cek apakah ada perubahan pada data, jika lebih dari 0 atau bernilai 1 maka data berhasil dihapus dan lakukan program dibawah ini
    echo " <script>
        document.location.href = 'index.php';
        </script>";
}
else{
    echo " 
    <script>
        document.location.href = 'index.php';
    </script>
";
}
?>