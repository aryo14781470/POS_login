<!-- The Modal Delete Kategori -->
<div class="modal fade" id="deleteKategori_<?=$idKategori?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Kategori</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" class="was-validated">
            <div class="input-group">
                <h5><center>Id Kategori :     <strong><?=$idKategori?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Nama Kategori :     <strong><?=$row['nama_kategori']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Dibuat Oleh :     <strong><?= $username ?> </strong></center></h5>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $idKategori?>" name="idKategori">
                <input type="hidden" value="deleteKategori" name="postOperator">
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal">
                    <i class="fa-solid fa-trash-can"></i> Delete
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal Update Kategori-->
<div class="modal fade" id="updateKategori_<?=$idKategori?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Kategori</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Kategori :</span>
                <input type="text" name="idKategori" class="form-control" value="<?=$idKategori?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Nama Kategori :</span>
                <input type="text" name="namaKategori" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="updateKategori" name="postOperator">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">
                  <i class="fa-regular fa-pen-to-square"></i> Update
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>