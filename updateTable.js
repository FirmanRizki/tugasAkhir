$(document).ready(function(){
    done();
});

function done(){
    setTimeout(function(){
        update();
        done();
    },1000);
}

function update(){
    $.getJSON("db/result_permukaan.php", function(data){
        $("tbody").empty();
        var no=1;
        $.each(data.result, function(){
            $("tbody").append("<tr><td>"+(no++)+"</td><td>"+
            this['date']+"</td><td>"+
            this['permukaan']+"</td><td>"+
            this['statusp']+"</td><td>"+"</td></tr>");
        });
    });
}