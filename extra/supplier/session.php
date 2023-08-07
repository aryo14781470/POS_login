<?php
	require_once("../controllerUserData.php");

	if (!isset($_SESSION['email']) ||(trim ($_SESSION['email']) == '')) {
		header('location:../login-user.php');
		exit();
	}

	
	$email = $_SESSION['email'];
    $conn = conn();
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
    $acces = $row['acces'];

	$sql1 = "SELECT * FROM level WHERE acces_level ='$acces'";
	$result1 = mysqli_query($con, $sql1);
	$row1 = mysqli_fetch_array($result1);

    $username = $row['username'];
	$name_level = $row1['name_level'];
?>