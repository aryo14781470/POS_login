<header class="header_part text-center">
        <h1>Export Data Barang</h1>
</header>
<div class="container px-4">
    <div class="row card mb-4">
    <a class="btn btn-secondary" href="index.php?page=master_barang"><i class="fa-solid fa-clipboard"></i> Master Barang</a>
        <div class="col-12">
            <div class="card-body table-responsive" id="no-more-tables">
                <table id="exportTableBarang" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Id Barang</th>
                            <th class="text-center">Name Barang</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Bahan</th>
                            <th class="text-center">Ukuran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            $no = 1;
                            $data = viewBarang();
                            while ($row = mysqli_fetch_array($data)) {
                                $idBarang = $row['id_barang'];
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no; ?></td>
                                <td class="text-center"><?php echo $idBarang; ?></td>
                                <td class="text-center"><?php echo $row['nama_brg'];?></td>
                                <td class="text-center"><?php echo $row['jumlah_brg'];?></td>
                                <td class="text-center"><?php echo $row['harga_brg'];?></td>
                                <td class="text-center"><?php echo $row['kategori_brg'];?></td>
                                <td class="text-center"><?php echo $row['bahan_brg'];?></td>
                                <td class="text-center"><?php echo $row['ukuran_brg'];?></td>
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
