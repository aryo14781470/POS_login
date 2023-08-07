<!--		Card Show Result -->
<div class="row card mb-4" id="summary">
	<div class="col-12 card-header text-start">
		<div class="row align-items-center">
			<div class="col-6"><strong>Summary</strong></div>
			<div class="col-6 text-end">
				<button type="hidden" class="btn btn-light border" name="print" value="<?= $_GET['id_transaksi']; ?>"><i class="fas fa-print"></i>  Print</button>
			</div>
		</div>


		<!--a class="btn btn-secondary" href="index.php?page=export_barang"><i class="fa-solid fa-file-export"></i> Export Data</a-->
	</div>
	<?php
	if(isset($_SESSION['alert'])){
		echo $_SESSION['alert'];
		unset($_SESSION['alert']);
	}
	?>
	<div class="table-responsive card-body">
		<table id="tableBarang" class="table table-striped table-bordered">
			<thead class="table-secondary">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Name Barang</th>
				<th class="text-center">Jumlah</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Kategori</th>
				<th class="text-center">Bahan</th>
				<th class="text-center">Aksi</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			$data = viewBarang();
			while ($row = mysqli_fetch_array($data)) {
				$idBarang = $row['id_barang'];
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td class="text-center"><?php echo $row['nama_brg'];?></td>
					<td class="text-center"><?php echo $row['jumlah_brg'];?>
						<!--a href="#" data-bs-toggle="modal" data-bs-target="#tambahJumlahBarang_<?#$idBarang?>"><i class="fa-solid fa-circle-plus"></i></a-->
					</td>
					<td class="text-center"><?php echo $row['harga_brg'];?></td>
					<td class="text-center"><?php echo $row['kategori_brg'];?></td>
					<td class="text-center"><?php echo $row['bahan_brg'];?></td>
					<td class="text-center">
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateBarang_<?=$idBarang?>">edit</button>
						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBarang_<?=$idBarang?>">delete</button>
						<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailBarang_<?=$idBarang?>">
							<i class="fa-solid fa-circle-info"></i>
						</button>
						<?php require("modalBarang.php"); ?>
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
