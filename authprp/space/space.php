<?php
 session_start();
 if(!isset($_SESSION['username']))
  {
    header("location:../login/index.html");
    exit();
  }
  $username=$_SESSION['username'];
   include("../database/db.php");
   $sql="select name from notes where username='$username'";
   $result=mysqli_query($conn,$sql);
   $count=mysqli_num_rows($result);
  if($_SERVER['REQUEST_METHOD']=="POST")
    { 
         if(isset($_POST['search']))
          {
          $key=$_POST['search'];
          $sql="select * from notes where name=? and username=?";
          $check=mysqli_prepare($conn,$sql);
          if($check)
            {
              mysqli_stmt_bind_param($check,"ss",$key,$username);
              mysqli_stmt_execute($check);
              $result=mysqli_stmt_get_result($check);
              $count=mysqli_num_rows($result);
            }
          }
         else  if(isset($_POST['values']))
            {
              $name=$_POST['values'];
             
              $sql="delete from notes where name=? and username=?";
              $check=mysqli_prepare($conn,$sql);
              if($check)
                {
                  mysqli_stmt_bind_param($check,"ss",$name,$username);
                $up=  mysqli_stmt_execute($check);
                  if($up)
                    {
                      echo "<script>
                      alert('deleted succsessfully'); 
                      window.location.href='space.php';
                      </script>";
                      
                    }
                    else
                      {
                         echo "<script>
                      alert('deletion failed'); 
                      window.location.href='space.php';
                      </script>";
                      }
                }
            }
      
    }
?>


<!DOCTYPE html>
 <html>
    <head>
        <title>YOUR SPACE.</title>

          <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,600;1,700&family=Zen+Dots&display=swap" rel="stylesheet">  
           <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
           <link href="https://fonts.googleapis.com/css2?family=Coiny&display=swap" rel="stylesheet">
       <script>
          function createnew()
          {
            window.location.href="create.html";
          }
            </script>
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
          h1
          {
           color:white;
           text-align: center;
           text-shadow: 0 0 10px #1b38f8;
           letter-spacing: 1px;
            font-family: "Kaushan Script", cursive;        
           }

          #button1
          {
            border:none;
            background:linear-gradient(135deg,#2828e1,#3c74f4);
            font-family:"Poppins",sans-serif ;
            letter-spacing: 0.5px;
            border-radius: 15px;
            color:white;
            padding:10px 30px;
            margin: 20px;
            width: 40%;
            height: 50px;
            margin-left: 40px;
            transition: 0.3s ease all;
          }
          #button1:hover
          {
            transform: scale(1.05);
           }

          #notes
          {
           display: flex;
           flex-direction: row;
               align-items:center;
           margin-bottom: 20px;
            width:80%;
            margin-left: 20px;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 0 5px grey;
            width: 80%; 
           transition: 0.3s ease all;
          }
              #notes form
          {
         display:inline;
        
         }
          #notes h3
          {
            color:#020a1f;
            padding: 10px;
            font-family: "Poppins", system-ui;
            font-size:15px;
            margin-right: auto;
         }
         #notes:hover
         {
          background-color:#cecccc;
          transform: scale(1.05);  
        }
          #delete
          {
           
            text-align: center;
            margin-right: 20px;
           margin-left:10px;
            background-color: #ff0000;
            color:white;
            font-family: "Poppins",sans-serif;
            border-radius: 10px;
            border:none;
            padding:10px;
            transition: 0.3s ease all;
          }
          #delete:hover
          {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgb(14, 66, 209);
          }
          
           #read
          {
           
            text-align: center;
            background-color: #1b58e6;
            margin-left:auto;
            color:white;
            font-family: "Poppins",sans-serif;
            border-radius: 10px;
            border:none;
            padding:10px;
            transition: 0.3s ease all;
          }
          #read:hover
          {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgb(14, 66, 209);
          }

         .content
         {
         background:linear-gradient(135deg,#8db0fc,#5b87e5);
         padding: 20px;     
         width: 90%;
         max-width: 800px;
         max-width: 700px;
         box-shadow: 0 0 10px greenyellow;
         display: flex;
         justify-content: center;
         align-items: center;
         margin:auto;
         border-radius: 10px;
         display: flex;
         flex-direction: column;
         margin-bottom: 30px;
         }
         h2
         {
          padding: 10px;
          color:white;
          font-family: "Poppins",sans-serif;
          text-shadow: 0 0 10px #061d40; 
          }   
          
          #search
          {
            background-color: white;
            margin-top: 20PX;
            margin-bottom: 40px;
            width: 40%;
           padding:20px;
          
           border-radius: 10px;
           box-shadow: 0 0 10px lightblue;
          }
          input[type="search"]
          {
            width: 60%;
            max-width: 300px;
            height: 40px;
            margin-right:20px;
            border:1px solid blue;
            border-radius: 5px;
            font-family: "Poppins",sans-serif;
            padding-left: 10px;
            margin-bottom: 20px;
            outline: none;
            transition: 0.3s ease all;
          }
          input[type="search"]:hover
          {
            transform: scale(1.05);
          }
           input[type="submit"]
           {
              border:none;
              background-color:#0b62f8;
              color:white;
              padding:10px 20px;
              border-radius:10px;
              font-weight: bold;
              
              transition: 0.3s ease all;

           }
           input[type="submit"]:hover
           {
            transform:scale(1.05);
            background-color: #07d207;  
           }
              
              </style>
       
    </head>
    <body>
        <div id="page">
            <a href="../dash/home.php" class="main">HOME</a>
            <a href="space.php" class="main now">SPACE</a>
            <a href="../dash/settings.php"  class="main ">SETTINGS</a>
            <a href="../dash/logout.php"  class="main log">LOG OUT</a>
        </div>
        <h1>Save Your Ideas Here.</h1>
         <form> 
            <input type="button" value="Create Note" id="button1" onclick="createnew()"><br>
            </form>
            <div id="search">
              <form class="form1" method="POST">
              <input type="search" name="search" placeholder="Search Note">
              <input type="submit" value="search">
              </form>
            </div>
              <div class="content">
               <script>
                 function check()
                 {
                    var id=confirm("are you want to perform this delete");
                    if(id)
                    {
                      return true;
                    }
                    return false;
                    }
               </script>
                <?php
                
                if($result)
                {
                 if($count>0)
                  {
                    echo " <h2>Your Note's</h2>";
                  while($row=mysqli_fetch_assoc($result))
                    {
                     echo "
                     <div id='notes'>
                     <h3>".$row['name']."</h3>
                     <form name='form3' method='POST' id='form3' action='read.php'>
                      <input type='submit' value='View' id='read'>
                      <input type='hidden' name='read' value='".$row['name']."'>
                     </form>
                    <form name='form2' method='POST' onsubmit='return check()'>
                    <input type='submit' value='Delete' id='delete'>
                    <input type='hidden' name='values' value='".$row['name']."'>
                     </form>                
                     </div>";
                    }
                  }
                  else
                    {
                      echo "<h2>Oops!, No notes to display</h2>";
                    }
                }
                
                 ?>
              </div>
        
    </body>
 </html>