<?php

include "connect_db.php";
$var2 = $_GET['data2'];
$statres = $_GET['data2'];

if ($statres >=0 && $statres<=10){
    $ketres="RESERVOIR AMAN";
}else
if ($statres >10 && $statres<=15){
    $ketres="RESERVOIR LEVEL 1";
}else
if ($statres >15 && $statres<=20){
    $ketres="RESERVOIR LEVEL 2";
}
else {
    $ketres="RESERVOIR PENUH";
}

mysqli_query($conn, "INSERT INTO datareservoir(reservoir,statusr) 
                VALUES('$var2','$ketres')");   
?>