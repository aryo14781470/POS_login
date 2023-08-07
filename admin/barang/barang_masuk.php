<main>
	<div class="container px-4">
		<h1 class="mt-4">Barang Masuk</h1>
		<div class="row card mb-4">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col input-group">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_barang_masuk">
							Tambah <i class="fa-solid fa-square-plus"></i>
						</button>
					</div>
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
			<?php
			if(isset($_SESSION['alert'])){
				echo $_SESSION['alert'];
				unset($_SESSION['alert']);
			}
			?>
			<div class="table-responsive card-body">
				<table id="table_contoh" class="table table-striped table-bordered">
					<thead class="table-secondary">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Barang</th>
						<th class="text-center">Jumlah</th>
						<th class="text-center">Masuk Tgl</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					$data = view_barang_masuk();
					while ($row = mysqli_fetch_array($data)) {
						$idBarang = $row['id_barang'];
						$data_barang = viewBarang($idBarang);
						while ($row_barang = mysqli_fetch_array($data_barang)){
							?>
							<tr>
								<td class="text-center"><?= $no; ?></td>
								<td class="text-center">(<?= $idBarang; ?>) <?= $row_barang['nama_brg'];?></td>
								<td class="text-center"><?php echo $row['jumlah_brg'];?></td>
								<td class="text-center"><?= date("d F Y H:i:s", strtotime($row['dibuat_tanggal'])); ?></td>
							</tr>
							<?php
							$no++;
						}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<?php
require("modal_barang_masuk.php");
?>


