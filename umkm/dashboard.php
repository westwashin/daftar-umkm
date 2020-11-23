<?php
session_start();
include "fungsi.php"; 
require_once "config.php";

if (!isset($_SESSION["is_logged"])) {
  header('location: login2.php');
}
?>

<?php 
                if ($_SESSION["as"] == 'petugas') {
                  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMKM</title>
    
   
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.chained.min.js"></script>
    
    <style>
        .dropdown{
            font-size: 15px;
        }
        
    </style>
</head>
<body>
    
         <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">UMKM <sup>Merdeka</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?page=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Input</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="?page=kategori">Kategori</a>
                        <a class="collapse-item" href="?page=kriteria">Kriteria</a>
                        <a class="collapse-item" href="?page=model">Model</a>
                        <a class="collapse-item" href="?page=penilaian">Penilaian</a>
                       

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Hasil</span>
                </a>

                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Custom Utilities:</h6>
                         <?php $query = $connection->query("SELECT * FROM beasiswa"); while ($row = $query->fetch_assoc()): ?>
                         <a class="collapse-item" href="?page=perhitungan&kategori=<?=$row["kd_beasiswa"]?>"><?=$row["nama"]?></a>
                         <?php endwhile; ?>
                    </div>
                </div>
            </li>



             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Verifikasi</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <?php $query = $connection->query("SELECT * FROM beasiswa"); while ($row = $query->fetch_assoc()): ?>
                         <a class="collapse-item" href="?page=umkm&beasiswa=<?=$row["kd_beasiswa"]?>"><?=$row["nama"]?></a>
                         <?php endwhile; ?>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="backup.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Backup</span></a>
            </li>

             

            <!-- Divider -->
           

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                  </button>  <!-- Sidebar Toggle (Topbar) -->

                </nav>

                <!-- Topbar -->
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="row">
                        <div class="col-md-12">
                          <?php include page($_PAGE); ?>
                        </div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
          
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    

    <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
     <script>
              Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}


<?php
$query = $connection->query("SELECT tanggal, sum(counter) AS hari_ini FROM counterdb GROUP BY tanggal");

    $data_tanggal = array();
    $data_total = array();

    while ($data = mysqli_fetch_array($query)) {
      $data_tanggal[] = $data['tanggal']; // Memasukan tanggal ke dalam array
      $data_total[] = $data['hari_ini']; // Memasukan total ke dalam array
    }
?>
var config = {
  type: 'line',
  data: {
    labels: <?php echo json_encode($data_tanggal) ?>,
    datasets: [{
      label: "Jumlah",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($data_total) ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
};

var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, config);
            </script>
  
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="style/lib/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
    



    


     <script type="text/javascript">
  $(document).ready(function() {
    $('.datatableid').DataTable( {
        "scrollY":true,
        "scrollX": true
    } );
} );
    </script>

    <script type="text/javascript">
  $(document).ready(function() {
    $('#datatablein').DataTable( {
        "scrollY":true,
        "scrollX": true,
        "ordering" : false
    } );
} );
    </script>
     

<script type="text/javascript">
$("#kriteria").chained("#beasiswa");
</script>

<script type="text/javascript">
$("#kriteria").chained("#beasiswa");
$("#nilai").chained("#kriteria");
</script>
</body>
</html>
 <?php
                  } elseif ($_SESSION["as"] == 'mahasiswa') {
                    ?>

                  <?php
session_start();
require_once "config.php";
if (!isset($_SESSION["is_logged"])) {
  header('location: login2.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UMKM</title>
    <link rel="stylesheet" href="css/style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM nilai JOIN penilaian USING(kd_kriteria) WHERE kd_nilai='$_GET[key]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["save"])) {
    $validasi = false; $err = false;
    

    if ($update) {
        $sql = "UPDATE nilai SET kd_kriteria='$_POST[kd_kriteria]', nim='$_POST[nim]', nilai='$_POST[nilai]' WHERE kd_nilai='$_GET[key]'";
    } else {
        $allowed_ext    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
                $file_name      = $_FILES['file']['name'];
                $aku            = explode('.', $file_name);
                $file_ext       = strtolower(end($aku));
                $file_size      = $_FILES['file']['size'];
                $file_tmp       = $_FILES['file']['tmp_name'];
                $nama           = ucfirst($_SESSION["username"]);
                $pemilik        = ucfirst($_SESSION["nama_lengkap"]);
                

        if(in_array($file_ext, $allowed_ext) === true){
                    if($file_size < 21044070){
                        $lokasi = 'files/'.$pemilik.'.'.$file_ext;
                        move_uploaded_file($file_tmp, $lokasi);
                        $query = "INSERT INTO nilai VALUES ";
                        foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
                            $query .= "(NULL, '$_POST[kd_beasiswa]', '$kd_kriteria', '$_POST[nim]', '$nilai', '$pemilik', '$_POST[usaha]', '$nama', '$file_ext', '$file_size', '$lokasi', '0'),";
                        }
                        $sql = rtrim($query, ',');
                        $validasi = true;
                        
                    }else{
                        echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
                    }
                }else{
                    echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
                }

    }

    if ($validasi) {
        foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
            $q = $connection->query("SELECT kd_nilai FROM nilai WHERE kd_beasiswa=$_POST[kd_beasiswa] AND kd_kriteria=$kd_kriteria AND nim=$_POST[nim] AND nilai LIKE '%$nilai%'");
            if ($q->num_rows) {
                echo alert("Nilai untuk ".$_POST["nim"]." sudah ada!", "form.php");
                $err = true;
            }
        }
    }

  if (!$err AND $connection->query($sql)) {
        echo alert("Berhasil!", "form.php");
    } else {
        echo alert("Gagal!", "form.php");
    }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM nilai WHERE kd_nilai='$_GET[key]'");
    echo alert("Berhasil!", "form.php");
}
?>
    <div class="wrapper">
        <div class="nav">
            <div class="logo">
                <h4>UMKM</h4>
            </div>
            <div class="links">
                <a href="dashboard.php" class="mainlink">Beranda</a>
                <a href="form.php">Status dan Data</a>
                <a href="#">Pembayaran</a>
                <a href="logout.php">Logout | <?= ucfirst($_SESSION["username"]) ?></a>
            </div>
        </div>

        <!-- LANDING PAGE -->

        <div class="landing">
            <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
                <h1>UMKM.<span style="color:#e0501b;font-size: 4vw"> Merdeka.</span> </h1>
                <h3>Silahkan memasukan data untuk pengajuan pinjamanan dana <br> Dengan Meng-klik Tombol dibawah ini.</h3>
                <div class="btn">
                    <a href="form.php">Pengajuan</a>
                </div>
            </div>
            <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
                <img src="img/bg.png" alt="">
            </div>
        </div>

        <!-- ABOUT SECTION -->

        <div class="about">
            <div class="aboutText" data-aos="fade-up" data-aos-duration="1000">
                <h1>Langkah - Langkah <br> <span style="color:#2f8be0;font-size:3vw">Pengajuan Pinjaman</span> </h1>
                <img src="img/doctor-woman-400px.png" alt="">
            </div>
            <div class="aboutList" data-aos="fade-left" data-aos-duration="1000">
                <ol>
                    <li> 
                        <span>01</span>
                         <p>Klik "Pengajuan" atau "Status dan Data" untuk memasukkan data pengajuan</p>
                    </li>
                    <li> 
                        <span>02</span>
                         <p>Isi Bagian Form Insert Data Sesuai dengan Usaha anda</p>
                    </li>
                    <li> 
                        <span>03</span>
                         <p>Tunggu proses seleksi selesai</p>
                    </li>
                    <li> 
                        <span>04</span>
                         <p>Pengumuman, Jika lolos silahkan mengisi form di "Pembayaran"</p>
                    </li>

                </ol>
            </div>
        </div>

        <!-- INFO SECTION -->

        


        <!-- BANNER AND FOOTER -->

        <div class="banner" style="background-color: #a1cdff">
            <div class="bannerText" data-aos="fade-right" data-aos-duration="1000">
                <h1>Selamat Datang di Aplikasi UMKM Merdeka <br> <span style="font-size:1.6vw;font-weight:normal"  class="bannerInnerText">
                    Silahkan Memasukan Data dengan Benar dan Teliti!
                </span> </h1>
                
            </div>
            <div class="bannerImg" data-aos="fade-up" data-aos-duration="1000">
                <img src="img/MobileApp.png" alt="">
            </div>
        </div>

        <div class="footer">
            
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
            AOS.init();
    </script>
</body>
</html>
 <?php
                  }else{
                 ?>



 <?php

 echo '<script language="javascript">alert("Akun Anda Belum Diaktifikasi"); document.location="login2.php";</script>';
                  }
                 ?>