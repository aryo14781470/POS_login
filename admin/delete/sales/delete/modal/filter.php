<!-- Card Filter  -->
<div class="col-lg-4">
	<div class="card">
		<div class="card-header">
			<strong>Form</strong> Filter
		</div>
		<!--id formfilter adalah nama form untuk filter-->
		<form id="formfilter">
			<div class="card-body">
				<input name="valnilai" type="hidden">
				<div class="input-group">
					<span style="width:100px" class="input-group-text">Filter by</span>
					<select class="form-select" name="periode" id="periode" title="Pilih Tahun Ajaran" required>
						<option value="">-PILIH-</option>
						<option value="tanggal">Tanggal</option>
						<option value="bulan">Bulan</option>
						<option value="tahun">Tahun</option>
					</select>
				</div>

				<button onclick="prosesReset()" type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
				<!--ketika di klik tombol Proses, maka akan mengeksekusi fungsi javascript prosesPeriode() , untuk menampilkan form-->
				<button id="btnproses" type="button" onclick="prosesPeriode()" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>
				<!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->

			</div>
			<div style="margin-bottom: 0;">

			</div>
		</form>
	</div>
</div>
