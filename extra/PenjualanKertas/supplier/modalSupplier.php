<!-- The Modal Delete Barang -->
<div class="modal fade" id="deleteSupplier_<?=$idSupplier?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Supplier</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" class="was-validated">
            <div class="input-group">
                <h5><center>Id Supplier :     <strong><?=$idSupplier?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Nama Supplier :     <strong><?=$row['nama_supplier']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Alamat :     <strong><?=$row['alamat_supplier']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Email :     <strong><?=$row['email_supplier']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Kontak :     <strong><?=$row['contact_supplier']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Dibuat Oleh :     <strong><?=$row['dibuat_oleh'] ?> </strong></center></h5>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $idSupplier?>" name="idSupplier">
                <input type="hidden" value="deleteSupplier" name="postOperator">
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
<div class="modal fade" id="updateSupplier_<?=$idSupplier?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Supplier</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Supplier :</span>
                <input type="text" name="idSupplier" class="form-control" value="<?=$idSupplier?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Nama Supplier :</span>
                <input type="text" name="namaSupplier" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Alamat :</span>
                <input type="text" name="alamatSupplier" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Email :</span>
                <input type="text" name="emailSupplier" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Kontak :</span>
                <input type="text" name="kontakSupplier" class="form-control" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="updateSupplier" name="postOperator">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">
                  <i class="fa-regular fa-pen-to-square"></i> Update
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>