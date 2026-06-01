<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: ../login/index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SETTINGS</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,600;1,700&family=Zen+Dots&display=swap" rel="stylesheet">  
  <style>
     body{
        background-color: #09041f;
        font-family: Arial, sans-serif;
      }
     #page
      {
        display: flex;
        justify-content: center;
        gap:10%;
        background-color: white;
        margin-bottom: 40px;
        border-radius: 20px;
        padding: 20px;
      }
      .main {
        text-decoration: none;
        color: black;
        font-family: "Poppins", sans-serif;
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
           #option
             {
                background: white;
                display: flex;
                flex-direction: column;      
                gap: 20px;
                width:16%;
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
                p
                {
                  color:red;
                  font-family: Arial, sans-serif;
                  padding-left: 20px;
                  text-align:center;
                  line-height: 25px;              
                }
                #content
                {
                    display: flex;
                    flex-direction:row;  
                    width:100%;
                }
  </style>
  </head>
    <body>
  
        <div id="page">
            <a href="home.php" class="main">HOME</a>
            <a href="../space/space.php" class="main">SPACE</a>
            <a href="settings.php"  class="main now">SETTINGS</a>
            <a href="logout.php"  class="main log">LOG OUT</a>
        </div>
        <div id=content>
         <div id="option">
               <a href="change.php">Change Password</a>
               <a href="delete.php">Delete Account</a>
               <a href="username.php">Change Username</a>
               <a href="access.php">Set Acc Code</a>
               </div>
            <p>Note: Access code is a security feature that adds an extra layer of protection to your account.<br> It is a unique code that you can set up to restrict access to certain features or areas of your account.<br> This code is separate from your regular password and is used to verify your identity when accessing sensitive information or performing specific actions within your account.</p>
                  </div>
          
          </body>
</html>