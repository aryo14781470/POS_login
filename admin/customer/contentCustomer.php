<main>
    <div class="container px-4">
        <h1 class="mt-4">Master Customer</h1>       
        <div class="row card mb-4">
            <div class="col-12 card-header text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahCustomer">
                    <i class="fa-solid fa-square-plus"></i>
                </button>
                <!--a class="btn btn-secondary" href="index.php?page=export_customer"><i class="fa-solid fa-file-export"></i> Export Data</a-->
            </div>
            <?php
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?> 
            <div class="table-responsive card-body">
                <table id="table_contoh" class="table table-striped table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Name Customer</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Kontak</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $data = viewCustomer();
                            while ($row = mysqli_fetch_array($data)) {
                                $idCustomer = $row['id_customer'];
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no; ?></td>
                                <td class="text-center"><?php echo $row['nama_customer'];?></td>
                                <td class="text-center"><?php echo $row['alamat_customer'];?></td>
                                <td class="text-center"><?php echo $row['email_customer'];?></td>
                                <td class="text-center"><?php echo $row['contact_customer'];?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-link btn-md text-warning" data-bs-toggle="modal" data-bs-target="#updateCustomer_<?=$idCustomer?>"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button type="button" class="btn btn-link btn-md text-danger" data-bs-toggle="modal" data-bs-target="#deleteCustomer_<?=$idCustomer?>"><i class="fa fa-trash"></i></button>
                                    <?php require("modalCustomer.php"); ?>
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
    require("modalTambahCustomer.php");
?>

