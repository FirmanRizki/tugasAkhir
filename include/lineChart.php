<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" ></link>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php
        include("../db/connect_db.php");
        $datakirim = "SELECT * FROM datasensor";
        $result = $conn->query($datakirim);
        $reservoir = array();
        $date = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $reservoir[] = $row["reservoir"];
            $date[] = $row["date"];
        }
        echo json_encode(array("result"=>$date)); 
    ?>
    <div>
        <canvas id="myChart" width="50" height="50"></canvas>
    </div>
        <script>
            //Setup Block
            const reservoir = <?php echo json_encode ($reservoir); ?>;
            const date = <?php echo json_encode ($date); ?>;
            const data = {
                labels:date,
                    datasets: [{
                        label: '# of Votes',
                        data: reservoir,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
            };
            //Config Block
            const config ={
                type: 'line',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            //Render Block
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, config);
        </script>
</body>
</html>