
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 

    //    SELECT *
    // FROM tabel1
    // JOIN tabel2 ON tabel1.id = tabel2.tabel1_id
    // JOIN tabel3 ON tabel2.id = tabel3.tabel2_id;

   $datas = mysqli_query($conn,"SELECT * FROM motor");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Motor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="motor-index">Motor</a></li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
      <div class="col-12 p-3">
          <a href="motor-add" class="btn btn-primary">Tambah Data Motor</a>
        </div>
        <div class="col-12">
          <div class="table-responsive">
            <table id="myTable" class="table  table-hover table-bordered">
              <thead>
                <tr class="bg-dark text-white ">
                  <th scope="col">#</th>

                  <th scope="col">Gambar</th>

                  <th scope="col">Jenis</th>
                  <th scope="col">Class</th>

                  <th scope="col">Alternatif</th> 

                  <th scope="col">Stok</th> 
                    
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="">
                <?php $i = 0; foreach($datas as $data) : ?>
                <tr>
                  <th scope="row"><?= ++$i?></th>
                  <td> 
                    <?php if($data['gambar'] == null) : ?>
                      <img src="../assets/img/motor.png" width="100" alt="" srcset="">
                      <?php else : ?>
                        <img src="../assets/img/data/<?=$data['gambar']?>" width="100" alt="" srcset="">
                    <?php endif; ?>
                  </td>

                  <td><?= $data['jenis_motor']?></td>
                  <td><?= $data['class']?></td>

                  <td><?= $data['alternatif']?></td>

                  <td><?= $data['stok'] ?></td>

                  <td>
                    <a href="pendaftar-detail?id=<?= $data['id_motor'] ?>" class="btn btn-primary m-2"><i class="bi bi-eye-fill"></i></a>
                    <a href="pendaftar-edit?id=?id=<?= $data['id_motor']?>" class="btn btn-success m-2"><i class="bi bi-pencil-fill"></i></a>
                    <a href="pendaftar-delete?id=?id=<?= $data['id_motor']?>" class="btn btn-danger m-2"><i class="bi bi-trash-fill"></i></a>
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

