<main>
	<div class="container px-4">
		<h2 class="mt-4">History</h2>
		<div class="row">

			<!-- Card Filter -->
			<div class="col-lg-4">
				<div class="card" id="formFilter">
					<div class="card-header">
						<strong>Filter Pencarian</strong>
					</div>
					<form action="" method="post">
						<div class="card-body">
							<div class="input-group mb-2">
								<span style="width:100px" class="input-group-text">Filter dari :</span>
								<select class="form-select" name="histori" id="histori" title="Pilih Tahun Ajaran" required>
									<option value="">-PILIH-</option>
									<option value="waktu">Waktu</option>
									<option value="barang">Barang</option>
									<option value="customer">Customer</option>
									<option value="sales">Sales</option>
								</select>
							</div>
							<button type="button" class="btn btn-danger btn-sm" onclick="resetFilterHistori()" id="btnResetFilter"><i class="fa fa-ban"></i> Reset</button>
							<button type="button" class="btn btn-primary btn-sm" onclick="filterHistori()" id="btnProsesFilter"><i class="fa fa-edit"></i> Proses</button>
						</div>
					</form>
				</div>
			</div>

			<?php

			include "card/sales.php";

			?>

			<div class="col-lg-12 mt-4" id="formHasil" style="display: none;">
				<div class="card">
					<div class="card-header"><strong>Hasil Filter Penjualan</strong></div>
					<div class="card-body" id="table-hasil"></div>
				</div>
			</div>


			<div class="col-lg-12 mt-4 mb-2" id="summary">
				<div class="card" style="max-width: 100%; overflow-x: auto;">
					<div class="card-header"><strong>Summary Transaksi</strong></div>
					<div class="card-body" id="table-summary"></div>
				</div>
			</div>

		</div>
	</div>
</main>

<script type="text/javascript">
	$(document).ready(function() {
		$("#btnResetFilter").hide();
		$("#sales").hide();
		$("#summary").show();


		// $("#btnProsesFilter").click(function() {
		// 	$("#sales").show();
		// 	$("#btnResetFilter").show();
		// 	$("#btnProsesFilter").hide();
		// });

		// $("#btnResetFilter").click(function() {
		// 	$("#sales").hide();
		// 	$("#btnResetFilter").hide();
		// 	$("#formHasil").hide();
		// 	$("#summary").show();
		// 	$("#btnProsesFilter").show();
		// 	$("#btn_sales").show();
		// 	$("#btnResetKriteria").hide();
		// });

		$("#btnResetKriteria").click(function() {
			$("#formHasil").hide();
			$("#btn_sales").show();
			$("#btnResetKriteria").hide();
			$("#summary").show();
		});

		summary();
	});

	function resetFilterHistori(){
		$("#summary").show();
		$("#btnProsesFilter").show();
		$("#btn_sales").show();
		$("#label_barang").show();
		$("#barang").show();
		$("#sales").hide();
		$("#btnResetFilter").hide();
		$("#formHasil").hide();
		$("#btnResetKriteria").hide();

	}

	function filterHistori(){
		var histori = $("[name='histori']").val();
		$("#sales").show();
		$("#btnResetFilter").show();
		$("#btnProsesFilter").hide();

		if (histori == "waktu"){
			$("#barang").hide();
			$("#label_barang").hide();
			$("#customer").hide();
			$("#label_customer").hide();
		}else if (histori == "barang"){
			$("#barang").show();
			$("#label_barang").show();
			$("#customer").hide();
			$("#label_customer").hide();
		}else if (histori == "customer"){
			$("#customer").show();
			$("#label_customer").show();
			$("#barang").hide();
			$("#label_barang").hide();
		}else {
			$("#sales").show();
			$("#btnResetFilter").show();
			$("#customer").show();
			$("#label_customer").show();
			$("#barang").show();
			$("#label_barang").show();
			$("#btnProsesFilter").hide();
		}
	}

	function table_hasil(url, data){
		// Melakukan permintaan AJAX ke server PHP
		$.ajax({
			url: url, // Ganti dengan path ke file PHP Anda
			type: "POST",
			cache:false,
			data: data,
			// dataType: "json",
			success: function(response) {
				// Menampilkan hasil pada form hasil
				var hasil = $("#table-hasil");
				hasil.empty(); // Mengosongkan konten sebelumnya

				if (response.length > 0) {
					// Menampilkan data dalam tabel
					var table = $("<table>").addClass("table table-bordered");
					var thead = $("<thead>").appendTo(table);
					var tbody = $("<tbody>").appendTo(table);

					// Menambahkan header tabel
					var headerRow = $("<tr>").appendTo(thead);
					$.each(response[0], function(key) {
						$("<th>").text(key).appendTo(headerRow);
					});

					// Menambahkan data ke dalam tabel
					$.each(response, function(_, rowData) {
						var dataRow = $("<tr>").appendTo(tbody);
						$.each(rowData, function(_, value) {
							$("<td>").text(value).appendTo(dataRow);
						});
					});

					table.appendTo(hasil);
				} else {
					// Menampilkan pesan jika tidak ada data yang sesuai
					var alert = $("<div>").addClass("alert alert-warning").text('Tidak terdapat data yang sesuai kriteria!');
					alert.appendTo(hasil);
				}

				// Menampilkan form hasil
				hasil.show();
			},
			error: function(xhr, status, error) {
				// Menampilkan pesan jika terjadi kesalahan
				var error = console.error(xhr.responseText);
				alert(`Terjadi kesalahan saat memproses permintaan. ${error}`);
			},
		});
	}

	function summary(){
		$.ajax({
			url: "sales/ajax/summary.php", // Ganti dengan path ke file PHP Anda
			type: "GET",
			cache:false,
			dataType: "json",
			success: function(response) {
				// Menampilkan hasil pada form hasil
				var hasil = $("#table-summary");
				hasil.empty(); // Mengosongkan konten sebelumnya

				if (response.length > 0) {
					// Menampilkan data dalam tabel
					var table = $("<table>").addClass("table table-bordered");
					var thead = $("<thead>").appendTo(table);
					var tbody = $("<tbody>").appendTo(table);

					// Menambahkan header tabel
					var headerRow = $("<tr>").appendTo(thead);
					$.each(response[0], function(key) {
						$("<th>").text(key).appendTo(headerRow);
					});

					// Menambahkan data ke dalam tabel
					$.each(response, function(_, rowData) {
						var dataRow = $("<tr>").appendTo(tbody);
						console.log(response);
						$.each(rowData, function(_, value) {
							if (value === rowData.jumlah_pembelian) {
								value = "Rp, " + parseInt(value).toLocaleString('id-ID'); // Menambahkan "RP" pada nilai
							}
							$("<td>").text(value).appendTo(dataRow);
						});
					});

					table.appendTo(hasil);
				} else {
					// Menampilkan pesan jika tidak ada data yang sesuai
					var alert = $("<div>").addClass("alert alert-warning").text('Tidak ada Transaksi!');
					alert.appendTo(hasil);
				}

				// Menampilkan form hasil
				hasil.show();
			},
			error: function(xhr, status, error) {
				// Menampilkan pesan jika terjadi kesalahan
				var error = console.error(xhr.responseText);
				alert(`Terjadi kesalahan saat memproses permintaan. ${error}`);
			},
		});
	}
</script>
