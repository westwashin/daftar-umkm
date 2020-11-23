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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
  $connection->query("DELETE FROM nilai WHERE nim ='$_GET[key]'");
    echo alert("Berhasil!", "form.php");
}
?>


?>
    <div class="wrapper">
        <div class="nav">
            <div class="logo">
                <h4>UMKM</h4>
            </div>
            <div class="links">
                <a href="dashboard.php">Beranda</a>
                <a href="dashboard.php" class="mainlink">Status dan Data</a>
                <a href="#">Pembayaran</a>
                <a href="logout.php">Logout | <?= ucfirst($_SESSION["username"]) ?></a>
            </div>
        </div>

        <!-- LANDING PAGE -->

        <div class="landing">
            <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
                <h1>UMKM.<span style="color:#e0501b;font-size: 4vw"> Merdeka.</span> </h1>
                <h3>Silahkan memasukan data pada bagian insert data. Jika merasa memasukkan data yang salah silahkan tombol delete. Setelah itu lakukan kembali pengisian data di bagian insert data</h3>
                <div class="row">
                    <?php 
                    $nik           = ucfirst($_SESSION["nik"]);
                    $query = mysqli_query($connection, "SELECT * FROM nilai WHERE nim = '$nik'");
                                    
                    $data = mysqli_num_rows($query);
                    if($data < 1) {?>
                    <a href="Pengisian.php" class="btn btn-info btn-block">Nothing</a>
                <?php } else { 
                    $query1 = mysqli_query($connection, "SELECT * FROM nilai WHERE nim = '$nik'");
                    $data1 = mysqli_fetch_assoc($query1);
                    if($data1['status'] == "3" ) {?>
                    <a href="Pengisian.php" class="btn btn-info btn-block">Lolos</a>

                <?php } else { ?>
                    <a href="Pengisian.php" class="btn btn-info btn-block">Proses</a>
                <?php }} ?>
                    <a href="delete.php" class="btn btn-danger">Hapus</a>
                </div>
                
            </div>
            <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
                <img src="img/bg.png" alt="">
            </div>
        </div>
</div>

        <!-- ABOUT SECTION -->

    

        <!-- INFO SECTION -->

    

        <!-- BANNER AND FOOTER -->

       <div class="container">
                <div class="row">
        <div class="col-lg-12">      
        <div class="panel" style="border-color: #ffc107;">
            <div class="panel-heading"style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);"><h3 class="text-center" style="color: white;">Profil</h3></div>
            <div class="panel-body">
<?php 
$nik1           = ucfirst($_SESSION["nik"]);
 $query = mysqli_query($connection, "SELECT * FROM pengguna WHERE nik = '$nik1'");

  $row = mysqli_fetch_assoc($query);
?>

                <form action="<?=$_SERVER["REQUEST_URI"]?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nim">NIK</label>
                                            <input type="text" name="nim" value="<?=$row['nik']?>" class="form-control" readonly="on">
                                    </div>
                                    <div class="form-group">
                      


                                        <div class="form-group">
                                        <label for="nim">Nama Usaha</label>
                                            <input type="text" name="usaha" class="form-control">
                                         </div>

                                    <div class="form-group">
                                    
                                </div>
                                       
                    \
                </form>
            </div>
        </div>
    </div>
    
    </div>
</div>
</div>


        <div class="footer">
            
        </div>
    </div>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
            AOS.init();
    </script>
    <script type="text/javascript">
  $(document).ready(function() {
    $('.datatableid').DataTable( {
        "scrollY":true,
        "scrollX": true
    } );
} );
    </script>

</body>
</html>