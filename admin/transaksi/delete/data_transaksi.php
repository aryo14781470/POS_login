<?php

	function view_cart(){
		$konek = conn();
		$sql = "SELECT cart_order.id_cart, cart_order.id_customer, COUNT(*) AS jumlah, SUM(cart_order.detail_qty * cart_order.detail_harga) AS subtotal, 
				(SELECT customer.nama_customer FROM customer WHERE customer.id_customer = cart_order.id_customer) AS nama_customer 
				FROM cart_order GROUP BY cart_order.id_cart HAVING COUNT(*) > 0";
		$result = mysqli_query($konek, $sql);
		if (!$result) {
			echo mysqli_error($konek);
		}else{ return $result; }

		// gunakan kueri ini jika kedua table order cart dan customer saling berealasi
	//		SELECT
	//		order_cart.id_customer,
	//		COUNT(*) AS jumlah,
	//		SUM(order_cart.harga) AS subtotal,
	//		customer.nama AS nama_customer
	//		FROM order_cart
	//		INNER JOIN customer ON order_cart.id_customer = customer.id_customer
	//		GROUP BY order_cart.id_customer
	//		HAVING COUNT(*) > 1;

	}

	function delete_cart_order($id_cart = NULL){
		$konek = conn();
		if ($id_cart != NULL) {
			$cari = "WHERE id_cart = '$id_cart'";
		}else{
			$cari = "";
		}
		$sql = "DELETE FROM cart_order $cari";
		$result = mysqli_query($konek, $sql);
		if(!$result){
			$eror = mysqli_error($konek);
			$_SESSION['alert'] = warningAlert("Warning! ","Cart customer Gagal Dihapus. ($eror)");
		}else{
			$_SESSION['alert'] = successAlert("Success! ","Cart customer Berhasil Dihapus");
		}
	}

	function countdown_delete($idcart){
		date_default_timezone_set('Asia/Jakarta');
		$now = time();
		$to = mktime(0,0,0, date('n'), date('j')+1, date('Y'));
		$rentang = $to - $now;
		if ($rentang <= 0){
			delete_cart_order($idcart);
		}
		$hours = floor($rentang / (60 * 60));
		$minutes = floor(($rentang % (60 * 60)) / 60);
		$seconds = $rentang % 60;
		echo $hours.':'.$minutes.':'.$seconds;
	}

	function view_detail_cart($id_cart = NULL){
		$konek = conn();
		if ($id_cart != NULL) {
			$cari = "WHERE id_cart = '$id_cart'";
		}else{
			$cari = "";
		}
		$sql = "SELECT * FROM cart_order $cari ORDER BY id_cart ASC";
		$result = mysqli_query($konek, $sql);
		if (!$result) {
			echo mysqli_error($konek);
		}else{ return $result; }
	}

	function update_qty_detail_cart_order(){
		$konek = conn();
		$id_cart = $_POST['id_cart'];
		$id_customer = $_POST['id_customer'];
		$id_barang = $_POST['id_barang'];
		$qty = $_POST['qty'];

		$sql = "UPDATE cart_order SET detail_qty = '$qty' 
				WHERE id_cart = '$id_cart' AND id_customer = '$id_customer' AND id_barang = '$id_barang'";
		$result = mysqli_query($konek, $sql);
		if (!$result){
			$eror = mysqli_error($konek);
			$_SESSION['alert'] = warningAlert("Warning! ","QTY gagal diperbarui. ($eror)");
		}else{
			$_SESSION['alert'] = successAlert("Success! ","QTY berhasil diupdate");
		}
	}

	function delete_detail_cart_order(){
		$konek = conn();
		$id_cart = $_POST['id_cart'];
		$id_customer = $_POST['id_customer'];
		$id_barang = $_POST['id_barang'];
		$sql = "DELETE FROM cart_order 
				WHERE id_cart = '$id_cart' AND id_customer = '$id_customer' AND id_barang = '$id_barang'";
		$result = mysqli_query($konek, $sql);
		if(!$result){
			$eror = mysqli_error($konek);
			$_SESSION['alert'] = warningAlert("Warning! ","Barang Gagal Dihapus. ($eror)");
		}else{
			$_SESSION['alert'] = successAlert("Success! ","Barang Berhasil Dihapus");
		}
	}

	function cart_is_exist($id_barang, $id_customer){
		$konek = conn();
		$sql = "SELECT * FROM cart_order WHERE id_barang = '$id_barang' AND id_customer = '$id_customer'";
		$result = mysqli_query($konek, $sql);
		return $result;
	}

    function tambah_cart_order(){
        $konek = conn();
        $id_barang = $_POST['id_barang'];
        $id_transaksi = $_POST['id_cart'];
        $id_customer = $_POST['id_customer'];
        $harga = harga($id_barang);
		$cart_is_exist = cart_is_exist($id_barang, $id_customer);

		if (mysqli_num_rows($cart_is_exist) > 0){
			$_SESSION['alert'] = infoAlert("Info! ", "a Customer with the name ${id_customer} already has ${id_barang} items in his cart");
		}else{
			$sql = "INSERT INTO cart_order(id_cart, id_barang, id_customer, detail_qty, detail_harga)
                VALUE ('$id_transaksi', '$id_barang', '$id_customer', '1', '$harga')";
			$result = mysqli_query($konek, $sql);
			if(!$result){
				$error = mysqli_error($konek);
				$_SESSION['alert'] = warningAlert("Warning! ","Data Gagal Disimpan. ($error)");
			} else {
				$_SESSION['alert'] = successAlert("Success! ","Data Berhasil Disimpan");
			}
		}

    }

	function tambah_transaksi(){
		$konek = conn();
		$id_transaksi = $_POST['id_cart'];
		$id_customer = $_POST['id_customer'];
		$status = $_POST['status'];
		$fd = $_POST['for_date'];
		$for_date = tanggal($fd);

		$sql = "INSERT INTO transaksi(id_transaksi, id_customer, status, untuk_tanggal, dibuat_tanggal, dibuat_oleh)
						VALUE ('$id_transaksi', '$id_customer', '$status', '$for_date', NOW(), 'admin')";
		$result = mysqli_query($konek, $sql);
		if (!$result) {
			$error = mysqli_error($konek);
			$_SESSION['alert'] = warningAlert("Warning! ", "Transaksi Gagal Disimpan. ($error)");
		} else {
			$rows = mysqli_fetch_all(view_detail_cart($id_transaksi), MYSQLI_ASSOC);
			foreach ($rows as $row){
				$id_transaksi = $row['id_cart'];
				$id_barang = $row['id_barang'];
				$qty = $row['detail_qty'];
				$harga = $row['detail_harga'];
				$sql = "INSERT INTO transaksi_detail (id_transaksi, id_barang, detail_qty, detail_harga, dibuat_tanggal)
						VALUES ('$id_transaksi', '$id_barang', '$qty', '$harga', NOW())";
				$result = mysqli_query($konek, $sql);
				if (!$result){
					$error = mysqli_error($konek);
					$_SESSION['alert'] = warningAlert("Warning! ", "Detail Transaksi Gagal Disimpan. ($error)");
				}else{
					$_SESSION['alert'] = successAlert("Success! ", "Detail Transaksi Berhasil Disimpan");
				}
			}
			delete_cart_order($id_transaksi);
			echo '<script type="text/javascript">';
			echo 'window.location.assign("http://localhost/POS_Login/admin/index.php?page=status_order")';
			echo '</script>';
			exit();
		}

	}

	function view_transaksi($id_transaksi = null){
		$konek = conn();
		if ($id_transaksi != NULL) {
			$cari = "WHERE id_transaksi = '$id_transaksi'";
		}else{
			$cari = "";
		}
		$sql = "SELECT * FROM transaksi $cari ORDER BY id_transaksi DESC";
		$result = mysqli_query($konek, $sql);
		if (!$result) {
			echo mysqli_error($konek);
		}else{ return $result; }
	}

	function view_transaksi_detail($id_transaksi = null){
		$konek = conn();
		if ($id_transaksi != NULL) {
			$cari = "WHERE id_transaksi = '$id_transaksi'";
		}else{
			$cari = "";
		}
		$sql = "SELECT * FROM transaksi_detail $cari ORDER BY id_transaksi ASC";
		$result = mysqli_query($konek, $sql);
		if (!$result) {
			echo mysqli_error($konek);
		}else{ return $result; }
	}

	function view_transaksi_paymnet($id_transaksi = null){
		$konek = conn();
		if ($id_transaksi != NULL) {
			$cari = "WHERE id_transaksi = '$id_transaksi'";
		}else{
			$cari = "";
		}
		$sql = "SELECT * FROM transaksi_payment $cari ORDER BY id_transaksi ASC";
		$result = mysqli_query($konek, $sql);
		if (!$result) {
			echo mysqli_error($konek);
		}else{ return $result; }
	}

	function update_status(){
		$konek = conn();
		$id_transaksi = $_POST['id_transaksi'];
		$status = $_POST['status'];
		$sql = "UPDATE transaksi SET status = '$status' WHERE id_transaksi = '$id_transaksi'";
		$result = mysqli_query($konek, $sql);
		if (!$result){
			$eror = mysqli_error($konek);
			$_SESSION['alert'] = warningAlert("Warning! ","Status gagal diperbarui. ($eror)");
		}else{
			$_SESSION['alert'] = successAlert("Success! ","Status berhasil diupdate");
		}
		reload();
	}

	function payment_exist($id_transaksi){
		$konek = conn();
		$sql = "SELECT * FROM transaksi_payment WHERE id_transaksi = '$id_transaksi'";
		$result = mysqli_query($konek, $sql);
		if (!$result){ mysqli_error($result); }
		else { return $result; }
	}

	function lunas($id_transaksi, $grand_total){
		$konek = conn();

//		$sql_jumlah = "SELECT SUM(bayar) AS jumlah FROM transaksi_payment WHERE id_transaksi = '$id_transaksi'";
//		$result_jumlah = mysqli_query($konek, $sql_jumlah);
//		$row_jumlah = mysqli_fetch_assoc($result_jumlah);
//		$jumlah = $row_jumlah['jumlah'];
		$sql_jumlah = total_harga($id_transaksi, "payment");
		$result_jumlah = mysqli_fetch_assoc($sql_jumlah);
		$jumlah = $result_jumlah['total'];
		if ($jumlah > $grand_total || $jumlah == $grand_total){
			$sql_status = "UPDATE transaksi SET status = 'Billed' WHERE id_transaksi = '$id_transaksi'";
			$result_status = mysqli_query($konek,$sql_status);
			if(!$result_status){
				$eror = mysqli_error($konek);
				$_SESSION['alert'] = warningAlert("Warning! ","Data status billed gagal disimpan. ($eror)");
			} else {
				$_SESSION['alert'] = successAlert("Success! ","Data pembayaran telah lunas");
			}
		}else{
			$_SESSION['alert'] = successAlert("Success! ","Pembayaran berhasil ditambahkan");
		}
	}

	function tambah_pembayaran(){
		$konek = conn();
		$id_transaksi = $_POST['id_transaksi'];
		$status = $_POST['status'];
		$reference = $_POST['reference'];
		$payment = $_POST['payment'];
		$total = total_harga($id_transaksi, "detail");
		$row_total = mysqli_fetch_assoc($total);
		$subtotal = $row_total['total'];
//		foreach ($total as $row){ $subtotal += $row[0]; }
		$bayar = $_POST['bayar'];
		$ongkir = $_POST['ongkir'];
		$grand_total = $subtotal + $ongkir;

		//Upload Bukti Transaksi
		$files = $_FILES['image'];
		$name = move_file($files, "transaksi", $id_transaksi);
		if (strlen($name) > 30){
			$_SESSION['alert'] = $name;
			return false;
		}

		//Upload Ke DB
		$data = payment_exist($id_transaksi);
		$exist = mysqli_num_rows($data);
		if ($exist > 0){
			#Ambil Max pembayaran
			$sql_max = "SELECT MAX(pembayaran) as max_kode FROM transaksi_payment WHERE id_transaksi = $id_transaksi";
			$result_max = mysqli_query($konek, $sql_max);
			$row_max = mysqli_fetch_assoc($result_max);
			$max = $row_max['max_kode'] + 1;

			#tambahakan pembayaran
			$sql_next_paymnet = "INSERT INTO transaksi_payment (id_transaksi, total, ongkir, grand_total, bayar, berkas, metode, pembayaran, reference, dibuat_tanggal)
                        VALUE ('$id_transaksi', '$subtotal', '$ongkir', '$grand_total', '$bayar', '$name', '$payment', '$max', '$reference', NOW())";
			$result_next_paymnet = mysqli_query($konek, $sql_next_paymnet);
			if (!$result_next_paymnet){
				$eror = mysqli_error($konek);
				$_SESSION['alert'] = warningAlert("Warning! ","Pembayaran gagal ditambahkan. ($eror)");
			}else{
				lunas($id_transaksi, $grand_total);
			}

		}else{
			$sql_paymnet = "INSERT INTO transaksi_payment (id_transaksi, total, ongkir, grand_total, bayar, berkas, metode, pembayaran, reference, dibuat_tanggal)
                        VALUE ('$id_transaksi', '$subtotal', '$ongkir', '$grand_total', '$bayar', '$name', '$payment', 1, '$reference', NOW())";
			$sql_transaksi = "UPDATE transaksi SET status = '$status' WHERE id_transaksi = '$id_transaksi'";
			$sql = $sql_transaksi.";".$sql_paymnet;
			$result = mysqli_multi_query($konek, $sql);
			if(!$result){
				$eror = mysqli_error($konek);
				$_SESSION['alert'] = warningAlert("Warning! ","Data pembayaran gagal disimpan. ($eror)");
			} else {
				lunas($id_transaksi, $grand_total);
			}
		}
		reload();

//		$sql_paymnet = "INSERT INTO transaksi_payment (id_transaksi, total, ongkir, grand_total, bayar, berkas, pembayaran)
//                        VALUE ('$id_transaksi', '$subtotal', '$ongkir', '$grand_total', '$bayar', '$name', 1)";
//		$sql_transaksi = "UPDATE transaksi SET status = '$status', reference = '$reference', img_trans = '$name' WHERE id_transaksi = '$id_transaksi'";
//		$sql = $sql_transaksi.";".$sql_paymnet;
//		$result = mysqli_multi_query($konek, $sql);
//		if(!$result){
//			$eror = mysqli_error($konek);
//			$_SESSION['alert'] = warningAlert("Warning! ","Data pembayaran gagal disimpan. ($eror)");
//		} else {
//			$_SESSION['alert'] = successAlert("Success! ","Data pembayaran berhasil Disimpan");
//		}


//		#proses Upload Gambar
//		$name = $_FILES['image']['name']; #ambil nama file gambar
//		$size = $_FILES['image']['size']; #ambil ukuran filenya
//		$fileTemp = $_FILES['image']['tmp_name']; #ambil lokasi/directory file
//
//		#Merubah Extensi File
//		$fileInfo = pathinfo($name); #mengambil nama file termasuk extensinya
//		$fileName = $fileInfo['filename']; #menagmbil nama file tanpa extensi
//		$newFileName = "$fileName-$id_transaksi.png"; #merubah extensi file tanpa merubah nama file
//
//		$fileTo = '../../assets/img/recipt_transaksi/'; #directory tujuan
//		$allowExtensions = array('jpg', 'png', 'jpeg'); #memilih file extensi
//		$extension = $fileInfo['extension']; #ambil extensi
//
//		if (in_array($extension, $allowExtensions) == true) {
//			#validasi file size
//			if ($size < 1500000) {
//				move_uploaded_file($fileTemp, __DIR__.$fileTo.$newFileName);
//
//				#Hapus transaksi paymnet jika sudah ada
//				$data = payment_exist($id_transaksi);
//				$row = mysqli_num_rows($data);
//				var_dump($row);
//				if ($row > 0){
//					$sql_delete_pay = "DELETE FROM transaksi_payment WHERE id_transaksi = '$id_transaksi'";
//					mysqli_query($konek, $sql_delete_pay);
//				}
//
//				$sql_paymnet = "INSERT INTO transaksi_payment (id_transaksi, total, ongkir, grand_total, bayar)
//                        VALUE ('$id_transaksi', '$subtotal', '$ongkir', '$grand_total', '$bayar')";
//				$sql_transaksi = "UPDATE transaksi SET status = '$status', reference = '$reference', img_trans = '$newFileName' WHERE id_transaksi = '$id_transaksi'";
//				$sql = $sql_transaksi.";".$sql_paymnet;
//				$result = mysqli_multi_query($konek, $sql);
//				if(!$result){
//					$eror = mysqli_error($konek);
//					$_SESSION['alert'] = warningAlert("Warning! ","Data pembayaran gagal disimpan. ($eror)");
//				} else {
//					$_SESSION['alert'] = successAlert("Success! ","Data pembayaran berhasil Disimpan");
//				}
//				mysqli_close($konek);
//			}else{
//				#file lebih dari 15mb
//				$_SESSION['alert'] = infoAlert("Info! ","File Lebih dari 15Mb");
//			}
//		}else{
//			#file tidak jpg/png
//			$_SESSION['alert'] = infoAlert("Info! ","File Harus Berupa jpg / png");
//		}
	}

?>
