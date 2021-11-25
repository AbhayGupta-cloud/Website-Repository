<?php
require("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email,$reset_token){
  require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');
$mail = new PHPMailer(true);
try {
  //Server settings
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = '';                     //SMTP username
  $mail->Password   = '';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('', 'Ekart');
  $mail->addAddress($email);     //Add a recipient
  //$mail->addAddress('ellen@example.com');               //Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');

  //Attachments
  //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Password reset link from Ekart';
  $mail->Body    = "We got a request from you to reset your password!<br>
  Click the link below:<br>
  <a href='http://localhost/AWT_Project_Login_Page/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  return true;
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
if(isset($_POST['send-reset-link'])){
    $query="SELECT * from `registered_users` where `email`='$_POST[email]'";
    $result=mysqli_query($con,$query);
    if($result){
        if(mysqli_num_rows($result)==1){
            //email found
            $reset_token=bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date=date("Y-m-d");
            $query="UPDATE `registered_users` SET `resettoken`='$reset_token',`resettokenexpired`='$date' WHERE `email`='$_POST[email]'";
            if(mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token))
            {
              echo"
              <script>
                alert('Password reset link has been sent to email');
                window.location.href='index.php';
              </script>
            ";
            }
            else{
              echo"
              <script>
                alert('Email not found');
                window.location.href='index.php';
              </script>
            ";

            }
        }
        else{
            echo"
          <script>
            alert('Invalid email entered');
            window.location.href='forgetpass.php';
          </script>
        ";
        }
    }
    else{
        echo"
          <script>
            alert('Cannot run query');
            window.location.href='index.php';
          </script>
        ";
    }
}
?>