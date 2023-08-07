<main>
    <div class="container px-4">
        <h1 class="mt-4">Master Supplier</h1>       
        <div class="row card mb-4">
            <div class="col-12 card-header text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSupplier">
                    <i class="fa-solid fa-square-plus"></i> Tambah Supplier
                </button>
                <!--a class="btn btn-secondary" href="index.php?page=export_supplier"><i class="fa-solid fa-file-export"></i> Export Data</a-->
            </div>
            <?php
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?> 
            <div class="table-responsive card-body">
                <table id="tableBarang" class="table table-striped table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Name Supplier</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Kontak</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $data = viewSupplier();
                            while ($row = mysqli_fetch_array($data)) {
                                $idSupplier = $row['id_supplier'];
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no; ?></td>
                                <td class="text-center"><?php echo $row['nama_supplier'];?></td>
                                <td class="text-center"><?php echo $row['alamat_supplier'];?></td>
                                <td class="text-center"><?php echo $row['email_supplier'];?></td>
                                <td class="text-center"><?php echo $row['contact_supplier'];?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateSupplier_<?=$idSupplier?>">edit</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSupplier_<?=$idSupplier?>">delete</button>
                                    <?php require("modalSupplier.php"); ?>
                                </td>
                            </tr>
                        <?php
                                $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php 
    require("modalTambahSupp.php");
?>

