<!-- The Modal Delete Ukuran -->
<div class="modal fade" id="deleteSheet_<?=$idSheet?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Sheet</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" class="was-validated">
            <div class="input-group">
                <h5><center>Id Sheet :     <strong><?=$idSheet?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Lapisan Sheet :     <strong><?=$row['lapisan_sheet']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>isi Sheet :     <strong><?=$row['isi_sheet']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Dibuat Oleh :     <strong><?= $username ?> </strong></center></h5>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $idSheet?>" name="idSheet">
                <input type="hidden" value="deleteSheet" name="postOperator">
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
<div class="modal fade" id="updateSheet_<?=$idSheet?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Sheet</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Sheet :</span>
                <input type="text" name="idSheet" class="form-control" value="<?=$idSheet?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Lapisan Sheet :</span>
                <input type="text" name="lapisanSheet" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Isi Sheet :</span>
                <input type="text" name="isiSheet" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="updateSheet" name="postOperator">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">
                  <i class="fa-regular fa-pen-to-square"></i> Update
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>