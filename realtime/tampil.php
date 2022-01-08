<?php
$konek = mysqli_connect("localhost","root","","kirimdata");
$sql = mysqli_query($konek, "SELECT * FROM datapermukaan");
$data = mysqli_fetch_array($sql);
$nilai = $data["permukaan"][-1];

echo $nilai;
?>