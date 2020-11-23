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
    <div class="wrapper">
        <div class="nav">
            <div class="logo">
                <h4>UMKM</h4>
            </div>
            <div class="links">
                <a href="#" class="mainlink">Beranda</a>
                <a href="#">Langkah Pengajuan</a>
                <a href="#">About</a>
                <a href="login2.php">Login/Register</a>
            </div>
        </div>

        <!-- LANDING PAGE -->

        <div class="landing">
            <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
                <h1>UMKM.<span style="color:#e0501b;font-size: 4vw"> Merdeka.</span> </h1>
                <h3>Adalah salah satu penggerak roda perekonomian Indonesia. <br>Mari Kita Bangkit UMKM di Indonesia</h3>
                <div class="btn">
                    <a href="login2.php">Pengajuan</a>
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
                         <p>Daftar Akun</p>
                    </li>
                    <li> 
                        <span>02</span>
                         <p>Verifikasi Daftar Akun melalui Email</p>
                    </li>
                    <li> 
                        <span>03</span>
                         <p>Tunggu tanggal proses seleksi yang telah dilakukan</p>
                    </li>
                    <li> 
                        <span>04</span>
                         <p>Pengumuman, Jika lolos silahkan mengisi form data rekening</p>
                    </li>

                </ol>
            </div>
        </div>

        <!-- INFO SECTION -->

        <div class="infoSection">
            <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                <h1>Apa itu <br> <span style="color:#e0501b">Usaha Mikro, Kecil, Menengah ?</span> </h1>
            </div>
            <div class="infoCards">
                <div class="card one" data-aos="fade-up" data-aos-duration="1000">
                    <img src="img/movie.png" class="cardoneImg" alt="" data-aos="fade-up" data-aos-duration="1100">
                    <div class="cardbgtwo"></div>
                    <div class="cardContent">
                        <h2>Usaha Mikro</h2>
                        <p>Aktivitas Ekonomi Rakyat tanpa berbadan Hukum.</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card two" data-aos="fade-up" data-aos-duration="1300">
                    <img src="img/learn.png" class="cardtwoImg" alt="" data-aos="fade-up" data-aos-duration="1200">
                    <div class="cardbgone"></div>
                    <div class="cardContent">
                        <h2>Usaha Kecil</h2>
                        <p>Usaha yang dilakukan demi kepentingan bersama.</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card three" data-aos="fade-up" data-aos-duration="1600">
                    <img src="img/videocall.png" class="cardthreeImg" alt="" data-aos="fade-up" data-aos-duration="1300">
                    <div class="cardbgtwo"></div>
                    <div class="cardContent">
                        <h2>Usaha Menengah</h2>
                        <p>Usaha yang memiliki pendapatan pertahun.</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


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