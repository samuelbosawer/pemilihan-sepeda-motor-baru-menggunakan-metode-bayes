
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
   $id = $_GET['id'];

   if(isset($_POST["submit"])){
    // Cek apakah data berhasil diubah 
     if(edit_sub_kriteria($_POST,'sub_kriteria',$id)>0){
      echo "
        <script>  
          alert('Data sub kriteria berhasil diubah !!'); 
          document.location.href = 'sub-kriteria-index';
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
  $datas =mysqli_query($conn,"SELECT * FROM kriteria ORDER BY id_kriteria DESC");
  $sk =mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND `sub_kriteria`.`id_sub` = '$id' ");
  $sub_kriteria = mysqli_fetch_all($sk, MYSQLI_ASSOC);
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sub Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="sub-kriteria-index">Sub Kriteria</a></li>
          <li class="breadcrumb-item active">Ubah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <div class="container">
      <div class="row">
        <div class="col-12 p-3">
          <h5>Tambah Data Sub Kriteria</h5>
        </div>
        <form action="" method="POST">
            <div class="col-6">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="id_kriteria" class="form-label">Kriteria</label>
                    <select class="form-select" name="id_kriteria" id="id_kriteria" require="">
                      <?php foreach($datas as $data): 
                        if($data['id_kriteria'] == $sub_kriteria[0]['id_kriteria']):
                        ?>
                        <option selected value="<?= $data["id_kriteria"]?>"><?= $data['nama_kriteria'].' ('.$data['kode_kriteria'] .')'?></option>
                        <?php else :?>
                        
                        <option value="<?= $data["id_kriteria"]?>"><?= $data['nama_kriteria'].' ('.$data['kode_kriteria'] .')'?></option>
                      <?php
                    endif;
                    endforeach; ?>
                    </select>
                  </div>
                    <div class="mb-3">
                    <label for="nama_sub_kriteria" class="form-label">Nama Sub Kriteria</label>
                    <input type="text"
                        class="form-control" value="<?= $sub_kriteria[0]['nama_sub_kriteria']?>" name="nama_sub_kriteria" id="nama_sub_kriteria" placeholder="masukan nama sub kriteria" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="range_atas" class="form-label">Range Atas</label>
                    <input type="number"
                        class="form-control"  value="<?= $sub_kriteria[0]['range_atas']?>" name="range_atas" id="range_atas" placeholder="masukan range atas" required>
                    </div>
                </div>

                <div class="col-12">
                  <div class="mb-3">
                    <label for="range_bawah_select" class="form-label">Range Bawah</label>
                    <select class="form-select " name="range_bawah_select" id="range_bawah_select" required >
                      <option value="<?= $sub_kriteria[0]['range_bawah']?>"><?= $sub_kriteria[0]['range_bawah']?></option>
                      <option value=">">></option>
                      <option value="<"><</option>
                      <option value="-">-</option>
                    </select>
                  </div>
                </div>
                <div id='nilai'></div>


                <div class="col-12">
                  <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <select class="form-select " name="satuan" id="satuan" >
                      <option value="<?= $sub_kriteria[0]['satuan']?>"><?= $sub_kriteria[0]['satuan']?></option>
                      <option value="kg">kg</option>
                      <option value="kmph">kmph</option>
                      <option value="CC">CC</option>
                      <option value="liter">liter</option>
                      <option value="juta">juta</option>
                      <option value="juta">juta</option>
                      <option value="km/jam">km/jam</option>
                      <option value="rata">rata</option>
                      <option value="tanjakan, turunan">tanjakan, turunan</option>
                      <option value="batu-batuan">batu-batuan</option>
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <label class="mb-1" for="tingkat_kepercayaan" class="form-label">Tingkat Kepercayaan</label>
                  <div class="input-group mb-3">
                    <input type="number" class="form-control" value="<?= $sub_kriteria[0]['tingkat_kepercayaan']?>" placeholder="masukan tingkat kepercayaan" name="tingkat_kepercayaan" id="tingkat_kepercayaan" required>
                    <span class="input-group-text">%</span>
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

 <script>
  // Mengambil elemen select
  var selectElement = document.getElementById("range_bawah_select");

  // Menambahkan event listener untuk perubahan
  selectElement.addEventListener("change", function() {
    // Mengambil nilai terpilih
    var selectedValue = selectElement.value;
      if(selectedValue === '-')
      {
        document.getElementById("nilai").innerHTML = `
            <div class="col-12">
                    <div class="mb-3">
                    <label for="range_bawah" class="form-label">Masukan Nilai Range Bawah</label>
                    <input type="number"
                        class="form-control" name="range_bawah" id="range_bawah" placeholder="masukan nilai range bawah" required>
                    </div>
                </div>
            `;
      }else{
        document.getElementById("nilai").innerHTML = ` `;
      }
   
  });
           
 </script>

  <?php
   include('includes/footer.php');
?>

