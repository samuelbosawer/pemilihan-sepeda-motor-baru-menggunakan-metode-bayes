<?php 
require_once('conn.php');

//  var_dump($_POST);

//  Ambil data awal
$bb_pengguna        = $_POST['bb_pengguna'];
$bb_batas           = $_POST['bb_batas'];
$cc_motor           = $_POST['cc_motor'];
$k_maksimal         = $_POST['k_maksimal'];
$k_tengki           = $_POST['k_tengki'];
$harga              = $_POST['harga'];
$harga_batas        = $_POST['harga_batas'];
$jarak_awal         = $_POST['jarak_awal'];
$jarak_akhir        = $_POST['jarak_akhir'];
$kondisi_jalan      = $_POST['kondisi_jalan'];
$tinggi_badan       = $_POST['tinggi_badan'];
$tinggi_badan_batas = $_POST['tinggi_badan_batas'];

// Ambil data di database

// bb_pengguna
if($cc_motor == null)
{
    echo"
    <script>  
          alert('CC Motor tidak boleh kosong !! '); 
          window.location.href = 'pencarian';
          </script> 
  ";
  die;
}

if($bb_pengguna == null)
{
    $bb_pengguna = '';
}else{
    $bb_pengguna = 'AND bb_pengguna '.$bb_batas.'= '.$bb_pengguna; 
    
}

if($k_maksimal == null)
{
    $k_maksimal = '';
}else{
    $k_maksimal = 'AND k_maksimal >= '.$k_maksimal;
}

if($k_tengki == null)
{
    $k_tengki = '';
}else{
    $k_tengki = 'AND k_tengki >= '.$k_tengki;
}

if($harga == null)
{
    $harga = '';
}else{
    $harga = 'AND harga >= '.$harga;
}

if($harga_batas == null)
{
    $harga_batas = '';
}else{
    $harga_batas = 'AND harga <= '.$harga_batas;
}

if($tinggi_badan == null)
{
    $tinggi_badan = '';
}else{
    $tinggi_badan = 'AND harga '.$tinggi_badan_batas.'= '.$t_badan;
}

if($jarak_awal == null)
{
    $jarak_awal = '';
}else{
    $jarak_awal = 'AND jarak_awal  >= '.$jarak_awal;
}

if($jarak_akhir == null)
{
    $jarak_akhir = '';
}else{
    $jarak_akhir = 'AND jarak_akhir  >= '.$jarak_akhir;
}

if($kondisi_jalan == null)
{
    $kondisi_jalan = '';
}else{
    $kondisi_jalan = "AND kondisi_jalan  = "."'".$kondisi_jalan."'";
}

$datas = mysqli_query($conn,"SELECT * FROM motor WHERE  cc_motor <= $cc_motor $bb_pengguna   $k_maksimal $k_tengki $harga $harga_batas  $jarak_awal $jarak_akhir $tinggi_badan $kondisi_jalan");
$data = mysqli_fetch_all($datas, MYSQLI_ASSOC);

// Perhitungan berdasarkan kriteria 
$k =mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` ORDER BY sub_kriteria.id_sub DESC ");
$kr = mysqli_fetch_all($k, MYSQLI_ASSOC);

foreach($data as $motor)
{

    $bb_pengguna = $motor['bb_pengguna'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'kg' AND range_atas <= $bb_pengguna ");
    foreach($k as $kriteria)
    {
        $motor['bb_pengguna'] = $kriteria['tingkat_kepercayaan'];
    }


    $cc_motor = $motor['cc_motor'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'CC' AND range_atas = $cc_motor ");
    foreach($k as $kriteria)
    {
        $motor['cc_motor'] = $kriteria['tingkat_kepercayaan'];
    }

    $k_maksimal = $motor['k_maksimal'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'kmph' AND range_atas <= $k_maksimal AND range_bawah >= $k_maksimal ");
    foreach($k as $kriteria)
    {
        $motor['k_maksimal'] = $kriteria['tingkat_kepercayaan'];
    }

    $k_tengki = $motor['k_tengki'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'liter' AND range_atas <= $k_tengki AND range_bawah >= $k_tengki ");
    foreach($k as $kriteria)
    {
        $motor['k_tengki'] = $kriteria['tingkat_kepercayaan'];
    }

    $harga = $motor['harga'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'Rp' AND range_atas <= $harga AND range_bawah >= $harga ");
    foreach($k as $kriteria)
    {
        $motor['harga'] = $kriteria['tingkat_kepercayaan'];
    }

    $tinggi_badan = $motor['tinggi_badan'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'CM' AND range_atas > $tinggi_badan ");
    foreach($k as $kriteria)
    {
        $motor['tinggi_badan'] = $kriteria['tingkat_kepercayaan'];
    }

    $tinggi_badan = $motor['tinggi_badan'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'CM' AND range_atas < $tinggi_badan ");
    foreach($k as $kriteria)
    {
        $motor['tinggi_badan'] = $kriteria['tingkat_kepercayaan'];
    }

    $jarak_awal = $motor['jarak_awal'];
    $jarak_akhir = $motor['jarak_akhir'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria` AND satuan = 'km/jam' AND range_atas >= $jarak_awal AND range_bawah <= $jarak_akhir ");
    foreach($k as $kriteria)
    {
        $motor['jarak_awal'] = $kriteria['tingkat_kepercayaan'];
        $motor['jarak_akhir'] = $kriteria['tingkat_kepercayaan'];
    }

    $kondisi_jalan = $motor['kondisi_jalan'];
    $k = mysqli_query($conn,"SELECT * FROM `sub_kriteria`,`kriteria` WHERE `sub_kriteria`.`id_kriteria` = `kriteria`.`id_kriteria`  AND  range_bawah = '$kondisi_jalan' ");
    foreach($k as $kriteria)
    {
        $motor['kondisi_jalan'] = $kriteria['tingkat_kepercayaan'];
    }
    $konversi[] = $motor;

}


// Perhitungan
$k =mysqli_query($conn,"SELECT * FROM `kriteria` ");
$kr = mysqli_fetch_all($k, MYSQLI_ASSOC);

$countKonversi = count($konversi);
$countKriteria = count($kr);

foreach($konversi as $hitung)
{
    $h1 = 1 - $hitung['bb_pengguna'];
    $h2 = 1 - $hitung['cc_motor'];
    $h3 = 1 - $hitung['k_maksimal'];
    $h4 = 1 - $hitung['k_tengki'];
    $h5 = 1 - $hitung['harga'];
    $h6 = 1 - $hitung['tinggi_badan'];
    $h7 = 1 - $hitung['jarak_awal'];
    $h8 = 1 - $hitung['kondisi_jalan'];
    $kk = $countKriteria/$countKonversi;
    $x = ($hitung['bb_pengguna'] * $hitung['cc_motor'] * $hitung['k_maksimal'] * $hitung['k_tengki'] * $hitung['harga'] * $hitung['tinggi_badan'] *  $hitung['jarak_awal'] * $hitung['kondisi_jalan'] * $kk);

    $y = ($h1 * $h2 * $h3 * $h3 * $h4 * $h5 * $h6 * $h7 * $h8 * $kk);

    $tambah = $x + $y ;
    $hasil = $x/$tambah;
    $hitung['hasil'] = $hasil;
    
    $result[] = $hitung;
}












