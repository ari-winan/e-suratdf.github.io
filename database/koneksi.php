<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "e_arsip";

    //koneksi
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //cek
    if(mysqli_connect_errno()){
        echo "Koneksi Gagal! " .mysqli_connect_errno();
    }
?>