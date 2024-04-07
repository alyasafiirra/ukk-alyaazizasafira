<?php
    include "koneksi.php";

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $namalengkap=$_POST['namalengkap'];
    $alamat=$_POST['alamat'];

    if(isset($_POST['submit'])){
    $sql=mysqli_query($conn,"insert into user(username, password, email, namalengkap, alamat) values('$username','$password','$email','$namalengkap','$alamat')");
    header("location:login.php");
    }
?>