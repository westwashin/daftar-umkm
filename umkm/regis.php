<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َVerifikasi Akun</title>
    <link rel="stylesheet" href="css/stylelogin.css">
  </head>
  <body>
<?php
  $email= $_GET["email"];
 $nik =  $_GET["id_ktp"];
              
              ?>     

<form class="box" action="verifregis.php" method="POST">
  <h1>Registrasi AKun</h1>
  <input type="hidden" name="email" value="<?= $email ?>">
  <input type="hidden" name="nik" value="<?= $nik ?>">
  <input type="submit" name="" value="Verifikasi">
</form>




  </body>
</html>