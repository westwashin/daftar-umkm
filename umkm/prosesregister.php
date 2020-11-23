<?php
include "config.php";

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';
                            if(isset($_POST['submit']))
                            {
                                $emailTo = $_POST["email"];
                                $id_ktp = $_POST["nik"];
                                $nama = $_POST["nama"];
                                $username = $_POST["username"];
                                $no_hp = $_POST["no_hp"];
                                $password = md5($_POST["password"]);
                                

                                 $query = mysqli_query($connection, "SELECT * FROM pengguna WHERE email = '$emailTo' OR nik = '$id_ktp' OR username = '$username'");

                                 $data = mysqli_num_rows($query);

                                 if($data > 1) {
                                               
                                                echo '<script language="javascript">alert("Mohon Maaf Email / ID KTP / Username Sudah Terdaftar"); document.location="register.php";</script>';
                                                
                                }else{

                                    $query = mysqli_query($connection,"INSERT INTO pengguna VALUES(NULL,'$username','$password','mahasiswa','$id_ktp', '$nama', '$emailTo', $no_hp, 'belum')");

                                    if ($query) {
                                         $query1 = mysqli_query($connection,"INSERT INTO mahasiswa VALUES('$id_ktp','$nama','','','','$emailTo')");
                                        # code...
                                    }
                                    
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

                                                        $mail->setFrom("isecretunnes@gmail.com", "I-Secret"); //email pengirim

                                                        $mail->addAddress($emailTo); // Email penerima

                                                        $mail->addReplyTo("no-reply@gmail.com");

                                                        //Content

                                                        $url = "http://" . $_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]). "/regis.php?email=$emailTo&id_ktp=$id_ktp";  //sesuaikan berdasarkan link server dan nama file

                                                        $mail->isHTML(true);                                  // Set email format to HTML

                                                        $mail->Subject = "Konfirmasi Akun";

                                                        $mail->Body    = "<h1>Konfirmasi Akun</h1><p> Klik <a href='$url'>link ini</a> untuk konfirmasi Akun</p>
                                                                          " ;
                                                       


                                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                                        $mail->send();

                                                        
                                                        echo '<script language="javascript">alert("Link Konfirmasi Akun Berhasil Dikirimkan Ke Email. Silahkan Cek Email Anda"); document.location="login2.php";</script>';
                                                       
                                                        

                                                    } catch (Exception $e) {

                                                        echo 'Message could not be sent . Mailer Error: ' , $mail->ErrorInfo;

                                                        

                                                    }
                                }
                            }else
                            {
                                echo('Gagal');
                            }
                            ?>