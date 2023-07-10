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

    if ($_SESSION['role'] == '2') {
      echo "
      <script>
          window.location.href = '../admin-dealer/index';
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


$halaman = basename($_SERVER['PHP_SELF']);
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


// ADD KRITERIA
function add_kriteria($data, $table){
	global $conn;

  // Data POST
  $nama_kriteria = $data['nama_kriteria'];
  $id_kriteria = $data['id_kriteria'];

  
    $query = "INSERT INTO $table (`id_kriteria`, `nama_kriteria`)  VALUES ('$id_kriteria', '$nama_kriteria')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function edit_kriteria($data, $table, $id)
{
    global $conn;
    // Data POST
    $nama_kriteria = $data['nama_kriteria'];
    
    $query = "UPDATE `$table` SET `nama_kriteria` = '$nama_kriteria' WHERE `id_kriteria` = '$id';";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}



// ADD SUB KRITERIA
function add_sub_kriteria($data, $table){
	global $conn;

  // Data POST
  $id_kriteria = $data['id_kriteria'];
  $range_atas = $data['range_atas'];
  $range_bawah = $data['range_bawah_select'];
  $tingkat_kepercayaan = $data['tingkat_kepercayaan'];
  $id_sub = $data['id_sub'];

  if($range_bawah === '-')
  {
    $range_bawah = $data['range_bawah'];
  }

  $satuan = $data['satuan'];

  
 
   $query = "INSERT INTO $table (`id_sub`, `range_atas`,`range_bawah`,`id_kriteria`,`satuan`,`tingkat_kepercayaan`)  VALUES ('$id_sub','$range_atas','$range_bawah','$id_kriteria','$satuan','$tingkat_kepercayaan')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

// EDIT SUB KRITERIA
function edit_sub_kriteria($data, $table, $id)
{
	global $conn;

    // Data POST
    $id_kriteria = $data['id_kriteria'];
    $range_atas = $data['range_atas'];
    $range_bawah = $data['range_bawah_select'];
    $tingkat_kepercayaan = $data['tingkat_kepercayaan'];
    if($range_bawah === '-')
  {
    $range_bawah = $data['range_bawah'];
  }
    $query = "UPDATE `$table` SET `id_kriteria` = '$id_kriteria', `range_atas` = '$range_atas', `range_bawah` = '$range_bawah', `tingkat_kepercayaan` = $tingkat_kepercayaan WHERE `id_sub` = '$id'";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

}


function aktifkan($data, $table, $id)
{
  global $conn;
  $status = $data['status'];
  $query = "UPDATE `$table` SET `status` = '$status' WHERE `id_pendaftaran` = '$id' ";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);
}
      

  
