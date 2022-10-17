//hapus
const tHapus = document.querySelectorAll("#hapus");
for(var i = 0; i < tHapus.length; i++ ){
    tHapus[i].addEventListener('click', function(e){
    
        // menonaktifkan hrefnya terlebih dahulu, karena ketika jika tidak dimatikan dahulu, maka saat kita klik yes or no pasti a hrefnya dijalankan.
        e.preventDefault();
        
        // ambil link href untuk meng-aktifkan
        const href = this.getAttribute('href');
        // sweet alert
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data mahasiswa akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
          })
          // kemudian, jika hasilnya true, maka arahkan ke href
          .then((result) => {      
            if (result.isConfirmed) {
              Swal.fire(
                'Berhasil!',
                'Data mashasiswa berhasil dihapus!',
                'success'
              );           
              document.location.href = href;
            }            
          });  
    });
}


// const tHapus = document.querySelector("#hapus");
// tHapus.addEventListener('click', function(){
//   var dataid = this.getAttribute('data-id');

//   Swal.fire({
//     title: 'Apakah anda yakin?',
//     text: "Data mahasiswa akan dihapus!" +dataid+" ",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, hapus data!'
//   }).then((willDelete) => {
//     if (willDelete) {
//       Swal.fire(
//         'Berhasil!',
//         'Data mahasiswa telah terhapus.',
//         'success'
//       )
//     }
//     else{
//       Swal.fire(
//         'Gagal!',
//         'Data mahasiswa gagal terhapus.',
//         'warning'
//       )
//     }
//   })

// })

// const tambahData = document.querySelector("#tambah");
// tambahData.addEventListener('click', function(){

//   Swal.fire({
//     title: 'Berhasil!',
//     text : 'Data berhasil ditambahkan',
//     icon : 'success',
//     showConfirmButton: true,
//   }).then((result)=>{
//     if(result.isConfirmed){
//       document.location.href = 'index.php';
//     }
//   })
// })


// function ubahData(){
//   const ubahData = document.querySelectorAll("#ubah");
//   ubahData.addEventListener('click', function(){
//       // sweet alert
//       Swal.fire({
//         position: '',
//         icon: 'success',
//         title: 'Data berhasil diubah',
//         showConfirmButton: false,
//         timer: 1500
//       })
//         // kemudian, jika hasilnya true, maka arahkan ke href
//         .then((result) => {      
//           if (result.isConfirmed) {
//             Swal.fire(
//               'Berhasil!',
//               'Data mashasiswa berhasil dihapus!',
//               'success'
//             );           
//             document.location.href = index.php;
//           }            
//         });  
//   });
// }


