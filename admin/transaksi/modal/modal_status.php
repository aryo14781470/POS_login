<!-- Modal Send Invoice To Customer -->
<div class="modal fade" id="send_invoice_<?= $id_transaksi; ?>">
	<div class="modal-dialog modal-fullscreen-sm">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Send Invoice to <?= $nama_cus; ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card modal-body">
						<div class="input-group">
							<span style="width:110px" class="input-group-text">Nomer PO :</span>
							<input type="text" class="form-control" value="<?= $id_transaksi; ?>" name="nomer" readonly>
						</div>
						<hr>
						<div class="input-group">
							<span style="width:110px" class="input-group-text">Customer :</span>
							<input type="text" class="form-control" value="<?= $nama_cus; ?>" name="nama_customer" readonly>
						</div>
						<div class="input-group">
							<span style="width:110px" class="input-group-text">Email :</span>
							<input type="text" class="form-control" value="<?= $email_cus; ?>" name="email" readonly>
						</div>
					</div>

					<!--					 Modal footer-->
					<div class="modal-footer">
						<input type="hidden" value="<?= $id_customer ?>" name="id_customer">
						<input type="hidden" value="send_mail" name="postOperator">
						<button type="submit" class="btn btn-warning" data-bs-toggle="modal">
							<i class="fa fa-share"></i> Send
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
