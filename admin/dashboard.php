<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1><br>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
					<div class="card-header">
						<div class="row">
							<div class="col-9">
								<h5><strong>Customer</strong></h5>
							</div>
							<div class="col-3">
								<?php
								$count_cus = mysqli_num_rows(viewCustomer());
								?>
								<h5><strong><?= $count_cus; ?></strong></h5>
							</div>
						</div>
					</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="index.php?page=Master_Customer">View Customer</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
					<div class="card-header">
						<div class="row">
							<div class="col-9">
								<h5><strong>Supplier</strong></h5>
							</div>
							<div class="col-3">
								<?php
								$count_sup = mysqli_num_rows(viewSupplier());
								?>
								<h5><strong><?= $count_sup; ?></strong></h5>
							</div>
						</div>
					</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="index.php?page=Master_Supplier">View Supplier</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
			<div class="col-xl-3 col-md-6">
				<div class="card bg-primary text-white mb-4">
					<div class="card-header">
						<div class="row">
							<div class="col-9">
								<h5><strong>Barang Masuk</strong></h5>
							</div>
							<div class="col-3">
								<?php
								$count_in = mysqli_num_rows(view_barang_masuk());
								?>
								<h5><strong><?= $count_in; ?></strong></h5>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-white stretched-link" href="index.php?page=Master_Barang_Masuk">View Items In</a>
						<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="card bg-success text-white mb-4">
					<div class="card-header">
						<div class="row">
							<div class="col-9">
								<h5><strong>Transaksi</strong></h5>
							</div>
							<div class="col-3">
								<?php
								$count_t = mysqli_num_rows(view_transaksi());
								?>
								<h5><strong><?= $count_t; ?></strong></h5>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-white stretched-link" href="index.php?page=Status_Order">View Transaksi</a>
						<div class="small text-white"><i class="fas fa-angle-right"></i></div>
					</div>
				</div>
			</div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5><strong>Visi Misi Perusahaan</strong></h5>
                    </div>
                    <div class="card-body text-center">
						<div><strong>Visi</strong></div>
						Visi kami adalah menjadi mitra terbaik dalam menyediakan solusi kertas cetak berkualitas tinggi yang memenuhi kebutuhan pelanggan kami.
						<hr>
						<div><strong>Misi</strong></div>
						<ul class="text-start">
							<li>Menyediakan berbagai jenis kertas cetak berkualitas unggul.</li>
							<li>Menawarkan pilihan produk kertas yang beragam untuk memenuhi kebutuhan berbagai industri.</li>
							<li>Memberikan layanan pelanggan yang ramah, responsif, dan profesional.</li>
							<li>Memastikan kepuasan pelanggan dengan mengutamakan kualitas produk dan pengiriman yang tepat waktu.</li>
							<li>Mengikuti perkembangan teknologi dan tren industri untuk memberikan produk terbaru dan inovatif.</li>
						</ul>
					</div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5><strong>Lokasi</strong></h5>
                    </div>
                    <div class="card-body">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.04457834253!2d106.971264!3d-6.229262!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c662083084b%3A0xd6a947bb4a49fc!2sPercetakan%20Cv.Terlaksana%20Jaya!5e0!3m2!1sen!2sid!4v1688454330842!5m2!1sen!2sid" style="border:1px; width: 450px; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
                </div>
            </div>
        </div>
    </div>
</main>
