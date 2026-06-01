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
    $newpass=$_POST['newpass'];
    $confpass=$_POST['confpass'];
    if($newpass!=$confpass)
    {
        header("Location: ../authentication/mess.php?message=PasswordMismatch");
        exit();
    }
    $email=$_SESSION['username'];
    $newpass=password_hash($newpass,PASSWORD_DEFAULT);
    $sql="UPDATE users SET password=? WHERE username=?";
    $update=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($update,"ss",$newpass,$email);
    if(mysqli_stmt_execute($update))
    {
        session_destroy();
        header("Location:../authentication/mess.php?message=PasswordResetSuccess");
        exit();
    }
    else
    {
        header("Location: ../authentication/mess.php?message=PasswordResetFailed");
        exit();
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> FORGET PASSWORD </title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,600;1,700&family=Zen+Dots&display=swap" rel="stylesheet">
         <style>
             body
             {
                 font-family: Arial, sans-serif;
                 background:radial-gradient(circle at 0% 80%,#5180f8,transparent 60%),radial-gradient(circle at 80% 0%,#586784,transparent 60%), linear-gradient(135deg,#03034d,#23234e);
                 display: flex;
                 flex-direction: column;
                 min-width: none;   
                 background-attachment: fixed;
                 background-size: cover;
             }
             h3
             {
                 margin-top: 30px;
                 text-shadow: 0 0 10px #616bda;
                 font-family: 'Poppins', sans-serif;
                 font-size: 40px;
                 text-align:center;
                 color:white;
             }
               form
               {
                     display: flex;
                     flex-direction: column;
                     background-color: white;
                     width:70%;
                     max-width: 400px;
                     align-items: center;
                     margin:auto;
                     padding: 30px 30px;
                     gap: 20px;
                     margin-top: 20px;
                    border-radius: 20px;
               }
               input[type=password]
               {
                   width: 100%;
                   height: 20px;
                   padding: 10px;
                   margin-bottom: 10px;
                   outline: none;
                   border-radius: 5px;
                   border: 1px solid #535353;
                   font-size: 12px;
                   transition: 0.3s ease all;
               }
               input[type=password]:hover
               {
                   border-color: #5180f8;
                   box-shadow: 0 0 5px #5180f8;
               }
               input[type=submit]
               {
                   width: 100%;
                   padding: 10px;
                   background-color: #5180f8;
                   color: white;
                   border: none;
                   border-radius: 5px;
                   cursor: pointer;
                   font-size: 16px;
                   font-weight: bold;
                   transition: 0.3s ease all;
               }
                input[type=submit]:hover
                {
                     background-color: #1005ee;
                     box-shadow: 0 0 10px #1005ee;
                }
             </style>
             <script>
            function check()
            {
                var pass=document.form1.newpass.value;
                var con=document.form1.confpass.value;
                if(pass!= con)
                {
                    alert("Passwords do not match");
                  return false;
                }
                return true;
            }
                
        </script>
    </head>
   <body>
         <h3>Set New Password</h3>
          <form method="POST" name="form1"  onsubmit= "return check()" >
              <input type="password" name="newpass" placeholder="Enter New Password" required>
              <input type="password" name="confpass" placeholder="Confirm New Password" required>
              <div id="submit">
                  <input type="submit" value="set new Password">
              </div>
             </form>
       </body>
</html>
     
