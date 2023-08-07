<?php

	require_once("../../../functions.php");
	$konek = conn();
	// Mengambil data dari form kriteria
	$tanggalAwal = $_POST['tanggalawal'];
	$tanggalAkhir = $_POST['tanggalakhir'];
	$barang = $_POST['barang'];
	$customer = $_POST['customer'];

	// Membuat query SQL
	//	$query = "SELECT * FROM transaksi WHERE dibuat_tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'";
	//	$query = "SELECT * FROM transaksi WHERE id_transaksi
	//                IN ( SELECT id_transaksi FROM transaksi WHERE id_customer = '$customer')
	//            	IN ( SELECT id_transaksi FROM transaksi_detail WHERE id_barang = '$barang')
	//                AND dibuat_tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'";
	$query = "SELECT * FROM transaksi t 
				  WHERE EXISTS ( SELECT * FROM transaksi_detail td
					  WHERE td.id_transaksi = t.id_transaksi
					  AND td.id_barang = '$barang' AND t.id_customer = '$customer')
				  AND t.dibuat_tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'";

	// Menjalankan query dan mendapatkan hasil
	$result = mysqli_query($konek, $query);
	if ($result === false) {
		die('Error executing query: ' . mysqli_error($konek));
	}

	// Menyimpan hasil query dalam bentuk array
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}

	//	Mengirimkan data dalam format JSON
	header('Content-Type: application/json');
	echo json_encode($data);






