<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css"/>
    
    <style type="text/css">
        body{font-family: calibri; background:url(neon.jpeg);}
    </style>
    
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1 style="color: #141314">Halaman Registrasi</h1>
    <form action="proses_register.php" method="post">
        <table>
            <tr>
                <td style="color: #141314">Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td style="color: #141314">Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td style="color: #141314">Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td style="color: #141314">Nama Lengkap</td>
                <td><input type="text" name="namalengkap"></td>
            </tr>
            <tr>
                <td style="color: #141314">Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="register"></td>
            </tr>
        </table>
    </form>
    <div id="footer">
    <h4 style="color: #141314">website gallery alya</h4>
	</div>
</div>

</body>
</html>