<?php
session_start();
include("../database/db.php");
if(!isset($_SESSION['username']))  
{
    header("Location: ../login/index.html");
    exit();
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $currentusername=$_POST['currentusername'];
    $accesscode=$_POST['accesscode'];
    $newusername=$_POST['newusername'];
    $username=$_SESSION['username'];
    if($currentusername!=$username)
    {
        header("Location: message.php?message=CurrentUsernameMismatch");
        exit();
    }
      $sql2="select * from users where username=?";
      $check=mysqli_prepare($conn,$sql2);
      if($check)
        {
            mysqli_stmt_bind_param($check,"s",$newusername);
            mysqli_stmt_execute($check);
            $result=mysqli_stmt_get_result($check);
            if(mysqli_num_rows($result)==0)
                {
                    $sql="SELECT acc_code FROM users WHERE username=?";
                    $check=mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($check,"s",$username);
                    mysqli_stmt_execute($check);
                    $result=mysqli_stmt_get_result($check);
                    if(mysqli_num_rows($result)==1)
                     {
                       $row=mysqli_fetch_assoc($result);
                       $hash=$row['acc_code'];
                       if(password_verify($accesscode,$hash))
                       {
                        $sql="UPDATE users SET username=? WHERE username=?";
                        $update=mysqli_prepare($conn,$sql);
                        mysqli_stmt_bind_param($update,"ss",$newusername,$currentusername);
                        $up=mysqli_stmt_execute($update);
                        if($up)
                        {
                         $_SESSION['username']=$newusername;
                         header("Location: message.php?message=UsernameChanged");
                         exit();
                         }
                        else
                        {
                         header("Location: message.php?message=UsernameChangeFailed");
                         exit();
                        }
                       }
                      else
                      {
                       header("Location: message.php?message=AccessCodeIncorrect");
                       exit();
                      }
                    }
                 else
                 {
                  header("Location: message.php?message=UserNotFound");
                  exit();
                 }
               }
                else
                 {
                  header("Location: message.php?message=Usernameocuupied");
                  exit();
                 }
       }

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,600;1,700&family=Zen+Dots&display=swap" rel="stylesheet">
    <title>Username</title>
    <style>
         body{   
            font-family: Arial, sans-serif;
           background-color: #09041f;   
         }
         .container
         {
             display: flex;
            flex-direction: row;  
            gap:20%;  
         }
         #page
      {
        display: flex;
        justify-content: center;
        gap:10%;
        background-color: white;
        font-family: "Poppins", sans-serif;
        margin-bottom: 40px;
        border-radius: 20px;
        padding: 20px;
      }
      .main {
        text-decoration: none;
        color: black;
        font-size: 15px;
        transition: 0.3s ease all;
        background-color: #ffffff;
        color:#0b0a0a;
        padding: 10px 20px;
        border-radius: 20px
      }

      .main:hover{
        text-decoration: underline;
        transform: scale(1.1);
        background: #050542;
        color:white;
           }
          .now
          {
            background-color: #050542;
            color:white;
            padding: 10px 20px;
            border-radius: 20px;
            padding:10px;
          }
          .log
          {
            color: red;
          }
         h2
         {
            text-align: center;
         }
          #option
             {
                background: white;
                display: flex;
                flex-direction: column;
                gap: 20px;
                width:20%;
                min-height: 75vh;
                padding-left: 10px;
                border-bottom-right-radius:20px;
                border-top-right-radius: 20px;
                padding-top:20px;
                padding:10px;
             }
           #option a.now
            {
             background:#050542;
             color:white;
              }
            
                #option a
                {
                    text-decoration: none;
                    color: black;
                   font-family:Arial, sans-serif;
                    font-size: 15px;
                    transition: 0.3s ease all;
                    background-color: #ffffff;
                    color:#0b0a0a;
                    padding: 10px 20px;
                    border-radius: 20px;
                    padding:10px;
                }
                #option a:hover
                {
                    text-decoration: underline;
                    transform: scale(1.05);
                    background: #050542;
                    max-width: 200px;
                    color:white;
                }
                   #content
                {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;  
                    width:100%;
                }
                form
                {
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                    background: white;
                    width:60%;
                    padding: 20px;
                    border-radius: 20px;
                    margin-right: 30%;
                }
                input
                {
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    outline: none;
                    font-size: 16px;
                    display: flex;
                     
                }
                input:focus
                {
                    border-color: #5353e8;
                }
                input[type="password"]
                {
                    width: 90%;
                    margin:auto;
                    max-width: 400px;
                }
                 input[type="text"]
                {
                    width: 90%;
                    margin:auto;

                    max-width: 400px;
                }
                input::placeholder
                {
                    font-size:12px;
                }
                input[type="submit"]
                {
                    background-color: #5353e8;
                    color: white;
                    font-weight:bold;
                    width:90%;
                    max-width: 150px;
                    margin:auto;
                    border: none;
                    cursor: pointer;
                    transition: 0.3s ease all;
                }
                input[type="submit"]:hover
                {
                    background-color: #050542;
                }
                input[type="button"]
                {
                    background-color: #ccc;
                    color: #333;
                    border: none;
                    cursor: pointer;
                    transition: 0.3s ease all;
                    width: 70%;
                    max-width: 100px;
                    font-size: 10px;
                }
                input[type="button"]:hover
                {
                    background-color: #4f4d4d;
                    color:white;          
                }
                input[type="button"]:active
                {
                    background-color: #050542;
                    color:white;  
                    transform: scale(0.95);        
                }

                 @media (max-width: 768px) {
    .container
             {
                 flex-direction: column;
             }
                  #option 
                    {
                        width: 100%;
                        min-height: auto;
                        flex-direction: row;
                        flex-wrap: wrap;
                        border-radius: 10px;
                    }
                   form
                   {
                       width: 90%;
                       margin-right: 0;
                       margin: auto; 
                      
                    }
    #content
                    {
                        width: 100%; 
                        margin-top:20px
                    }
    #page {
        gap: 5%;
        flex-wrap: wrap;
        padding: 10px; 
                    }
}
        </style>
    </head>
    <body>
        <div id="page">
            <a href="home.php" class="main">HOME</a>
            <a href="../space/space.php"  class="main">SPACE</a>
            <a href="settings.php"  class="main now">SETTINGS</a>
            <a href="logout.php"  class="main log">LOG OUT</a>
        </div>
        <div class="container">
            <div id="option">
               <a href="change.php">Change Password</a>
               <a href="delete.php">Delete Account</a>
               <a href="username.php" class="now">Change Username</a>
               <a href="access.php" >Set Acc Code</a>
               
            </div>            
            <div id="content">
            <form name="form1" method="post">
                <h2>Set Username</h2>   
                <input type="text" name="currentusername" placeholder="Enter your current username" required>
                <input type="password" name="accesscode" placeholder="Enter your access code" required>
                <input type="text" name="newusername" placeholder="Enter your new username" required>
                <input type="submit" value="Set Username">
            </form>
            </div>
        </div>

            
</html>