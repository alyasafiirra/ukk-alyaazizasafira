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
    <title>Halaman Edit Foto</title>
    <link rel="stylesheet" href="style.css"/>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #FC9AFF;
    color: #900C72;
}

h1 {
    text-align: center;
    margin-top: 20px;
    color: #6b3b08;
}

p {
    text-align: center;
    margin-top: 10px;
    color: #6b3b08;
}

ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
    margin-top: 20px;
}

ul li {
    display: inline;
    margin-right: 10px;
}

ul li a {
    text-decoration: none;
    color: #900C72;
    padding: 8px 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    background-color: #DA7910;
}

ul li a:hover {
    background-color: #FC9AFF;
    color: #900C72;
}

form table {
    width: 100%;
    margin-top: 20px;
}

form table tr {
    margin-bottom: 15px;
}

form table tr:last-child {
    margin-bottom: 0;
}

form table td {
    padding: 10px;
    color: #6b3b08;
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
    width: 100%;
    padding: 10px;
    background-color: #900C72;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form table input[type="submit"]:hover {
    background-color: #E0600B;
}
    </style>
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1 style="color: #6b3b08">Halaman Edit Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td style="color: #6b3b08">Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td style="color: #6b3b08">Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td style="color: #6b3b08">Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td style="color: #6b3b08">Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
    <div id="footer">
		<h4 style="color: #6b3b08">web galeri // 2024</h4>
	</div>
</div>
</body>
</html>