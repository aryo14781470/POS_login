<?php

	require_once("../../../model/functions.php");
	$konek = conn();

	$sql = "SELECT c.id_customer, c.nama_customer, SUM(t.id_customer) AS jumlah_transaksi, SUM(td.detail_qty * td.detail_harga) AS jumlah_pembelian
			FROM transaksi t
			JOIN customer c ON t.id_customer = c.id_customer
			JOIN transaksi_detail td ON t.id_transaksi = td.id_transaksi    
			JOIN transaksi_payment tp ON t.id_transaksi = tp.id_transaksi
			GROUP BY c.id_customer, c.nama_customer";

	// Mengeksekusi query
	$result = mysqli_query($konek, $sql);

	// Memeriksa apakah query berhasil dieksekusi
	if (!$result) {
		echo "Query error: " . mysqli_error($konek);
		exit();
	}

	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}

	//	Mengirimkan data dalam format JSON
	header('Content-Type: application/json');
	echo json_encode($data);
