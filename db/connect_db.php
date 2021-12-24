<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "kirimdata";
    //Buat Koneksi ke MySql
    $conn = new mysqli($dbhost,$dbuser,$dbpass,$db);
    //Ngecek Koneksi MySql
    if($conn->connect_error){
        die("Connection Failed " . $conn->connect_error);
    }
?>