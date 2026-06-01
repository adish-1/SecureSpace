<?php
session_start();
include("../database/db.php");
    if(isset($_POST['name']) && isset($_POST['content']))
    {
      $title=$_POST['name'];
      $username=$_SESSION['username'];
      $content=$_POST['content'];
      $sql="insert into notes(name,content,username) values(?,?,?)";
      $check=mysqli_prepare($conn,$sql);
      if($check)
        {
            mysqli_stmt_bind_param($check,"sss",$title,$content,$username);
           
            if(mysqli_stmt_execute($check))
                {
                 header("location:mess.php?message=doneinsert");
                 exit();  
                 }                
                else
                    {
                    header("location:mess.php?message=failinsert");
                    exit();
                    }
         }
         else
            {
                header("location:mess.php?message=invalid");
                exit();
            }
    }
         else{
            header("location:mess.php?message=entervalues");
            exit();
         }
   ?>         
