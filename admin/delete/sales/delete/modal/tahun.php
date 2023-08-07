<!-- Card Tahun-->
<div class="col-lg-8" id="tahunfilter">
	<div class="card">
		<div class="card-header">
			<strong>Form</strong> Filter by Tahun
		</div>
		<form id="formbulan" action="" method="POST" target="_blank">
			<div class="card-body card-block">
				<input type="hidden" name="nilaifilter" value="3">
				<input name="valnilai" type="hidden">
				<div class="row form-group">
					<div id="form-tanggal" class="col col-md-2">
						<label for="select" class=" form-control-label">Pilih Tahun</label>
					</div>
					<div class="col-12 col-md-10">
						<select name="tahun2" id="tahun2" class="form-control form-control-user">
							<option value="">-PILIH-</option>
							<option value=""></option>
						</select>
						<small class="help-block form-text"></small>
					</div>
				</div>
				<br>
				<div class="row form-group">
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Produk</label>
					</div>
					<div class="col col-md-4">
						<select name="nama_brg2" id="nama_brg2" class="form-control form-control-user">
							<option value="">-PILIH-</option>
						</select>
					</div>
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Username</label>
					</div>
					<div class="col col-md-4">
						<select name="username2" id="username2" class="form-control form-control-user">
							<option value="">-PILIH-</option>
						</select>
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
