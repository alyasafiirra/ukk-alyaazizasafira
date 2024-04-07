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
    <title>Halaman Foto</title>
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
            max-width: 35%;
            margin: 20px auto;
            background-color: #EDA371;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
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

        form table input[type="text"],
        form table input[type="file"],
        form table select {
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


    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>