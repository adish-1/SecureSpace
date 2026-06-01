<?php
session_start();    

include("../database/db.php");

if(isset($_POST['conpass']) && isset($_POST['passcode']) && isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['phno']) && isset($_POST['name']) &&  isset($_POST['username'])) 
{
   $check=mysqli_prepare($conn,"SELECT * FROM users WHERE username=?");
    if($check)
     {
          mysqli_stmt_bind_param($check,"s",$_POST['username']);
          mysqli_stmt_execute($check);
          $result=mysqli_stmt_get_result($check);
          if(mysqli_num_rows($result)>0)
          {
             header("location:mess.php?message=UsernameExists");
             exit();
          }
    }   

    $name=$_POST['name'];
    $phno=$_POST['phno'];
    $mail=$_POST['mail'];
    $age=$_POST['age'];
    $username=$_POST['username']; 
    $passcode=$_POST['passcode'];
    $hash=password_hash($passcode,PASSWORD_DEFAULT);
    $conpass=$_POST['conpass'];
    if($passcode != $conpass)
    {
       header("location:mess.php?message=Passmatch");
         exit();
}
else
{
    $sql="insert into users(username,password,name,phno,mail,age) values(?,?,?,?,?,?)";
    $check=mysqli_prepare($conn,$sql);
    if($check)
    {
        mysqli_stmt_bind_param($check,"sssssi",$username,$hash,$name,$phno,$mail,$age);
        mysqli_stmt_execute($check);
        header("location:../login/index.html");
        exit();
    }
    else 
        {
        header("location:mess.php?message=Error");
        exit();
    }
}
}
else
{
    echo "<script>
          alert('Please fill in all fields');
          window.location.href='index.html';
    </script>";
}

?>