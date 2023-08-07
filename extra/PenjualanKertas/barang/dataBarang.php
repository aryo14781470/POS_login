<?php

    #require "../../conn.php";
    require_once('../conn.php');

    function viewBarang($kode = NULL){
        $konek = conn();
        if ($kode != NULL) {
            $cari = "WHERE id_barang = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM barang $cari ORDER BY id_barang ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function tambahBarang(){
    
        $konek = conn();
        $idBarang = $_POST['idBarang'];
        $namaBarang = $_POST['namaBarang'];
        $hargaBarang = $_POST['hargaBarang'];
        $kategoriBarang = $_POST['kategoriBarang'];
        $bahanBarang = $_POST['bahanBarang'];
        $ukuranBarang = $_POST['ukuranBarang'];
        $deskripsiBarang = $_POST['deskripsiBarang'];
        $dibuatOleh = $_POST['dibuatOleh'];
        
        # Gambar
        $name = $_FILES['image']['name']; #ambil nama file gambar
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
        
    }

    function deleteBarang(){
        $konek = conn();
        $idBarang = $_POST['idBarang'];
        $sql = "DELETE FROM barang WHERE id_barang = '$idBarang'";
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
        $deskripsiBarang = $_POST['deskripsiBarang'];
        $dibuatOleh = $_POST['dibuatOleh'];
        
        $sql = ("UPDATE barang SET nama_brg = '$namaBarang', harga_brg = '$hargaBarang', kategori_brg = '$kategoriBarang',
                bahan_brg = '$bahanBarang', ukuran_brg = '$ukuranBarang', deskripsi_brg = '$deskripsiBarang', di_buat_oleh = '$dibuatOleh', 
                update_brg = NOW() WHERE id_barang = '$idBarang'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            die('Data gagal Di Update'.mysqli_error($konek));
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Berhasil Di Update");
        }
    }
?>