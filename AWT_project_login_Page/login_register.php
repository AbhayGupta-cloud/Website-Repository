<!--
require('connection.php');
if(isset($_POST['register'])){
    $user_exist_query="SELECT * FROM `registered_users` where `username`=`$_POST[username]` or `email`=`$_POST[email]`";
    $result=mysqli_query($con,$user_exist_query);
    if($result){
        if(mysqli_num_rows($result)>0){
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['username']==$_POST['username']){
                echo"<script>alert('$result_fetch[username] - Username already taken by someone else:');
        window.location.href='index.php';
        </script>";
            }
        else{
            echo"<script>alert('$result_fetch[email] - Email already registered:');
        window.location.href='index.php';
        </script>";
        }
    }
        else{
            $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$_POST[password]')";
        if(mysqli_query($con,$query)){
            echo"<script>alert('Registration Successful');
            window.location.href='index.php';
            </script>";
        }else{
            echo"<script>alert('Cannot Run Query 1');
            window.location.href='index.php';
            </script>";
        }
        }
    
    }else{
        echo"<script>alert('Cannot Run Query 2');
        window.location.href='index.php';
        </script>";
    }
}
-->
<?php 

require('connection.php');
session_start();

#for login
if(isset($_POST['Mylogin']))
{
  $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email]' OR `username`='$_POST[username]'";
  $result=mysqli_query($con,$query);
  
  if($result)
  {
    if(mysqli_num_rows($result)==1)
    {
      $result_fetch=mysqli_fetch_assoc($result);
      
      if(password_verify($_POST['passwd'],$result_fetch['password'])==true)
      {
        //$_SESSION['logged_in']=true;
        //$_SESSION['username']=$result_fetch['username'];
        
        echo"
        <script>
          alert('Login Successful');
          window.location.href='index.php';
        </script>
      ";
        //header("location: index.php");
      }
      else
      {
        
        echo"
          <script>
          alert('$_POST[passwd]');
            alert('Incorrect Password please try again');
            window.location.href='login_modal.php';
          </script>
        ";
      }
    }
    else
    {
      echo"
        <script>
          alert('Email or Username Not Registered Signup Now');
          window.location.href='signup.php';
        </script>
      ";
    }
  }
  else
  {
    echo"
      <script>
        alert('Cannot Run Query');
        window.location.href='login_modal.php';
      </script>
    ";
  }
}

?>
<?php
require('connection.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email,$verification_code){

  require('PhpMailer/Exception.php');
  require('PhpMailer/SMTP.php');
  require('PhpMailer/PHPMailer.php');
  $mail = new PHPMailer(true);
  try {
  //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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
  $mail->Subject = 'Email Verification From Ekart.';
  $mail->Body    = "Thanks for registration!<br>Click the link below to verify the email address.<a href='https://localhost/AWT_Project_Login_Page/PHPMailer/verify.php?email=$email&verification_code=$verification_code'>Verify</a>";
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  return true;
} catch (Exception $e) {
  echo "Message could not be sent.Mailer Error:{$mail->ErrorInfo}";
}

}
if(isset($_POST['register']))
{
  $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
  $result=mysqli_query($con,$user_exist_query);

  if($result)
  {
    if(mysqli_num_rows($result)>0) #it will be executed if username or email is already taken
    {
      $result_fetch=mysqli_fetch_assoc($result);
      if($result_fetch['username']==$_POST['username'])
      {
        #error for username already registered
        echo"
          <script>
            alert('$result_fetch[username] - Username already taken');
            window.location.href='signup.php';
          </script>
        ";
      }
      else
      {
        #error for email already registered
        echo"
          <script>
            alert('$result_fetch[email] - E-mail already registered');
            window.location.href='signup.php';
          </script>
        ";
      }
    }
    else #it will be executed if no one has taken username or email before
    {
      $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
      $verification_code=bin2hex(random_bytes(16));
      $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`,`verification_code`,`isverified`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$verification_code','0')";
      if(mysqli_query($con,$query)&& sendMail($_POST['email'],$verification_code))
      {
        #if data inserted successfully
        echo"
          <script>
            alert('Registration Successful Please login now');
            window.location.href='login_modal.php';
          </script>
        ";
      }
      else
      {
        #if data cannot be inserted
        echo"
          <script>
            alert('Cannot Run Query');
            window.location.href=signup.php';
          </script>
        ";        
      }
    }
  }
  else
  {
    echo"
      <script>
        alert('Cannot Run Query');
        
      </script>
    ";
  }
}

?>
