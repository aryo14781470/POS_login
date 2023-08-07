<!-- The Modal Delete Ukuran -->
<div class="modal fade" id="deleteUkuran_<?=$idUkuran?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Ukuran</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" class="was-validated">
            <div class="input-group">
                <h5><center>Id Ukuran :     <strong><?=$idUkuran?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Ukuran :     <strong><?=$row['nama_ukuran']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Dibuat Oleh :     <strong><?= $username ?> </strong></center></h5>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $idUkuran?>" name="idUkuran">
                <input type="hidden" value="deleteUkuran" name="postOperator">
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal">
                    <i class="fa-solid fa-trash-can"></i> Delete
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal Update Ukuran-->
<div class="modal fade" id="updateUkuran_<?=$idUkuran?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Ukuran</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Ukuran :</span>
                <input type="text" name="idUkuran" class="form-control" value="<?=$idUkuran?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Ukuran :</span>
                <input type="text" name="namaUkuran" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="updateUkuran" name="postOperator">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">
                  <i class="fa-regular fa-pen-to-square"></i> Update
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>