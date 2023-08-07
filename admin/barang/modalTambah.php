<!-- The Modal Tambah Barang Baru-->
<script>
    $(document).ready(function(){
        // Kategori dependent ajax
        $("#kategoriBarang").on("change",function(){
            var kategori = $(this).val();
            $.ajax({
                // url : 'barang/select.php',
				url : '../model/select.php',
                type:"POST",
                cache:false,
                data:{kategori_id : kategori},
                success:function(data){
                    console.log(data);
                    $("#image").html(data);
                }
            });
        });

        $("#image").on("change",function(){
            var gambar = $(this).val();
            $.ajax({
                // url : 'barang/select.php',
				url : '../model/select.php',
                type:"POST",
                cache:false,
                data:{gambar_id : gambar},
                beforeSend: function(){
                    $('#desain').empty();
                },
                success:function(data){
                    console.log(data);
                    $("#desain").html(data);
                    //$('#city').html('<option value="">Select city</option>');
                }
            });
        });
    });

</script>

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
                <input type="text" name="idBarang" class="form-control" value="<?php echo set_id('BRG');?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Nama Barang :</span>
                <input type="text" name="namaBarang" class="form-control" placeholder="nama barang" required>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Kategori :</span>
                <select class="form-select" name="kategoriBarang" id="kategoriBarang" required>
                    <option value="">--PILIH--</option>
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
                    <option value="">--PILIH--</option>
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
                    <option value="">--PILIH--</option>
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
                    <option value="">--PILIH--</option>
                    <?php
                        $sheet = viewSheet();
                        while($rowSheet = mysqli_fetch_array($sheet)){
                    ?>
                        <option value="<?= $rowSheet['id_sheet']; ?>"><?= $rowSheet['lapisan_sheet']; ?></option>
                    <?php
                        }
                    ?>
				</select>
            </div>
            <br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Harga :</span>
                <input type="number" name="hargaBarang" class="form-control" placeholder="harga" required>
            </div>
			<br>
			<div class="input-group">
				<span style="width:120px" class="input-group-text">Deskripsi :</span>
				<textarea type="text" name="deskBarang" class="form-control" placeholder="Deskripsi Barang" required></textarea>
			</div>
            <br>
			<div class="input-group">
				<span style="width:120px" class="input-group-text">Supplier :</span>
				<select class="form-select" name="supplier" required>
					<option value="">--PILIH--</option>
					<?php
					$supplier = viewSupplier();
					while($rowSupplier = mysqli_fetch_array($supplier)){
						?>
						<option value="<?= $rowSupplier['id_supplier']; ?>"><?= $rowSupplier['nama_supplier']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<br>
            <div class="input-group">
                <span style="width:120px" class="input-group-text">Desain:</span>
                <select class="form-select" name="imageBarang" id="image" required>
                    <option value="">--PILIH--</option>
                </select>
            </div>
            <br>
            <div id="desain">
                <img src="assets/img/desain/noimage.png" class="rounded mx-auto d-block" width="200px" height="200px" alt="noimage.jpg">
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

