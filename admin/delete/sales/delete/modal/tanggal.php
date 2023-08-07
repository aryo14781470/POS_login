<!-- Card Tanggal  -->
<div class="col-lg-8" id="tanggalfilter">
	<div class="card">
		<div class="card-header">
			<strong>Form</strong> Filter by Tanggal
		</div>
		<form action="" method="POST" target="_blank">
			<input type="hidden" name="nilaifilter" value="1">
			<input name="valnilai" type="hidden">
			<div class="card-body card-block">
				<div class="row form-group">
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Dari tanggal</label>
					</div>
					<div class="col col-md-4">
						<input name="tanggalawal" value="" type="date"  class="form-control"  placeholder="Inputkan Jenis Bayar" id="tanggalawal" required="">
					</div>
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Sampai tanggal</label>
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
						<label for="select" class=" form-control-label">Username</label>
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
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>

			</div>
		</form>
	</div>
</div>
