<header class="header_part text-center">
        <h1>Export Data Customer</h1>
</header>
<div class="container px-4">
    <div class="row card mb-4">
    <a class="btn btn-secondary" href="index.php?page=master_customer"><i class="fa-solid fa-clipboard"></i> Master Customer</a>
        <div class="col-12">
            <div class="card-body table-responsive" id="no-more-tables">
                <table id="exportTableBarang" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Id Customer</th>
                            <th class="text-center">Name Customer</th>
                            <th class="text-center">Almaat</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Kontak</th>
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
                                <td class="text-center"><?php echo $idCustomer; ?></td>
                                <td class="text-center"><?php echo $row['nama_customer'];?></td>
                                <td class="text-center"><?php echo $row['alamat_customer'];?></td>
                                <td class="text-center"><?php echo $row['email_customer'];?></td>
                                <td class="text-center"><?php echo $row['contact_customer'];?></td>
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
</div>
