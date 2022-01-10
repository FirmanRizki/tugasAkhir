<?php

include "connect_db.php";
$var1 = $_GET['data1'];
$statper = $_GET['data1'];
if ($statper >0 && $statper<=10){
    $ketper="AMAN";
}
else
if ($statper >10 && $statper<=20){
    $ketper="SIAGA 1";
}
else
if ($statper >20 && $statper<=30){
    $ketper="SIAGA 2";
}
else {
    $ketper="BANJIR";
}

mysqli_query($conn, "INSERT INTO datapermukaan(permukaan,statusp) 
                VALUES('$var1','$ketper')");
?>