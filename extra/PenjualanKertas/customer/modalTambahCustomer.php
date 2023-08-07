<!-- The Modal Tambah Barang Baru-->
<div class="modal fade" id="tambahCustomer">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Customer</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Customer :</span>
                <input type="text" name="idCustomer" class="form-control" placeholder="xxxxx" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Nama Customer :</span>
                <input type="text" name="namaCustomer" class="form-control" placeholder="nama supplier" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Alamat :</span>
                <input type="text" name="alamatCustomer" class="form-control" placeholder="alamat supplier" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Email :</span>
                <input type="email" name="emailCustomer" class="form-control" placeholder="email supplier" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Kontak :</span>
                <input type="tel" name="kontakCustomer" class="form-control" placeholder="no kontak" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahCustomer" name="postOperator">
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