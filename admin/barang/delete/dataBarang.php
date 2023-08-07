<?php

    function viewBarang($kode = NULL){
        $konek = conn();
        if ($kode != NULL) {
            $cari = "WHERE id_barang = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM items $cari ORDER BY id_barang ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function countBarang(){
        $konek = conn();
        $sql = "SELECT COUNT(*) AS jumlah FROM barang";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

	function tambah_barang_masuk(){
		$konek = conn();
		$id_barang = $_POST['id_barang'];
		$jumlah = $_POST['jumlah'];
		$dibuat_oleh = $_POST['dibuatOleh'];
		var_dump($id_barang,$jumlah,$dibuat_oleh);
		// Query INSERT dan UPDATE
		$query = "INSERT INTO items_in (id_barang, jumlah_brg, dibuat_tanggal, dibuat_oleh) VALUES ('$id_barang', '$jumlah', NOW(), '$dibuat_oleh')";
		$query .= "UPDATE items SET jumlah_brg = jumlah_brg + '$jumlah' WHERE id_barang = '$id_barang'";

		// Menjalankan multi query
		if (mysqli_multi_query($konek, $query)) {
			echo "Transaksi berhasil.";
		} else {
			echo "Terjadi kesalahan: " . mysqli_error($konek);
		}

//		$konek->begin_transaction();
//
//		try {
//			// Query INSERT
//			$queryInsert = "INSERT INTO items_in (id_barang, jumlah_brg, dibuat_tanggal, dibuat_oleh) VALUES ('$id_barang', '$jumlah', NOW(), '$dibuat_oleh')";
//			$konek->query($queryInsert);
//
//			// Query UPDATE
//			$queryUpdate = "UPDATE items SET jumlah_brg = jumlah_brg + '$jumlah' WHERE id_barang = '$id_barang'";
//			$konek->query($queryUpdate);
//
//			// Commit transaksi
//			$konek->commit();
//
//			$_SESSION['alert'] = successAlert("Success! ","Data Berhasil Disimpan");
//		} catch (Exception $e) {
//			// Rollback transaksi jika terjadi kesalahan
//			$konek->rollback();
//			$eror = $e->getMessage();
//			$_SESSION['alert'] = warningAlert("Warning! ","Data Gagal Disimpan. ($eror)");
//		}
//
//		$konek->close();
	}

    function tambahBarang(){
    
        $konek = conn();
        $idBarang = $_POST['idBarang'];
		$idSupplier = $_POST['supplier'];
		var_dump($idSupplier);
        $namaBarang = $_POST['namaBarang'];
        $hargaBarang = $_POST['hargaBarang'];
        $kategoriBarang = $_POST['kategoriBarang'];
        $bahanBarang = $_POST['bahanBarang'];
        $ukuranBarang = $_POST['ukuranBarang'];
        $sheetBarang = $_POST['sheetBarang'];
        $sql_gambar = viewDesain($_POST['imageBarang']);
        $data_image = mysqli_fetch_array($sql_gambar);
        $imageBarang = $data_image['gambar'];
        $dibuatOleh = $_POST['dibuatOleh'];
        
        $sql = "INSERT INTO items (id_barang, id_supplier, nama_brg, harga_brg, id_kategori, id_bahan, id_ukuran, id_sheet, gambar_brg, di_buat_oleh, create_brg, update_brg) 
                    VALUE ('$idBarang', '$idSupplier', '$namaBarang', '$hargaBarang', '$kategoriBarang', '$bahanBarang', '$ukuranBarang', '$sheetBarang', '$imageBarang', '$dibuatOleh', NOW(), NOW())";
        $result = mysqli_query($konek, $sql);
        if(!$result){ 
            $error = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Gagal Disimpan. ($error)");
        } else {
            $_SESSION['alert'] = successAlert("Success! ","Data Berhasil Disimpan");
        }
        
        # Gambar
        /*$name = $_FILES['image']['name']; #ambil nama file gambar
        $size = $_FILES['image']['size']; #ambil ukuran filenya
        $fileTemp = $_FILES['image']['tmp_name']; #ambil lokasi/directory file
        $fileTo = '../../assets/img/'; #directory tujuan
        $allowExtensions = array('jpg', 'png', 'jpeg');
        $dot = explode('.', $name);
        $extensi = strtolower(end($dot)); #ambil extensi
        #$image = md5(uniqid($name, true) . time()) . '.' . $extensi;   #penamaan file dengan enkripsi dengan extensi

        if (in_array($extensi, $allowExtensions) == true) {
            #validasi file size
            if ($size < 1500000) {
                move_uploaded_file($fileTemp, __DIR__.$fileTo.$name);
                $sql = "INSERT INTO barang (id_barang, nama_brg, harga_brg, kategori_brg, bahan_brg, ukuran_brg, deskripsi_brg, gambar_brg, di_buat_oleh, create_brg, update_brg) 
                        VALUE ('$idBarang', '$namaBarang', '$hargaBarang', '$kategoriBarang', '$bahanBarang', '$ukuranBarang', '$deskripsiBarang', '$name', '$dibuatOleh', NOW(), NOW())";
                $result = mysqli_query($konek, $sql);
                #var_dump($konek);
                if(!$result){ 
                    $eror = mysqli_error($konek);
                    $_SESSION['alert'] = warningAlert("Warning! ","Data Gagal Disimpan. ($eror)");
                } else {
                    $_SESSION['alert'] = successAlert("Success! ","Data Berhasil Disimpan");
                }
            }else{
                #file lebih dari 15mb
                $_SESSION['alert'] = infoAlert("Info! ","File Lebih dari 15Mb");
            }
        }else{
            #file tidak jpg/png
            $_SESSION['alert'] = infoAlert("Info! ","File Harus Berupa jpg, jpeg / png");
        }
        */
    }

    function deleteBarang(){
        $konek = conn();
        $idBarang = $_POST['idBarang'];
        $sql = "DELETE FROM items WHERE id_barang = '$idBarang'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Berhasil Di Hapus");
        }
    }

    function updateBarang(){
        $konek = conn();
        $idBarang = $_POST['idBarang'];
        $namaBarang = $_POST['namaBarang'];
        $hargaBarang = $_POST['hargaBarang'];
        $kategoriBarang = $_POST['kategoriBarang'];
        $bahanBarang = $_POST['bahanBarang'];
        $ukuranBarang = $_POST['ukuranBarang'];
		$sheetBarang = $_POST['sheetBarang'];
        $dibuatOleh = $_POST['dibuatOleh'];
        
        $sql = ("UPDATE items SET nama_brg = '$namaBarang', harga_brg = '$hargaBarang', id_kategori = '$kategoriBarang',
                id_bahan = '$bahanBarang', id_ukuran = '$ukuranBarang', id_sheet = '$sheetBarang', 
                di_buat_oleh = '$dibuatOleh', update_brg = NOW() WHERE id_barang = '$idBarang'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            die('Data gagal Di Update'.mysqli_error($konek));
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Berhasil Di Update");
        }
    }

    function harga($id_barang){
        $konek = conn();
        $sql = "SELECT harga_brg FROM items WHERE id_barang = '$id_barang'";
        $result = mysqli_query($konek, $sql);
        $row = mysqli_fetch_array($result);
        return $row['harga_brg'];
    }
?>
