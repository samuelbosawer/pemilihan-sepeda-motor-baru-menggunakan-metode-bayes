
<?php
   require_once('includes/session-conn.php');
   $id = $_GET['id'];
   $get = "SELECT * FROM kriteria_motor where id_kriteria_motor = '$id' ";
   $motor = mysqli_query($conn, $get);
   $motor = mysqli_fetch_all($motor, MYSQLI_ASSOC);
 
   $sql = "DELETE FROM kriteria_motor where id_kriteria_motor = '$id' ";
   $contributors = mysqli_query($conn, $sql);
 
      echo "
        <script>  
          alert('Data motor berhasil dihapus !!'); 
          document.location.href = 'motor-kriteria?id=".$motor[0]['id_motor']."';
        </script>
    
      ";

   


  
