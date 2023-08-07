<main id="pembayaran">
	<div class="card mb-4">
		<div class="card-header col-12">
			<div class="row">
				<div class="col">
					<h3>Tambah Pembayaran</h3>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form action="#" method="post" class="was-validated" enctype="multipart/form-data">
				<div class="row m-1 align-items-center">
					<div class="col-12">
						<div>Reference</div>
						<div>
							<input type="text" name="reference" class="form-control text" placeholder="Keterangan" required>
						</div>
					</div>
				</div>
				<br>
				<div class="row m-1">
					<div class="col-6">
						<h5>Unggah bukti pembayaran</h5>
						<input type="file" class="form-control" name="image" id="gambar" required>
						<br>
						<img id="preview" src="#" alt="" class="mt-3">
					</div>
					<div class="col-6">
						<h5>Total Pembayaran</h5>
						<div class="row">
							<div class="col-12">
								<div class="input-group">
									<span class="input-group-text">Bayar :</span>
									<input type="number" class="form-control" placeholder="Total bayar" name="bayar" id="bayar" required>
									<span class="input-group-text">Rp</span>
								</div>
								<br>
								<?php
								$data = view_transaksi_paymnet($_GET['id_transaksi']);
								$hasil = mysqli_num_rows($data);
								if ($hasil > 0){
									$result = mysqli_fetch_all($data, MYSQLI_ASSOC);
									foreach ($data as $data_paymnet) {
										$ongkir = $data_paymnet['ongkir'];
										$diskon = $data_paymnet['diskon'];
										$id = $data_paymnet['id_transaksi'];

									}?>
										<div class="input-group">
											<span class="input-group-text">Ongkir :</span>
											<input type="number" value="<?= $ongkir; ?>" class="form-control" name="ongkir" id="ongkir" readonly>
											<span class="input-group-text">Rp</span>
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-text">Diskon :</span>
											<input type="number" value="<?= $diskon; ?>" class="form-control" name="diskon" id="diskon" readonly>
											<span class="input-group-text">Rp</span>
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-text">Sisa :</span>
											<input type="number" class="form-control" name="sisa" id="sisa" readonly>
											<span class="input-group-text">Rp</span>
										</div>

								<?php } else { ?>
									<div class="input-group">
										<span class="input-group-text">Ongkir :</span>
										<input type="number" class="form-control" placeholder="Ongkir" name="ongkir" id="ongkir" required>
										<span class="input-group-text">Rp</span>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-text">Diskon :</span>
										<input type="number" class="form-control" placeholder="Diskon" name="diskon" id="diskon" required>
										<span class="input-group-text">Rp</span>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-text">Sisa :</span>
										<input type="number" class="form-control" name="total" id="total" readonly>
										<span class="input-group-text">Rp</span>
									</div>
								<?php } ?>
								<br>
								<div class="input-group">
									<span class="input-group-text">Metode Pembayaran :</span>
									<select name="payment" class="form-select" required>
										<option value="">--PILIH--</option>
										<option value="COD">Cash On Delivery</option>
										<option value="TF">Transfer</option>
									</select>
								</div>
								<br>
								<div class="input-group">
									<div class="col">
										<input type="hidden" value="<?= $_GET['id_transaksi']; ?>" name="id_transaksi">
										<input type="hidden" value="Unpaid" name="status">
										<input type="hidden" value="tambah_pembayaran" name="postOperator">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
<!--										<button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#billed"><i class="fa fa-check"></i> Lunas</button>-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</main>

<script>
	$(document).ready(()=>{
		$('#gambar').change(function(){
			const file = this.files[0];
			console.log(file);
			if (file){
				let reader = new FileReader();
				reader.onload = function(event){
					console.log(event.target.result);
					$('#preview').attr('src', event.target.result);
					$('#preview').attr('widht', 300);
					$('#preview').attr('height', 200);
				}
				reader.readAsDataURL(file);
			}
		});
	});

	$(document).on('click', '.hapus', function() {
		$(this).closest('#pembayaran').remove();
	});

	$(document).ready(function() {
		var sub = $('#sub_total').text();
		var sisa_pembayaran = $('#sisa_pembayaran').text();
		var sub_total = parseFloat(sub.replace(/[^\d]/g, ''));
		var sisa = parseFloat(sisa_pembayaran.replace(/[^\d]/g, ''));
		$('#bayar, #ongkir, #diskon').on('input', function() {
			var bayar = parseFloat($('#bayar').val());
			var ongkir = parseFloat($('#ongkir').val());
			var diskon = parseFloat($('#diskon').val());

			if (bayar){
				$('#total').val(sub_total - bayar);
				$('#sisa').val(sisa - bayar);
			}
			if (ongkir){
				$('#total').val(sub_total - bayar + ongkir);
			}
			if (diskon){
				$('#total').val(sub_total - bayar + ongkir - diskon);
			}

		});
	});
</script>
