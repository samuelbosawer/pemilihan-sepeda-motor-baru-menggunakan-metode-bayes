<?php
  require_once('conn.php');
  if(isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan 
     if(register($_POST,'pendaftaran',$_FILES)>0){
      echo "
        <script>  
          alert('Pendaftaran berhasil, harap menunggu konformasi !!'); 
          window.location.href = 'login';
        </script>
    
      ";
     }else{
      echo "
      <script>  
          alert('Pendaftaran gagal, harap diisi dengan benar !!'); 
          </script> 
        ";
     }


  }
 
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Register - Sistem Pendukung Keputusan Pemilihan Sepeda Motor Baru Menggunakan Metode Bayes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

   <!-- SWEETALERT -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <!-- <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a> -->
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                    <p class="text-center small">Silahkan masukan data anda dengan benar</p>
                  </div>

                  <form class="row g-3" method="POST" action="" enctype="multipart/form-data" >
                    <div class="col-6">
                      <label for="nama" class="form-label">Nama Depan</label>
                      <input type="text" name="nama_depan" class="form-control" id="Nama depan anda" required>
                    </div>

                    <div class="col-6">
                      <label for="nama" class="form-label">Nama Belakang</label>
                      <input type="text" name="nama_belakang" class="form-control" id="Nama depan anda" required>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                    </div>

                    <div class="col-12">
                      <label for="yourktp" class="form-label">KTP</label>
                      <input type="file" name="ktp" class="form-control" id="yourktp" required>
                    </div>

                    <div class="col-12">
                      <label for="yourphoto" class="form-label">Foto Diri</label>
                      <input type="file" name="foto" class="form-control" id="yourphoto" required>
                    </div>

                    <div class="col-12 mb-0">
                      <label for="" class="form-label text-muted">Alamat</label>
                    </div>

                    <div class="col-12 mt-0">
                      <label for="distrik" class="form-label">Distrik </label>
                      <input type="text" name="distrik" class="form-control" id="distrik" required>
                    </div>
                    <div class="col-12">
                      <label for="kelurahan" class="form-label">Kelurahan </label>
                      <input type="text" name="kelurahan" class="form-control" id="kelurahan" required>
                    </div>
                    <div class="col-12">
                      <label for="jalan" class="form-label">Jalan </label>
                      <textarea name="jalan" class="form-control" id="jalan" cols="30" rows="7"></textarea>
                    </div>

                    
                    <div class="col-12 mb-0">
                      <label for="" class="form-label text-muted">Password</label>
                    </div>

                    <div class="col-12 mt-0">
                      <label for="password" class="form-label">Password </label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="col-12">
                      <label for="konformasiPassword" class="form-label">Konfirmasi Password </label>
                      <input type="password" name="konformasiPassword" class="form-control" id="konformasiPassword" required>
                    </div>


                    <!-- <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div> -->


                    <div class="col-12">
                      <button class="btn btn-primary w-100"  name="submit" type="submit">Buat Akun</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah Punya Akun ? <a href="login.php">Masuk</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>