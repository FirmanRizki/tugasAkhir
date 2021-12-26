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
                
            <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $data = mysqli_query("SELECT * FROM datasensor where statusp like '%".$cari."%'");				
            }else{
                $data = mysqli_query("SELECT * from datasensor");		
            }
            $no = 1;
            while($dt = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $dt['date']; ?></td>
                <td><?php echo $dt['permukaan']; ?></td>
                <td><?php echo $dt['statusp']; ?></td>
                <td><?php echo $dt['reservoir']; ?></td>
                <td><?php echo $dt['statusr']; ?></td>
            </tr>
            <?php } ?>

            </tbody>
        </table>
</center>