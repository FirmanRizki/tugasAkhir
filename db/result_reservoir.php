<?php
    include "connect_db.php";
	$datakirim = "SELECT * FROM datareservoir";
	$result = $conn->query($datakirim);
	while ($row = mysqli_fetch_assoc($result))
	{
    	$data[] = $row;
	}
	echo json_encode(array("result"=>$data)); 
?>