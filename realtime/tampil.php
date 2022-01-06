<?php
$konek = mysqli_connect("localhost","root","","kirimdata");
$sql = mysqli_query($konek, "SELECT * FROM datasensor");
$data = mysqli_fetch_array($sql);
$nilai = $data["permukaan"];

echo $nilai ;
?>