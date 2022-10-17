<?php  
    class Database{
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $db = 'mahasiswa';
        protected $conn;
        
        function __construct(){

            if(!isset($this->conn)){
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
            }
            
            if(!$this->conn){
                echo 'Koneksi gagal!' . mysqli_error($this->conn);
            }
            return $this->conn;
        }
        
    }

    // $koneksi = new Database();

    //$conn = mysqli_connect('localhost','root','','mahasiswa');
    // function query($query){
    //     global $koneksi;
    //     $result = mysqli_query($koneksi, $query);
    //     $rows = [];

    //     while($row = mysqli_fetch_assoc($result)){
    //         $rows[] = $row;
            
    //     }
    //     return $rows;
    // }
    

?>