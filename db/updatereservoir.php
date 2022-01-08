<?php
include "connect_db.php";
$var2 = $_GET['data2'];
$statres = $_GET['data2'];

if ($statres >=0 && $statres<=25){
    $ketres="RESERVOIR PENUH";
}else
if ($statres >25 && $statres<=30){
    $ketres="RESERVOIR LEVEL 2";
}else
if ($statres >30 && $statres<=35){
    $ketres="RESERVOIR LEVEL 1";
}
else {
    $ketres="RESERVOIR AMAN";
}

mysqli_query($conn, "INSERT INTO datareservoir(reservoir,statusr) 
                VALUES('$var2','$ketres')");
?>