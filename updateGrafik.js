$(document).ready(function(){
    update();
});


function update(){
    anychart.onDocumentReady(function () {
        anychart.data.loadJsonFile("db/result_db.php", function (data) {
          // create a chart and set loaded data
          chart = anychart.bar(data);
          chart.container("container");
          chart.draw();
        });
    });
}