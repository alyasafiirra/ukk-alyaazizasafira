<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <p style="teks-align:center">
    <title>Halaman Login</title></p>
    <link rel="stylesheet" href="style.css"/>

    <style type="text/css">
        body{font-family: calibri; background:url(neon.jpeg);}
    </style>
</head>

<body>    
<div id="wrapper">
    <div id="header">
    <h1 style="color: #141314">Halaman Login</h1>
    <form action="proses_login.php" method="post">
        <table>
            <tr>
                <td style="color: #14114">Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td style="color:#1413 14">Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
	    <br />
         <p>Belum punya akun? daftar <a style="color:#00C;" href="register.php">DISINI</a></p>
         <p>atau klik <a style="color:#00C;" href="index.php">Kembali</a></p>
    </form>
    <div id="footer">
		<h4 style="color: #141314">website gallery alya</h4>
	</div>
</div>
</body>
</html>