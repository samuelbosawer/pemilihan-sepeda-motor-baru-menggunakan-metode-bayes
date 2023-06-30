
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
   if(isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan 
     if(add_sub_kriteria($_POST,'sub_kriteria')>0){
      echo "
        <script>  
          alert('Data sub kriteria berhasil ditambahkan !!'); 
          document.location.href = 'sub-kriteria-index';
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
  $datas =mysqli_query($conn,"SELECT * FROM kriteria ORDER BY id_kriteria DESC");

  
?>






  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sub Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="sub-kriteria-index">Sub Kriteria</a></li>
          <li class="breadcrumb-item active">Tambah</li>
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
                      <?php foreach($datas as $data): ?>
                        <option value="<?= $data["id_kriteria"]?>"><?= $data['nama_kriteria'].' ('.$data['kode_kriteria'] .')'?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                    <div class="mb-3">
                    <label for="nama_sub_kriteria" class="form-label">Nama Sub Kriteria</label>
                    <input type="text"
                        class="form-control" name="nama_sub_kriteria" id="nama_sub_kriteria" placeholder="masukan nama sub kriteria" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="range_atas" class="form-label">Range Atas</label>
                    <input type="number"
                        class="form-control" name="range_atas" id="range_atas" placeholder="masukan range atas" required>
                    </div>
                </div>

                <div class="col-12">
                  <div class="mb-3">
                    <label for="range_bawah_select" class="form-label">Range Bawah</label>
                    <select class="form-select " name="range_bawah_select" id="range_bawah_select" required >
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
                    <input type="number" class="form-control" placeholder="masukan tingkat kepercayaan" name="tingkat_kepercayaan" id="tingkat_kepercayaan" required>
                    <span class="input-group-text">%</span>
                  </div>
                </div>
                <?php 
                
                $idCek =mysqli_query($conn,"SELECT id_sub FROM sub_kriteria ORDER BY id_sub DESC LIMIT 1");
                $id_sub = 'sk-1';
                foreach($idCek as $id)
                {
                  
              
                  if($id['id_sub'] == null)
                  {
                    $id_sub = 'sk-1';
                  }else{
                    $idTerbaru = $id['id_sub'];
                    $idNew =   (int) substr($idTerbaru, 3, 5);
                    ++$idNew;
                 
                    $id_sub = 'sk-'.$idNew;
                  }
                
               
                echo ' <input type="hidden" value="'. $id_sub .'" name="id_sub">';
              
                }
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

