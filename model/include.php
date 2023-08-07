<?php

	session_start();
	date_default_timezone_set("Asia/Jakarta");
	require_once ('vendor/PHPMailer/src/Exception.php');
	require_once ('vendor/PHPMailer/src/PHPMailer.php');
	require_once ('vendor/PHPMailer/src/SMTP.php');
	require_once ('vendor/TCPDF/tcpdf.php');

	require_once ('functions.php');
	require_once ('alert.php');
	require_once ('cdn.php');
	require_once ('send_mail.php');
	require_once ('generate_pdf.php');
	require_once ('html_temp.php');
	require_once ('record.php');
	require_once ('corousel.php');
//	require_once ('controllerUserData.php');
	require_once ('data_auth.php');
	require_once ("dataBarang.php");
	require_once ("select.php");
	require_once ("dataSupplier.php");
	require_once ("dataCustomer.php");
	require_once ("dataViewProduk.php");
	require_once ("dataTambahProduk.php");
	require_once ("dataUpdateProduk.php");
	require_once ("dataDeleteProduk.php");
	require_once ("data_transaksi.php");
	require_once ("postOperator.php");


