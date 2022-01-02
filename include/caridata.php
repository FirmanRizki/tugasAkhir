<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" ></link>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membuat Live Search PHP Ajax - Sekolah Program</title>
</head>

<body>
    <div class="container">
        <input type="text" id="search" class="form-control mt-3 mb-5" placeholder="serach name...">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Ketinggian Permukaan</th>
                        <th>Status Permukaan</th>
                    </tr>
                </thead>
                <tbody id="tampil">
                    <?php
                    require_once 'db/connect_db.php';
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM datasensor");
                    while ($row = mysqli_fetch_object($query)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->date; ?></td>
                            <td><?= $row->permukaan; ?></td>
                            <td><?= $row->statusp; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $.ajax({
                    type: 'POST',
                    url: 'include/search.php',
                    data: {
                        search: $(this).val()
                    },
                    cache: false,
                    success: function(data) {
                        $('#tampil').html(data);
                    }
                });
            });
        });
    </script>
</body>