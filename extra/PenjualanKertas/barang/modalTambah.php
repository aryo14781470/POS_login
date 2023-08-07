<!-- The Modal Tambah Barang Baru-->
<div class="modal fade" id="tambahBarang">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Id Barang :</span>
                <input type="text" name="idBarang" class="form-control" placeholder="xxxxx" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Nama Barang :</span>
                <input type="text" name="namaBarang" class="form-control" placeholder="nama barang" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Harga :</span>
                <input type="number" name="hargaBarang" class="form-control" placeholder="harga" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Kategori :</span>
                <select class="form-select" name="kategoriBarang" required>
                    <option value=""></option>
                    <?php
                        $kategori = viewKategori();
                        while($rowKategori = mysqli_fetch_array($kategori)){
                    ?>
                        <option value="<?= $rowKategori['id_kategori']; ?>"><?= $rowKategori['nama_kategori']; ?></option>
                    <?php
                        }
                    ?>
				</select>
            </div>
            <br>
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
                <span style="width:120px" class="input-group-text">Deskripsi :</span>
                <input type="textarea" name="deskripsiBarang" class="form-control" placeholder="deskripsi" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Photo:</span>
                <input type="file" class="form-control" name="image" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahBarang" name="postOperator">
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