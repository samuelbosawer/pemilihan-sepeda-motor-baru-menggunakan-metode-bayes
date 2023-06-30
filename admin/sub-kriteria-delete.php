
<?php
   require_once('includes/session-conn.php');
   $id = $_GET['id'];
   $sql = "DELETE FROM `sub_kriteria` WHERE `sub_kriteria`.`id_sub` = '$id'";
   $contributors = mysqli_query($conn, $sql);
 
      echo "
        <script>  
          alert('Data kriteria berhasil dihapus !!'); 
          document.location.href = 'sub-kriteria-index';
        </script>
    
      ";
   


  
