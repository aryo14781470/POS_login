<!-- Pesanan Order-->
<main>
    <div class="container px-4">
        <h2 class="mt-4">Pemesanan</h2>
        <?php
            if(isset($_SESSION['alert'])){
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
        ?>
        <!-- Card Filter -->
        <div class="row card mb-4">
            <div class="card-header">
                <strong>Order Barang</strong>
<!--                <a href="index.php?page=custom">Custom PO</a>-->
<!--                <a href="index.php?page=custom">Cart</a>-->
            </div>
			<form action="index.php?page=Order" method="post">
            	<div class="card-body">
					<table class="table table-bordered">
						<tr>
							<th>ID Order</th>
							<td>
								<?php
								if (isset($_POST['id_customer'])) {
									$id_cart = $_POST['id_cart'];
									echo $id_cart;
								}else{
									?> <input type="text" value="<?= set_id(); ?>" name="id_cart" class="form-control" readonly> <?php
									echo '';
								}
								?>
							</td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td> <?= date('d M Y'); ?></td>
						</tr>
						<tr>
							<th>Customer</th>
							<td>
								<?php
								if (isset($_POST['id_customer'])) {
									$customer = viewCustomer($_POST['id_customer']);
									while ($row = mysqli_fetch_array($customer)) {
										echo $row['nama_customer'];
										$id_customer = $row['id_customer'];
									}
								}else { ?>
									<select class="form-select" name="id_customer" required>
										<option value="">--PILIH--</option>
										<?php
										$customer = viewCustomer();
										while ($row = mysqli_fetch_array($customer)){
											?>
											<option value="<?= $row['id_customer']?>">(<?= $row['id_customer']; ?>)<?= $row['nama_customer']; ?></option>
											<?php
										}
										?>
									</select>
								<?php } ?>
							</td>
						</tr>
                    </table>
					<?php
						if (isset($_POST['id_customer'])) {
							echo '<input type="submit" class="btn btn-sm btn-danger" value="RESET">';
						}else{
							echo '<input type="submit" class="btn btn-sm btn-primary" value="PROSES">';
						}
					?>
				</div>
			</form>
		</div>

		<?php
			if (isset($_POST['id_customer'])){ ?>
					<?php include "modal/list_produk.php"?>
<!--				<div class="row card mb-4">-->
<!--					<div class="card-body">-->
<!---->
<!--						<div class="row">-->
<!--							--><?php
//							$barang = viewBarang();
//							if (mysqli_num_rows($barang) > 0){
//								while($row_barang = mysqli_fetch_array($barang)) { ?>
<!--									<div class="col-lg-4 mb-4 justify-content-center">-->
<!--										<form action="#" method="post">-->
<!--											<div class="card">-->
<!--												<div class="card shadow">-->
<!--													<div>-->
<!--														<img src="assets/img/desain/--><?php
//														if(empty($row_barang['gambar_brg'])){ echo "noimage.jpg"; }
//														else { echo $row_barang['gambar_brg']; }?><!--"-->
<!--															 class="rounded img-fluid card-img-top">-->
<!--													</div>-->
<!--													<div class="card-body">-->
<!--														<h5 class="card-title">--><?//= $row_barang['nama_brg']?><!--</h5>-->
<!--														<p class="card-text">-->
<!--															Some quick example text to build on the card.-->
<!--														</p>-->
<!--														<h5><span>--><?//= $row_barang['harga_brg']?><!--</span></h5>-->
<!--														<input type="submit" class="btn btn-warning my-3" name="add" value="Add to Cart">-->
<!--														<input type="hidden" name="id_barang" value="--><?//= $row_barang['id_barang']; ?><!--">-->
<!--														<input type="hidden" name="id_customer" value="--><?//= $id_customer; ?><!--">-->
<!--														<input type="hidden" name="id_cart" value="--><?//= $id_cart; ?><!--">-->
<!--														<input type="hidden" name="postOperator" value="order">-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</form>-->
<!--									</div>-->
<!--									--><?php
//								}
//							}
//							?>
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
				<?php
			}
		?>
	</div>
</main>




<!-- Type Order -->
<!-- 

<div class="col-lg-4 p-3">
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title"><?// $row['nama_brg']; ?></h5>
        </div>
        <img class="card-img-top rounded mx-auto d-block" width="200px" height="200px" src="../assets/img/desain/<?=$row['gambar_brg']?>" alt="<?=$row['gambar_brg']?>">
        <div class="card-body">
            <strong>Rp <?//$row['harga_brg']?></strong>
            <table>
                <tr>
                    <th><Strong>QTY : </Strong></th>
                    <td>
                        <input type="text" name="qty" style="width:100px;">
                    </td>
                    <td>
                        <input type="submit" class="btn btn-sm btn-primary" value="Add to cart">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-cart-plus"></i> add to cart</button>
                        <input type="hidden" name="id_barang" value="<? //$row['id_barang']; ?>">
                        <input type="hidden" name="id_transaksi" value="<? //$id_transaksi; ?>">
                        <input type="hidden" name="harga" value="<? //$row['harga_brg']; ?>">
                        <input type="hidden" name="postOperator" value="order_add_sementara">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

-->
