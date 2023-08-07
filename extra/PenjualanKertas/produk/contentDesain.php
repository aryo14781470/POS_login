<!-- Content Gambar-->
<table id="tableGambar" class="table table-striped table-bordered">
    <thead class="table-secondary">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Gambar</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Gambar</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $data = viewDesain();
            while ($row = mysqli_fetch_array($data)) {
                $idGambar = $row['id_gambar'];
        ?>
            <tr>
                <td class="text-center"><?php echo $no; ?></td>
                <td class="text-center"><?php echo $row['nama_gambar']; ?></td>
                <td class="text-center"><?php echo $row['id_kategori_gambar'];?></td>
                <td class="text-center">
                    <img src="assets/img/desain/<?php 
                        if(empty($row['gambar'])){ echo "noimage.jpg"; }
                        else { echo $row['gambar']; }?>" 
                        class="rounded float-start" weight="300px" height="200px">
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGambar_<?=$idGambar?>">
                        Hapus
                    </button>   
                    <?php require('modalDesain.php'); ?>                                    
                </td>
            </tr>
        <?php
                $no++;
            }
        ?>
    </tbody>
</table>
