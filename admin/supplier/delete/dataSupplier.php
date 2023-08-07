<?php

    function viewSupplier($kode = NULL){
        $konek = conn();
        if ($kode != NULL) {
            $cari = "WHERE id_supplier = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM supplier $cari ORDER BY id_supplier ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function tambahSupplier(){
        $konek = conn();
        $idSupplier = $_POST['idSupplier'];
        $namaSupplier = $_POST['namaSupplier'];
        $alamatSupplier = $_POST['alamatSupplier'];
        $emailSupplier = $_POST['emailSupplier'];
        $kontakSupplier = $_POST['kontakSupplier'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = "INSERT INTO supplier(id_supplier, nama_supplier, alamat_supplier, email_supplier, contact_supplier, dibuat_oleh, dibuat_tanggal, diupdate_tanggal)
                VALUE ('$idSupplier', '$namaSupplier', '$alamatSupplier', '$emailSupplier', '$kontakSupplier', '$dibuatOleh', NOW(), NOW())";
        $result = mysqli_query($konek, $sql);
        if(!$result){ 
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Supplier Gagal Disimpan. ($eror)");
        } else {
            $_SESSION['alert'] = successAlert("Success! ","Data Supplier Berhasil Disimpan");
        }
    }

    function updateSupplier(){
        $konek = conn();
        $idSupplier = $_POST['idSupplier'];
        $namaSupplier = $_POST['namaSupplier'];
        $alamatSupplier = $_POST['alamatSupplier'];
        $emailSupplier = $_POST['emailSupplier'];
        $kontakSupplier = $_POST['kontakSupplier'];
        $dibuatOleh = $_POST['dibuatOleh'];
        
        $sql = ("UPDATE supplier SET nama_supplier = '$namaSupplier', alamat_supplier = '$alamatSupplier', email_supplier = '$emailSupplier',
                contact_supplier = '$kontakSupplier', diupdate_tanggal = NOW() WHERE id_supplier = '$idSupplier'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            die('Data gagal Di Update'.mysqli_error($konek));
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Supplier Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Supplier Berhasil Di Update");
        }
    }

    function deleteSupplier(){
        $konek = conn();
        $idSupplier = $_POST['idSupplier'];
        $sql = "DELETE FROM supplier WHERE id_supplier = '$idSupplier'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Supplier Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Supplier Berhasil Di Hapus");
        }
    }

?>