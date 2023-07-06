
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
  
   $id = $_GET['id'];
   $motor =mysqli_query($conn,"SELECT * FROM `motor` WHERE `id_motor` = '$id' ");
   $data = mysqli_fetch_all($motor, MYSQLI_ASSOC);


?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Motor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="motor-index">Motor</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
        
        <div class="col-12">
        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <?php if($data[0]['gambar'] == null) : ?>
                <img src="../assets/img/motor.png" alt="" class="">
              <?php else :?>
                <img src="../assets/img/data/<?=$data[0]['gambar']?>" alt="" class="">
            <?php endif?>
            <br>
           
            <!-- <div class="col-6 bg-success text-center rounded-5 d-line mt-5">
                <div class="text-white h5 p-3">  </div>
            </div> -->
            <div class="col-5 bg-success text-center rounded-5 d-line">
                
            </div>
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h2 class=""><?= $data[0]['alternatif']?></h2> 
            <h3 class=""><?= $data[0]['jenis_motor']?> <?= $data[0]['class']?> </h3>
            
            <p class="" style="text-align: justify;">
              <div class="table-responsive">
              <table id="" class="table  table-hover table-borderless ">
                <thead>
                  <tr class="">
                    <td>Berat Badan pengguna  </td>
                    <td> <?= $data[0]['bb_pengguna_batas'] .' '.$data[0]['bb_pengguna']?> </td>
                  </tr>
                  <tr class="">
                    <td>CC Motor  </td>
                    <td> <?= $data[0]['cc_motor'] ?> </td>
                  </tr>
                  <tr class="">
                    <td>Kecepatan Maksimal  </td>
                    <td> <?= $data[0]['k_maksimal'] ?> KM/PH </td>
                  </tr>
                  <tr class="">
                    <td>Kapasitas Tengki  </td>
                    <td> <?= $data[0]['k_tengki'] ?> Liter </td>
                  </tr>
                  <tr class="">
                    <td>Tinggi badan  </td>
                    <td>  <?= $data[0]['tinggi_badan_batas'] ?> <?= $data[0]['tinggi_badan'] ?> CM </td>
                  </tr>
                  <tr class="">
                    <td>Jarak  </td>
                    <td>  <?= $data[0]['jarak_awal'] ?> -  <?= $data[0]['jarak_akhir'] ?> M </td>
                  </tr>
                  <tr class="">
                    <td>Kondisi Jalan  </td>
                    <td>  <?= $data[0]['kondisi_jalan'] ?> </td>
                  </tr>
                  <tr class="">
                    <td>Harga</td>
                    <td>  Rp. <?= number_format($data[0]['harga'],0,',','.') ?> </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                    <a href="motor-edit?id=<?= $data[0]['id_motor']?>" class="btn btn-success "><i class="bi bi-pencil-fill"></i></a>
                    <a href="motor-delete?id=<?= $data[0]['id_motor']?>" class="btn btn-danger "><i class="bi bi-trash-fill" onclick= "return confirm ('Anda yakin ingin hapus data ini ?')"></i></a>    
                  </td>
                  </tr>
                </thead>
              </table>
             
            </div>
            </p>
          </div>
          
          
        </div>
        </div>
      </div>
    </div>
    </section>

  </main><!-- End #main -->

 

  <?php
   include('includes/footer.php');
?>

