
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
   $id = $_GET['id'];
   $idMotor = $id;
  
  $kriteria =mysqli_query($conn,"SELECT * FROM kriteria ORDER BY id_kriteria DESC");
  $datas =mysqli_query($conn,"SELECT * FROM `motor`,`kriteria_motor` WHERE motor.id_motor = kriteria_motor.id_motor AND kriteria_motor.id_kriteria_motor = '$id'  ");
  $motor = mysqli_fetch_all($datas, MYSQLI_ASSOC);


  if(isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan 
     if(ubah_kriteria_motor($_POST,'kriteria_motor', $id)>0){
      echo "
        <script>  
          alert('Data kriteria berhasil diubah !!'); 
          document.location.href = 'motor-kriteria?id=".$motor[0]['id_motor']."';
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
  
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1> Kriteria Motor <?=$motor[0]['alternatif']?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="motor-kriteria?id=<?=$motor[0]['id_motor']?>"> Kriteria Motor </a></li>
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
                      <?php foreach($kriteria as $k): ?>
                        <?php if($k['id_kriteria'] == $motor[0]['id_kriteria'] ) :?>
                           <option selected value="<?= $k["id_kriteria"]?>"><?= $k['nama_kriteria']?></option>
                        <?php else :?>
                           <option value="<?= $k["id_kriteria"]?>"><?= $k['nama_kriteria']?></option>
                        <?php endif?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                    <label for="range_atas" class="form-label">Range Atas</label>
                    <input type=""
                        class="form-control" onkeydown="return isIntegerKey(event)" value="<?= $motor[0]['range_atas_m'] ?>" name="range_atas" id="range_atas" placeholder="masukan range atas" required>
                    </div>
                </div>

                <div class="col-12">
                  <div class="mb-3">
                    <label for="range_bawah_select" class="form-label">Range Bawah</label>
                    <select class="form-select " name="range_bawah_select" id="range_bawah_select" required >
                      <option value="<?= $motor[0]['range_bawah_m'] ?>"><?= $motor[0]['range_bawah_m'] ?></option>
                      <option value=">">></option>
                      <option value="<"><</option>
                      <option value="-">-</option>
                      <option value="rata">rata</option>
                      <option value="tanjakan, turunan">tanjakan, turunan</option>
                      <option value="batu-batuan">batu-batuan</option>
                      <option value=""> Tidak ada </option>
                    </select>
                  </div>
                </div>
                <div id='nilai'></div>


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
                        class="form-control" onkeydown="return isIntegerKey(event)" name="range_bawah" id="range_bawah" placeholder="masukan nilai range bawah" required>
                    </div>
                </div>
            `;
      // elsei(selectedValue === '-')
      // {

      // }
      }else{
        document.getElementById("nilai").innerHTML = ` `;
      }
   
  });
           
 </script>

  <?php
   include('includes/footer.php');
?>

