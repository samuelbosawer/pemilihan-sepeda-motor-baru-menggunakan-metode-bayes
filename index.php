<?php
session_start();
require_once('conn.php');

$datas = mysqli_query($conn,"SELECT * FROM motor ORDER BY RAND()");

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

   <!-- SWEETALERT -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
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
          <li><a href="#" class="active">Beranda</a></li>
          <li><a href="#tentang" class="active">Tentang Kami</a></li>
          <li><a href="#produk" class="active">Produk</a></li>
          <li><a href="pencarian.php" class="active">Pencarian Bayes</a></li>
        </ul>
      </nav><!-- .navbar -->
      <div class="justify-content-right">
        <?php
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
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Sistem Pendukung Keputusan </h2>
          <h3 data-aos="fade-up" data-aos-delay="100"> Pemilihan Sepeda Motor Baru Menggunakan Metode Bayes</h3>
          <a href="pencarian.php" data-aos="fade-up" data-aos-delay="200" class="btn btn-primary p-3 btn-lg fw-bolder">Mulai Pencarian <i class="bi bi-search"></i> </a>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <div class="mt-5 pb-5" id="tentang"></div>
    <section class="about pt-5 mt-5 mb-5">
      <div class="container" data-aos="fade-up p-5">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> -->
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3 class="">TENTANG KAMI</h3>
            <p class="" style="text-align: justify;">
                Seiring perkembangan teknologi di bidang informatika kami turut membantu dalam pengembangan sistem pendukung keputusan untuk pemilihan sepeda motor Honda, Yamaha, dan Kawasaki untuk memudahkan costumer dalam menetukan pilihan sesuai dengan kriteria yang diinginkan oleh costumer, serta dapat memesan motor yang sesuai dengan kriteria yang dibutuhkan tanpa harus datang langsung kedealer.
            </p>
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                 <i class="bi bi-search"></i>
                <div>
                  <h5>Metode Bayes</h5>
                  <p>Untuk membantu pencarian yang sesuai dengan kriteria kami menggunakan metode bayes</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

  
    <div class="mt-5 pb-5" id="produk"></div>
    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action" style="color:white">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h1 class="text-white ">PRODUK</h1>
    </div>

    <div class="row gy-4 text-white">
    <?php foreach($datas as $data):?>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card">
          <div class="card-img">
            <?php if($data['gambar'] == null) : ?>
                <img width="300" height="200" src="assets/img/motor.png" alt="" class="">
              <?php else :?>
                <img width="300" height="200" src="assets/img/data/<?=$data['gambar']?>" alt="" class="">
            <?php endif?>
          </div>
          <div class="p-3"> 
            <h4 class="mb-0"><?=$data['alternatif']?></h4>
            <h5 class="text-dark">  <?=$data['jenis_motor']?> Rp. <?= number_format($data['harga'],0,',','.') ?>  </h5>
            <p class="text-dark"> 
              BB:<?=$data['bb_pengguna']?>  <?=$data['bb_pengguna_batas']?>, 
              CC:<?=$data['cc_motor']?> ,
              KM:<?=$data['k_maksimal']?>, 
              KT:<?=$data['k_tengki']?>, 
              TB:<?=$data['tinggi_badan']?>, 
              J:<?=$data['jarak_awal']?> m - <?=$data['jarak_akhir']?> m, 
                <?=$data['kondisi_jalan']?> 
          </p>
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
      </div><!-- End Card Item -->
    <?php endforeach?>

</div>

</div>

  </main><!-- End #main -->

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
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

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

</body>
