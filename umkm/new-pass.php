<?php

include "config.php";

if(isset($_POST["new_pass"])){

    $email = $_POST["email"];


    $pass = md5($_POST["password"]);


    $query = mysqli_query($connection, "UPDATE pengguna SET password = '$pass' WHERE email = '$email'");

    if($query){

                mysqli_query($connection, "DELETE FROM reset_password WHERE email = '$email'");

    }

   echo '<script language="javascript">alert("Password Berhasil Diupdate"); document.location="login2.php";</script>';
        
       

}

 ?>