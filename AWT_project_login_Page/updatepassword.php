<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>

</head>
<body>
    <?php
    require("connection.php");
    if(isset($_GET['email']) && isset($_GET['reset_token'])){
        date_default_timezone_set('Asia/kolkata');
        $date=date("Y-m-d");
        $query="SELECT * from `registered_users` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpired`='$date'";
        $result=mysqli_query($con,$query);
        
        if($result){
            
            if(mysqli_num_rows($result)==1){
                echo"
                <form method='post'>
                <h3>Create New Password</h3>
                <input type='password' placeholder='Enter New Password' name='Password'>
                <button type='submit' name='updatepassword'>UPDATE</button>
                <input type='hidden' name='email' value='$_GET[email]'>
                </form>
                ";
            }else{
                echo"
      <script>
        alert('Password already updated using this link');
        //window.location.href='login_modal.php';
      </script>
    ";
            }
        }else{
            echo"
      <script>
        alert('Cannot Run Query 2');
        //window.location.href='login_modal.php';
      </script>
    ";
        }
}
    ?>
    <?php
    require("connection.php");
    if(isset($_POST['updatepassword'])){
        $pass=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $update="UPDATE `registered_users` SET `password`='$pass',`resettoken`=NULL,`resettokenexpired`=NULL WHERE `email`='$_POST[email]'";
        if(mysqli_query($con,$update)){
            echo"
      <script>
        alert('Password Updated Successfully');
        //window.location.href='login_modal.php';
      </script>
    ";
        }else{
            echo"
      <script>
        alert('Server Down Please Try Later!');
        //window.location.href='login_modal.php';
      </script>
    ";
        }
    }
    ?>
</body>
</html>