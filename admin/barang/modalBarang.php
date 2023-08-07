<!-- The Modal Detail Barang-->
<div class="modal fade" id="detailBarang_<?=$idBarang?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Detail Barang</h4>
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
						  <span style="width:150px" class="input-group-text">Id Barang :</span>
						  <input type="text" class="form-control" name="idBarang" value="<?=$idBarang?>" readonly>
					  </div>
					  <div class="input-group">
						  <span style="width:150px" class="input-group-text">Nama Barang :</span>
						  <input type="text" class="form-control" name="namaBarang" value="<?=$row['nama_brg']?>" readonly>
					  </div>
					  <img src="assets/img/desain/<?=$row['gambar_brg']?>" class="rounded float-start" weight="300px" height="200px">
					  <div class="input-group">
						  <p style="width:150px" class="input-group-text"><?=$row['desk_brg']?></p>
					  </div>
				  </td>
                  <td>
                      <div class="input-group">
                          <span style="width:150px" class="input-group-text">Harga :</span>
                          <input type="text" class="form-control" name="hargaBarang" value="<?=$row['harga_brg']?>" readonly>
                      </div>
					  <div class="input-group">
						  <span style="width:150px" class="input-group-text">Jumlah :</span>
						  <input type="text" class="form-control" name="hargaBarang" value="<?=$row['jumlah_brg']?>" readonly>
					  </div>
                      <div class="input-group">
                          <span style="width:150px" class="input-group-text">Kategori :</span>
                          <input type="text" class="form-control" name="kategoriBarang" value="<?=$row['id_kategori']?>" readonly>
                      </div>
                      <div class="input-group">
                          <span style="width:150px" class="input-group-text">Bahan :</span>
                          <input type="text" class="form-control" name="supplierBarang" value="<?=$row['id_bahan']?>" readonly>
                      </div>
                      <div class="input-group">
                          <span style="width:150px" class="input-group-text">Ukuran :</span>
                          <input type="text" class="form-control" name="supplierBarang" value="<?=$row['id_ukuran']?>" readonly>
                      </div>
					  <div class="input-group">
						  <span style="width:150px" class="input-group-text">Sheet :</span>
						  <input type="text" class="form-control" name="supplierBarang" value="<?=$row['id_sheet']?>" readonly>
					  </div>
                      <div class="input-group">
                          <span style="width:150px" class="input-group-text">Tanggal dibuat :</span>
                          <input type="text" name="dibuatOleh" class="form-control" value="<?= tanggal($row['create_brg']) ?>" readonly>
                      </div>
                      <div class="input-group">
                          <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                          <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
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
<div class="modal fade" id="deleteBarang_<?=$idBarang?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" class="was-validated">
            <div class="input-group">
                <h5><center>Id Barang :     <strong><?=$idBarang?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Nama Barang :     <strong><?=$row['nama_brg']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Harga :     <strong><?=$row['harga_brg']?> </strong></center></h5>
            </div>
			<div class="input-group">
				<h5><center>Jumlah :     <strong><?=$row['jumlah_brg']?> </strong></center></h5>
			</div>
            <div class="input-group">
                <h5><center>Kategori :     <strong><?=$row['id_kategori']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Bahan :     <strong><?=$row['id_bahan']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Ukuran :     <strong><?=$row['id_ukuran']?> </strong></center></h5>
            </div>
			<div class="input-group">
				<h5><center>Sheet :     <strong><?=$row['id_sheet']?> </strong></center></h5>
			</div>
            <div class="input-group">
                <h5><center>Dibuat Oleh :     <strong><?= $username ?> </strong></center></h5>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $idBarang?>" name="idBarang">
                <input type="hidden" value="deleteBarang" name="postOperator">
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
<div class="modal fade" id="updateBarang_<?=$idBarang?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated">
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Id Barang :</span>
                <input type="text" name="idBarang" class="form-control" value="<?=$idBarang?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Nama Barang :</span>
                <input type="text" name="namaBarang" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Harga :</span>
                <input type="text" name="hargaBarang" class="form-control" required>
            </div>
            <br>
<!--            <div class="input-group">-->
<!--                <span style="width:120px" class="input-group-text">Kategori :</span>-->
<!--                <select class="form-select" name="kategoriBarang" required>-->
<!--                    <option value=""></option>-->
<!--                    --><?php
//                        $kategori = viewKategori();
//                        while($rowKategori = mysqli_fetch_array($kategori)){
//                    ?>
<!--                        <option value="--><?//= $rowKategori['id_kategori']; ?><!--">--><?//= $rowKategori['nama_kategori']; ?><!--</option>-->
<!--                    --><?php
//                        }
//                    ?>
<!--				        </select>-->
<!--            </div>-->
<!--            <br>-->
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Bahan :</span>
                <select class="form-select" name="bahanBarang" required>
                    <option value=""></option>
                    <?php
                        $bahan = viewBahan();
                        while($rowBahan = mysqli_fetch_array($bahan)){
                    ?>
                        <option value="<?= $rowBahan['id_bahan']; ?>"><?= $rowBahan['id_bahan']; ?> (<?= $rowBahan['nama_bahan']; ?>)</option>
                    <?php
                        }
                    ?>
				        </select>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Ukuran :</span>
                <select class="form-select" name="ukuranBarang" required>
                    <option value=""></option>
                    <?php
                        $ukuran = viewUkuran();
                        while($rowUkuran = mysqli_fetch_array($ukuran)){
                    ?>
                        <option value="<?= $rowUkuran['id_ukuran']; ?>"><?= $rowUkuran['nama_ukuran']; ?></option>
                    <?php
                        }
                    ?>
				        </select>
            </div>
            <br>
			<div class="input-group">
				<span style="width:120px" class="input-group-text">Sheet :</span>
				<select class="form-select" name="sheetBarang" required>
					<option value=""></option>
					<?php
					$sheet = viewSheet();
					while($rowSheet = mysqli_fetch_array($sheet)){
						?>
						<option value="<?= $rowSheet['id_sheet']; ?>"><?= $rowSheet['lapisan_sheet']; ?> - <?= $rowSheet['isi_sheet']; ?> </option>
						<?php
					}
					?>
				</select>
			</div>
			<br>
			<div class="input-group">
				<span style="width:120px" class="input-group-text">Deskripsi :</span>
				<textarea type="text" name="deskBarang" class="form-control" placeholder="Deskripsi Barang" required></textarea>
			</div>
			<br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="updateBarang" name="postOperator">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">
                  <i class="fa-regular fa-pen-to-square"></i> Update
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
