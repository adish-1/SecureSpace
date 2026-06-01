<?php
$mess="";
 if(isset($_GET['message']))
 {
       $mess=$_GET['message'];

         if($mess=="Passmatch")
         {
            $mess="Password and Confirm Password do not match";
             }
            else if($mess=="Error")
             {
                $mess="An error occurred while creating your account. Please try again.";
             }
             else if($mess=="UsernameExists")
             {
                $mess="Username already exists. Please choose a different username.";
             }
              else if($mess="PasswordResetSuccess")
               {
                  $mess="recovery Succsess";
               }
               else if($mess="PasswordResetFailed")
                  {
                     $mess="Recovery failed";
                  }
             }
 ?>
<!DOCTYPE html> 
<html>
<head>
    <title>MESSAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Tapestry&display=swap" rel="stylesheet">

     <style>
        body
        {
         background: radial-gradient(circle at 60% 60%,#12a4d5,transparent 40%),linear-gradient(135deg,#223a91,#25257d);
         min-height: 100vh;
         display: flex;
         flex-direction: column;
         align-items: center;
      }

        h2
        {
         color:white;
           font-family: "Tapestry", serif;
             font-size: 30px; 
        }
        a{
         color: white;
         background-color: white;
         padding: 20px;
         color:blue;
         font-size: 20px;
         font-weight: bold;
         text-decoration: none;
         margin-top: 100px;
         width: 70%; 
         text-align: center;
         border-radius: 20px;
         transition: 0.3s ease all;
      }
      a:hover
      {
         background-color: #f65524;
         color:white;
         transform: scale(1.1);
      }  
     </style>
</head>
<body>

   <?php
    echo "<h2>$mess</h2>";
      ?>
   <a href="../login/index.html">GO HOME </a>
    </body>
    </html>
   