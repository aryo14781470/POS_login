<!-- Card Kriteria -->
<div class="col-lg-8">
	<div class="card" id="sales">
		<div class="card-header">
			<strong>Filter Sales</strong>
		</div>
		<form action="" method="POST">
			<div class="card-body card-block">
				<div class="form-group">
<!--				 Tanggal-->
					<div class="row align-items-center">
						<div class="col col-md-2">
							<span><label for="select" class=" form-control-label">Dari : </label></span>
						</div>
						<div class="col col-md-4">
							<input type="date" class="form-control" name="tanggalawal" placeholder="Inputkan Jenis Bayar" id="tanggalawal" required="">
						</div>
						<div class="col col-md-2">
							<span><label for="select" class=" form-control-label">Sampai : </label></span>
						</div>
						<div class="col col-md-4">
							<input type="date" class="form-control" name="tanggalakhir" value="" placeholder="Inputkan Jenis Bayar" id="tanggalakhir" required="">
						</div>
					</div>
					<br>
<!--					Barang-->
					<div class="row align-items-center">
						<div class="col col-md-2"">
							<label for="select" class=" form-control-label" style="display: none;" id="label_barang">Barang : </label>
						</div>
						<div class="col col-md-4">
							<select class="form-select" name="nama_brg" style="display: none;" id="barang">
								<option value="">--PILIH BARANG--</option>
								<?php
								$data_brg = mysqli_fetch_all(viewBarang(), MYSQLI_ASSOC);
								foreach ($data_brg as $row_brg){ ?>
									<option value="<?= $row_brg['id_barang']; ?>"><?= $row_brg['nama_brg']; ?></option>
								<?php }
								?>
							</select>
						</div>

	<!--					Customer-->
						<div class="col col-md-2">
							<label for="select" class="form-control-label" id="label_customer">Customer : </label>
						</div>
						<div class="col col-md-4">
							<select class="form-select" name="customer" id="customer">
								<option value="">--PILIH CUSTOMER--</option>
							<?php
								$data_cus = mysqli_fetch_all(viewCustomer(), MYSQLI_ASSOC);
								foreach ($data_cus as $row_cus){ ?>
									<option value="<?= $row_cus['id_customer']; ?>"><?= $row_cus['nama_customer']; ?></option>
								<?php }
							?>
							</select>
						</div>
					</div>
					<br>
				</div>
				<button type="button" onclick="prosesSales()" class="btn btn-sm btn-success" id="btn_sales"><i class="far fa-eye"></i> Show</button>
				<button type="button" class="btn btn-sm btn-danger" id="btnResetKriteria" style="display: none;"> <i class="fa fa-ban"></i> Reset</button>
			</div>
		</form>
	</div>
</div>

<script>

	function prosesSales(){
		$("#formHasil").show();
		$("#btn_sales").hide();
		$("#btnResetKriteria").show();
		$("#summary").hide();

		// Mengambil nilai dari form kriteria
		// Membuat data yang akan dikirimkan ke server
		var data = {
			tanggalawal: $("#tanggalawal").val(),
			tanggalakhir: $("#tanggalakhir").val(),
			barang: $("#barang").val(),
			customer: $("#customer").val()
		};

		// Melakukan permintaan AJAX ke server PHP
		table_hasil('sales/ajax/sales.php', data);

	}

</script>

