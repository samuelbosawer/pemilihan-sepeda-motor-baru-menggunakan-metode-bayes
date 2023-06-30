
<?php
   require_once('includes/session-conn.php');
   $id = $_GET['id'];
   $sql = "DELETE FROM `kriteria` WHERE `kriteria`.`id_kriteria` = '$id'";
   $contributors = mysqli_query($conn, $sql);
 
      echo "
        <script>  
          alert('Data kriteria berhasil dihapus !!'); 
          document.location.href = 'kriteria-index';
        </script>
    
      ";
   


  
