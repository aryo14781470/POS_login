<!-- The Modal Update QTY Detail cart-->
<div class="modal fade" id="update_qty_detail_cart_<?= $id_barang; ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update qty <?= $nama_barang; ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="input-group">
						<span style="width:150px" class="input-group-text">Detail QTY :</span>
						<input type="number" name="qty" class="form-control" required>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<input type="hidden" value="<?= $id_cart; ?>" name="id_cart">
						<input type="hidden" value="<?= $id_customer; ?>" name="id_customer">
						<input type="hidden" value="<?= $id_barang; ?>" name="id_barang">
						<input type="hidden" value="update_qty_detail_cart_order" name="postOperator">
						<button type="submit" class="btn btn-primary" data-bs-toggle="modal">
							<i class="fa-regular fa-pen-to-square"></i> Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- The Modal Delete Detail cart-->
<div class="modal fade" id="delete_detail_cart_<?= $id_barang; ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Delete detail cart</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card">
						<div class="card-shadow">
							<img src="../admin/assets/img/desain/<?= $gambar_barang; ?>" alt="<?= $gambar_barang; ?>" class="rounded img-fluid card-img-top">
						</div>
						<div class="card-body">
							<div>
								<span style="width:200px"><h5><strong><?= $id_cart; ?></strong></h5></span>
								<span style="width:200px" class="input-group-text">Nama barang : <?= $nama_barang; ?></span>
								<span style="width:200px" class="input-group-text">QTY : <?= $qty; ?></span>
								<span style="width:200px" class="input-group-text">Harga : <?= $sub_total; ?></span>
							</div>
							<h5 class="card-title"></h5>
						</div>
					</div>

					<!--					 Modal footer-->
					<div class="modal-footer">
						<input type="hidden" value="<?= $id_cart; ?>" name="id_cart">
						<input type="hidden" value="<?= $id_customer; ?>" name="id_customer">
						<input type="hidden" value="<?= $id_barang; ?>" name="id_barang">
						<input type="hidden" value="delete_detail_cart_order" name="postOperator">
						<button type="submit" class="btn btn-danger" data-bs-toggle="modal">
							<i class="fa-solid fa-trash-can"></i> Delete
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- The Modal Checkout Detail cart-->
<div class="modal fade" id="checkout_<?= $id_cart; ?>">
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Checkout cart</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card">
						<div class="card-body">
							<div>
								<span style="width:200px"><h5><strong><?= $id_cart; ?></strong></h5></span>
								<span style="width:200px"><h5><strong><?= $id_customer; ?></strong></h5></span>
								<span style="width:200px"><h5><strong>
									<?php
										echo 'ID Barang : ';
										$fetch_array_detailcart = fetch_array_id($id_cart, "cart");
										$id_barang = '';
										foreach ($fetch_array_detailcart as $row_cart){
											$id_barang .= $row_cart['id_barang'].', ';
										}
										$id_barang = rtrim($id_barang, ', ');
										echo $id_barang;
									?>
								</strong></h5></span>
							</div>
							<hr>
							<dvi>
								<div class="input-group">
									<span style="width:120px" class="input-group-text">For Date :</span>
									<input type="datetime-local" inputmode="datetime-local" step="2" name="for_date" class="form-control" required>
								</div>
								<br>
								<div class="input-group">
									<span style="width:120px" class="input-group-text">Status :</span>
									<input type="text" name="status" value="Draft" class="form-control" readonly>
								</div>
							</dvi>
						</div>
					</div>

					<!--					 Modal footer-->
					<div class="modal-footer">
						<input type="hidden" value="<?= $id_cart; ?>" name="id_cart">
						<input type="hidden" value="<?= $id_customer; ?>" name="id_customer">
						<input type="hidden" value="tambah_transaksi" name="postOperator">
						<button type="submit" class="btn btn-warning" data-bs-toggle="modal">
							Lanjut <i class="fa-solid fa-arrow-right"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah Item Order -->
<div class="modal fade" id="tambah_order_<?= $_GET['id_cart']; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!--			 Modal Header-->
			<div class="modal-header">
				<h4 class="modal-title">Tambah Item Order</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!--			 Modal body-->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="card">
						<?php include "list_produk.php"; ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


