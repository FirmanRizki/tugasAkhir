    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
<?php
        include("../databanjir/db/connect_db.php");
        $datakirim = "SELECT * FROM datapermukaan";
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
<div class="chart-container" style="position: flex; height:75vh; width:80vw">
        <canvas id="myChart" style="height:75vh; width:80vw" ></canvas>
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
                            'rgba(255, 99, 132, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'Permukaan',
                        data: permukaan,
                        backgroundColor: [
                            'rgba(32, 120, 255, 0.5)'
                
                        ],
                        borderColor: [
                            'rgba(32, 120, 255, 1)'
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