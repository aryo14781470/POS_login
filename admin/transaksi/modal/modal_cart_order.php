<!-- The Modal Delete cart order-->
<div class="modal fade" id="delete_cart_order_<?= $row['id_cart'] ;?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Delete cart Order</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card">
						<div class="card-shadow">
							<div class="card-body">
								<span style="width:200px"><h5><strong>Nama : <?= $row['nama_customer']; ?></strong></h5></span>
								<span style="width:200px" class="input-group-text">Jumlah Item : <?= $row['jumlah']; ?></span>
								<span style="width:200px" class="input-group-text">Jumlah Harga : <?= $row['subtotal']; ?></span>
							</div>
						</div>

					</div>

					<!--					 Modal footer-->
					<div class="modal-footer">
						<input type="hidden" value="<?= $row['id_cart']; ?>" name="id_cart">
						<input type="hidden" value="delete_cart_order" name="postOperator">
						<button type="submit" class="btn btn-danger" data-bs-toggle="modal">
							<i class="fa-solid fa-trash-can"></i> Delete
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
