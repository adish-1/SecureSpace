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
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sessionuser=$_SESSION['username'];
    if($username!=$sessionuser)
    {
        header("Location: message.php?message=CurrentUsernameMismatch");
        exit();
    }
    $sql="select username,password from users where username=?";
    $check=mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($check, "s", $username);
    mysqli_stmt_execute($check);
    $result=mysqli_stmt_get_result($check);
    $row=mysqli_fetch_assoc($result);
    if($row)
    {
          $hash=$row['password'];
           if(password_verify($password,$hash))
        {
            $delete_sql="delete from users where username=?";
            $delete_stmt=mysqli_prepare($conn, $delete_sql);
            mysqli_stmt_bind_param($delete_stmt, "s", $username);
            if(mysqli_stmt_execute($delete_stmt))
            {
                session_destroy();
                header("Location: ../authentication/mess.php?message=AccountDeleted");
                exit();
            }
            else
            {
                header("Location: message.php?message=AccountDeleteFailed");
                exit();
            }
        }
        else
        {
            header("Location: message.php?message=InvalidPassword");
            exit();
        }
    }
    else
    {
        header("Location: message.php?message=UserNotFound");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,600;1,700&family=Zen+Dots&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
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
         overflow: hidden;  
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
                    flex-direction: column; 
                    width:100%;
                }
                form
                {
                    display: flex;
                    flex-direction: column;
                    gap: 25px;
                    background: white;
                    width:60%;
                    padding: 20px;
                    border-radius: 20px;
                    margin-right: 30%;
                    margin-top: 10%;
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
    <script>
        function  confirmDelete() {
            return confirm("Are you sure you want to delete your account? This action cannot be undone.");
        }
    </script>
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
               <a href="delete.php" class="now">Delete Account</a>
               <a href="username.php">Change Username</a>
               <a href="access.php" >Set Acc Code</a>
            </div>  
            <div id="content">
            <form  method="post" onsubmit="return confirmDelete();">
                 <h2>Delete Account</h2>
                <input type="text" name="username" placeholder="Enter your username" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <input type="submit" value="Delete Account">
            </form>
        </div>
        </div>
    </body>
</html>