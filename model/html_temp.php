<?php

//	$root = $_SERVER['DOCUMENT_ROOT'];
//	include ("$root/POS_Login/cdn.php");

	function invoice($nomer, $id_customer, $filname){
//		var_dump($nomer, $id_customer, $filname);

		$data_cus = mysqli_fetch_all(viewCustomer($id_customer), MYSQLI_ASSOC);
		$row_cus = $data_cus[0];

		$data_tr = mysqli_fetch_all(view_transaksi($nomer), MYSQLI_ASSOC);
		$row_tr = $data_tr[0];

		$data_py = array();
		$row_py = mysqli_fetch_all(view_transaksi_paymnet($nomer), MYSQLI_ASSOC);
		foreach ($row_py as $rows_py){
			$data_py[] = $rows_py;
		}
		$latest_py = end($data_py);
		ob_start();
		?>

		<main>
			<div style="border-block:1px; solid #000;">
				<div style="text-align:right;">
					<b>Sender : </b>CV. xyz
				</div>
				<div style="border-bottom:1px solid #000;"></div>
				<div style="font-size: 12px;text-align: left;color: #666;">INVOICE : <?= $filname; ?></div>
				<div style="border-top:1px solid #000;"></div>
				<br>

				<table style="line-height: 1.5;">
					<tr>
						<td>
							<b>Order : </b> PO/<?= $nomer; ?>
						</td>
						<td style="text-align:right;">
							<b>Receiver : </b> <?= $row_cus['nama_customer']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<b>Tanggal Transaksi : </b> <?= date("d F Y", strtotime($row_tr['dibuat_tanggal'])); ?>
						</td>
						<td style="text-align:right;">
							<b>Untuk Tanggal : </b> <?= date("d F Y", strtotime($row_tr['untuk_tanggal'])); ?>
						</td>

					</tr>
					<tr>
						<td>
							<b>Puchase Type : </b> <?= $latest_py['metode']; ?>
						</td>
						<td style="text-align:right;">
							<b>Pembayaran ke : <?= $latest_py['pembayaran']; ?> <?= $row_tr['status']; ?></b>
						</td>
					</tr>
					<tr>
						<td>
							<b>Alamat : </b>
						</td>
						<td style="text-align:right;">
							<?= $row_cus['alamat_customer']; ?>
						</td>
					</tr>
				</table>

				<br>
				<div style="border-bottom:1px solid #000;"></div>
				<br>

				<div style="display: flex; justify-content: center; align-items: center;">
					<table style = "line-height: 2; width: 100%">
						<thead>
							<tr style = "font-weight: bold;border:1px solid #cccccc;background-color:#f2f2f2; display: flex; justify-content: space-between;">
								<td style = "text-align:center;border:1px solid #cccccc;">No </td>
								<td style = "text-align:center;border:1px solid #cccccc;">Item </td>
								<td style = "text-align:center;border:1px solid #cccccc;">Quantity </td>
								<td style = "text-align:center;border:1px solid #cccccc;">Harga/pc </td>
								<td style = "text-align:center;border:1px solid #cccccc;">Total Harga</td>
							</tr>
						</thead>
						<tbody>
						<?php
							$no = 1;
							$sub_total = 0;
							$data_dt = mysqli_fetch_all(view_transaksi_detail($nomer), MYSQLI_ASSOC);
							foreach ($data_dt as $row_dt){ ?>
								<tr style="justify-content: space-between;">
									<td style = "text-align:center;border:1px solid #cccccc;"><?= $no; ?></td>
									<?php
										$data_br = mysqli_fetch_all(viewBarang($row_dt['id_barang']), MYSQLI_ASSOC);
										foreach ($data_br as $row_br){ ?>
											<td style = "text-align:center;border:1px solid #cccccc;"><?= $row_br['nama_brg']; ?></td>
										<?php } ?>
									<td style = "text-align:center;border:1px solid #cccccc;"><?= $row_dt['detail_qty']; ?></td>
									<td style = "text-align:center;border:1px solid #cccccc;"><?= rupiah($row_dt['detail_harga']); ?></td>
									<td style = "text-align:center;border:1px solid #cccccc;"><?= rupiah($row_dt['detail_qty'] * $row_dt['detail_harga']); ?></td>
								</tr>
							<?php
								$sub_total += $row_dt['detail_qty'] * $row_dt['detail_harga'];
								$no++;
							}
						?>
						</tbody>
						<tfoot>
							<tr style = "font-weight: bold; justify-content: space-between;">
								<td colspan="4" align="right">SubTotal :</td>
								<td style = "text-align:right;"><?= rupiah($sub_total); ?></td>
							</tr>
							<tr style = "font-weight: bold; justify-content: space-between;">
								<td colspan="4" align="right">Ongkir :</td>
								<td style = "text-align:right;"><?= rupiah($latest_py['ongkir']); ?></td>
							</tr>
							<tr style = "font-weight: bold; justify-content: space-between;">
								<td colspan="4" align="right">Diskon :</td>
								<td style = "text-align:right;"><?= rupiah($latest_py['diskon']); ?></td>
							</tr>
							<tr style = "font-weight: bold; justify-content: space-between;">
								<td colspan="4" align="right">Grand Total :</td>
								<td style = "text-align:right;"><?= rupiah($latest_py['grand_total']); ?></td>
							</tr>
							<?php
								foreach($row_py as $py){ ?>
									<tr style = "font-weight: bold; justify-content: space-between;">
										<td colspan="4" align="right">Pembayaran <?= $py['pembayaran']; ?> :</td>
										<td style = "text-align:right;"><?= rupiah($py['bayar']); ?></td>
									</tr>
								<?php }
							?>
							<tr style = "font-weight: bold; justify-content: space-between;">
								<?php
									$data_jum = total_harga($nomer, "payment");
									$row_jum = mysqli_fetch_assoc($data_jum); ?>
								<td colspan="4" align="right">Total Pembayaran :</td>
								<td style = "text-align:right;"><?= rupiah($row_jum['total']); ?></td>
							</tr>
							<tr style = "font-weight: bold; justify-content: space-between;">
								<td colspan="4" align="right">Sisa Pembayaran :</td>
								<td style = "text-align:right;"><?= rupiah($latest_py['grand_total'] - $row_jum['total']); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>

				<div style="border-top:1px solid #000;"></div>
				<br>

				<table>
					<tr>
						<td>
							<b>Note :</b>
						</td>
					</tr>
					<tr>
						<td><i>Invoice ini diproses oleh komputer.</i></td>
					</tr>
					<tr>
						<td><i>Dibuat pada : <?php echo date("d F Y H:i:s"); ?></i></td>
					</tr>
					<tr>
						<td><i>Silahakan Hubungi <email>email</email> apabila membutuhkan bantuan.</i></td>
					</tr>
				</table>
			</div>
		</main>

		<?php
		return ob_get_clean();
	}

	function content_corousel($active, $gambar, $nama, $bahan, $sheet, $harga, $desk){
		ob_start();
		?>
		<div class="carousel-item <?=$active?>">
			<div class="row">
				<div class="col-md-6">
					<img class="w-100 h-75 object-fit" src="../admin/assets/img/desain/<?=$gambar?>" alt="<?=$gambar?>">
				</div>
				<div class="col-md-6">
					<h3><strong><?=$nama?></strong></h3>
					<h5>Bahan : <?=$bahan?></h5>
					<h5>Lapisan : <?=$sheet?> play</h5>
					<h5>Harga : <?=rupiah($harga)?></h5>
					<h5>KETERANGAN :</h5>
					<p><?=$desk?></p>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	function cek_send_mail(){
		$now = __DIR__."\html_temp.php";
		$_SESSION['alert'] = infoAlert("Info!", " Post terjadi di $now");
		reload();
	}

