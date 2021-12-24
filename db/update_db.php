<?php
include "connect_db.php";
$var1 = $_GET['data1'];
$var2 = $_GET['data2'];
$statper = $_GET['data1'];
if ($statper >=0 && $statper<=15){
    $ketper="BANJIR";
}else
if ($statper >15 && $statper<=25){
    $ketper="SIAGA 3";
}
else
if ($statper >15 && $statper<=25){
    $ketper="SIAGA 2";
}
else
if ($statper >15 && $statper<=25){
    $ketper="SIAGA 1";
}
else {
    $ketper="AMAN";
}
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

mysqli_query($conn, "INSERT INTO datasensor(permukaan,statusp,reservoir,statusr) 
                VALUES('$var1','$ketper','$var2','$ketres')");
?>