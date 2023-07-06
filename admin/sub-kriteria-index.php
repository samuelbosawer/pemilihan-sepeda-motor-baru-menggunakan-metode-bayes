
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 

  //  Get data kriteria
   $datas =mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` ORDER BY sub_kriteria.id_sub DESC ");
?>






  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sub Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="sub-kriteria-index">Sub Kriteria</a></li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
        <div class="col-12 p-3">
          <a href="sub-kriteria-add" class="btn btn-primary">Tambah Data Sub Kriteria</a>
        </div>
        <div class="col-12">
          <div class="table-responsive">
            <table id="myTable" class="table  table-hover table-bordered">
              <thead>
                <tr class="bg-dark text-white ">
                  <th scope="col">#</th>
                  <th scope="col">Kriteria</th>
                  <th scope="col">Range Atas</th>
                  <th scope="col">Range Bawah</th>
                  <th scope="col">Tingkat Kepercayaan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="">
                <?php $i = 0; foreach($datas as $data) : ?>
                <tr>
                  <th scope="row"><?= ++$i?></th>
                  <td><?= $data['nama_kriteria'] .' '. $data['kode_kriteria']?></td>
                  <td><?= $data['range_atas']?></td>
                  <td><?= $data['range_bawah']?></td>
                  <td><?= $data['tingkat_kepercayaan']?> </td>
                  <td>
                    <a href="sub-kriteria-edit?id=<?= $data['id_sub']?>" class="btn btn-success m-1 btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <a href="sub-kriteria-delete?id=<?= $data['id_sub']?>" class="btn btn-danger m-1 btn-sm"><i class="bi bi-trash-fill" onclick= "return confirm ('Anda yakin ingin hapus data ini ?')"></i></a>
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

