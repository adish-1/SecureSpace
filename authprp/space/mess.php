<?php
 if(isset($_GET['message']))
    {
        $message=$_GET['message'];
        if($message=="doneinsert")
            {
                $message="Data inserted succsessfully";
            }
            else if($message=="failinsert")
                 {
                $message="Data insertion failed";
                 }
            else if($message=="invalid")
                {
                $message="ivalid issues";
                }
                else if($message=="entervalues")
                    {
                        $message="enter values first";
                    }
                    else{
                        $message="no message to display";
                    }
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
    <a href="space.php">GO TO SPACE</a>
</html>