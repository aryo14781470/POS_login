<!-- Update Ke Awaiting Approval -->
<div class="modal fade" id="await_approv">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Update Status Order</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card text-start">
						<div class="m-1"><i class="fa-solid fa-circle-exclamation"></i> Yakin Ajukan Await Approval</div>
					</div>
					<!--					 Modal footer-->
					<div class="modal-footer">
						<input type="hidden" value="<?= $_GET['id_transaksi']; ?>" name="id_transaksi">
						<input type="hidden" value="Awaiting Approval" name="status">
						<input type="hidden" value="status" name="postOperator">
						<button type="submit" class="btn btn-warning" data-bs-toggle="modal">
							<i class="fa-solid fa-pen-to-square"></i> Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Update Ke Approved -->
<div class="modal fade" id="approve">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Update Status Order</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card text-start">
						<div class="m-1"><i class="fa-solid fa-circle-exclamation"></i> Yakin Ajukan Approved</div>
					</div>
					<!--					 Modal footer-->
					<div class="modal-footer">
						<input type="hidden" value="<?= $_GET['id_transaksi']; ?>" name="id_transaksi">
						<input type="hidden" value="Approved" name="status">
						<input type="hidden" value="status" name="postOperator">
						<button type="submit" class="btn btn-warning" data-bs-toggle="modal">
							<i class="fa-solid fa-pen-to-square"></i> Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Update Ke Cancel -->
<div class="modal fade" id="cancel">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Cancel Order</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card text-start">
						<div class="m-1"><i class="fa-solid fa-circle-exclamation"></i> Yakin akan dicancel ?</div>
					</div>
					<!--					 Modal footer-->
					<div class="modal-footer">
						<input type="hidden" value="<?= $_GET['id_transaksi']; ?>" name="id_transaksi">
						<input type="hidden" value="Canceled" name="status">
						<input type="hidden" value="status" name="postOperator">
						<button type="submit" class="btn btn-warning" data-bs-toggle="modal">
							<i class="fa-solid fa-pen-to-square"></i> Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Update Ke Cancel -->
<div class="modal fade" id="berkas_<?=$pembayaran?>">
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Bukti Pembayaran</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<div class="input-group">
					<span style="width:100px" class="input-group-text">Recipt :</span>
					<input type="text" class="form-control" value="<?=$berkas;?>" readonly>
				</div>
				<div class="text-center">
					<img src="assets/img/recipt_transaksi/<?=$berkas;?>" alt="<?=$berkas;?>" class="rounded float-start img-fluid" weight="300px" height="200px">
				</div>
			</div>
		</div>
	</div>
</div>

