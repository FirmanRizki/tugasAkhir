    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
<?php
        include("../tugasAkhir/db/connect_db.php");
        $datakirim = "SELECT * FROM datasensor";
        $result = $conn->query($datakirim);
        $reservoir = array();
        $date = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $reservoir[] = $row["reservoir"];
            $date[] = $row["date"];
        }
?>
<div>
        <canvas id="myChart"></canvas>
</div>
        <script>
            //Setup Block
            const reservoir = <?php echo json_encode ($reservoir); ?>;
            const date = <?php echo json_encode ($date); ?>;
            const data = {
                labels:date,
                    datasets: [{
<<<<<<< HEAD
                        label: 'Reservoir',
=======
                        label: 'Tinggi Reservoir',
>>>>>>> e56b69488da41a95f47ac10324ad37513e75e310
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
                marginRight: 130,
                marginBottom: 25,
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