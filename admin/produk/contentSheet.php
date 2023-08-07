<!-- Content Sheet -->
<table id="tableSheet" class="table table-striped table-bordered">
    <thead class="table-secondary">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Lapisan Sheet</th>
            <th class="text-center">Isi Sheet</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $data = viewSheet();
            while ($row = mysqli_fetch_array($data)) {
                $idSheet = $row['id_sheet'];
        ?>
            <tr>
                <td class="text-center"><?php echo $no; ?></td>
                <td class="text-center"><?php echo $row['lapisan_sheet']; ?></td>
                <td class="text-center"><?php echo $row['isi_sheet'];?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-link btn-md text-warning" data-bs-toggle="modal" data-bs-target="#updateSheet_<?=$idSheet?>"><i class="fa-regular fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-link btn-md text-danger" data-bs-toggle="modal" data-bs-target="#deleteSheet_<?=$idSheet?>"><i class="fa fa-trash"></i></button>
                    <?php require('modalSheet.php'); ?>                      
                </td>
            </tr>
        <?php
                $no++;
            }
        ?>
    </tbody>
</table>
