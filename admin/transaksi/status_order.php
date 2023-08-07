<main>
	<div class="container">
		<h1 class="mt-4">Master Status Transaction</h1>
		<?php
		if(isset($_SESSION['alert'])){
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
		?>
		<div class="row card mb-4">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col input-group">
						<span class="input-group-text"><strong>Dari : </strong></span>
						<input type="text" class="form-control" id="dari_tanggal" name="dari_tanggal" placeholder="Dari tanggal">
					</div>
					<div class="col input-group">
						<span class="input-group-text"><strong>Sampai : </strong></span>
						<input type="text" class="form-control" id="sampai_tanggal" name="sampai_tanggal" placeholder="Sampai tanggal">
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="table_contoh" class="table table-striped table-bordered">
					<thead class="table-secondary">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">ID Transaksi</th>
						<th class="text-center">Nama Customer</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Jatuh Tempo</th>
						<th class="text-center">Status</th>
						<th class="text-center">Item</th>
						<th class="text-center">Total</th>
						<th class="text-center">Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						if (isset($_POST['dari_tanggal'])){

						}
						$data = mysqli_fetch_all(view_transaksi(), MYSQLI_ASSOC);
						foreach ($data as $row){
							$id_transaksi = $row['id_transaksi'];
							$id_customer = $row['id_customer'];
							?>

							<tr>
								<td class="text-center"><?= $no; ?></td>
								<td class="text-center text-primary"><?= $id_transaksi; ?></td>
								<?php
									$data_cus = mysqli_fetch_all(viewCustomer($id_customer), MYSQLI_ASSOC);
									foreach ($data_cus as $row_cus){
										$nama_cus = $row_cus['nama_customer'];
										$email_cus = $row_cus['email_customer'];
										?>
										<td class="text-center"><?= $nama_cus; ?></td>
									<?php }
								?>
								<td class="text-center"><?= tanggal($row['dibuat_tanggal']); ?></td>
								<td class="text-center"><?= tanggal($row['untuk_tanggal']); ?></td>
								<?php
									$status = $row['status'];
									if ($status == "Draft")  echo '<td class="text-center text-primary">'.$status.'</td>';
									if ($status == "Awaiting Approval")  echo '<td class="text-center text-warning">'.$status.'</td>';
									if ($status == "Approved")  echo '<td class="text-center text-info">'.$status.'</td>';
									if ($status == "Unpaid") echo '<td class="text-center text-secondary">'.$status.'</td>';
									if ($status == "Canceled") echo '<td class="text-center text-danger">'.$status.'</td>';
									if ($status == "Billed") echo '<td class="text-center text-success">'.$status.'</td>';
								?>
								<?php
									$data_item = view_transaksi_detail($row['id_transaksi']);
									$row_item = mysqli_num_rows($data_item);
								?>
								<td class="text-center"><?= $row_item; ?></td>
								<?php $total = mysqli_fetch_all(total_harga($row['id_transaksi'], "detail"), MYSQLI_ASSOC); ?>
								<td class="text-center"><?= rupiah($total[0]['total']); ?></td>
								<td class="text-center">
									<a href="index.php?page=Status_Detail&id_transaksi=<?= $row['id_transaksi']; ?>"><i class="far fa-eye"></i></a>
									<button type="submit" class="btn btn-sm btn-light btn-link" data-bs-toggle="modal" data-bs-target="#send_invoice_<?= $row['id_transaksi']; ?>">
										<i class="fa-sharp fa-solid fa-share-nodes"></i>
									</button>

									<?php require ('modal/modal_status.php'); ?>
								</td>
							</tr>
						<?php
							$no++;
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>

