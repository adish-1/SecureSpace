<?php
session_start();
include("../database/db.php");
 if(isset($_POST['email']) && isset($_POST['accesspass']))
    {
        $username=$_POST['email'];
        $accesspass=$_POST['accesspass'];
         $sql="SELECT * FROM users WHERE username=?";
         $check=mysqli_prepare($conn,$sql);
         mysqli_stmt_bind_param($check,"s",$username);
         mysqli_stmt_execute($check);
         $result=mysqli_stmt_get_result($check);
         if(mysqli_num_rows($result)>0)
         {
               $row=mysqli_fetch_assoc($result);
               $hash=$row['acc_code'];           
             if(password_verify($accesspass,$hash))
             {
                $_SESSION['username']=$username;
                 header("Location: password.php?message=passSet");
                 exit();
             }
             else
             {
                header("Location: ../authentication/mess.php?message=AccessPassIncorrect");
                exit();
             }
         }
         else
         {
            header("Location: ../authentication/mess.php?message=usernameNotFound");
            exit();
         }
    }
 ?>