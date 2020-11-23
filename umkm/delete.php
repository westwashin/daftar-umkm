          <?php
          session_start();
require_once "config.php";
 $nik           = ucfirst($_SESSION["nik"]);
          
            $connection->query("DELETE FROM nilai WHERE nim ='$nik'");
            echo alert("Berhasil!", "form.php");
          
          ?>