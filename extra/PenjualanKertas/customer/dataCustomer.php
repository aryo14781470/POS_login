<?php

    function viewCustomer($kode = NULL){
        $konek = conn();
        if ($kode != NULL) {
            $cari = "WHERE id_customer = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM customer $cari ORDER BY id_customer ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function tambahCustomer(){
        $konek = conn();
        $idCustomer = $_POST['idCustomer'];
        $namaCustomer = $_POST['namaCustomer'];
        $alamatCustomer = $_POST['alamatCustomer'];
        $emailCustomer = $_POST['emailCustomer'];
        $kontakCustomer = $_POST['kontakCustomer'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = "INSERT INTO customer (id_customer, nama_customer, alamat_customer, email_customer, contact_customer, dibuat_oleh, dibuat_tanggal, diupdate_tanggal)
                VALUE ('$idCustomer', '$namaCustomer', '$alamatCustomer', '$emailCustomer', '$kontakCustomer', '$dibuatOleh', NOW(), NOW())";
        $result = mysqli_query($konek, $sql);
        if(!$result){ 
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Customer Gagal Disimpan. ($eror)");
        } else {
            $_SESSION['alert'] = successAlert("Success! ","Data Customer Berhasil Disimpan");
        }
    }

    function updateCustomer(){
        $konek = conn();
        $idCustomer = $_POST['idCustomer'];
        $namaCustomer = $_POST['namaCustomer'];
        $alamatCustomer = $_POST['alamatCustomer'];
        $emailCustomer = $_POST['emailCustomer'];
        $kontakCustomer = $_POST['kontakCustomer'];
        $dibuatOleh = $_POST['dibuatOleh'];
        
        $sql = ("UPDATE customer SET nama_customer = '$namaCustomer', alamat_customer = '$alamatCustomer', email_customer = '$emailCustomer',
                contact_customer = '$kontakCustomer', diupdate_tanggal = NOW() WHERE id_customer = '$idCustomer'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            die('Data gagal Di Update'.mysqli_error($konek));
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Customer Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Customer Berhasil Di Update");
        }
    }

    function deleteCustomer(){
        $konek = conn();
        $idCustomer = $_POST['idCustomer'];
        $sql = "DELETE FROM customer WHERE id_customer = '$idCustomer'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Customer Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Customer Berhasil Di Hapus");
        }
    }

?>