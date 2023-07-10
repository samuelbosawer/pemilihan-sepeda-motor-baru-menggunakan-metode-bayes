
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 

   $pemesanan     = "SELECT * FROM pemesanan ";
   $kriteria      = "SELECT * FROM kriteria ";
   $pendaftaran   = "SELECT * FROM pendaftaran ";
   $sub_kriteria  = "SELECT * FROM sub_kriteria ";

   $sub_kriteria  = mysqli_query($conn,$sub_kriteria);
   $pemesanan     = mysqli_query($conn,$pemesanan);
   $kriteria      = mysqli_query($conn,$kriteria);
   $pendaftaran   = mysqli_query($conn,$pendaftaran);

   $cek_akun  = "SELECT * FROM pendaftaran WHERE status = '0' AND email != 'admin@gmail.com' ";
   $cek_akun   = mysqli_query($conn,$cek_akun);


 
  ?>






  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> -->
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- <?php var_dump($_SESSION)?> -->
        <?php if($cek_akun->num_rows >0) : ?>
          <div class="col-lg-12">
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong> Ada <?=$cek_akun->num_rows?> </strong> yang belum diaktikan !!
                <a class="fw-bolder" href="pendaftar-index">Aktifkan sekarang !!</a>
              </div>
          </div>
        
        <script>
          var alertList = document.querySelectorAll('.alert');
          alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
          })
        </script>

        <?php endif ?>
     
        
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Customer </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?= $pendaftaran->num_rows?> </h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Dealer </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?= $pendaftaran->num_rows?> </h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->



             <!-- Sales Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Kriteria </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-menu-button-wide"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?= $kriteria->num_rows ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

               <!-- Sales Card -->
               <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Sub Kriteria </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-menu-button-wide"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?= $sub_kriteria->num_rows?> </h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

               <!-- Sales Card -->
               <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pemesanan </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-menu-button-wide"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $pemesanan->num_rows?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div>

 
        </div>
  <?php
   include('includes/footer.php');
?>

