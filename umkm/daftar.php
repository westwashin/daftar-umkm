<?php
include "config.php";


 $no= $_POST["no"];
 $id_ktp =  $_POST["nim"];

 $bank= $_POST["bank"];
 $nama =  $_POST["nama"];
  $query = mysqli_query($connection, "SELECT * FROM rek WHERE nik = '$id_ktp'");
  $data = mysqli_num_rows($query);

  if($data > 1) {
                                               
       echo '<script language="javascript">alert("Mohon Maaf Rekening Telah didaftarkan"); document.location="register.php";</script>';
                                                
   }else{
   	$query = mysqli_query($connection, "INSERT INTO rek VALUES ( '$id_ktp', NULL, '$no', '$nama', '$bank')");
   	echo '<script language="javascript">alert("Rekening Berhasil Didaftarkan"); document.location="pembayaran.php";</script>';
   }
  ?>