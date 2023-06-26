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
          <li><a href="pencarian.php" class="active">Pencarian</a></li>
     
        </ul>
      </nav><!-- .navbar -->
      <div class="justify-content-right">
        <a href="login" class="btn btn-primary ml-5">Masuk</a>
        <a href="register" class="btn btn-primary ml-5">Daftar</a>
      </div>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 text-center">
        <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Pencarian <i class="bi bi-search"></i>  </h2>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

  
    <!-- ======= Call To Action Section ======= -->
    <section class="about pt-5 mt-5 mb-5">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h1 class="">PRODUK</h1>
    </div>

<div class="row gy-4 text-white">
  <div class="col-lg-6">
    <select class="form-select p-3">
      <option selected class="fw-bolder">Pilih Pencarian</option>
      <option value="1">Pencarian Metode Bayes</option>
      <option value="2">Pencarian Biasa</option>
    </select>
  </div>

<div class="col-12">
</div>

  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="card">
      <div class="card-img">
        <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
      </div>
      <div class="p-3"> 
        <h3 class="mb-0"><a href="service-details" class="stretched-link text-dark ">Honda</a></h3>
        <p class="text-dark">Cumque eos in qui numquam. Aut aspernatur perferendis sed atque quia voluptas quisquam repellendus temporibus itaqueofficiis odit</p>
        <div class="">
          <a href="" class="btn btn-success">  <i class="bi bi-bag-fill"></i> Pesan </a>
        </div>
      </div>
   
    </div>
  </div><!-- End Card Item -->

  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="card">
      <div class="card-img">
        <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
      </div>
      <div class="p-3"> 
        <h3 class="mb-0"><a href="service-details" class="stretched-link text-dark ">Honda</a></h3>
        <p class="text-dark">Cumque eos in qui numquam. Aut aspernatur perferendis sed atque quia voluptas quisquam repellendus temporibus itaqueofficiis odit</p>
        <div class="">
          <a href="" class="btn btn-success">  <i class="bi bi-bag-fill"></i> Pesan </a>
        </div>
      </div>
   
    </div>
  </div><!-- End Card Item -->


  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="card">
      <div class="card-img">
        <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
      </div>
      <div class="p-3"> 
        <h3 class="mb-0"><a href="service-details" class="stretched-link text-dark ">Honda</a></h3>
        <p class="text-dark">Cumque eos in qui numquam. Aut aspernatur perferendis sed atque quia voluptas quisquam repellendus temporibus itaqueofficiis odit</p>
        <div class="">
          <a href="" class="btn btn-success">  <i class="bi bi-bag-fill"></i> Pesan </a>
        </div>
      </div>
   
    </div>
  </div><!-- End Card Item -->


  


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
