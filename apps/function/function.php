<?php 

require_once 'apps/config/config.php';

class Crud extends Database{
       
        //override database
        function __construct()
        {
            parent::__construct();
        }


        // baca / tampil data
        public function query($query){
            $result = mysqli_query($this->conn, $query);
            if(!$result){
                echo " Kesalahan";
            }
            $rows = [];
            while($row = mysqli_fetch_assoc($result)){             
                $rows[] = $row;        
            }
            return $rows;
            
        }


        // tambah data
        public function tambah($data){
            $this->conn;
            $nim = htmlspecialchars($data["nim"]);
            $nama = htmlspecialchars($data["nama"]);
            $gender = htmlspecialchars($data["gender"]);
            $alamat = htmlspecialchars($data["alamat"]);
            $kota = htmlspecialchars($data["kota"]);
            $email = htmlspecialchars($data["email"]);

            //upload foto
            $foto = $this->uploadFoto();

            // cek keberhasilan pengiriman foto
            if(!$foto){
                return false;
            }


            $query = "INSERT INTO tbl_mhs 
                        VALUES 
                        ('', '$nim', '$nama', '$gender', '$alamat', '$kota', '$email', '$foto')
                     ";

            mysqli_query($this->conn, $query);
            return mysqli_affected_rows($this->conn);


        } 

        public function uploadFoto(){
            //rules pada $_FILES 
            $namaFile = $_FILES['foto']['name']; // nama pada foto yang di-upload
            $ukuranFile = $_FILES['foto']['size']; // ukuran pada foto yang di-upload
            $errorFile = $_FILES['foto']['error']; // apakah foto yang diupload terdapat error atau tidak
            $tmpName = $_FILES['foto']['tmp_name']; // tempat penyimpanan foto sementara

            // cek apakah tidak ada gambar yang di-upload
            if($errorFile === 4){ // 4 = menyatakan eror
                echo " <script> 
                        alert('Pilih gambar terlebih dahulu!');
                        </script>";
                return false;
            }

            //cek apakah yang diapload adalah gambar
            $ekstensifotoValid = ['jpg','jpeg','png'];
            $ekstensifoto = explode('.', $namaFile); // explode => untuk memecah string
            $ekstensifoto = strtolower(end($ekstensifoto)); 
            // end => memecah string terakhir, contoh: zaydan.png -> maka akan diambil yang png
            // strtolower => memaksa agar huruf mejadi kecil, misal JPG -> jpg

            if( !in_array($ekstensifoto,$ekstensifotoValid)){ // jika yang anda upload bukan ekstensi yang ada di array 
                echo " <script> 
                        alert(' yang anda upload bukan gambar!');
                        document.location.href = 'tambah.php';
                    </script> ";
                    return false;
            }

            // cek apakah ukuran gambar terlalu besar
            // 1 juta = 1mb
            if($ukuranFile > 3000000){
                echo " <script> 
                        alert(' ukuran gambar terlalu besar!');
                        document.location.href = 'tambah.php';
                    </script> ";
                    return false;
            }

            // jika pengecekan berhasil, gambar siap di upload
            // generate nama file baru, untuk menghindari nama file yang diupload oleh user mengalami kesamaan
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.'; 
            $namaFileBaru .= $ekstensifoto;

            // move_uploaded_file => untuk memindahkan file
            //parameter (nama file tmpt pnympnn sementara, tujuan penyimpanan )
            move_uploaded_file($tmpName,'assets/img/' . $namaFileBaru);
            return $namaFileBaru;
        }


        public function hapus($id){
            mysqli_query($this->conn, "DELETE FROM tbl_mhs WHERE id = '$id' ");
            return mysqli_affected_rows($this->conn);
        }




        public function ubah($data){
            
            $id = htmlspecialchars($data["id"]);
            $nim = htmlspecialchars($data["nim"]);
            $nama = htmlspecialchars( $data["nama"]);
            $gender = htmlspecialchars($data["gender"]);
            $alamat = htmlspecialchars($data["alamat"]);
            $kota = htmlspecialchars($data["kota"]);
            $email = htmlspecialchars($data["email"]);
            $fotoLama = htmlspecialchars($data["fotoLama"]);


            // cek apakah upload foto atau tidak
            // memperbarui foto
            if($_FILES['foto']['error'] === 4){
                $foto = $fotoLama;
            }
            else{
                $foto = $this->uploadFoto();
            }

            


            $query = "UPDATE tbl_mhs SET 
                        nim = '$nim',
                        nama = '$nama', 
                        gender = '$gender', 
                        alamat = '$alamat', 
                        kota = '$kota', 
                        email = '$email', 
                        foto = '$foto'
                        WHERE id = $id
                        ";

            mysqli_query($this->conn, $query);
            return mysqli_affected_rows($this->conn);

        }




        public function Cari($keyword){
        
            $query = "SELECT * FROM tbl_mhs
            WHERE
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%'
            ";  
            return $this->query($query);
        }

}

?>