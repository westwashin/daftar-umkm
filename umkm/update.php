          <?php
require_once "config.php";
          if (isset($_GET['action']) AND $_GET['action'] == 'update') {
            $connection->query("UPDATE nilai SET status='4' WHERE nim='$_GET[key]'");
            echo alert("Berhasil!", "dashboard.php?page=umkm&beasiswa=$_GET[masuk]");
          }
          ?>