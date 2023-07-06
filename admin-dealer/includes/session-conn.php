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
  $bb_pengguna = $data['bb_pengguna'];
  $bb_pengguna_batas = $data['bb_pengguna_batas'];
  $k_maksimal = $data['k_maksimal'];
  $k_tengki = $data['k_tengki'];
  $tinggi_badan = $data['tinggi_badan'];
  $tinggi_badan_batas = $data['tinggi_badan_batas'];
  $jarak_awal = $data['jarak_awal'];
  $jarak_akhir = $data['jarak_akhir'];
  $kondisi_jalan = $data['kondisi_jalan'];
  $harga = $data['harga'];
  $stok = $data['stok'];
  $cc_motor = $data['cc_motor'];
  $id_motor = $data['id_motor'];
  $gambar = $namaBaru;
  $pathFoto = "../assets/img/data/".$namaBaru;
    if(move_uploaded_file($tmp_file_gambar, $pathFoto) ){
      $query = "INSERT INTO `$table` (`id_motor`, `jenis_motor`, `class`, `alternatif`, `bb_pengguna`, `bb_pengguna_batas`, `k_maksimal`, `k_tengki`,`tinggi_badan`,`tinggi_badan_batas`,`jarak_awal`,`jarak_akhir`,`kondisi_jalan`,`harga`,`stok`,`gambar`,`cc_motor`)  VALUES ('$id_motor', '$jenis_motor', '$class', '$alternatif', '$bb_pengguna', '$bb_pengguna_batas', '$k_maksimal','$k_tengki','$tinggi_badan','$tinggi_badan_batas','$jarak_awal','$jarak_akhir','$kondisi_jalan','$harga', '$stok','$gambar','$cc_motor')";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
    }
    
   

}


function edit_motor($data,$table,$file,$id)
{
 	global $conn;
   
  $jenis_motor = $data['jenis_motor'];
  $class = $data['class'];
  $alternatif = $data['alternatif'];
  $bb_pengguna = $data['bb_pengguna'];
  $bb_pengguna_batas = $data['bb_pengguna_batas'];
  $k_maksimal = $data['k_maksimal'];
  $k_tengki = $data['k_tengki'];
  $tinggi_badan = $data['tinggi_badan'];
  $tinggi_badan_batas = $data['tinggi_badan_batas'];
  $jarak_awal = $data['jarak_awal'];
  $jarak_akhir = $data['jarak_akhir'];
  $kondisi_jalan = $data['kondisi_jalan'];
  $harga = $data['harga'];
  $stok = $data['stok'];
  $cc_motor = $data['cc_motor'];

  if(strlen($file['gambar']["name"]) > 0)
  {
    $get = "SELECT * FROM motor where id_motor = '$id' ";
    $get_img = mysqli_query($conn,$get);
    foreach($get_img as $img)
    {
      $gambar_lama = $img['gambar'];
      $delete = "../assets/img/data/".$gambar_lama;
      if(file_exists($delete))
      {
        unlink($delete);
        $nama_file = $file['gambar']['name'];
        $tmp_file  = $file['gambar']['tmp_name'];
        $path = "../assets/img/data/".$nama_file;
        move_uploaded_file($tmp_file, $path);

        $query = "UPDATE `motor` SET 
        `gambar` = '$nama_file', 
        `jenis_motor` = '$jenis_motor', 
        `class` = '$class', 
        `alternatif` = '$alternatif',
        `bb_pengguna` = '$bb_pengguna', 
        `bb_pengguna_batas` = '$bb_pengguna_batas',
        `k_maksimal` = '$k_maksimal',
        `k_tengki` = '$k_tengki',
        `tinggi_badan` = '$tinggi_badan', 
        `tinggi_badan_batas` = '$tinggi_badan_batas',
        `jarak_awal` = '$jarak_awal', 
        `jarak_akhir` = '$jarak_akhir', 
        `kondisi_jalan` = '$kondisi_jalan'
          WHERE `motor`.`id_motor` = '$id'; ";

      }
    }
  }else{
    $query = "UPDATE `motor` SET 
  `jenis_motor` = '$jenis_motor', 
  `class` = '$class', 
  `alternatif` = '$alternatif',
   `bb_pengguna` = '$bb_pengguna', 
   `bb_pengguna_batas` = '$bb_pengguna_batas',
   `k_maksimal` = '$k_maksimal',
   `k_tengki` = '$k_tengki',
   `tinggi_badan` = '$tinggi_badan', 
   `tinggi_badan_batas` = '$tinggi_badan_batas',
   `jarak_awal` = '$jarak_awal', 
   `jarak_akhir` = '$jarak_akhir', 
   `kondisi_jalan` = '$kondisi_jalan'
    WHERE `motor`.`id_motor` = '$id'; ";

  }

  
    mysqli_query($conn,$query);
   return mysqli_affected_rows($conn);
}
