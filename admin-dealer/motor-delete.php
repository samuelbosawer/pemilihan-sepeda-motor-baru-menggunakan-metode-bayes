
<?php
   require_once('includes/session-conn.php');
   $id = $_GET['id'];
   $get = "SELECT * FROM motor where id_motor = '$id' ";
   $get_img = mysqli_query($conn,$get);
    $motor = mysqli_fetch_all($get_img, MYSQLI_ASSOC);

   $gambar_lama = $motor[0]['gambar'];
   $delete = "../assets/img/data/".$gambar_lama;
   if(file_exists($delete))
   {
     unlink($delete);
   }
   $sql = "DELETE FROM `motor` WHERE `motor`.`id_motor` = '$id'";
   $contributors = mysqli_query($conn, $sql);
 
      echo "
        <script>  
          alert('Data motor berhasil dihapus !!'); 
          document.location.href = 'motor-index';
        </script>
    
      ";

   


  
