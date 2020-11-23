<?php 

include "config.php";

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';

 

if(isset($_POST["reset_pass"])){

    $emailTo = $_POST["email"]; //email kamu atau email penerima link reset

    $code = uniqid(true); //Untuk kode atau parameter acak

    $query = mysqli_query($connection, "INSERT INTO reset_password VALUES ('','$emailTo','$code')");

    if(!$query){ exit("Error");}

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

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

        $mail->setFrom("isecretunnes@gmail.com", "I-Secret"); ; //email pengirim

        $mail->addAddress($emailTo); // Email penerima

        $mail->addReplyTo("no-reply@gmail.com");

        //Content

        $url = "http://" . $_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]). "/resetpw.php?reset_pass=$code"; //sesuaikan berdasarkan link server dan nama file

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Link reset password";

        $mail->Body    = "<h1>Permintaan reset password</h1><p> Klik <a href='$url'>link ini</a> untuk mereset password</p>" ;

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        
        echo '<script language="javascript">alert("Link reset password berhasil dikirimkan ke email."); document.location="login2.php";</script>';
       
        

    } catch (Exception $e) {

        echo 'Message could not be sent . Mailer Error: ' , $mail->ErrorInfo;

        

    }

  
}