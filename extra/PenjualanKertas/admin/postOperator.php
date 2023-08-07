<?php
    #if (isset($_POST['postOperator']) && isset($_FILES['image'])) {
     #   if ($_POST['postOperator'] == "tambahBarang") { tambahBarang(); }
        # code...
    #}
    if (isset($_POST['postOperator'])) {
        # Barang
        if ($_POST['postOperator'] == "tambahBarang") { tambahBarang(); }
        if ($_POST['postOperator'] == "deleteBarang") { deleteBarang(); }
        if ($_POST['postOperator'] == "updateBarang") { updateBarang(); }

        # Produk tambah
        if ($_POST['postOperator'] == "tambahKategori") { tambahKategori(); }
        if ($_POST['postOperator'] == "tambahBahan") { tambahBahan(); }
        if ($_POST['postOperator'] == "tambahUkuran") { tambahUkuran(); }
        if ($_POST['postOperator'] == "tambahSheet") { tambahSheet(); }
        if ($_POST['postOperator'] == "tambahGambar") { tambahGambar(); }

        # Produk delete
        if ($_POST['postOperator'] == "deleteKategori") { deleteKategori(); }
        if ($_POST['postOperator'] == "deleteBahan") { deleteBahan(); }
        if ($_POST['postOperator'] == "deleteUkuran") { deleteUkuran(); }
        if ($_POST['postOperator'] == "deleteSheet") { deleteSheet(); }
        if ($_POST['postOperator'] == "deleteGambar") { deleteGambar(); }

        # Produk update
        if ($_POST['postOperator'] == "updateKategori") { updateKategori(); }
        if ($_POST['postOperator'] == "updateBahan") { updateBahan(); }
        if ($_POST['postOperator'] == "updateUkuran") { updateUkuran(); }
        if ($_POST['postOperator'] == "updateSheet") { updateSheet(); }

        #Supplier
        if ($_POST['postOperator'] == "tambahSupplier") { tambahSupplier(); }
        if ($_POST['postOperator'] == "deleteSupplier") { deleteSupplier(); }
        if ($_POST['postOperator'] == "updateSupplier") { updateSupplier(); }

        #Customer
        if ($_POST['postOperator'] == "tambahCustomer") { tambahCustomer(); }
        if ($_POST['postOperator'] == "deleteCustomer") { deleteCustomer(); }
        if ($_POST['postOperator'] == "updateCustomer") { updateCustomer(); }
    }

?>