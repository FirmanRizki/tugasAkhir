<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <br>
    <h4>Cari Data</h4>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <div class="form-group">
        <label for="sel1">Pencarian Untuk Ketinggian Permukaan : Aman, Siaga 1, Siaga 2, Siaga3, dan Banjir</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  required/>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>

    </form>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Ketinggian Permukaan</th>
            <th>Status Permukaan</th>
            <th>Ketinggian Reservoir</th>
            <th>Status Reservoir</th>
        </tr>
        </thead>
        <?php
        include "db/connect_db.php";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $sql="SELECT * FROM datasensor WHERE statusp LIKE '%".$kata_kunci."%' OR date LIKE '%".$kata_kunci."%' OR permukaan LIKE '%".$kata_kunci."%' ORDER BY statusp ASC";

        }else {
            $sql="SELECT * FROM datasensor order by statusp asc";
        }


        $hasil=mysqli_query($conn,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["date"]; ?></td>
                <td><?php echo $data["permukaan"];   ?></td>
                <td><?php echo $data["statusp"];   ?></td>
                <td><?php echo $data["reservoir"];   ?></td>
                <td><?php echo $data["statusr"];   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>

</body>
</html>