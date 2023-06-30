
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 

   $id = $_GET['id'];

   if(isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan 
     if(edit_kriteria($_POST,'kriteria',$id)>0){
      echo "
        <script>  
          alert('Data kriteria berhasil diubah !!'); 
          window.location.href = 'kriteria-index';
        </script>
    
      ";
     }else{
      echo "
      <script>  
          alert('Data gagal diubah, harap diisi dengan benar !!'); 
          </script> 
        ";
     }
  }

  $datas =mysqli_query($conn,"SELECT * FROM kriteria WHERE id_kriteria = '$id'");



?>






  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="kriteria-index">Kriteria</a></li>
          <li class="breadcrumb-item active">Ubah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
        <div class="col-12 p-3">
          <h5>Tambah Data Kriteria</h5>
        </div>
        <form action="" method="POST">
            <?php foreach($datas as $data): ?>
                <div class="col-6">
                    <div class="col-12">
                        <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kriteria</label>
                        <input type="text"
                            class="form-control" name="nama_kriteria" id="nama" value=<?=$data['nama_kriteria']?> placeholder="masukan nama kriteria" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                        <label for="kode" class="form-label">Kode Kriteria</label>
                        <input type="text"
                            class="form-control" name="kode_kriteria" id="kode" value=<?=$data['kode_kriteria']?> placeholder="masukan kode kriteria" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success" type="submit" name="submit"> Simpan </button>
                    </div>
                </div>
            <?php endforeach?>
        </form>
      </div>
    </div>
    </section>

  </main><!-- End #main -->

 

  <?php
   include('includes/footer.php');
?>

