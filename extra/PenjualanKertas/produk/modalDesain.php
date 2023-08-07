<!-- The Modal Delete Desain -->
<div class="modal fade" id="deleteGambar_<?=$idGambar?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Gambar</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" class="was-validated">
            <img src="assets/img/desain/<?php 
                if(empty($row['gambar'])){ echo "noimage.jpg"; }
                else { echo $row['gambar']; }?>" 
                class="rounded float-start" weight="300px" height="200px">
            <div class="input-group">
                <h5><center>Id Gambar :     <strong><?=$idGambar?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Nama Gambar :     <strong><?=$row['nama_gambar']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Kategori :     <strong><?=$row['id_kategori_gambar']?> </strong></center></h5>
            </div>
            <div class="input-group">
                <h5><center>Dibuat Oleh :     <strong><?= $username ?> </strong></center></h5>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $idGambar?>" name="idGambar">
                <input type="hidden" value="deleteGambar" name="postOperator">
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal">
                    <i class="fa-solid fa-trash-can"></i> Delete
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>