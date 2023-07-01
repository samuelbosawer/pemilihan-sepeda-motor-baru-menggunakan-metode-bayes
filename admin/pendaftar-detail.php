
<?php
   require_once('includes/session-conn.php');
   include('includes/header.php');
   include('includes/sidebar.php'); 
  
   $id = $_GET['id'];
   $pendaftar =mysqli_query($conn,"SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id' ");
   $data = mysqli_fetch_all($pendaftar, MYSQLI_ASSOC);


   if(isset($_POST["submit"])){
    // Cek apakah data berhasil diubah 
     if(aktifkan($_POST,'pendaftaran',$id)>0){
      echo "
        <script>  
          alert('Status berhasil diubah !!'); 
          document.location.href = 'pendaftar-index';
        </script>
    
      ";
     }else{
      echo "
      <script>  
          alert('Status gagal diubah !!'); 
          </script> 
        ";
     }
  }
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Pendaftar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pendaftar-index">Pendaftar</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="container">
      <div class="row">
        
        <div class="col-12">
          <div class="table-responsive">
            <table id="" class="table  table-hover table-borderless ">
              <thead>
                <tr class="">
                  <th scope="col">Nama Lengkap</th>
                  <td><?= $data[0]['nama_depan'] .' '.$data[0]['nama_belakang']?></td>
                </tr>
                <tr class="">
                  <th scope="col">Email</th>
                  <td><?= $data[0]['email']?></td>
                </tr>
                <tr class="">
                  <th scope="col">Alamat</th>
                  <td><?= $data[0]['alamat_jalan'].' '.$data[0]['alamat_kelurahan'].' '.$data[0]['alamat_distrik']?></td>
                </tr>
                <tr class="">
                  <th scope="col">Foto</th>
                  <td>
                        <?php if($data[0]['foto'] == null): ?>
                        <img src="../assets/img/person.png" width="200" alt="foto" srcset="">
                        <?php else : ?>
                        <img src="../assets/img/data/<?= $data[0]['foto']?>" width="200" alt="foto" srcset="">
                        <?php endif; ?>
                    </td>
                </tr>
                <tr class="">
                  <th scope="col">KTP</th>
                  <td class="">
                        <?php if($data[0]['ktp'] == null): ?>
                        <img src="../assets/img/ktp.png" width="200" alt="ktp" srcset="">
                        <p>Belum Ada</p>
                        <?php else : ?>
                        <img src="../assets/img/data/<?= $data[0]['ktp']?>" width="200" alt="ktp" srcset="">
                        <?php endif; ?>
                    </td>
                </tr>
                <tr class="">
                  <td colspan="2" class="text-center mt-5">
                    <?php  if($data[0]['status'] == 0): ?>
                        <form action="" method="post">
                            <input type="hidden" name="status" value="1">
                            <button type="submit" name="submit" class="btn btn-success">Aktifkan Akun</button>
                        </form>
                             <?php elseif($data[0]['status'] == 1): ?>
                            <form action="" method="post">
                                <input type="hidden" name="status" value="0">
                                <button type="submit" name="submit" class="btn btn-danger">Non aktifkan Akun</button>
                            </form>
                    <?php endif; ?>
                    </td>
                </tr>
              </thead>
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

