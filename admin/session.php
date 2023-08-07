<?php

	require_once("../model/include.php");
//	require_once("../controllerUserData.php");
//	  require ("barang/dataBarang.php");
//    require ("supplier/dataSupplier.php");
//    require ("customer/dataCustomer.php");
//    require ("produk/dataViewProduk.php");
//    require ("produk/dataTambahProduk.php");
//    require ("produk/dataUpdateProduk.php");
//    require ("produk/dataDeleteProduk.php");
//    require ("transaksi/data_transaksi.php");
//    require ("transaksi/selection.php");
//    require ("postOperator.php");
	
	if (!isset($_SESSION['email']) ||(trim ($_SESSION['email']) == '')) {
		header('location:../auth/login-user.php');
		exit();
	}

	$email = $_SESSION['email'];
    $conn = conn();

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
    $acces = $row['acces'];
	$username = $row['username'];

	$sql1 = "SELECT * FROM level WHERE acces_level ='$acces'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_array($result1);
	$name_level = $row1['name_level'];
?>
