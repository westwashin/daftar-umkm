<?php



include "config.php";

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';
							if (isset($_GET["action"])) {
							{
							$nama = "$_GET[key]";
							$nim  = "$_GET[M]";
							$nm  = "$_GET[nm]";

							$query = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim ='$nim'");
							$connection->query("UPDATE nilai SET status='3' WHERE nim='$nim'");
							$row = mysqli_fetch_assoc($query);
							$email12 = $row['email'];
							$mail = new PHPMailer(true);  
                        // Passing `true` enables exceptions

    try {

        //Server settings

                                     // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP

        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers

        $mail->SMTPAuth = true;                               // Enable SMTP authentication

        $mail->Username = "isecretunnes@gmail.com";     // SMTP username

        $mail->Password = 's3cr3t123';                         // SMTP password

        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted

        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients

        $mail->setFrom("isecretunnes@gmail.com", "I-Secret"); //email pengirim

        $mail->addAddress($email12); // Email penerima

        $mail->addReplyTo("no-reply@gmail.com");

        //Content

        //sesuaikan berdasarkan link server dan nama file

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Lolos Pengajuan Dana";

        $mail->Body    = "<h1>Selamat Usaha anda $nama</h1><p>Telah lolos seleksi peminjaman dana UMKM</p><p>Untuk langkah selanjutnya silahkan lengkapi data rekening di website</p><footer>Salam Hangat, Tim I-Secret</footer>" ;

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        
        echo '<script language="javascript">alert("Proses Verifikasi Telah Berhasil."); document.location="dashboard.php?page=umkm&beasiswa=6";</script>';
       
        

    } catch (Exception $e) {

        echo 'Message could not be sent . Mailer Error: ' , $mail->ErrorInfo;

        

    }
									

							$msg="Your code is correct";
							}
							}
							?>