<!-- The Modal Tambah Barang Baru-->
<div class="modal fade" id="tambahSupplier">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Supplier</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Supplier :</span>
                <input type="text" name="idSupplier" class="form-control" value="<?php echo set_id('SPL');?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Nama Supplier :</span>
                <input type="text" name="namaSupplier" class="form-control" placeholder="nama supplier" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Alamat Supplier :</span>
                <input type="textarea" name="alamatSupplier" class="form-control" placeholder="alamat supplier" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Eamil Supplier :</span>
                <input type="email" name="emailSupplier" class="form-control" placeholder="email supplier" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Kontak :</span>
                <input type="number" name="kontakSupplier" class="form-control" placeholder="no kontak" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahSupplier" name="postOperator">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">
                    <i class="fa fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
