<?php
session_start();
include("../database/db.php");
if(!isset($_SESSION['username']))
{
    header("Location: ../login/index.html");
    exit();
}

$username=$_SESSION['username'];

$sql="SELECT name,age FROM users WHERE username=?";

$check=mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param($check,"s",$username);

mysqli_stmt_execute($check);

$result=mysqli_stmt_get_result($check);

$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DASHBOARD</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,600;1,700&family=Zen+Dots&display=swap" rel="stylesheet">
    <style>
      body{
        background-color: #09041f;
      }
          #head
          {
            display: flex;
            font-size: 10px;
           font-family: "Zen Dots", sans-serif;
          letter-spacing: 2px;
          justify-content: center;
          color:white;
          text-align:center;
          flex-wrap:wrap;
          }
          #header
          {
            background:linear-gradient(135deg,#060649,#2222ae);
            border-radius: 20px;
            min-height: 25vh;
           padding: 20px;
           box-sizing:border-box;
          }
          #header h3
          {
            font-size:20px;
            margin:0;
          }
          #details
          {
            display: flex;
            margin-left:20px;
            flex-direction: column;
            color:white;
            font-size: 15px;
            font-family: "Poppins", sans-serif;
          margin-top:10px;
          magin:0;
          gap:20px;
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
      a{
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

      a:hover{
        text-decoration: underline;
        transform: scale(1.1);
        background: #050542;
        color:white;
           }
          #now
          {
            background-color: #050542;
            color:white;
            padding: 10px 20px;
            border-radius: 20px;
            padding:10px;
          }
          h2
        {
          color:rgb(17, 100, 209);
          font-family: "Poppins", sans-serif;
          text-align: center;
        }
        #form
        {
          background:white;
          border-radius: 20px;
          min-height: 25vh;
          padding: 20px;
          box-sizing:border-box;
          margin-top: 40px;
          width: 70%;
          margin-left: auto;
          margin-right: auto;
        }
        input, textarea
        {
          width: 100%;
          padding: 10px;
          margin: 10px 0;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-family: "Poppins", sans-serif;
        }
        input[type="submit"]
        {
          background-color: #050542;
          color: white;
          border: none;
          cursor: pointer;
          transition: 0.3s ease all;
        }

        input[type="submit"]:hover
        {
          background-color: #fa2f06;
          box-shadow:  0 0 10px #3882eb;
        }
        #about
{
    background:white;

    width:70%;

    margin-left:auto;

    margin-right:auto;

    margin-top:40px;

    border-radius:20px;

    padding:25px;

    box-sizing:border-box;
}

#about h2
{
    text-align:center;

    color:#1b4fd8;

    font-family:"Poppins",sans-serif;
}

#about p
{
    font-family:"Poppins",sans-serif;

    line-height:30px;

    color:#222;

    text-align:justify;
}
        </style>

    </head>
    <body>
      <div id="page">
        <a href="home.php" id="now">HOME</a>
        <a href="../space/space.php"  class="main">SPACE</a>
        <a href="settings.php">SETTINGS</a>
        <a href="logout.php">LOG OUT</a>
        </div>
        <div id="header">
        <div id="head">
            <h1> DASHBOARD </h1>
        </div>
        <div id="details">
                  
            Welcome , <h3><?php echo $row['name']; ?></h3>
            <h3>Age: <?php echo $row['age']; ?></h3>
            <h4> Status: Active</h4>
        </div>
  </div>
  <div id="about">

<h2>About This Workspace</h2>

<p>
This dashboard is designed as a secure personal workspace where users can manage their account, store personal notes, and organize important information in a simple and modern environment.

The system focuses on authentication, security, responsive design, and clean user experience. Users can safely access their personal space, manage account settings, and interact with different dashboard features through an organized interface.

Built using HTML, CSS, JavaScript, PHP, MySQL, sessions, and secure password hashing.
</p>

</div>
      <div id="form">
       <h2>Any Suggestions?</h2>
     <form>
         <input type="text" placeholder="Name..." >
         <textarea placeholder="Your Suggestions..." rows="5" cols="30"></textarea>
         <input type="submit" value="Submit">
     </form>
     </div>

    </body>