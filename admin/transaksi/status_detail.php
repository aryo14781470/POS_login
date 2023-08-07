<main>
	<div class="container-fluid px-4 mb-4">
		<h2 class="mt-4"><strong>Detail Pesanan PO/<?= $_GET['id_transaksi']; ?></strong></h2>&nbsp
		<?php
		if(isset($_SESSION['alert'])){
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
		?>
		<div class="card">
			<div class="card-header">
				<div class="row m-1 align-items-center">
					<div class="col">
						<strong>
						<?php
							$data = mysqli_fetch_all(view_transaksi($_GET['id_transaksi']), MYSQLI_ASSOC);
							foreach ($data as $row){
								$status = $row['status'];
								switch ($status){
									case ("Draft") : echo '<div class="text-primary">'.$status.'</div>'; break;
									case ("Awaiting Approval") : echo '<div class="text-warning">'.$status.'</div>'; break;
									case ("Approved") : echo '<div class="text-info">'.$status.'</div>'; break;
									case ("Unpaid") : echo '<div class="text-secondary">'.$status.'</div>'; break;
									case ("Canceled") : echo '<div class="text-danger">'.$status.'</div>'; break;
									case ("Billed") : echo '<div class="text-success">'.$status.'</div>'; break;
								}
							}
						?>
						</strong>
					</div>
					<div class="col text-end">
						<?php
							$data = mysqli_fetch_all(view_transaksi($_GET['id_transaksi']), MYSQLI_ASSOC);
							foreach ($data as $row){
								$status = $row['status'];
								switch ($status){
									case ("Canceled") :
										break;
									case ("Draft") :
										?>
											<button type="hidden" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancel"><i class="fa-solid fa-ban"></i>  Cancel</button>
											<button type="hidden" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approve"><i class="fa fa-check"></i>  Setujui</button>
											<button type="hidden" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#await_approv"><i class="fa fa-file-invoice"></i> Ajukan Approval</button>
										<?php
										break;
									case ("Awaiting Approval") :
										?>
											<button type="hidden" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancel"><i class="fa-solid fa-ban"></i>  Cancel</button>
											<button type="hidden" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approve"><i class="fa fa-check"></i>  Setujui</button>
										<?php
										break;
									case ("Approved") :
										?>
										<form action="" method="post">
											<?php
											if (isset($_POST['pembayaran'])) { ?>
												<button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i>  Batal</button>
											<?php } else { ?>
												<button type="hidden" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancel"><i class="fa-solid fa-ban"></i>  Cancel</button>
												<button type="submit" class="btn btn-primary" name="pembayaran"><i class="fas fa-plus"></i>  Buat Tagihan</button>
											<?php } ?>
										</form>
										<?php
										break;
									case ("Unpaid") :
										?>
										<form action="" method="post">
											<?php
											if (isset($_POST['pembayaran'])) { ?>
												<button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i>  Batal</button>
											<?php } else { ?>
												<button type="submit" class="btn btn-warning" name="pembayaran"><i class="fas fa-plus"></i>  Tambah Pembayaran</button>
											<?php } ?>
										</form>
										<?php
										break;
									default:
										if (strlen($row['pdf_file']) != 0){ ?>
											<form action="" method="post">
												<input type="hidden" name="pdf_file" value="<?= $row['pdf_file']; ?>">
												<button type="submit" class="btn btn-light border" name="postOperator" value="print"><i class="fa fa-print"></i>  Print</button>
											</form>
										<?php }
										break;
								}
								require("modal/modal_status_detail.php");
							}
						?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row m-1 align-items-center">
					<div class="col">
						<div><strong>Customer</strong></div>
						<div>
							<?php
								$data = mysqli_fetch_all(view_transaksi($_GET['id_transaksi']), MYSQLI_ASSOC);
								foreach ($data as $data_cus){
									$cus = mysqli_fetch_all(viewCustomer($data_cus['id_customer']), MYSQLI_ASSOC);
									foreach ($cus as $cust){ ?>
										<div><?= $cust['nama_customer']; ?></div>
									<?php }
								}
							?>
						</div>
					</div>
				</div>
				<br>
				<div class="row m-1">
					<?php
						$data = mysqli_fetch_all(view_transaksi($_GET['id_transaksi']), MYSQLI_ASSOC);
						foreach ($data as $data_trans){
							$id_trans = $data_trans['id_transaksi'];
							$tgl_trans = $data_trans['dibuat_tanggal'];
							$for_date = $data_trans['untuk_tanggal'];
						}
					?>
					<div class="col">
						<div><strong>No Transaksi</strong></div>
						<div><?= $id_trans; ?></div>
					</div>
					<div class="col">
						<div><strong>Tgl Transaksi</strong></div>
						<div><?= date("d F Y H:i:s", strtotime($tgl_trans)); ?></div>
					</div>
					<div class="col">
						<div><strong>Untuk Tgl</strong></div>
						<div><?= date("d F Y H:i:s", strtotime($for_date)); ?></div>
					</div>
				</div>
				<br>
				<div class="row m-1">
					<div class="col">
						<div><strong>Reference</strong></div>
						<?php
						$data = mysqli_fetch_all(view_transaksi_paymnet($_GET['id_transaksi']), MYSQLI_ASSOC);
						foreach ($data as $data_ref){
							$pembayaran = $data_ref['pembayaran'];
							$berkas = $data_ref['berkas'];
							require "modal/modal_status_detail.php";
							?>
							<div>
								<button type="button" class="btn btn-link btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#berkas_<?=$pembayaran?>"><i class="fas fa-receipt"></i></button>
								<?=$data_ref['reference']?>
							</div>
							<?php  ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="row m-1">
				<table class="table table-striped table-bordered">
					<thead class="table-secondary">
						<tr>
							<th class="text-center">ID Barang</th>
							<th class="text-center">Nama Barang</th>
							<th class="text-center">Qty</th>
							<th class="text-center">Harga/pcs</th>
							<th class="text-center">Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$total = 0;
							$data = mysqli_fetch_all(view_transaksi_detail($_GET['id_transaksi']), MYSQLI_ASSOC);
							foreach ($data as $data_detail){
								$id_barang = $data_detail['id_barang'];
								$barang = mysqli_fetch_all(viewBarang($id_barang), MYSQLI_ASSOC);
								foreach ($barang as $data_bar){ $nama_barang = $data_bar['nama_brg']; }
								$qty = $data_detail['detail_qty'];
								$harga = $data_detail['detail_harga'];
								$sub_total = $qty * $harga;
								$total += $sub_total; ?>
								<tr>
									<td align="center"><?= $id_barang; ?></td>
									<td align="center"><?= $nama_barang; ?></td>
									<td align="center"><?= $qty; ?></td>
									<td align="center"><?= rupiah($harga); ?></td>
									<td align="center"><?= rupiah($sub_total); ?></td>
								</tr>

							<?php } ?>
						<tr>
							<td colspan="4" align="right"><span class="pull-right"><strong>Sub Total</strong></span></td>
							<td align="right" id="sub_total"><strong><span><?= rupiah($total); ?></span><strong></td>
						</tr>
						<?php
							$data = mysqli_fetch_all(view_transaksi_paymnet($_GET['id_transaksi']), MYSQLI_ASSOC);
							if (!empty($data)){
								foreach ($data as $data_paymnet) {
									$ongkir = $data_paymnet['ongkir'];
									$diskon = $data_paymnet['diskon'];
									$grand_total = $data_paymnet['grand_total'];
								} ?>
								<tr>
									<td colspan="4" align="right"><span class="pull-right"><strong>Ongkir</strong></span></td>
									<td align="right"><strong><span><?= rupiah($ongkir); ?></span><strong></td>
								</tr>
								<tr>
									<td colspan="4" align="right"><span class="pull-right"><strong>Diskon</strong></span></td>
									<td align="right"><strong><span><?= rupiah($diskon); ?></span><strong></td>
								</tr>
								<tr>
									<td colspan="4" align="right"><span class="pull-right"><strong>Grand Total</strong></span></td>
									<td align="right"><strong><span><?= rupiah($grand_total); ?></span><strong></td>
								</tr>
								<?php
								foreach ($data as $no){
									$bayar = $no['bayar'];
									$pembayaran = $no['pembayaran']; ?>
									<tr>
										<td colspan="4" align="right"><span class="pull-right"><strong>Pembayaran : <?= $pembayaran; ?></strong></span></td>
										<td align="right"><span class="pull-right"><strong><?= rupiah($bayar); ?></strong></span></td>
									</tr>
								<?php } ?>
								<tr>
									<?php
									$data_jum = total_harga($_GET['id_transaksi'], "payment");
									$row_jum = mysqli_fetch_assoc($data_jum); ?>
									<td colspan="4" align="right"><span class="pull-right"><strong>Total Pembayaran</strong></span></td>
									<td align="right"><strong><span><?= rupiah($row_jum['total']); ?></span><strong></td>
								</tr>
								<tr>
									<td colspan="4" align="right"><span class="pull-right"><strong>Sisa Pembayaran</strong></span></td>
									<td align="right" id="sisa_pembayaran"><span class="pull-right"><strong><?= rupiah($grand_total - $row_jum['total']); ?></strong></span></td>
								</tr>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<br>

<!--	Pembayaran	-->
		<?php
			if (isset($_POST['pembayaran'])){
				 require ('modal/pembayaran.php');
			}
		?>
	</div>
</main>
