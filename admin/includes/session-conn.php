<?php
  session_start();
  require_once('../conn.php');
  if ($_SESSION != null ){
    if ($_SESSION['role'] == '3') {
      echo "
      <script>
          window.location.href = '../index';
       </script>
    ";
    };
  }else{
    echo "
    <script>
        window.location.href = '../login';
     </script>
  ";
  }
