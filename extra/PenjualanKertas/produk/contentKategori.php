<!-- Content Kategori -->
<table id="tableKategori" class="table table-striped table-bordered">
    <thead class="table-secondary">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Id Kategori</th>
            <th class="text-center">Nama Kategori</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $data = viewKategori();
            while ($row = mysqli_fetch_array($data)) {
                $idKategori = $row['id_kategori'];
        ?>
            <tr>
                <td class="text-center"><?php echo $no; ?></td>
                <td class="text-center"><?php echo $idKategori; ?></td>
                <td class="text-center"><?php echo $row['nama_kategori'];?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateKategori_<?=$idKategori?>">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteKategori_<?=$idKategori?>">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>       
                    <?php require('modalKategori.php'); ?>                               
                </td>
            </tr>
        <?php
                $no++;
            }
        ?>
    </tbody>
</table>

