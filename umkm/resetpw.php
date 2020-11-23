<?php
 include "config.php";

  if(!isset($_GET["reset_pass"])){

    exit("Can't find page");

  }

  $code = $_GET["reset_pass"];

  $query = mysqli_query($connection, "SELECT email FROM reset_password WHERE code = '$code' ");

  if(mysqli_num_rows($query)==0){

    exit("Can't find page");

  }

  $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َReset Password</title>
    <link rel="stylesheet" href="css/stylelogin.css">
  </head>
  <body>

<form class="box" action="new-pass.php" method="POST">
  <h1>Reset Password</h1>
  <input type="password" name="password" placeholder="Masukkan password">
  <input type="hidden" value="<?php echo $row["email"]?>" name="email">
  <input type="submit" name="new_pass" value="Reset">


</form>




  </body>
</html>
