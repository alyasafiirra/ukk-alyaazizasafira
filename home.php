<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffe6e4;
        }
        .navbar{
            background: #E30B5D;
            margin: 0;
            padding: 20px 30px;
        }
 
        .logo{
            font-size: 14pt;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
 
        .container{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
 
        .tombol{
            display: none;
            color: white;
            font-size: 14pt; 
        }
 
        .tombol:hover{
            cursor: pointer;
        }
 
        .menu{
            margin: 0;
            display: flex;
            ist-style: none;
            padding: 0; 
        }
 
        .menu li{
            padding-left: 0;
            margin-right: 10px;
        }
 
        .menu li a{
            padding:10px;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
    <nav class="navbar">
    <div class="container">
 
    <a href="" class="logo">GALLERY AY4JIE</a>
 
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <div class="tombol">
        &#9776;
        </div>
    </div>
    </nav>
    
    <body>
    <font size="6"><h1>Halaman Home</h1></font>
    <font size="5"><p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b></p><font>
</body>
</html>