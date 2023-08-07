<?php

    if (isset($_GET['page'])) {
        //Master Barang
        if (($_GET['page']) == "Master_Barang") { require("barang/contentBarang.php"); }
		if (($_GET['page']) == "Master_Barang_Masuk") { require("barang/barang_masuk.php"); }
		//Master Official
		if (($_GET['page']) == "Master_Official") { require("user/content_user.php"); }
        //Produk
        if (($_GET['page']) == "Master_Produk") { require("produk/contentProduk.php"); }
        #Supplier
        if (($_GET['page']) == "Master_Supplier") { require("supplier/contentSupplier.php"); }
        #Customer
        if (($_GET['page']) == "Master_Customer") { require("customer/contentCustomer.php"); }
        #Transaksi
        if (($_GET['page']) == "Order") { require("transaksi/order.php"); }
		if (($_GET['page']) == "Cart_Order") { require("transaksi/cart_order.php"); }
		if (($_GET['page']) == "Detail_Cart_Order") { require("transaksi/detail_cart_order.php"); }
        if (($_GET['page']) == "Status_Order") { require("transaksi/status_order.php"); }
		if (($_GET['page']) == "Status_Detail") { require("transaksi/status_detail.php"); }
        #History
        if (($_GET['page']) == "Report") { require("sales/report.php"); }
		if (($_GET['page']) == "Summary") { require("sales/summary.php"); }
    }else{
        require("dashboard.php");
    }

?>
