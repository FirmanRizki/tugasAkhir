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
<br>
<table class="table table-dark" align="center" border=1>
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th></th>
                <th scope="col">Ketinggian Air Permukaan</th>
                <th scope="col">Status Permukaan</th>
                <th scope="col">Ketinggian Air Reservoir</th>
                <th scope="col">Status Reservoir</th>
            </tr>
            </thead>
            <tbody>
            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="updateTable.js"></script>

            </tbody>
        </table>
</center>