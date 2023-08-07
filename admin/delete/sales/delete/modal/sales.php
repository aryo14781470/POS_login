<!--		Card Sales -->
<div class="col-lg-8 mb-2" id="sales">
	<div class="card">
		<div class="card-header">
			<Strong>Filter Sales</Strong>
		</div>
		<form action="" method="POST">
			<input type="hidden" name="sales" value="sales">
			<div class="card-body card-block">
				<div class="row form-group">
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Dari</label>
					</div>
					<div class="col col-md-4">
						<input type="date" name="tanggalawal" class="form-control" placeholder="Inputkan Jenis Bayar" id="tanggalawal" required="">
					</div>
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Sampai</label>
					</div>
					<div class="col col-md-4">
						<input name="tanggalakhir" value="" type="date"  class="form-control"  placeholder="Inputkan Jenis Bayar" id="tanggalakhir" required="">
					</div>
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Nama Barang</label>
					</div>
					<div class="col col-md-4">
						<div class="form-group">
							<select class="form-control" name="nama_brg" id="nama_brg">
								<option value="">Semua Barang</option>
								<option value=""></option>

							</select>
						</div>
					</div>
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Customer</label>
					</div>
					<div class="col col-md-4">
						<div class="form-group">
							<select class="form-control" name="username" id="username">
								<option value="">Semua User</option>
								<option value=""></option>
							</select>
						</div>
					</div>
					<small class="help-block form-text"></small>
				</div>
				<button type="submit" name="show" class="btn btn-sm btn-success"><i class="far fa-eye"></i> Show</button>
			</div>
		</form>
	</div>
</div>
<?php

	if (isset($_POST['show_sales'])){
		include "result.php";
	}

?>
