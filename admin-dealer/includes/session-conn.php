<?php
  session_start();

  if ($_SESSION != null ){
    if ($_SESSION['role'] == '3') {
      echo "
      <script>
          window.location.href = '../index';
       </script>
    ";
    };

    if ($_SESSION['role'] == '1') {
      echo "
      <script>
          window.location.href = '../admin/index';
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



$namaProgram = 'Sistem Pendukung Keputusan Pemilihan Sepeda Motor Baru Menggunakan Metode Bayes';
$dealer = $_SESSION['dealer'];
$halaman = basename($_SERVER['PHP_SELF']);

// DATABASE
$servername = "localhost";
$username = "root";
$password = "";
$db = "ema";
// $nameproject ='medical';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query); 
	$rows = []; 
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]=$row;
	}
	return $rows;
}



function add_motor($data,$table,$file)
{
  
	global $conn;

   //DATA GAMBAR
   $gambar = $file['gambar']['name'];
   $tmp_file_gambar  = $file['gambar']['tmp_name'];

  // Menghasilkan nama baru untuk file
  $timestamp = time();
  $ekstensiGambar = pathinfo($gambar, PATHINFO_EXTENSION); // Mendapatkan ekstensi file
  $namaBaru = $timestamp.'-m.'.$ekstensiGambar;

  $jenis_motor = $data['jenis_motor'];
  $class = $data['class'];
  $alternatif = $data['alternatif'];
  
  $harga = $data['harga'];
  $id_motor = $data['id_motor'];
  $gambar = $namaBaru;
  $pathFoto = "../assets/img/data/".$namaBaru;
    if(move_uploaded_file($tmp_file_gambar, $pathFoto) ){
      $query = "INSERT INTO `$table` (`id_motor`, `jenis_motor`, `class`, `alternatif`, `harga`,`gambar`)  VALUES ('$id_motor', '$jenis_motor', '$class', '$alternatif','$harga', '$gambar')";
    
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
    }
}


function edit_motor($data,$table,$file,$id)
{
 	global $conn;
   
  $class = $data['class'];
  $alternatif = $data['alternatif'];
  $harga = $data['harga'];
  $timestamp = time();
  
  if(strlen($file['gambar']["name"]) !== '')
  {
    $get = "SELECT * FROM motor where id_motor = '$id' ";
    $get_img = mysqli_query($conn,$get);
    $motor = mysqli_fetch_all($get_img, MYSQLI_ASSOC);

    
      $gambar_lama = $motor[0]['gambar'];
      $delete = "../assets/img/data/".$gambar_lama;
      if(file_exists($delete))
      {
        unlink($delete);
        $nama_file = $file['gambar']['name'];
        $tmp_file  = $file['gambar']['tmp_name'];
        $ekstensiGambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan ekstensi file
        $namaBaru = $timestamp.'-m.'.$ekstensiGambar;
        $path = "../assets/img/data/".$namaBaru;
        move_uploaded_file($tmp_file, $path);

        $query = "UPDATE `motor` SET 
        `gambar` = '$namaBaru', 
        `class` = '$class', 
        `alternatif` = '$alternatif',
        `harga` = '$harga'
          WHERE `motor`.`id_motor` = '$id'; ";

      }else{
        $query = "UPDATE `motor` SET 
        `class` = '$class', 
        `alternatif` = '$alternatif',
         `harga` = '$harga'
          WHERE `motor`.`id_motor` = '$id'; ";
      }
  }else{
    $query = "UPDATE `motor` SET 
  `class` = '$class', 
  `alternatif` = '$alternatif',
   `harga` = '$harga'
    WHERE `motor`.`id_motor` = '$id'; ";
  }
  // var_dump($data);
  // var_dump($file['gambar']["name"]);
  // var_dump($id);
  var_dump($query);
    mysqli_query($conn,$query);
   return mysqli_affected_rows($conn);
}


function add_kriteria_motor($data, $table)
{
  global $conn;

  // Data POST
  $id_kriteria = $data['id_kriteria'];
  $range_atas = $data['range_atas'];
  $range_bawah = $data['range_bawah_select'];
  $id_kriteria_motor = $data['id_kriteria_motor'];
  $id_motor = $data['id_motor'];

  if($range_bawah === '-')
  {
    $range_bawah = $data['range_bawah'];
  }

 
   $query = "INSERT INTO $table (`id_kriteria_motor`, `range_bawah_m`,`range_atas_m`,`id_kriteria`,`id_motor`)  VALUES ('$id_kriteria_motor','$range_bawah','$range_atas','$id_kriteria','$id_motor')";
  
   
   mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function ubah_kriteria_motor($data,$table,$id)
{
  global $conn;
  
  // Data POST
  $id_kriteria = $data['id_kriteria'];
  $range_atas = $data['range_atas'];
  $range_bawah = $data['range_bawah_select'];

  if($range_bawah === '-')
  {
    $range_bawah = $data['range_bawah'];
  }

  $query = "UPDATE `$table` SET 
  `id_kriteria` = '$id_kriteria', 
  `range_atas_m` = '$range_atas', 
  `range_bawah_m` = '$range_bawah'
    WHERE `$table`.`id_kriteria_motor` = '$id'; ";
  
   
   mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
