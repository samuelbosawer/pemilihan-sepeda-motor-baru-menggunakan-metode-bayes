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
  $kode_kriteria = $data['kode_kriteria'];

  if(strlen($kode_kriteria)<2 )
  {
    echo "
      <script>
          alert('kode kriteria menimal 2 karakter')
          window.location.href = 'kriteria-add';
       </script>
    ";
    die;
  }

  // Buat Id 
  $idCek =mysqli_query($conn,"SELECT id_kriteria FROM kriteria ORDER BY id_kriteria DESC");
  $id_kriteria ='';
  foreach($idCek as $id)
  {
    

    if($id['id_kriteria'] == null)
    {
      $id_kriteria = 'k-1';
    }else{
      $idTerbaru = $id['id_kriteria'];
      $idNew =   (int) substr($idTerbaru, 2, 5);
      ++$idNew;
   
      $id_kriteria = 'k-'.$idNew;
      
    }
    $query = "INSERT INTO $table (`id_kriteria`, `nama_kriteria`, `kode_kriteria`)  VALUES ('$id_kriteria', '$nama_kriteria', '$kode_kriteria')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
  }
}

function edit_kriteria($data, $table, $id)
{
    global $conn;
    // Data POST
    $nama_kriteria = $data['nama_kriteria'];
    $kode_kriteria = $data['kode_kriteria'];
    if(strlen($kode_kriteria)<2 )
      {
        echo "
          <script>
              alert('kode kriteria menimal 2 karakter')
              window.location.href = 'kriteria-edit?id=".$id.";
          </script>
        ";
        die;
      }
    $query = "UPDATE `$table` SET `nama_kriteria` = '$nama_kriteria', `kode_kriteria` = '$kode_kriteria' WHERE `id_kriteria` = '$id';";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}



// ADD SUB KRITERIA
function add_sub_kriteria($data, $table){
	global $conn;

  // Data POST
  $id_kriteria = $data['id_kriteria'];
  $nama_sub_kriteria = $data['nama_sub_kriteria'];
  $range_atas = $data['range_atas'];
  $range_bawah = $data['range_bawah_select'];
  $tingkat_kepercayaan = $data['tingkat_kepercayaan'];
  $id_sub = $data['id_sub'];

  if($range_bawah === '-')
  {
    $range_bawah = $data['range_bawah'];
  }

  $satuan = $data['satuan'];

  
 
   $query = "INSERT INTO $table (`id_sub`, `nama_sub_kriteria`, `range_atas`,`range_bawah`,`id_kriteria`,`satuan`,`tingkat_kepercayaan`)  VALUES ('$id_sub', '$nama_sub_kriteria', '$range_atas','$range_bawah','$id_kriteria','$satuan','$tingkat_kepercayaan')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

// EDIT SUB KRITERIA
function edit_sub_kriteria($data, $table, $id)
{
	global $conn;

    // Data POST
    $id_kriteria = $data['id_kriteria'];
    $nama_sub_kriteria = $data['nama_sub_kriteria'];
    $range_atas = $data['range_atas'];
    $range_bawah = $data['range_bawah_select'];
    $tingkat_kepercayaan = $data['tingkat_kepercayaan'];

    $query = "UPDATE `$table` SET `id_kriteria` = '$id_kriteria', `nama_sub_kriteria` = '$nama_sub_kriteria',  `range_atas` = '$range_atas', `range_bawah` = '$range_bawah', `tingkat_kepercayaan` = $tingkat_kepercayaan WHERE `id_sub` = '$id'";

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
      

  
