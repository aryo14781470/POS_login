<!-- Modal Barang Masuk -->
<div class="modal fade" id="tambah_barang_masuk">
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Tambah Barang Masuk</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Nama Barang :</span>
						<select class="form-select" name="id_barang" required>
							<option value="">--PILIH--</option>
							<?php
							$barang = viewBarang();
							while($row_barang = mysqli_fetch_array($barang)){
								?>
								<option value="<?= $row_barang['id_barang']; ?>">(<?= $row_barang['id_barang']; ?>)<?= $row_barang['nama_brg']; ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<br>
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Jumlah :</span>
						<input type="text" class="form-control" name="jumlah" required>
					</div>
					<br>
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Dibuat Oleh :</span>
						<input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
					</div>
					<br>

					<!-- Modal footer -->
					<div class="modal-footer">
						<input type="hidden" value="barang_masuk" name="postOperator">
						<button type="submit" class="btn btn-primary" data-bs-toggle="modal">
							<i class="fa fa-save"></i> Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
