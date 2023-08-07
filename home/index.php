<?php
require_once ("../model/include.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Landing Page CV.XYZ</title>
</head>
<style>
	#navbar a, li{
		color: #003300;
	}
	#jumbotron{
		text-shadow: #CC0000;
		color: #ffffee;
		background-image: url('../assets/img/jumboimage.jpg');
		height: 450px; position: relative;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		box-shadow: inset 0 0 0 2000px rgba(0,0,0,0.5);
	}
	.hubungi-button{
		color: #ffffee;
	}

	#keunggulan h3{
		color: lightskyblue;
	}

	#konsultasi{
		background-color: #afcebd;
	}
	h2::before,h2::after{
		background-color: #06113b; content: '';
		display: inline-block; height: 2px; position: relative;
		vertical-align: middle; width: 25%;
	}

	h2::before { right: 0.5em; margin-left: -50%; }
	h2::after { left: 0.5em; margin-right: -50%; }
</style>
<body>

	<section id="navbar" class="fixed-top">
		<?php include "header.php"; ?>
	</section>
	<section id="jumbotron" class="jumbotron-img container-fluid">
		<?php include "jumbotron.php"; ?>
	</section>
	<section id="keunggulan" class="container-fluid bg-light px-4">
		<?php require_once "keunggulan.php"; ?>
	</section>
	<section id="produk" class="container-fluid bg-light px-4">
		<?php require_once "produk.php"; ?>
	</section>

	<section id="konsultasi" class="container-fluid">
		<?php require_once "konsultasi.php"; ?>
	</section>
	<section id="tentang-kami">
		<?php require_once "tentang_kami.php"; ?>
	</section>
	<footer style="background-color: #3e6e9a">
		<?php require_once "footer_home.php"; ?>
	</footer>
</body>
</html>
