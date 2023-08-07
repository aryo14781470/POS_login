<main>
	<div class="container px-4">
		<h1 class="mt-4">Detail Order</h1>
		<?php
		if(isset($_SESSION['alert'])){
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
		?>
		<div class="row card mb-4">
			<div class="table-responsive card-body">
				<div class="row">
					<div class="col col-md-6"><h2><strong><span><?= $_GET['id_cart']; ?></span></strong></h2></div>
					<div class="col col-md-6 text-end">
						<button class="btn btn-link btn-md" data-bs-toggle="modal" data-bs-target="#tambah_order_<?= $_GET['id_cart']; ?>">TAMBAH</button>
					</div>
				</div>
				<table width="100%" class="table table-striped table-bordered table-hover">
					<thead>
						<th></th>
						<th>Nama Barang</th>
						<th>QTY</th>
						<th>Harga</th>
						<th>Subtotal</th>
					</thead>
					<tbody>
					<form method="POST" action="">
						<?php
						$grand_total = 0;
						$fetch_array_cart = fetch_array_id($_GET['id_cart'], "cart");
						foreach ($fetch_array_cart as $row_cart){

							$fetch_array_brg = fetch_array_id($row_cart['id_barang'], "barang");
							foreach ($fetch_array_brg as $row_brg){
								$id_barang = $row_brg['id_barang'];
								$nama_barang = $row_brg['nama_brg'];
								$gambar_barang = $row_brg['gambar_brg'];
							}
							$id_customer = $row_cart['id_customer'];
							$id_cart = $row_cart['id_cart'];
							$qty = $row_cart['detail_qty'];
							$harga = $row_cart['detail_harga'];
							$sub_total = $harga * $qty;
							$grand_total += $sub_total;
							?>
								<tr>
									<td align="center">
										<button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#delete_detail_cart_<?= $id_barang; ?>">
											<i class="fa-solid fa-x"></i></i>
										</button>
									</td>
									<td><?= $nama_barang; ?></td>
									<td>
										<?= $qty?>&nbsp
										<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#update_qty_detail_cart_<?= $id_barang; ?>">
											<i class="fa fa-edit"></i>
										</button>
									</td>
									<td><?= rupiah($harga); ?></td>
									<td><?= rupiah($sub_total); ?></td>
								</tr>
							<?php
							require("modal/modal_detail_cart_order.php");
						}
						?>
							<tr>
								<td colspan="4" align="right"><span class="pull-right"><strong>Grand Total</strong></span></td>
								<td align="right"><strong><span id="total"><?= rupiah($grand_total); ?></span><strong></td>
							</tr>
							<tr>
								<td colspan="5" align="right">
									<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#checkout_<?= $id_cart; ?>">
										Lanjut <i class="fa-solid fa-arrow-right"></i>
									</button>
								</td>
							</tr>
					</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>


