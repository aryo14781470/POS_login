<!-- The Modal Tambah Kategori Produk-->
<div class="modal fade" id="tambahKategori">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Kategori :</span>
                <input type="text" name="idKategori" class="form-control" placeholder="xxxxx" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Nama Kategori :</span>
                <input type="text" name="namaKategori" class="form-control" placeholder="nama kategori" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahKategori" name="postOperator">
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

<!-- The Modal Tambah Bahan Produk-->
<div class="modal fade" id="tambahBahan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Bahan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Bahan :</span>
                <input type="text" name="idBahan" class="form-control" placeholder="xxxxx" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Nama Bahan :</span>
                <input type="text" name="namaBahan" class="form-control" placeholder="nama bahan" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahBahan" name="postOperator">
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


<!-- The Modal Tambah Ukuran Produk-->
<div class="modal fade" id="tambahUkuran">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Ukuran</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Id Ukuran :</span>
                <input type="text" name="idUkuran" class="form-control" placeholder="xxxxx" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Ukuran :</span>
                <input type="text" name="namaUkuran" class="form-control" placeholder="nama ukuran" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahUkuran" name="postOperator">
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


<!-- The Modal Tambah Sheet Produk-->
<div class="modal fade" id="tambahSheet">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Sheet</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Lapisan Sheet :</span>
                <input type="text" name="lapisanSheet" class="form-control" placeholder="Lapisan" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Isi Sheet :</span>
                <input type="text" name="isiSheet" class="form-control" placeholder="isi Sheet" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahSheet" name="postOperator">
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


<!-- The Modal Tambah Gambar Produk-->
<div class="modal fade" id="tambahGambar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Gambar</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Nama Gambar :</span>
                <input type="text" name="namaGambar" class="form-control" placeholder="Lapisan" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Kategori Gambar :</span>
                <select class="form-select" name="kategoriGambar" required>
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
                <span style="width:150px" class="input-group-text">Gambar :</span>
                <input type="file" class="form-control" name="image" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:150px" class="input-group-text">Dibuat Oleh :</span>
                <input type="text" name="dibuatOleh" class="form-control" value="<?= $username ?>" readonly>
            </div>
            <br>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="tambahGambar" name="postOperator">
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