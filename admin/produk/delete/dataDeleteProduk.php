<?php

    function deleteKategori(){
        $konek = conn();
        $idKategori = $_POST['idKategori'];
        $sql = "DELETE FROM kategori WHERE id_kategori = '$idKategori'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Kategori Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Kategori Berhasil Di Hapus");
        }
    }

    function deleteBahan(){
        $konek = conn();
        $idBahan = $_POST['idBahan'];
        $sql = "DELETE FROM bahan WHERE id_bahan = '$idBahan'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Bahan Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Bahan Berhasil Di Hapus");
        }
    }

    function deleteUkuran(){
        $konek = conn();
        $idUkuran = $_POST['idUkuran'];
        $sql = "DELETE FROM ukuran WHERE id_ukuran = '$idUkuran'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Ukuran Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Ukuran Berhasil Di Hapus");
        }
    }

    function deleteSheet(){
        $konek = conn();
        $idSheet = $_POST['idSheet'];
        $sql = "DELETE FROM sheet WHERE id_sheet = '$idSheet'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Sheet Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Sheet Berhasil Di Hapus");
        }
    }

    function deleteGambar(){
        $konek = conn();
        $idGambar = $_POST['idGambar'];
        $sql = "DELETE FROM gambar WHERE id_gambar = '$idGambar'";
        $result = mysqli_query($konek, $sql);
        if(!$result){
            $eror = mysqli_error($konek);
            $_SESSION['alert'] = warningAlert("Warning! ","Data Gambar Gagal DiHapus. ($eror)");
        }else{
            $_SESSION['alert'] = successAlert("Success! ","Data Gambar Berhasil Di Hapus");
        }
    }

?>