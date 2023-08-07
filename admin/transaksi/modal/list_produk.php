<div class="row card mb-4">
	<div class="card-body">

		<div class="row">
			<?php
			$barang = viewBarang();
			if (mysqli_num_rows($barang) > 0){
				while($row_barang = mysqli_fetch_array($barang)) { ?>
					<div class="col-lg-4 mb-4 justify-content-center">
						<form action="#" method="post">
							<div class="card">
								<div class="card shadow">
									<div>
										<img src="assets/img/desain/<?php
										if(empty($row_barang['gambar_brg'])){ echo "noimage.jpg"; }
										else { echo $row_barang['gambar_brg']; }?>"
											 class="rounded img-fluid card-img-top">
									</div>
									<div class="card-body">
										<h5 class="card-title"><?= $row_barang['nama_brg']?></h5>
										<p class="card-text">
											Some quick example text to build on the card.
										</p>
										<h5><span><?= $row_barang['harga_brg']?></span></h5>
										<?php
											if ($row_barang['jumlah_brg'] < 1){ ?>
												<input type="submit" class="btn btn-warning my-3" name="add" value="Add to Cart" disabled>
											<?php }else { ?>
												<input type="submit" class="btn btn-warning my-3" name="add" value="Add to Cart">
												<input type="hidden" name="id_barang" value="<?= $row_barang['id_barang']; ?>">
												<input type="hidden" name="id_customer" value="<?= $id_customer; ?>">
												<input type="hidden" name="id_cart" value="<?= $id_cart; ?>">
												<input type="hidden" name="postOperator" value="order">
											<?php }
										?>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>
