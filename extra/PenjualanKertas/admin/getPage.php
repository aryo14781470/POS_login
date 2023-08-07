<?php

    if (isset($_GET['page'])) {
        //Master Barang
        if (($_GET['page']) == "master_barang") { require("barang/contentBarang.php"); }
        if (($_GET['page']) == "export_barang") { require("barang/exportData.php"); }
        //Produk
        if (($_GET['page']) == "master_produk") { require("produk/contentProduk.php"); }
        #Supplier
        if (($_GET['page']) == "master_supplier") { require("supplier/contentSupplier.php"); }
        if (($_GET['page']) == "export_supplier") { require("supplier/exportsupplier.php"); }
        #Customer
        if (($_GET['page']) == "master_customer") { require("customer/contentCustomer.php"); }
        if (($_GET['page']) == "export_customer") { require("supplier/exportCustomer.php"); }
    }else{
        require("dashboard.php");
    }

?>