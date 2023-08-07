<?php

    if (isset($_POST['postOperator'])) {
        # Barang
        if ($_POST['postOperator'] == "tambahBarang") { tambahBarang(); }
        if ($_POST['postOperator'] == "deleteBarang") { deleteBarang(); }
        if ($_POST['postOperator'] == "updateBarang") { updateBarang(); }
		if ($_POST['postOperator'] == "barang_masuk") { tambah_barang_masuk(); }

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

        #Order
        if ($_POST['postOperator'] == "order") { tambah_cart_order(); }
		if ($_POST['postOperator'] == "delete_cart_order") { delete_cart_order(); }
		if ($_POST['postOperator'] == "update_qty_detail_cart_order") { update_qty_detail_cart_order(); }
		if ($_POST['postOperator'] == "delete_detail_cart_order") { delete_detail_cart_order(); }
		if ($_POST['postOperator'] == "tambah_transaksi") { tambah_transaksi(); }
		if ($_POST['postOperator'] == "status") { update_status(); }
		if ($_POST['postOperator'] == "tambah_pembayaran") { tambah_pembayaran(); }
		if ($_POST['postOperator'] == "send_mail") { generate_invoice_PDF(); }
		if ($_POST['postOperator'] == "print") { print_invoice(); }

		#auth
		if ($_POST['postOperator'] == "login") { login(); }
		if ($_POST['postOperator'] == "signup") { signup(); }
		if ($_POST['postOperator'] == "check-otp") { check_otp(); }
		if ($_POST['postOperator'] == "reset-code-otp") { reset_code_otp(); }
		if ($_POST['postOperator'] == "forgot-pass") { forgot_password(); }
		if ($_POST['postOperator'] == "change-password") { change_password(); }
		if ($_POST['postOperator'] == "delete_user") { delete_user(); }
		if ($_POST['postOperator'] == "update_user") { update_user(); }

    }

?>
