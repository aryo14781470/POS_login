<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
<!--			<a class="nav-link" href="info.php">-->
<!--				<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>-->
<!--				Contoh-->
<!--			</a>-->
            <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="index.php?page=Master_Barang">
                <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                Barang
            </a>
			<a class="nav-link" href="index.php?page=Master_Barang_Masuk">
				<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
				Barang Masuk
			</a>
            <a class="nav-link" href="index.php?page=Master_Produk">
                <div class="sb-nav-link-icon"><i class="fa-brands fa-product-hunt"></i></div>
                Spesifikasi
            </a>

            <!-- USERS-->
            <div class="sb-sidenav-menu-heading">USERS</div>
			<a class="nav-link" href="index.php?page=Master_Official">
				<div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
				Official
			</a>
			<a class="nav-link" href="index.php?page=Master_Customer">
				<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
				Customers
			</a>
			<a class="nav-link" href="index.php?page=Master_Supplier">
				<div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
				Suppliers
			</a>
            
            <!-- Penjualan -->
            <div class="sb-sidenav-menu-heading">Sales</div>
			<a class="nav-link" href="index.php?page=Order">
				<div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
				Order
			</a>
			<a class="nav-link" href="index.php?page=Cart_Order">
				<div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
				Cart
			</a>
			<a class="nav-link" href="index.php?page=Status_Order">
				<div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
				Status
			</a>

            <!-- Sales -->
<!--			<div class="sb-sidenav-menu-heading">History</div>-->
<!--			<a class="nav-link" href="index.php?page=Report">-->
<!--				<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>-->
<!--				Report-->
<!--			</a>-->
<!--            <a class="nav-link" href="index.php?page=Summary">-->
<!--                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>-->
<!--                Summary-->
<!--            </a>-->

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as : <?php echo $name_level ?></div>
    </div>
</nav>
