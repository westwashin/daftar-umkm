<?php
include "config.php";


 $email= $_POST["email"];
 $id_ktp =  $_POST["nik"];

  $query = mysqli_query($connection, "SELECT * FROM pengguna WHERE email = '$email' AND nik = '$id_ktp'");
  $data = mysqli_num_rows($query);

  if($data > 1) {
                                               
       echo '<script language="javascript">alert("Mohon Maaf Data Belum Didaftarkan"); document.location="register.php";</script>';
                                                
   }else{
   	$query = mysqli_query($connection, "UPDATE pengguna SET aktif='aktif' WHERE email = '$email' AND nik = '$id_ktp'");
   	echo '<script language="javascript">alert("Akun Berhasil Diaktifikasi"); document.location="login2.php";</script>';
   }
  ?>