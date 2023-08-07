
<main>
	<div class="container px-4">
		<h1 class="mt-4">Master Official</h1>
		<div class="row card mb-4">
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
						<th class="text-center">ID_User</th>
						<th class="text-center">Username</th>
						<th class="text-center">Email</th>
						<th class="text-center">Acces</th>
						<th class="text-center">Status</th>
						<th class="text-center">Fail</th>
						<th class="text-center">Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					$data = view_user();
					while ($row = mysqli_fetch_array($data)) {
						$id_user = $row['id_user'];
						?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td class="text-center"><?php echo $id_user;?></td>
							<td class="text-center"><?php echo $row['username'];?></td>
							<td class="text-center"><?php echo $row['email'];?></td>
							<td class="text-center"><?php echo $row['acces'];?></td>
							<td class="text-center"><?php echo $row['status'];?></td>
							<td class="text-center"><?php echo $row['fail'];?></td>
							<td class="text-center">
								<button type="button" class="btn btn-link btn-md text-warning" data-bs-toggle="modal" data-bs-target="#update_user_<?=$id_user?>"><i class="fa-regular fa-pen-to-square"></i></button>
								<button type="button" class="btn btn-link btn-md text-danger" data-bs-toggle="modal" data-bs-target="#delete_user_<?=$id_user?>"><i class="fa fa-trash"></i></button>
								<button type="button" class="btn btn-link btn-md text-info" data-bs-toggle="modal" data-bs-target="#detail_user_<?=$id_user?>"><i class="fa fa-eye"></i></button>
								<?php require("modal_user.php"); ?>
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
<?php
require("modal_user.php");
?>

