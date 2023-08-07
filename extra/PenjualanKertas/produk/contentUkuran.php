<!-- Content Ukuran -->
<table id="tableUkuran"class="table table-striped table-bordered">
    <thead class="table-secondary">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Id ukuran</th>
            <th class="text-center">Ukuran</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $data = viewUkuran();
            while ($row = mysqli_fetch_array($data)) {
                $idUkuran = $row['id_ukuran'];
        ?>
            <tr>
                <td class="text-center"><?php echo $no; ?></td>
                <td class="text-center"><?php echo $idUkuran; ?></td>
                <td class="text-center"><?php echo $row['nama_ukuran'];?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateUkuran_<?=$idUkuran?>">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUkuran_<?=$idUkuran?>">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>                
                    <?php require('modalUkuran.php'); ?>                      
                </td>
            </tr>
        <?php
                $no++;
            }
        ?>
    </tbody>
</table>