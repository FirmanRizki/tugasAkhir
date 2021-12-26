<html>
<head>
    <title>Latihan Pencarian Tanggal</title>
    <!-- bootstrap cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <!-- form filter data berdasarkan range tanggal  -->
        <form action="cobacarideh.php" method="get">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label">Periode</label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="dari" required>
                </div>
                <div class="col-auto">
                    -
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="ke" required>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Permukaan</td>
                            <td>Status Permukaan</td>
                            <td>Reservoir</td>
                            <td>Status Reservoir</td>
                        </tr>
                    </thead>
                    <?php 
                        include '../db/connect_db.php';
                        //jika tanggal dari dan tanggal ke ada maka
                        if(isset($_GET['dari']) && isset($_GET['ke'])){
                            // tampilkan data yang sesuai dengan range tanggal yang dicari 
                            $data = mysqli_query($conn, "SELECT * FROM datasensor WHERE 'date' BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
                        }else{
                            //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                            $data = mysqli_query($conn, "SELECT * FROM datasensor");		
                        }
                        // $no digunakan sebagai penomoran 
                        $no = 1;
                        // while digunakan sebagai perulangan data 
                        while($d = mysqli_fetch_array($data)){
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
            </div>
        </div>
    </div>
</body>

</html>
