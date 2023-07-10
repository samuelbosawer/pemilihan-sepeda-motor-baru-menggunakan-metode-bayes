
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
   if(isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan 
     if(add_motor($_POST,'motor',$_FILES)>0){
      echo "
        <script>  
          alert('Data motor berhasil ditambahkan !!'); 
          window.location.href = 'motor-index';
        </script>
    
      ";
     }else{
      echo "
      <script>  
          alert('Data gagal ditambahkan, harap diisi dengan benar !!'); 
          </script> 
        ";
     }
  }

  
?>






  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Motor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="motor-index">Motor</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
        <div class="col-12 p-3">
          <h5>Tambah Data Motor</h5>
        </div>
        <form action="" method="POST"  enctype="multipart/form-data">
            <div class="col-8">
          
                  <div class="col-12">
                    <div class="mb-3">
                    <label for="jenis_motor" class="form-label">Jenis Motor</label>
                    <input type="text"
                        class="form-control" name="jenis_motor" value="<?= $dealer?>" readonly id="jenis_motor" placeholder="masukan jenis motor" required>
                    </div>
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Class Motor</label>
                    <select class="form-select " name="class" id="">
                      <option value="MATIC">MATIC</option>
                      <option value="CUB">CUB</option>
                      <option value="SPORT">SPORT</option>
                    </select>
                  </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="alternatif" class="form-label">Alternatif</label>
                    <input type="text"
                        class="form-control" name="alternatif" id="alternatif" placeholder="masukan alternatif" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Motor </label>
                    <input type="file"
                        class="form-control" name="gambar" id="gambar" placeholder="masukan nama jenis motor" required>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="mb-3">
                      <label for="harga" class="form-label">Harga</label>
                      <input type="text"  onkeydown="return isIntegerKey(event)" class="form-control" name="harga" id="harga"  required>
                    </div>
                </div>
              
                <?php
                 $idCek =mysqli_query($conn,"SELECT id_motor FROM motor ORDER BY RIGHT(id_motor,2) DESC ");
                 $id = mysqli_fetch_all($idCek, MYSQLI_ASSOC);
                 $idLama = $id[0]["id_motor"];
                 $id_motor="m-1";
                 if($idLama != null)
                 {
                  $idNew =   (int) substr($idLama, 2, 5);
                  ++$idNew;
                  $id_motor = 'm-'.$idNew;
                 }
                 echo ' <input type="hidden" value="'. $id_motor .'" name="id_motor">';
                
                 ?>
                <div class="col-12">
                    <button class="btn btn-success" type="submit" name="submit"> Simpan </button>
                </div>
            </div>
        </form>
      </div>
    </div>
    </section>
  </main><!-- End #main -->



  <?php
   include('includes/footer.php');
?>

