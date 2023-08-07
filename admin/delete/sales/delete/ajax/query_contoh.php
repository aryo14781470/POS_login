<?php

// Tampilkan transaksi berdasarkan customer
$sql = "
	SELECT
	  t.id_transaksi,
	  t.status,
	  c.nama_customer,
	  b.nama_brg,
	  td.detail_qty, 
	  td.detail_harga,
	  tp.total,
	  tp.ongkir,
	  tp.grand_total,
	  tp.bayar,
	  tp.berkas,
	  tp.metode,
	  tp.pembayaran,
	  tp.reference,
	  t.dibuat_tanggal
	FROM
	  transaksi AS t
	  JOIN customer AS c ON t.id_customer = c.id_customer
	  LEFT JOIN transaksi_detail AS td ON t.id_transaksi = td.id_transaksi
	  LEFT JOIN items AS b ON td.id_barang = b.id_barang
	  JOIN transaksi_payment AS tp ON t.id_transaksi = tp.id_transaksi
	WHERE
	  c.id_customer = 'CST006'";
