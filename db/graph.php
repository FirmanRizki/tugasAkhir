 <?php   
    // Data for date
	$date = "SELECT date FROM datasensor";
	$result1 = $conn->query($date);
	$array = array();
	while($row1 = mysqli_fetch_assoc($result1))
	{
		$array[][] = $row1['date'];
	}
	echo json_encode(array("date"=> $array[0][0]));
 
	// Data  for permukaan
	$permukaan = "SELECT permukaan FROM datasensor";
	$result2 = $conn->query($permukaan);
	$array1 = array();
	while($row2 = mysqli_fetch_assoc($result2)){
		$array1[][] = $row2["permukaan"];
	}
	echo json_encode(array("permukaan"=> $array1[0][0]));
?>