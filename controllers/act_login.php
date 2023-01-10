<?php

    include '../database/koneksi.php';
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username' and password='$password'";
    $sql = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($sql);

    if(mysqli_num_rows($sql) > 0){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $row['level'];
        header('location:../admin.php');
    }else{
        header("location:../login.php?pesan=gagal") or die(mysql_errno());
    }