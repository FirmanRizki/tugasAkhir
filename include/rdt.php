<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Document</title>

    <script type="text/javascript">
        $(Document).ready(function(){
            setInterval(function() {
                $("#ceksensor").load('realtime/tampil.php');
            }, 1000);

        });
    </script>

</head>

<body>
    <div class="container" style="text-align: center; width: 500px">
        <h3>Ketinggian Air Permukaan</h3>
         <div class="panel panel-default">
             <div class="panel-body">
                 <h1><span id="ceksensor"></span></h1>
             </div>
         </div>
    </div>
</body>

</html>