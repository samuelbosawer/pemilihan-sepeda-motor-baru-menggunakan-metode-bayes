
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
   $id = $_GET['id'];

   if(isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan 
     if(edit_motor($_POST,'motor',$_FILES,$id)>0){
      echo "
        <script>  
          alert('Data motor berhasil diubah !!'); 
          window.location.href = 'motor-index';
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

  $m =mysqli_query($conn,"SELECT * FROM motor WHERE id_motor = '$id' ");
  $motor = mysqli_fetch_all($m, MYSQLI_ASSOC);
  

  
?>






  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Motor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="motor-index">Motor</a></li>
          <li class="breadcrumb-item active">Ubah</li>
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
                        class="form-control" name="" value="<?= $dealer?>" readonly id="jenis_motor" placeholder="masukan jenis motor" required>
                    </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="" class="form-label">Class Motor</label>
                    <select class="form-select " name="class" id="">
                      <option value="<?=$motor[0]['class']?>"><?=$motor[0]['class']?></option>
                      <option value="MATIC">MATIC</option>
                      <option value="CUB">CUB</option>
                      <option value="SPORT">SPORT</option>
                    </select>
                  </div>
                  </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="alternatif" class="form-label">Alternatif</label>
                    <input type="text"
                        class="form-control" name="alternatif" id="alternatif" placeholder="masukan alternatif" value="<?=$motor[0]['alternatif']?>" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Motor </label>
                    <br>
                    <?php if($motor[0]['gambar'] == null) : ?>
                      <img src="../assets/img/motor.png" width="100" alt="" srcset="">
                      <?php else : ?>
                        <img src="../assets/img/data/<?=$motor[0]['gambar']?>" width="100" alt="" srcset="">
                    <?php endif; ?>
                    <input type="file"
                        class="form-control" name="gambar" id="gambar" placeholder="" >
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="mb-3">
                      <label for="harga" class="form-label">Harga</label>
                      <input type="text" value="<?=$motor[0]['harga']?>" onkeydown="return isIntegerKey(event)" class="form-control" name="harga" id="harga"  required>
                    </div>
                </div>
               
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

