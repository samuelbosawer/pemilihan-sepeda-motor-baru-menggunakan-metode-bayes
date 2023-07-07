<?php
session_start();
require_once('conn.php');

// $datas = mysqli_query($conn,"SELECT * FROM motor ORDER BY id_motor DESC");
$kecepatan = mysqli_query($conn, "SELECT DISTINCT k_maksimal
FROM motor;");
$tengki = mysqli_query($conn, "SELECT DISTINCT k_tengki
FROM motor;");

$cc = mysqli_query($conn, "SELECT DISTINCT cc_motor
FROM motor;");

if(isset($_POST["submit"])){
  require_once('bayes.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pendukung Keputusan Pemilihan Sepeda Motor Baru Menggunakan Metode Bayes </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Logis
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <!-- <h5 class="fw-bold text-white"></h5> -->
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php#" class="active">Beranda</a></li>
          <li><a href="index.php#tentang" class="active">Tentang Kami</a></li>
          <li><a href="index.php#produk" class="active">Produk</a></li>
          <li><a href="pencarian.php" class="active">Pencarian Bayes</a></li>
     
        </ul>
      </nav><!-- .navbar -->
      <div class="justify-content-right">
        < <?php
          if ($_SESSION != null ){
            if ($_SESSION['role'] == '1') {
              echo '
              <a href="logout" class="btn btn-primary ml-5">Keluar</a>
              <a href="admin" class="btn btn-primary ml-5">Panel</a>
            ';
            }
            if ($_SESSION['role'] == '2') {
              echo '
              <a href="logout" class="btn btn-primary ml-5">Keluar</a>
              <a href="admin-dealer" class="btn btn-primary ml-5">Panel</a>
            ';
            }
          elseif ($_SESSION['role'] == '3')
          {
            echo '<a href="logout" class="btn btn-primary ml-5">Keluar</a>
            <a href="#" class="btn btn-primary ml-5">'.$_SESSION['nama_depan'].'</a>
            <a href="keranjang" class="btn btn-primary ml-5"><i class="bi bi-bag-fill"></i></a>
          
            
            ' 
            ;
             
          }
          }else{
            echo '
            <a href="login" class="btn btn-primary ml-5">Masuk</a>
            <a href="register" class="btn btn-primary ml-5">Daftar</a>
          ';
          }
        ?>
        
      </div>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 text-center">
        <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Pencarian Bayes <i class="bi bi-search"></i>  </h2>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

  
    <!-- ======= Call To Action Section ======= -->
    <section class="about pt-5 mt-5 mb-5">
    <div class="container" data-aos="fade-up">

  

<!-- <div class="row gy-4 text-white">
  <div class="col-lg-6">
    <select class="form-select p-3">
      <option selected class="fw-bolder">Pilih Pencarian</option>
      <option value="1">Pencarian Metode Bayes</option>
      <option value="2">Pencarian Biasa</option>
    </select>
  </div> -->
  <div class="row container mt-1">
      <?php if(isset($_POST['submit'])): ?>
        <div class="col-12 text-dark text-center">
          <div class="section-header">
                  <h2 class="">Hasil Rekomendasi ada <?= count($result)?> motor </h2>
          </div>
        </div>
        <?php  foreach($result as $data):?>
          
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                <div class="card-img">
                  <?php if($data['gambar'] == null) : ?>
                      <img src="assets/img/motor.png" alt="" class="" width="300" height="200">
                    <?php else :?>
                      <img src="assets/img/data/<?=$data['gambar']?>" alt="" class="" width="300" height="200">
                  <?php endif?>
                </div>
                <div class="p-3"> 
                  <h4 class="mb-0 "><?=$data['alternatif']?></h4>
                  <h5 class="text-dark"> ✅ Hasil perhitungan   <?= round($data['hasil'],6)?>  </h5>
                  <div class="">
                  <div class="">
            <?php
          if ($_SESSION != null ){
            if ($_SESSION['role'] == '3') {
                echo '
                <form action="keranjang" class="d-inline-flex" method="POST"> 
                  <input type="hidden" value="'. $data["id_motor"].'" name="id">
                  <button type="submit" class="btn btn-success" name="submit">  <i class="bi bi-bag-fill"></i> Pesan </button>
                </form>
                ';
              }else{
                echo ' <button data-bs-toggle="modal" data-bs-target="#role" class="btn btn-success">  <i class="bi bi-bag-fill"></i> Pesan </button>';
              }
            
            }else{
              echo' <button data-bs-toggle="modal" data-bs-target="#role" class="btn btn-success">  <i class="bi bi-bag-fill"></i> Pesan </button>';
            }?>
             
              <a href="detail?id=<?php echo($data["id_motor"]); ?>" class="btn btn-primary">  <i class="bi bi-eye-fill"></i> Detail </a>
            </div>
                  </div>
                </div>
            
              </div>
            </div><!-- End Card Item -->
        <?php endforeach?>
        <?php else:?>
      <?php endif?>
 </div>

<div class="row container mt-5">
  <div class="col-6 text-dark">
    <form action="" method="post">
    <div class="col-12 ">
          <div class="mb-3">
            <h3>Pencarian Metode Bayes</h3>
          </div>
       </div>
      <div class="col-12 ">
          <div class="mb-3">
                <label for="t_badan" class="form-label ">BB Pengguna</label>
                <div class="input-group">
                     <select class="form-select" name="bb_batas" id="bb_batas">
                        <option value=">">></option>
                        <option value="<"><</option>
                      </select>
                    <input type="text" name="bb_pengguna" onkeydown="return isIntegerKey(event)" placeholder="" data-set=""  class="form-control">
                </div>
          </div>
       </div>
       <div class="col-12 ">
          <div class="mb-3">
                <label for="cc_motor" class="form-label ">CC Motor</label>
                <div class="input-group">
                     <select class="form-select" name="cc_motor" id="cc_motor">
                          <?php  foreach($cc as $c):?>
                            <option value="<?= $c['cc_motor']?>"><?= $c['cc_motor']?> CC</option>
                          <?php endforeach ?>
                      </select>
                </div>
          </div>
       </div>
       <div class="col-12 ">
          <div class="mb-3">
                <label for="k_maksimal" class="form-label ">Kecepatan Maksimal</label>
                <div class="input-group">
                     <select class="form-select" name="k_maksimal" id="k_maksimal">
                          <?php  foreach($kecepatan as $k):?>
                            <option value="<?= $k['k_maksimal']?>"><?= $k['k_maksimal']?> kmph</option>
                          <?php endforeach ?>
                      </select>
                </div>
          </div>
       </div>

       <div class="col-12 ">
          <div class="mb-3">
                <label for="k_tengki" class="form-label ">Kapasitas Tengki</label>
                <div class="input-group">
                     <select class="form-select" name="k_tengki" id="k_tengki">
                          <?php  foreach($tengki as $t):?>
                            <option value="<?= $t['k_tengki']?>"><?= $t['k_tengki']?> Liter</option>
                          <?php endforeach ?>
                      </select>
                </div>
          </div>
       </div>
                            
          <div class="mb-3">
                <label for="t_badan" class="form-label ">Harga</label>
                <div class="input-group">
                    <input type="text"   name="harga" onkeydown="return isIntegerKey(event)" placeholder="" data-set=""  class="form-control">
                     <span class="input-group-text">-</span>
                    <input type="text"   name="harga_batas" onkeydown="return isIntegerKey(event)" placeholder="" data-set=""  class="form-control">
                </div>
          </div>

       <div class="mb-3">
                <label for="t_badan" class="form-label ">Jarak</label>
                <div class="input-group">
                    <input type="text"   name="jarak_awal" onkeydown="return isIntegerKey(event)" placeholder="" data-set=""  class="form-control">
                     <span class="input-group-text">-</span>
                    <input type="text"   name="jarak_akhir" onkeydown="return isIntegerKey(event)" placeholder="" data-set=""  class="form-control">
                </div>
          </div>
       
       
       <div class="col-12 ">
          <div class="mb-3">
                <label for="t_badan" class="form-label ">Tinggi Badan</label>
                <div class="input-group">
                     <select class="form-select" name="tinggi_badan_batas" id="tinggi_badan_batas">
                        <option value=">">></option>
                        <option value="<"><</option>
                      </select>
                    <input type="text" name="tinggi_badan" onkeydown="return isIntegerKey(event)" placeholder="" data-set=""  class="form-control">
                </div>
          </div>
       </div>
       <div class="col-12">
                    <div class="mb-3">
                      <label for="kondisi_jalan" class="form-label">Kondisi Jalan</label>
                      <select class="form-select" name="kondisi_jalan" id="kondisi_jalan">
                        <option value="rata">rata</option>
                        <option value="batu-batuan">batu-batuan</option>
                        <option value="tanjakan, turunan">tanjakan, turunan</option>
                      </select>
                    </div>
                </div>
                
    <button class="btn btn-primary px-5 m-3" name="submit" type="submit"> Cari </button>
    </form>
  </div>
</div>



  




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer mt-5">

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span> </span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="role" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body h1 text-center">
        <?php if ($_SESSION == null ): ?>
         Anda harus login terlebih dahulu !!
      
        <?php else :?>
          Tidak bisa melakukan pemesanan anda buka customer !!
        <?php endif?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
  const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
      function isIntegerKey(event) {
        // Mendapatkan kode tombol dari event
        var keyCode = event.which ? event.which : event.keyCode;
        
        // Tombol kunci yang diizinkan untuk angka (0-9) dan tombol khusus untuk navigasi dan menghapus (misalnya Backspace, Arrow keys)
        var allowedKeys = [8, 37, 39, 46]; // Backspace, Left Arrow, Right Arrow, Delete
        
        // Memeriksa apakah kode tombol tidak termasuk dalam daftar tombol yang diizinkan
        if ((keyCode < 48 || keyCode > 57) && !allowedKeys.includes(keyCode)) {
          // Mengembalikan false untuk mencegah karakter yang tidak valid dimasukkan
          return false;
        }
      }
</script>
</body>
