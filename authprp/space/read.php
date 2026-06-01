<?php
 session_start();
 if(!isset($_SESSION['username']))
  {
    header("location:../login/index.html");
    exit();
  }
 $username=$_SESSION['username'];
   include("../database/db.php");
if(isset($_POST['read']))
              {
                $name=$_POST['read'];
                $sql="select name,content from notes where name=? and username=?";
                $check=mysqli_prepare($conn,$sql);
                if($check)
                  {
                    mysqli_stmt_bind_param($check,"ss",$name,$username);
                    $up=mysqli_stmt_execute($check);
                    $result=mysqli_stmt_get_result($check);
                  }
                  else
                    {
                        echo "<script>alert('ivalid error occur');</script>";
                        exit();
                    }
              }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DATA</title>
        <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <style>
            body
            {
                background:radial-gradient(circle at 0% 100%,#09d349,transparent 100%),radial-gradient(circle at 100% 10%,#f5f561,transparent 40%);
                min-height: 100vh;
                background-attachment: fixed;
               
            }
           #main
{
    background: transparent;
    display: flex;
    align-items: center;
    flex-direction: column;
    margin: auto;
    width: 50%;
    color: #000000;
    padding: 20px;
    text-align: center;
    overflow-wrap: break-word;
    word-wrap: break-word;
    backdrop-filter: blur(100px);
    box-shadow: 0 0 20px navy;
    border-radius: 10px;
    margin-bottom:100px;
}
h1{
    font-family: "DynaPuff", system-ui;
    text-shadow: 0 0 10px skyblue;
    letter-spacing: 2px;
    color:navy;
}

 p
{
    width: 100%;
    text-align: justify;
    letter-spacing: 0.5px;
    line-height: 30px;
    font-weight: 500;
    font-family: "Share Tech Mono", monospace;
    padding:10px;
}
#back
{
    background:white;
    padding:10px;
    text-align:center;
    width:30%;
    margin-left:auto;
    margin-right:auto;
    border-radius:15px;
    transition:0.3s ease all;
 }
    a{
        text-decoration:none;
        font-weight:bold;
        font-family: "Poppins", sans-serif;
        
    }
   #back:hover
   {
     background:red;
     transform:scale(1.05);
   }

        </style>
    </head>
</html>
  <body>
    <div id="main">
        <?php
        $row=mysqli_fetch_assoc($result);
        echo "<h1>".htmlspecialchars($row['name'])."</h1>";
        echo "<p>".htmlspecialchars($row['content'])."</p>";
        ?>
     </div> 
     <div id="back">
     <a href="space.php"> GO TO NOTES</a>
</div>
</body>
</html>