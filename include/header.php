<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/icontelu.png" type="image/ico" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" ></link>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title> Data Banjir </title>
</head>
<body>
    <div class="content">   
		<header>
			<h2 class="judul">Monitoring Data Banjir</h2>
			<h6 class="deskripsi">Memonitoring ketinggian Permukaan Air </h6>
		</header>

	<div class="menu">
		<ul>
			<li><a href="index.php?page=home">Home</a></li>
			<li><a href="index.php?page=grafik">Grafik</a></li>
			<li><a href="index.php?page=realtimedata">Realtime Data</a></li>
			<li><a href="index.php?page=caridata">Search History</a></li>
			<li><a href="index.php?page=profil">Profil</a></li>
		</ul>
	</div>
    <div class="badan">
	<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		switch ($page) {
			case 'home':
				include "include/home.php";
				break;
			case 'grafik':
				include "include/lineChart.php";
				break;
			case 'realtimedata':
				include "include/realtimedata.php";
				break;
			case 'profil':
				include "include/profile.php";
				break;
			case 'caridata':
				include "include/caridata.php";
				break;					
			default:
				echo "<center><h3>Maaf. Halaman Dalam Pembangunan</h3></center>";
				break;
		}
	}else{
		include "include/home.php";
	}
	?>

	</div> 