<!--1) include file jquery.min.js dan higchart.js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
 
    <script type="text/javascript">
    //2)script untuk membuat grafik, perhatikan setiap komentar agar paham
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container', //letakan grafik di div id container
        //Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line',  
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Data Banjir',
                x: -20 //center
            },
            xAxis: { //X axis menampilkan data tahun 
                categories: ['5 Menit', '10 Menit', '15 Menit','20 Menit','25 Menit','30 Menit']
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'Tinggi Air Dalam Sentimeter'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'//warna dari grafik line

                }]
            },
            tooltip: { 
      //fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
      //akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
      //series adalah data yang akan dibuatkan grafiknya,
      //saat ini mungkin anda heran, buat apa label indonesia dikanan 
      //grafik, namun fungsi label ini sangat bermanfaat jika
      //kita menggambarkan dua atau lebih grafik dalam satu chart,
      //hah, emang bisa? ya jelas bisa dong, lihat tutorial selanjutnya 
            series: [{  
                name: 'Permukaan',  
        //data yang akan ditampilkan 
                data: [1660, 1946,1632,2590,3004,1000]
            }]
        });
    });
     
});
    </script>

	
  </head>
  <body>
 
  
<!--grafik akan ditampilkan disini -->
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>