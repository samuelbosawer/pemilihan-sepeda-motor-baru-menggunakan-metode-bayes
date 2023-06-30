
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 

//    SELECT *
// FROM tabel1
// JOIN tabel2 ON tabel1.id = tabel2.tabel1_id
// JOIN tabel3 ON tabel2.id = tabel3.tabel2_id;

   $datas = mysqli_query($conn,"SELECT * FROM pemesanan JOIN motor ON pemesanan.id_motor = motor.id_motor JOIN pendaftaran ON pendaftaran.id_pendaftaran = pemesanan.id_pendaftaran");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pemesana</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pemesanan-index">Pemesanan</a></li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
        
        <div class="col-12">
          <div class="table-responsive">
            <table id="myTable" class="table  table-hover table-bordered">
              <thead>
                <tr class="bg-dark text-white ">
                  <th scope="col">#</th>
                  <th scope="col">Nama Pemesan</th>
                  <th scope="col">Nama Motor</th>
                  <th scope="col">Stok</th> 
                  <th scope="col">Status</th> 
                  <!-- <th scope="col">Aksi</th> -->
                </tr>
              </thead>
              <tbody class="">
                <?php $i = 0; foreach($datas as $data) : ?>
                <tr>
                  <th scope="row"><?= ++$i?></th>
                  <td><?= $data['nama_depan'] .' '. $data['nama_belakang']?></td>
                  <td><?= $data['nama_motor']?></td>
                  <td><?= $data['stok_pemesanan']?></td>
                  <td>
                    <?php if($data['status_pemesanan'] == 0): ?>
                        <a href="#" class="btn btn-warning">Belum Bayar</a>
                     <?php elseif($data['status_pemesanan'] == 1): ?>
                        <a href="#" class="btn btn-warning">Sudah Chekout</a>
                      <?php elseif($data['status_pemesanan'] == 2): ?>
                        <a href="#" class="btn btn-warning">Sudah Bayar</a>
                    <?php endif; ?>
                  </td>
                  <!-- <td> -->
                    <!-- <a href="sub-kriteria-edit?id=<?= $data['id_pendaftaran']?>" class="btn btn-success m-2"><i class="bi bi-pencil-fill"></i></a> -->
                    <!-- <a href="pendaftar-detail?id=<?= $data['id_pendaftaran']?>" class="btn btn-primary m-2"><i class="bi bi-eye-fill"></i></a> -->
                    <!-- <a href="sub-kriteria-?id=<?= $data['id_pendaftaran']?>" class="btn btn-danger m-2"><i class="bi bi-trash-fill" onclick= "return confirm ('Anda yakin ingin hapus data ini ?')"></i></a> -->
                  <!-- </td> -->
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </section>

  </main><!-- End #main -->

 

  <?php
   include('includes/footer.php');
?>

