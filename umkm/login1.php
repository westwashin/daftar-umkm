<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "config.php";
    $sql = "SELECT * FROM pengguna WHERE username='$_POST[username]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
                $_SESSION["is_logged"] = true;
                $_SESSION["as"] = $data["status"];
                $_SESSION["username"] = $data["username"];
              }
            header('location: index.php');
        } else {
            echo alert("Username / Password tidak sesuai!", "login.php");
        }
    } else {
        echo "Query error!";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َAnimated Login Form</title>
    <link rel="stylesheet" href="css/stylelogin.css">
  </head>
  <body>

<form class="box"> action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
  <h1>Login</h1>
  <input type="text" name="" placeholder="Username">
  <input type="password" name="" placeholder="Password">
  <input type="submit" name="" value="Login">
</form>


  </body>
</html>
