    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
<?php
        include("../tugasAkhir/db/connect_db.php");
        $datakirim = "SELECT * FROM datasensor";
        $result = $conn->query($datakirim);
        $reservoir = array();
        $date = array();
        $permukaan = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $reservoir[] = $row["reservoir"];
            $date[] = $row["date"];
            $permukaan[] = $row["permukaan"];
            
        }
?>
<div>
        <canvas id="myChart" style="min-width: 400px; height: 400px; margin: 0 auto"></canvas>
</div>
        <script>
            //Setup Block
            const reservoir = <?php echo json_encode ($reservoir); ?>;
            const date = <?php echo json_encode ($date); ?>;
            const permukaan = <?php echo json_encode ($permukaan); ?>;
            const data = {
                labels:date,
                    datasets: [{
                        label: 'Reservoir',
                        data: reservoir,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'Permukaan',
                        data: permukaan,
                        backgroundColor: [
                            'rgba(66, 136, 106, 0.8)'
                
                        ],
                        borderColor: [
                            'rgba(66, 255, 106, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            };
            //Config Block
            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik'
                    }
                    }
                },
            };
            //Render Block
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, config);
        </script>