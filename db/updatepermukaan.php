<?php

include "connect_db.php";
$var1 = $_GET['data1'];
$statper = $_GET['data1'];
if ($statper >0 && $statper<=20){
    $ketper="BANJIR";
}
else
if ($statper >20 && $statper<=30){
    $ketper="SIAGA 2";
}
else
if ($statper >30 && $statper<=40){
    $ketper="SIAGA 1";
}
else {
    $ketper="AMAN";
}

mysqli_query($conn, "INSERT INTO datapermukaan(permukaan,statusp) 
                VALUES('$var1','$ketper')");
?>