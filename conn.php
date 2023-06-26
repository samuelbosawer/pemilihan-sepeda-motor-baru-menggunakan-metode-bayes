<?php

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

// Register
function register($data, $table, $file){
	global $conn;

  //DATA FILES
  $fileKtp = $file['ktp']['name'];
  $tmp_file_ktp  = $file['ktp']['tmp_name'];

  $filefoto = $file['foto']['name'];
  $tmp_file_foto  = $file['foto']['tmp_name'];

  //Menghasilkan nama baru untuk file
  $timestamp = time();
  $ekstensiGambar = pathinfo($fileKtp, PATHINFO_EXTENSION); // Mendapatkan ekstensi file
  $namaBaruKtp = $timestamp.'-ktp.'.$ekstensiGambar;

  $timestamp = time();
  $ekstensiGambar = pathinfo($filefoto, PATHINFO_EXTENSION); // Mendapatkan ekstensi file
  $namaBaruFoto = $timestamp.'-foto.'.$ekstensiGambar;

  // Data POST
  $nama_depan = $data['nama_depan'];
  $nama_belakang = $data['nama_belakang'];
  $email = $data['email'];
  $distrik = $data['distrik'];
  $kelurahan = $data['kelurahan'];
  $jalan = $data['jalan'];
  $ktp = $namaBaruKtp;
  $foto = $namaBaruFoto;
  $password = $data['password'];
  $konformasiPassword = $data['konformasiPassword'];    
  $status = '0';    

  // Buat Id 
  $idCek =mysqli_query($conn,"SELECT id_pendaftaran FROM pendaftaran ORDER BY id_pendaftaran DESC");
  foreach($idCek as $id)
  {
    if($id['id_pendaftaran'] == null)
    {
      $id_pendaftaran = 'p-1';
    }else{
      $idTerbaru = $id['id_pendaftaran'];
      $id =   (int) substr($idTerbaru, 2, 5);
      $id++;
      $id_pendaftaran = 'p-'.$id;
    }
  }

  $cekEmail =mysqli_query($conn,"SELECT email FROM pendaftaran WHERE email = '$email'");
  foreach($cekEmail as $ce)
  {
    if($ce['email'] != null)
    {
        echo"
        <script>  
          alert('Email sudah terdaftar !! '); 
          window.location.href = 'register';
          </script> 

        ";
        die;
    }
  }
  if($password === $konformasiPassword)
  {
    $pathFoto = "assets/img/data/".$namaBaruFoto;
    $pathKtp = "assets/img/data/".$namaBaruKtp;
    // query insert data 
    if(move_uploaded_file($tmp_file_foto, $pathFoto) && move_uploaded_file($tmp_file_ktp, $pathKtp)){

      $query = "INSERT INTO $table (`id_pendaftaran`, `nama_depan`, `nama_belakang`, `email`, `ktp`, `alamat_distrik`, `alamat_kelurahan`, `alamat_jalan`,`password`,`foto`,`status`)  VALUES ('$id_pendaftaran', '$nama_depan', '$nama_belakang', '$email', '$ktp', '$distrik', '$kelurahan','$jalan','$password','$foto','$status')";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
    }
  
   
  }else{
    echo"
    <script>  
          alert('Password tidak sama !! '); 
          window.location.href = 'register';
          </script> 
  ";
  die;

  }

 
    
  };
