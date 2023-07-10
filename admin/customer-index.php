
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
  
   $datas =mysqli_query($conn,"SELECT * FROM pendaftaran WHERE role = '3' ORDER BY id_pendaftaran DESC");

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="customer-index">Customer</a></li>
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
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Foto</th> 
                  <th scope="col">Status</th> 
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="">
                <?php $i = 0; foreach($datas as $data) : ?>
                <tr>
                  <th scope="row"><?= ++$i?></th>
                  <td><?= $data['nama_depan'] .' '. $data['nama_belakang']?></td>
                  <td><?= $data['email']?></td>
                  <td>
                    <?php if($data['foto'] == null): ?>
                      <img src="../assets/img/person.png" width="50" alt="foto" srcset="">
                    <?php else : ?>
                      <img src="../assets/img/data/<?= $data['foto']?>" width="50" alt="foto" srcset="">
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if($data['status'] == 0): ?>
                        <a href="#" class="btn btn-warning">Akun belum di aktifkan</a>
                     <?php elseif($data['status'] == 1): ?>
                        <a href="#" class="btn btn-success">Akun sudah di aktifkan</a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <!-- <a href="sub-kriteria-edit?id=<?= $data['id_pendaftaran']?>" class="btn btn-success m-2"><i class="bi bi-pencil-fill"></i></a> -->
                    <a href="pendaftar-detail?id=<?= $data['id_pendaftaran']?>" class="btn btn-primary m-2"><i class="bi bi-eye-fill"></i></a>
                    <!-- <a href="sub-kriteria-?id=<?= $data['id_pendaftaran']?>" class="btn btn-danger m-2"><i class="bi bi-trash-fill" onclick= "return confirm ('Anda yakin ingin hapus data ini ?')"></i></a> -->
                  </td>
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

