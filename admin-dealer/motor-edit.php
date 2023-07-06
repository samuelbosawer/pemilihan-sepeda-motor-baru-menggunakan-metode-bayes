
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
                    <label for="" class="form-label">Jenis Motor</label>
                    <select class="form-select " name="jenis_motor" id="">
                      <option value="<?=$motor[0]['jenis_motor']?>"><?=$motor[0]['jenis_motor']?></option>
                      <option value="HONDA">HONDA</option>
                      <option value="YAMAHA">YAMAHA</option>
                      <option value="KAWASAKI">KAWASAKI</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Class Motor</label>
                    <select class="form-select " name="class" id="">
                      <option value="<?=$motor[0]['class']?>"><?=$motor[0]['class']?></option>
                      <option value="MATIC">MATIC</option>
                      <option value="CUB">CUB</option>
                      <option value="SPORT">SPORT</option>
                    </select>
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
                        class="form-control" name="gambar" id="gambar" placeholder="masukan nama jenis motor" >
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                      <div class="input-group">
                        <span class="input-group-text">Berat badan pengguna </span>
                        <select class="form-select " name="bb_pengguna_batas" id="bb_pengguna_batas" required  >
                            <option value="<?=$motor[0]['bb_pengguna_batas']?>"><?=$motor[0]['bb_pengguna_batas']?></option>
                            <option value=">">></option>
                            <option value="<"><</option>
                          </select>
                        <input type="text"  value="<?=$motor[0]['bb_pengguna']?>"  name="bb_pengguna" onkeydown="return isIntegerKey(event)" placeholder="" required  class="form-control">
                      </div>
                    </div>
                </div>



                <div class="col-12">
                    <div class="mb-3">
                    <label for="cc_motor" class="form-label">CC Motor</label>
                    <input type="text"
                        class="form-control"  value="<?=$motor[0]['cc_motor']?>" name="cc_motor" id="cc_motor" placeholder="" onkeydown="return isIntegerKey(event)" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                      <label for="k_maksimal" class="form-label">Kecepatan Maksimal</label>
                      <input type="text"  value="<?=$motor[0]['k_maksimal']?>" onkeydown="return isIntegerKey(event)" class="form-control" name="k_maksimal" id="k_maksimal"  required>
                    </div>
                </div>
                          <div class="col-12">
                    <div class="mb-3">
                      <label for="k_tengki" class="form-label">Kapasitas Tengki</label>
                      <input type="number"  value="<?=$motor[0]['k_tengki']?>" class="form-control" onkeydown="return isIntegerKey(event)" name="k_tengki" id="k_tengki"  required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                      <div class="input-group">
                        <span class="input-group-text">Tinggi badan </span>
                        <select class="form-select " name="tinggi_badan_batas" id="tinggi_badan_batas" required  >
                            <option value="<?=$motor[0]['tinggi_badan_batas']?>"><?=$motor[0]['tinggi_badan_batas']?></option>
                            <option value=">">></option>
                            <option value="<"><</option>
                          </select>
                        <input type="text"    value="<?=$motor[0]['tinggi_badan']?>" name="tinggi_badan" onkeydown="return isIntegerKey(event)" placeholder="" required  class="form-control">
                         
                      </div>
                    </div>
                </div>



                <div class="col-12">
                    <div class="mb-3">
                      <div class="input-group">
                        <span class="input-group-text">Jarak</span>
                        <input type="text" value="<?=$motor[0]['jarak_awal']?>"   name="jarak_awal" onkeydown="return isIntegerKey(event)" placeholder="" required  class="form-control">
                        <span class="input-group-text">-</span>
                        <input type="text"   name="jarak_akhir"  value="<?=$motor[0]['jarak_akhir']?>" onkeydown="return isIntegerKey(event)" placeholder="" required  class="form-control">
                      </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="mb-3">
                      <label for="kondisi_jalan" class="form-label">Kondisi Jalan</label>
                      <select class="form-select" name="kondisi_jalan" id="kondisi_jalan">
                        <option value="<?=$motor[0]['kondisi_jalan']?>"><?=$motor[0]['kondisi_jalan']?></option>
                        <option value="rata">rata</option>
                        <option value="batu-batuan">batu-batuan</option>
                        <option value="tanjakan, turunan">tanjakan, turunan</option>
                      </select>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="mb-3">
                      <label for="harga" class="form-label">Harga</label>
                      <input type="text" value="<?=$motor[0]['harga']?>" onkeydown="return isIntegerKey(event)" class="form-control" name="harga" id="harga"  required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                      <label for="stok" class="form-label">stok</label>
                      <input type="text" value="<?=$motor[0]['stok']?>" onkeydown="return isIntegerKey(event)" class="form-control" name="stok" id="stok" required>
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

