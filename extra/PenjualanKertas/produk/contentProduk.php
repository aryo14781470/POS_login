<main>
    <div class="container px-4">   
        <h1 class="mt-4">Master Produk</h1>     
        <div class="row mb-4">
            <?php
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?> 
        </div>
        <ul class="nav nav-tabs mb-3" role="tab-list">
            <!-- Nav Kategori -->
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" id="kategori-tab" data-bs-target="#kategori"
                        type="button" role="tab" aria-controls="kategori" aria-selected="true">Kategori
                </a>
            </li>

            <!-- Nav Bahan -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" id="bahan-tab" data-bs-target="#bahan"
                    type="button" role="tab" aria-controls="bahan" aria-selected="false">Bahan
                </a>
            </li>

            <!-- Nav Ukuran -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" id="ukuran-tab" data-bs-target="#ukuran"
                    type="button" role="tab" aria-controls="ukuran" aria-selected="false">Ukuran
                </a>
            </li>

            <!-- Nav Sheet -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" id="sheet-tab" data-bs-target="#sheet"
                    type="button" role="tab" aria-controls="sheet" aria-selected="false">Sheet
                </a>
            </li>

            <!-- Nav Gambar -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" id="gambar-tab" data-bs-target="#gambar"
                    type="button" role="tab" aria-controls="sheet" aria-selected="false">Desain
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Content Kategori -->
            <div class="tab-pane fade show active" id="kategori" role="tabpanel">
                <div class="row card mb-4">
                    <div class="col-12 card-header text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategori">
                            <i class="fa-solid fa-square-plus"></i> Tambah Kategori
                        </button>
                    </div>
                    <div class="table-responsive card-body">
                        <?php require('contentKategori.php'); ?>
                    </div>
                </div>
            </div>

            <!-- Content Bahan -->
            <div class="tab-pane fade show" id="bahan" role="tabpanel">
                <div class="row card mb-4">
                    <div class="col-12 card-header text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBahan">
                            <i class="fa-solid fa-square-plus"></i> Tambah Bahan
                        </button>
                    </div>
                    <div class="table-responsive card-body">
                        <?php require('contentBahan.php'); ?>
                    </div>
                </div>
            </div>

            <!-- Content Ukuran -->
            <div class="tab-pane fade show" id="ukuran" role="tabpanel">
                <div class="row card mb-4">
                    <div class="col-12 card-header text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUkuran">
                            <i class="fa-solid fa-square-plus"></i> Tambah Bahan
                        </button>
                    </div>
                    <div class="table-responsive card-body">
                            <?php require('contentUkuran.php'); ?>
                    </div>
                </div>
            </div>

            <!-- Content Sheet -->
            <div class="tab-pane fade show" id="sheet" role="tabpanel">
                <div class="row card mb-4">
                    <div class="col-12 card-header text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSheet">
                            <i class="fa-solid fa-square-plus"></i> Tambah Sheet
                        </button>
                    </div>
                    <div class="table-responsive card-body">
                            <?php require('contentSheet.php'); ?>
                    </div>
                </div>
            </div>

            <!-- Content Gambar -->
            <div class="tab-pane fade show" id="gambar" role="tabpanel">
                <div class="row card mb-4">
                    <div class="col-12 card-header text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGambar">
                            <i class="fa-solid fa-square-plus"></i> Tambah Gambar
                        </button>
                    </div>
                    <div class="table-responsive card-body">
                            <?php require('contentDesain.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php

    require('modalTambahProduk.php')

?>
<script>
    $(document).ready(function(){$('#tableKategori').DataTable();});
    $(document).ready(function(){$('#tableBahan').DataTable();});
    $(document).ready(function(){$('#tableUkuran').DataTable();});
    $(document).ready(function(){$('#tableSheet').DataTable();});
    $(document).ready(function(){$('#tableGambar').DataTable();});
</script>

