
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 

  //  Get data kriteria
   $datas =mysqli_query($conn,"SELECT * FROM kriteria ORDER BY id_kriteria DESC");
?>






  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="kriteria-index">Kriteria</a></li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
        <div class="col-12 p-3">
          <a href="kriteria-add" class="btn btn-primary">Tambah Data Kriteria</a>
        </div>
        <div class="col-12">
          <div class="table-responsive">
            <table id="myTable" class="table  table-hover table-bordered">
              <thead>
                <tr class="bg-dark text-white ">
                  <th scope="col">#</th>
                  <th scope="col">Nama Kriteria</th>
                  <th scope="col">Kode Kriteria</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="">
                <?php $i = 0; foreach($datas as $data) :?>
                <tr>
                  <th scope="row"><?= ++$i?></th>
                  <td><?= $data['nama_kriteria']?></td>
                  <td><?= $data['kode_kriteria']?></td>
                  <td>
                    <a href="kriteria-edit?id=<?= $data['id_kriteria']?>" class="btn btn-success m-2"><i class="bi bi-pencil-fill"></i></a>
                    <a href="kriteria-delete?id=<?= $data['id_kriteria']?>" class="btn btn-danger m-2"><i class="bi bi-trash-fill" onclick= "return confirm ('Anda yakin ingin hapus data ini ?')"></i></a>
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

