<?php

session_start();

include("../database/db.php");

if(isset($_POST['username']) && isset($_POST['pass']))
{
    $username=$_POST['username'];

    $password=$_POST['pass'];

    $sql="select * from users where username=?";

    $check=mysqli_prepare($conn,$sql);

    if($check)
    {
        mysqli_stmt_bind_param($check,"s",$username);

        mysqli_stmt_execute($check);

        $result=mysqli_stmt_get_result($check);

        if(mysqli_num_rows($result)==1)
        {
            $row=mysqli_fetch_assoc($result);

            $hash=$row['password'];

            if(password_verify($password,$hash))
            {
                $_SESSION['username']=$username;

                header("location:../dash/home.php");

                exit();
            }
            else
            {
                header("location:mess.php?message=InvalidPasss");

                exit();
            }
        }
        else
        {
            header("location:mess.php?message=InvalidCredentials");

            exit();
        }
    }
}

?>