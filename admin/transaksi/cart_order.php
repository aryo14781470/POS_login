<main>
	<div class="container px-4">
		<h1 class="mt-4">Master Cart</h1>
		<?php
		if(isset($_SESSION['alert'])){
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
		?>
		<div class="row card mb-4">
			<div class="table-responsive card-body">
				<table id="tableBarang" class="table table-striped table-bordered">
					<thead class="table-secondary">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">ID Transaksi</th>
						<th class="text-center">ID Customer</th>
						<th class="text-center">Name Customer</th>
						<th class="text-center">Total Item</th>
						<th class="text-center">Subtotal</th>
						<th class="text-center">Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$rows = mysqli_fetch_all(view_cart(), MYSQLI_ASSOC);
						$no = 1;
						foreach ($rows as $row){ ?>
							<tr>
								<td class="text-center"><?= $no; ?></td>
								<td class="text-center"><?= $row['id_cart']; ?></td>
								<td class="text-center"><?= $row['id_customer']; ?></td>
								<td class="text-center"><?= $row['nama_customer']; ?></td>
								<td class="text-center"><?= $row['jumlah']; ?></td>
								<td class="text-center"><?= rupiah($row['subtotal']); ?></td>
								<td class="text-center">
<!--									<div class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> --><?php //countdown_delete($row['id_cart']);?><!--</div>-->
									<button type="button" class="btn btn-link btn-md text-danger" data-bs-toggle="modal" data-bs-target="#delete_cart_order_<?= $row['id_cart'] ;?>"><i class="fa fa-trash"></i></button>
									<a href="index.php?page=Detail_Cart_Order&id_cart=<?= $row['id_cart']; ?>" class="btn btn-link btn-md text-info" role="button"><i class="fa-solid fa-eye"></i></a>
								</td>
							</tr><?php
							require("modal/modal_cart_order.php");
							$no++;
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
