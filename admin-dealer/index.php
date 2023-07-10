
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 

   $pemesanan     = "SELECT * FROM transaksi, motor WHERE transaksi.id_motor = motor.id_motor AND motor.jenis_motor = '$dealer' ";
   $lunas     = "SELECT * FROM transaksi, motor WHERE transaksi.id_motor = motor.id_motor AND motor.jenis_motor = '$dealer' AND transaksi.status_pemesanan = '1' ";
   $belumLunas     = "SELECT * FROM transaksi, motor WHERE transaksi.id_motor = motor.id_motor AND motor.jenis_motor = '$dealer' AND transaksi.status_pemesanan = '0' ";
   $motor   = "SELECT * FROM motor WHERE jenis_motor = '$dealer' ";

   $pemesanan     = mysqli_query($conn,$pemesanan);
   $motor   = mysqli_query($conn,$motor);
   $lunas   = mysqli_query($conn,$lunas);
   $belumLunas   = mysqli_query($conn,$belumLunas);

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
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Motor </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?= $motor->num_rows?> </h6>
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
                    <h5 class="card-title">Transaksi </h5>

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

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                  <div class="card-body">
                    <h5 class="card-title">Transaksi Lunas </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-menu-button-wide"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?= $lunas->num_rows?></h6>
                        <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                      </div>
                    </div>
                  </div>

              </div>

            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                  <div class="card-body">
                    <h5 class="card-title">Transaksi Belum Lunas </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-menu-button-wide"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?= $belumLunas->num_rows?></h6>
                        <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                      </div>
                    </div>
                  </div>

              </div>

            </div>

 

  <?php
   include('includes/footer.php');
?>

