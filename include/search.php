<?php
    if (isset($_POST['search'])) {
        require_once '../db/connect_db.php';

        $no = 1;
        $search = $_POST['search'];

        $query = mysqli_query($conn, "SELECT * FROM datasensor WHERE statusp LIKE '%" . $search . "%'");
        while ($row = mysqli_fetch_object($query)) {
?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row->date; ?></td>
            <td><?= $row->permukaan; ?></td>
            <td><?= $row->statusp; ?></td>
        </tr>
<?php }
} ?>