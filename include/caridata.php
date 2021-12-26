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
            <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $data = mysql_query("SELECT * FROM datasensor where statusp like '%".$cari."%'");				
            }else{
                $data = mysql_query("SELECT * from datasensor");		
            }
            $no = 1;
            while($d = mysql_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['date']; ?></td>
                <td><?php echo $d['permukaan']; ?></td>
                <td><?php echo $d['statusp']; ?></td>
                <td><?php echo $d['reservoir']; ?></td>
                <td><?php echo $d['statusr']; ?></td>
            </tr>
            <?php } ?>
        </table>
</center>