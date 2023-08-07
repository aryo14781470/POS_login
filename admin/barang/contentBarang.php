<main>
    <div class="container px-4">
        <h1 class="mt-4">Master Barang</h1>       
        <div class="row card mb-4">
            <div class="col-12 card-header text-end">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarang">
					<i class="fa-solid fa-square-plus"></i>
				</button>
<!--                <a class="btn btn-secondary" href="index.php?page=export_barang"><i class="fa-solid fa-file-export"></i> Export Data</a-->
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
                            <th class="text-center">Name Barang</th>
                            <th class="text-center">Harga</th>
							<th class="text-center">Jumlah</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Bahan</th>
							<th class="text-center">Sheet</th>
                            <th class="text-center">Aksi</th>
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
                                <td class="text-center"><?php echo $row['nama_brg'];?></td>
                                <td class="text-center"><?= rupiah($row['harga_brg']);?></td>
								<td class="text-center"><?php echo $row['jumlah_brg'];?></td>
                                <td class="text-center"><?php echo $row['id_kategori'];?></td>
                                <td class="text-center"><?php echo $row['id_bahan'];?></td>
								<td class="text-center"><?php echo $row['id_sheet'];?> Play</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-link btn-md text-warning" data-bs-toggle="modal" data-bs-target="#updateBarang_<?=$idBarang?>"><i class="fa-solid fa-pen-to-square"></i></button>
									<button type="button" class="btn btn-link btn-md text-info" data-bs-toggle="modal" data-bs-target="#detailBarang_<?=$idBarang?>"><i class="fa-solid fa-eye"></i></button>
									<?php
										$cek = cekHapusTombol();
										if (!in_array($idBarang, $cek)){ ?>
											<button type="button" class="btn btn-link btn-md text-danger" data-bs-toggle="modal" data-bs-target="#deleteBarang_<?=$idBarang?>"><i class="fa fa-trash"></i></button>
										<?php }
									?>
                                    <?php require("modalBarang.php"); ?>
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
    require("modalTambah.php");
?>

