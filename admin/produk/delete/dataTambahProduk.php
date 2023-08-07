<?php

    function tambahKategori(){
        $konek = conn();
        $idKategori = $_POST['idKategori'];
        $namaKategori = $_POST['namaKategori'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = "INSERT INTO kategori (id_kategori, nama_kategori, dibuat_oleh, dibuat_tanggal)
                VALUE ('$idKategori', '$namaKategori', '$dibuatOleh', NOW())";
        $result = mysqli_query($konek, $sql);
        if(!$result){ 
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Kategori Gagal Disimpan. ($eror)");
        } else {
            $_SESSION['alert'] = successAlert("Success! ","Data Kategori Berhasil Disimpan");
        }
    }

    function tambahBahan(){
        $konek = conn();
        $idBahan = $_POST['idBahan'];
        $namaBahan = $_POST['namaBahan'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = "INSERT INTO bahan (id_bahan, nama_bahan, dibuat_oleh, dibuat_tanggal)
                VALUE ('$idBahan', '$namaBahan', '$dibuatOleh', NOW())";
        $result = mysqli_query($konek, $sql);
        if(!$result){ 
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Bahan Gagal Disimpan. ($eror)");
        } else {
            $_SESSION['alert'] = successAlert("Success! ","Data Bahan Berhasil Disimpan");
        }
    }

    function tambahUkuran(){
        $konek = conn();
        $idUkuran = $_POST['idUkuran'];
        $namaUkuran = $_POST['namaUkuran'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = "INSERT INTO ukuran (id_ukuran, nama_ukuran, dibuat_oleh, dibuat_tanggal)
                VALUE ('$idUkuran', '$namaUkuran', '$dibuatOleh', NOW())";
        $result = mysqli_query($konek, $sql);
        if(!$result){ 
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Ukuran Gagal Disimpan. ($eror)");
        } else {
            $_SESSION['alert'] = successAlert("Success! ","Data Ukuran Berhasil Disimpan");
        }
    }

    function tambahSheet(){
        $konek = conn();
        $isiSheet = $_POST['isiSheet'];
        $lapisanSheet = $_POST['lapisanSheet'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = "INSERT INTO sheet (lapisan_sheet, isi_sheet, dibuat_oleh, dibuat_tanggal)
                VALUE ('$lapisanSheet', '$isiSheet', '$dibuatOleh', NOW())";
        $result = mysqli_query($konek, $sql);
        if(!$result){ 
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Sheet Gagal Disimpan. ($eror)");
        } else {
            $_SESSION['alert'] = successAlert("Success! ","Data Sheet Berhasil Disimpan");
        }
    }

    function tambahGambar(){
        $konek = conn();
        $namaGambar = $_POST['namaGambar'];
        $kategoriGambar = $_POST['kategoriGambar'];
        $dibuatOleh = $_POST['dibuatOleh'];
		$files = $_FILES['image'];
		$name = move_file($files, "desain");
		if (strlen($name) > 50){
			$_SESSION['alert'] = $name;
			return false;
		}

		$sql = "INSERT INTO gambar (nama_gambar, gambar, id_kategori_gambar, dibuat_oleh, dibuat_tanggal)
                        VALUE ('$namaGambar', '$name', '$kategoriGambar', '$dibuatOleh', NOW())";
		$result = mysqli_query($konek, $sql);
		if(!$result){
			$eror = mysqli_error($konek);
			$_SESSION['alert'] = warningAlert("Warning! ","Data Gambar Gagal Disimpan. ($eror)");
		} else {
			$_SESSION['alert'] = successAlert("Success! ","Data Gambar berhasil Disimpan");
		}

//		$sql = "INSERT INTO gambar (nama_gambar, gambar, id_kategori_gambar, dibuat_oleh, dibuat_tanggal)
//                        VALUE ('$namaGambar', '$name', '$kategoriGambar', '$dibuatOleh', NOW())";
//		$result = mysqli_query($konek, $sql);
//		if(!$result){
//			$eror = mysqli_error($konek);
//			$_SESSION['alert'] = warningAlert("Warning! ","Data Gambar Gagal Disimpan. ($eror)");
//		} else {
//			$_SESSION['alert'] = successAlert("Success! ","Data Gambar berhasil Disimpan");
//		}

//        #proses Upload Gambar
//        $name = $files['name']; #ambil nama file gambar
//        $size = $files['size']; #ambil ukuran filenya
//        $fileTemp = $files['tmp_name']; #ambil lokasi/directory file
//
//        #Merubah Extensi File
//        $fileInfo = pathinfo($name); #mengambil nama file termasuk extensinya
//        $fileName = $fileInfo['filename']; #menagmbil nama file tanpa extensi
//        $newFileName = "$fileName.png"; #merubah extensi file tanpa merubah nama file
//
//        $fileTo = '/../assets/img/desain/'; #directory tujuan
//        $allowExtensions = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'); #memilih file extensi
//        $extension = $fileInfo['extension']; #ambil extensi
//		$max_size = 2 * 1024 * 1024;
//		var_dump($size);
//
//        if (in_array($extension, $allowExtensions) == true) {
//            #validasi file size
//            if ($size > $max_size || $size == 0) {
//				#file lebih dari 15mb
//				$_SESSION['alert'] = infoAlert("Info! ","File Lebih dari 2Mb");
//            }else{
//				move_uploaded_file($fileTemp, __DIR__.$fileTo.$newFileName);
//				$sql = "INSERT INTO gambar (nama_gambar, gambar, id_kategori_gambar, dibuat_oleh, dibuat_tanggal)
//                        VALUE ('$namaGambar', '$newFileName', '$kategoriGambar', '$dibuatOleh', NOW())";
//				$result = mysqli_query($konek, $sql);
//				if(!$result){
//					$eror = mysqli_error($konek);
//					$_SESSION['alert'] = warningAlert("Warning! ","Data Gambar Disimpan. ($eror)");
//				} else {
//					$_SESSION['alert'] = successAlert("Success! ","Data Gambar Disimpan");
//				}
//            }
//        }else{
//            #file tidak jpg/png
//            $_SESSION['alert'] = infoAlert("Info! ","File Harus Berupa jpg / png");
//        }

    }

?>
