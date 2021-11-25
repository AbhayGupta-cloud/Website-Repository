<?php
require('connection.php');

session_start();

if(isset($_GET['email'])&& isset($_GET['verification_code'])){
    $query="SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[verification_code]'";
    $result=mysqli_query($con,$query);
    if($result){
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['isverified']==0)
            {
                $update="UPDATE `registered_users` SET `isverified`='1' WHERE `email`='$result_fetch[email]'";
                if(mysqli_query($con,$update)){
                    echo"
          <script>
            alert('Email Successfully verified');
            window.location.href='index.php';
          </script>
        ";        
                }else{
                    echo"
          <script>
            alert('Cannot run query2');
            window.location.href='index.php';
          </script>
        ";        
                }
            }
            else{
                echo"
          <script>
            alert('email already verified');
            window.location.href='index.php';
          </script>
        ";        
            }
            
        }
        else{
            echo"
          <script>
            alert('cannot run query1');
            window.location.href='index.php';
          </script>
        ";        
        }
    }

}
?>