<!-- The Modal Detail Barang-->
<div class="modal fade" id="detail_user_<?=$id_user?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Detail User</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form method="post" class="was-validated">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<td>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Id User :</span>
										<input type="text" class="form-control" value="<?=$id_user?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Username :</span>
										<input type="text" class="form-control" value="<?=$row['username']?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Email :</span>
										<input type="email" class="form-control" value="<?=$row['email']?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Hak Access :</span>
										<input type="text" class="form-control" value="<?=$row['acces']?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Verify Code :</span>
										<input type="text" class="form-control" value="<?=$row['code']?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Status :</span>
										<input type="text" class="form-control" value="<?=$row['status']?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Gagal Login :</span>
										<input type="text" class="form-control"value="<?=$row['fail']?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Tanggal dibuat :</span>
										<input type="text" class="form-control" value="<?= date("d F Y, H:i:s", strtotime($row['dibuat_tgl'])); ?>" readonly>
									</div>
									<div class="input-group">
										<span style="width:150px" class="input-group-text">Tanggal diupdate :</span>
										<input type="text" class="form-control" value="<?= date("d F Y, H:i:s", strtotime($row['diupdate_tgl'])); ?>" readonly>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- The Modal Delete Barang -->
<div class="modal fade" id="delete_user_<?=$id_user?>">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Delete Pengguna</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form method="post" class="was-validated">
					<div class="input-group">
						<h5><center>ID User :     <strong><?=$id_user?> </strong></center></h5>
					</div>
					<div class="input-group">
						<h5><center>Usernama :     <strong><?=$row['username']?> </strong></center></h5>
					</div>
					<div class="input-group">
						<h5><center>Email :     <strong><?=$row['email']?> </strong></center></h5>
					</div>
					<div class="input-group">
						<h5><center>Status :     <strong><?=$row['status']?> </strong></center></h5>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<input type="hidden" value="<?php echo $id_user?>" name="id_user">
						<input type="hidden" value="delete_user" name="postOperator">
						<button type="submit" class="btn btn-danger" data-bs-toggle="modal">
							<i class="fa-solid fa-trash-can"></i> Delete
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- The Modal Update Barang-->
<div class="modal fade" id="update_user_<?=$id_user?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update User</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form role="form" method="post" class="was-validated">
					<div class="input-group">
						<span style="width:120px" class="input-group-text">ID user :</span>
						<input type="text" name="id_user" class="form-control" value="<?=$id_user?>" readonly>
					</div>
					<br>
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Username :</span>
						<input type="text" name="username" class="form-control" value="<?=$row['username']?>" readonly>
					</div>
					<br>
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Email :</span>
						<input type="text" name="email" class="form-control" value="<?=$row['email']?>" readonly>
					</div>
					<br>
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Level User :</span>
						<select class="form-select" name="level" required>
							<option value="">--PILIH--</option>
							<?php
							$level = view_level_users();
							while($row_level = mysqli_fetch_array($level)){
								?>
								<option value="<?= $row_level['acces_level']; ?>"><?= $row_level['acces_level']; ?> (<?= $row_level['name_level']; ?>)</option>
								<?php
							}
							?>
						</select>
					</div>
					<br>
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Status :</span>
						<select class="form-select" name="status" required>
							<option value="">--PILIH--</option>
							<option value="verified">Verified</option>
							<option value="not verified">Not verified</option>
						</select>
					</div>
					<br>
					<div class="input-group">
						<span style="width:120px" class="input-group-text">Gagal Login :</span>
						<select class="form-select" name="fail" required>
							<option value="">--PILIH--</option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</div>
					<br>

					<!-- Modal footer -->
					<div class="modal-footer">
						<input type="hidden" value="update_user" name="postOperator">
						<button type="submit" class="btn btn-primary" data-bs-toggle="modal">
							<i class="fa-regular fa-pen-to-square"></i> Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
