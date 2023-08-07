<?php

    function updateKategori(){
        $konek = conn();
        $idKategori = $_POST['idKategori'];
        $namaKategori = $_POST['namaKategori'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = ("UPDATE kategori SET nama_kategori = '$namaKategori', dibuat_oleh = '$dibuatOleh' 
                 WHERE id_kategori = '$idKategori'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Kategori Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Kategori Berhasil Di Update");
        }
		reload();
    }

    function updateBahan(){
        $konek = conn();
        $idBahan = $_POST['idBahan'];
        $namaBahan = $_POST['namaBahan'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = ("UPDATE bahan SET nama_bahan = '$namaBahan', dibuat_oleh = '$dibuatOleh'
                 WHERE id_bahan = '$idBahan'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Bahan Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Bahan Berhasil Di Update");
        }
		reload();
    }

    function updateUkuran(){
        $konek = conn();
        $idUkuran = $_POST['idUkuran'];
        $namaUkuran = $_POST['namaUkuran'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = ("UPDATE ukuran SET nama_ukuran = '$namaUkuran', dibuat_oleh = '$dibuatOleh' 
                 WHERE id_ukuran = '$idUkuran'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Ukuran Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Ukuran Berhasil Di Update");
        }
		reload();
    }

    function updateSheet(){
        $konek = conn();
        $idSheet = $_POST['idSheet'];
        $lapisanSheet = $_POST['lapisanSheet'];
        $isiSheet = $_POST['isiSheet'];
        $dibuatOleh = $_POST['dibuatOleh'];

        $sql = ("UPDATE sheet SET lapisan_sheet = '$lapisanSheet', isi_sheet = '$isiSheet', dibuat_oleh = '$dibuatOleh' 
                 WHERE id_sheet = '$idSheet'");
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Sheet Gagal DiUpdate. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Sheet Berhasil Di Update");
        }
		reload();
    }

?>
