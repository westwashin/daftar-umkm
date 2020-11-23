<?php
require_once "config.php";
          if (isset($_GET['action']) AND $_GET['action'] == 'pilih') {
            $connection->query("UPDATE nilai SET status='2' WHERE nim='$_GET[key]'");
            echo alert("Berhasil Dipilih!", "dashboard.php?page=perhitungan&kategori=6");
          }
          ?>
