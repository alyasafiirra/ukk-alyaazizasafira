<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
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

        ul li a:hover {
            background-color: #FC9AFF;
            color: #900C72;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #EDA371;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form table {
            width: 100%;
        }

        form table tr {
            margin-bottom: 15px;
        }

        form table tr:last-child {
            margin-bottom: 0;
        }

        form table td {
            padding: 10px;
            text-align: center;
        }

        form table input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form table input[type="submit"] {
            padding: 10px 20px;
            background-color: #DA7910;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form table input[type="submit"]:hover {
            background-color: #900C72;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #F08080;
            color: #fff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }

        td:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #900C72;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color: #EDA371;
        }

        b {
            color: #DA7910;
        }

        .register-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #495057;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #495057;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <nav class ="navbar">
            <div class="container">

            <a href="" class="logo">GALERI AY4JIE</a>

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

    <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
                    <td><?=$data['namaalbum']?></td>
                    <td><?=$data['deskripsi']?></td>
                    <td><?=$data['tanggaldibuat']?></td>
                    <td>
                        <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                        <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>