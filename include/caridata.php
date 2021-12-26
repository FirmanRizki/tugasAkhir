<?php 
include 'db/connect_db.php';
?>

<h5>Form Pencarian Data</h5>
 
<form action="caridata.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>

<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<center>
<table border="1">
	<tr>
		<th>No</th>
		<th>Status Permukaan</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysql_query("select * from kirimdata where statusp like '%".$cari."%'");				
	}else{
		$data = mysql_query("select * from kirimdata");		
	}
	$no = 1;
	while($d = mysql_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['statusp']; ?></td>
	</tr>
	<?php } ?>
</table>
    </center>