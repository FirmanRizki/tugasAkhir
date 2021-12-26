<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

    <body>
        <div class="container">
            <h2 align="center" style="margin: 30px;">Filter &amp; Cari Data Banjir</h2>
            <?php 
                $s_status="";
                $s_keyword="";
                if (isset($_POST['search'])) {
                    $s_status = $_POST['s_status'];
                }
            ?>
            <form method="POST" action="">
                <div class="row mb-3">
                    <div class="col-sm-12"><h4>Cari</h4></div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select name="s_status" id="s_status" class="form-control">
                                <option value="">Filter Status</option>
                                <option value="aman" <?php if ($s_status=="aman"){ echo "selected"; } ?>>AMAN</option>
                                <option value="siaga1" <?php if ($s_status=="siaga1"){ echo "selected"; } ?>>SIAGA 1</option>
                                <option value="siaga2" <?php if ($s_status=="siaga2"){ echo "selected"; } ?>>SIAGA 2</option>
                                <option value="siaga3" <?php if ($s_status=="siaga3"){ echo "selected"; } ?>>SIAGA 3</option>
                                <option value="banjir" <?php if ($s_status=="banjir"){ echo "selected"; } ?>>BANJIR</option>
                            </select>
                        </div>
                    </div>

                        <div class="col-sm-4" >
                            <button id="search" name="search" class="btn btn-warning">Cari</button>
                        </div>
                </div>
            </form>
        
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Ketinggian Permukaan</td>
                        <td>Status Permukaan</td>
                        <td>Ketinggian Reservoir</td>
                        <td>Status Reservoir</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../db/connect_db.php';
                        $search = '%'. $s_status .'%';
                        $data = mysqli_query($conn, "SELECT * FROM datasensor WHERE statusp LIKE ? OR ('date' LIKE ? OR permukaan LIKE ? OR statusp LIKE ? OR reservoir LIKE ? OR statusr LIKE ?) ORDER BY statusp DESC");
                        
                        //$query = "SELECT * FROM datasensor WHERE statusp LIKE ? OR ('date' LIKE ? OR permukaan LIKE ? OR statusp LIKE ? OR reservoir LIKE ? OR statusr LIKE ?) ORDER BY statusp DESC">
                        //$data = $conn->prepare($query);
                        
                        $no = 1;
                        if ($data->num_rows > 0) {
                        while ($row = $res1->fetch_assoc()) {
                                $date = $row['date'];
                                $permukaan = $row['permukaan'];
                                $statusp = $row['statusp'];
                                $reservoir = $row['reservoir'];
                                $statusr = $row['statusr'];
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $nama_mahasiswa; ?></td>
                            <td><?php echo $alamat; ?></td>
                            <td><?php echo $jurusan; ?></td>
                            <td><?php echo $jenis_kelamin; ?></td>
                            <td><?php echo $tgl_masuk; ?></td>
                        </tr>
                    <?php  } }  else { ?> 
                        <tr>
                            <td colspan='7'>Tidak ada data ditemukan</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
</body>
</html>