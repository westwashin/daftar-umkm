<?php
include "config.php";
// Jenis Browser
$browser = $_SERVER['HTTP_USER_AGENT'];
$chrome = '/Chrome/';
$firefox = '/Firefox/';
$ie = '/IE/';
if (preg_match($chrome, $browser))
    $data = "Chrome/Opera";
if (preg_match($firefox, $browser))
    $data = "Firefox";
if (preg_match($ie, $browser))
    $data = "IE";
 
// untuk mengambil informasi dari pengunjung
$ipaddress = $_SERVER['REMOTE_ADDR']."";
$browser = $data;
$tanggal = date('Y-m-d');
$kunjungan = 1;
// Daftarkan Kedalam Session Lalu Simpan Ke Database
if (!isset($_SESSION['counterdb'])){
$_SESSION['counterdb']=$ipaddress;
mysqli_query($connection,"INSERT INTO counterdb (tanggal,ip_address,counter,browser) VALUES ('".$tanggal."','".$ipaddress."','".$kunjungan."','".$browser."')");
} 
// Hitung Jumlah Visitor
$kemarin  = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
$hari_ini  = mysqli_fetch_array(mysqli_query($connection,'SELECT sum(counter) AS hari_ini FROM counterdb WHERE tanggal="'.date("Y-m-d").'"'));
$kemarin = mysqli_fetch_array(mysqli_query($connection,'SELECT sum(counter) AS kemarin FROM counterdb WHERE tanggal="'.$kemarin.'"'));
$sql = mysqli_fetch_array(mysqli_query($connection,'SELECT sum(counter) as total FROM counterdb'));
?>


