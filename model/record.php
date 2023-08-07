<?php

	function range_tgl(){
		$konek = conn();
		$dari = $_POST['dari_status'];
		$sampai = $_POST['sampai_status'];
		$data = [];

		$sql = "SELECT * FROM transaksi WHERE dibuat_tanggal > '$dari' AND dibuat_tanggal < '$sampai'";

	}
