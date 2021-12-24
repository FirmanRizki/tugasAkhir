const pizza_input = document.querySelector('.pizza-input');
const steak_input = document.querySelector('.steak-input');

var ctx = document.getElementById("PieChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pizza','Steak'],
        datasets:[
            {
                label:'# of Votes',
                data: [10, 10, 10],
                bacgroundColor: ['#4572E','#17BEBB'],
                borderWidth: 1
                
            }
        ]
    }
});

const updateChartValue = (input, dataOrder) => {
    input.addEventListener('change',e=> {
        myChart.data.datasets[0].data[dataOrder] = e.target.value;
        myChart.update();
    });
};

updateChartValue(pizza_input,0);
updateChartValue(steak_input, 1);