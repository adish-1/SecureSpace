<?php
 $message=$_GET['message']; 
    if($message=="AccessCodeSet")
    {
        $message="Access code set successfully.";
    }
    else if($message=="AccessCodeMismatch")
    {
        $message="Access code mismatch. Please try again.";
    }
    else if($message=="InvalidPassword")
    {
        $message="Invalid password. Please try again.";
    }
    else if($message=="AccessCodefailed")
    {
        $message="Failed to set access code. Please try again.";
    }
    else if($message=="CurrentUsernameMismatch")
    {
        $message="Current username does not match. Please try again.";
    }
    else if($message=="UserNotFound")
    {
        $message="User not found. Please try again.";
    }
    else if($message=="AccessCodeIncorrect")
    {
        $message="Access code is incorrect. Please try again.";
    }
    else if($message=="UsernameChanged")
    {
        $message="Username changed successfully.";
    }
    else if($message=="UsernameChangeFailed")
    {
        $message="Failed to change username. Please try again.";
    }
    else if($message=="AccountDeleteFailed")
    {
        $message="Failed to delete account. Please try again.";
    }
      
         else if($message=="PassChangeFalse")
        {
            $message="Password Change Failed";
        }
        else if($message=="prepfailed")
            {
                $message="Error Happen {input}";
            }
            else if($message=="Usernameocuupied")
                {
                     $message="username already exist";
                }

    
    else
    {
        $message="";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MESSAGE</title>
        <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">

        <style>
            body
        {   
          display: flex;
          min-height: 100vh;
          background:radial-gradient(circle at 50% 50%,#a642f7,transparent 100%);
          flex-direction: column;
          gap: 100px;
          align-items: center;
         }
         h2
         {
            padding:20px;
            font-size: 35px;
            font-family: "Rancho", cursive;
            letter-spacing: 2px;
            transition: 0.3s ease all;
         }
         a
         {
            text-decoration: none;
            font-size: 20px;
            background:linear-gradient(135deg,#223a91,#25257d);
            width:70%;
            text-align: center;
            letter-spacing: 1px;
            font-family: "Jomhuria", serif;
            padding:20px;
            border-radius:20px;
            font-size: 40px;
            color:white;
            transition: 0.3s ease all;
         }
         a:hover
         {
            transform:scale(1.1)
         }
        h2:hover{
           color:#2e6fd7;
           transform:scale(1.06);
        
        }        
    </style>
    </head>
    <h2><?php echo $message; ?></h2>
    <a href="../dash/settings.php">GO BACK</a>
</html>