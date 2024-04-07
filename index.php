<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
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

.navbar {
    background: #E30B5D;
    margin: 0;
    padding: 20px 30px;
}

.logo {
    font-size: 14pt;
    font-weight: bold;
    text-decoration: none;
    color: white;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.tombol {
    display: none;
    color: white;
    font-size: 14pt;
}

.tombol:hover {
    cursor: pointer;
}

.menu {
    margin: 0;
    display: flex;
    list-style: none;
    padding: 0;
}

.menu li {
    padding-left: 0;
    margin-right: 10px;
}

.menu li a {
    padding: 10px;
    color: white;
    text-decoration: none;
    display: inline-block;
}

.table-container {
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
    background-color: #F08080;
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

.register-button,
.button {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.register-button {
    background-color: #007bff;
    color: #fff;
}

.register-button:hover {
    background-color: #0056b3;
}

.button {
    background-color: #6c757d;
    color: #fff;
}

.button:hover {
    background-color: #495057;
}

.category-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Memusatkan konten kategori */
    gap: 20px;
    margin-top: 20px;
}

.category-item {
    width: calc(25% - 20px); /* Mengatur lebar item kategori */
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    flex: 1 0 auto; /* Memastikan item kategori dapat menyesuaikan ukurannya */
    max-width: 250px; /* Menetapkan lebar maksimum item kategori */
    display: flex; /* Menjadikan konten kategori menjadi flexbox */
    flex-direction: column; /* Mengatur arah konten ke vertikal */
    align-items: center; /* Memusatkan konten secara horizontal */
    justify-content: center; /* Memusatkan konten secara vertikal */
    text-align: center; /* Memusatkan teks ke tengah */
}

.category-item:hover {
    transform: translateY(-5px);
}

.category-item img {
    max-width: 100%; /* Membuat gambar responsif */
    height: auto;
    border-radius: 5px;
}

.category-item p {
    margin-top: 15px;
    font-size: 18px; /* Memperbesar ukuran teks judul kategori */
    color: #333;
}
    </style>

</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
        <nav class ="navbar">
            <div class="container">
                <a href="" class="logo">GALERI AY4JIE</a>
                <ul class="menu">
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
                <div class="tombol">&#9776;</div>
            </div>
        </nav>
    <?php
        } else {
    ?>   
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
    <?php
        }
    ?>

    <!-- category -->
    <div class="section">
            <p><h1 style="text-align: center; margin-top: 40px; margin-bottom: 20px;">Kategori</h3></p>
    <div class="container-fluid">
        <div class="category-container">
                <?php
                    include "koneksi.php";
                    $sql=mysqli_query($conn,"select * from album,user where album.userid=user.userid");
                    if(mysqli_num_rows($sql) > 0){
                        while($data=mysqli_fetch_array($sql)){
                ?>
                            <div class="category-item">
                                <a href="galeri.php?kat=<?php echo $data['albumid'] ?>">
                                    <img src="bg.jpeg" alt="<?php echo $data['namaalbum'] ?>" width="100px" style="margin-bottom:5px;"></p>
                                    <p style="text-align: center;"><b><?php echo $data['namaalbum'] ?></b></p>
                                    <p style="text-align: center;"><?php echo $data['deskripsi'] ?></p>
                                    
                                </a>
                            </div>
                <?php 
                        }
                    } else {
                ?>
                        <p style="text-align: center;">Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
