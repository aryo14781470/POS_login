<!-- Card Bulan-->
<div class="col-lg-8" id="bulanfilter">
	<div class="card">
		<div class="card-header">
			<strong>Form</strong> Filter by Bulan
		</div>
		<form id="formbulan" action="" method="POST" target="_blank">
			<div class="card-body card-block">
				<input type="hidden" name="nilaifilter" value="2">
				<input name="valnilai" type="hidden">
				<div class="row form-group">
					<div id="form-tanggal" class="col col-md-2">
						<label for="select" class=" form-control-label">Pilih Tahun</label>
					</div>
					<div class="col-12 col-md-10">
						<select name="tahun1" id="tahun1" class="form-control form-control-user" title="Pilih Tahun">
							<option value="">-PILIH-</option>
							<option value=""></option>
						</select>
						<small class="help-block form-text"></small>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Dari bulan</label>
					</div>
					<div class="col col-md-4">
						<select name="bulanawal" id="bulanawal" class="form-control form-control-user" title="Pilih Bulan">
							<option value="">-PILIH-</option>
							<option value="1">JANUARI</option>
							<option value="2">FEBRUARI</option>
							<option value="3">MARET</option>
							<option value="4">APRIL</option>
							<option value="5">MEI</option>
							<option value="6">JUNI</option>
							<option value="7">JULI</option>
							<option value="8">AGUSTUS</option>
							<option value="9">SEPTEMBER</option>
							<option value="10">OKTOBER</option>
							<option value="11">NOVEMBER</option>
							<option value="12">DESEMBER</option>
						</select>
					</div>
					<div class="col col-md-2">
						<label for="select" class=" form-control-label">Sampai bulan</label>
					</div>
					<div class="col col-md-4">
						<select name="bulanakhir" id="bulanakhir" class="form-control form-control-user" title="Pilih Bulan">
							<option value="">-PILIH-</option>
							<option value="1">JANUARI</option>
							<option value="2">FEBRUARI</option>
							<option value="3">MARET</option>
							<option value="4">APRIL</option>
							<option value="5">MEI</option>
							<option value="6">JUNI</option>
							<option value="7">JULI</option>
							<option value="8">AGUSTUS</option>
							<option value="9">SEPTEMBER</option>
							<option value="10">OKTOBER</option>
							<option value="11">NOVEMBER</option>
							<option value="12">DESEMBER</option>
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
