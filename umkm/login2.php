<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "config.php";
    $sql = "SELECT * FROM pengguna WHERE username='$_POST[username]' AND aktif = 'aktif' AND password='" . md5($_POST['password']) . "'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
                $_SESSION["is_logged"] = true;
                $_SESSION["as"] = $data["status"];
                $_SESSION["username"] = $data["username"];
                $_SESSION["nik"] = $data["nik"];
                $_SESSION["nama_lengkap"] = $data["nama_lengkap"];
                $_SESSION["aktif"] = $data["aktif"];
              }
            header('location: dashboard.php');
        } else {
            echo alert("Username / Password tidak sesuai!", "login2.php");
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
    <title>َUMKM</title>
    <link rel="stylesheet" href="css/stylelogin.css">
  </head>
  <body>

<form class="box" action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
  <h1>Login</h1>
  <input type="text" name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" name="" value="Login">

  <div class="text-center">
      <a class="medium" style="color: white;" href="register.php">Haven't Account? Create</a>
  </div>
 <hr>
                        <div class="text-center">
                    <a class="medium" style="color: white;" href="lupa.php">Forgot Password?</a>
                  </div>
</form>




  </body>
</html>