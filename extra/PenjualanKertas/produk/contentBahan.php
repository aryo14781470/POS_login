<!-- Content Bahan-->
<table id="tableBahan" class="table table-striped table-bordered">
    <thead class="table-secondary">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Id Bahan</th>
            <th class="text-center">Nama Bahan</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $data = viewBahan();
            while ($row = mysqli_fetch_array($data)) {
                $idBahan = $row['id_bahan'];
        ?>
            <tr>
                <td class="text-center"><?php echo $no; ?></td>
                <td class="text-center"><?php echo $idBahan; ?></td>
                <td class="text-center"><?php echo $row['nama_bahan'];?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateBahan_<?=$idBahan?>">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBahan_<?=$idBahan?>">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>   
                    <?php require('modalBahan.php'); ?>                                    
                </td>
            </tr>
        <?php
                $no++;
            }
        ?>
    </tbody>
</table>
