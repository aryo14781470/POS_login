<?php

    function viewKategori($kode = NULL){
        $konek = conn();
        if($kode != NULL){
            $cari = "WHERE id_kategori = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM kategori $cari ORDER BY id_kategori ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function viewBahan($kode = NULL){
        $konek = conn();
        if($kode != NULL){
            $cari = "WHERE id_bahan = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM bahan $cari ORDER BY id_bahan ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function viewUkuran($kode = NULL){
        $konek = conn();
        if($kode != NULL){
            $cari = "WHERE id_ukuran = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM ukuran $cari ORDER BY id_ukuran ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function viewSheet($kode = NULL){
        $konek = conn();
        if($kode != NULL){
            $cari = "WHERE id_sheet = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM sheet $cari ORDER BY id_sheet ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }

    function viewDesain($kode = NULL){
        $konek = conn();
        if($kode != NULL){
            $cari = "WHERE id_gambar = '$kode'";
        }else{
            $cari = "";
        }
        $sql = "SELECT * FROM gambar $cari ORDER BY id_gambar ASC";
        $result = mysqli_query($konek, $sql);
        if (!$result) {
            echo mysqli_error($konek);
        }else{ return $result; }
    }


?>