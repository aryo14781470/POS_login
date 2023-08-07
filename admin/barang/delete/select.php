<?php

    require_once("../../functions.php");
    $konek = conn();

    if (isset($_POST['kategori_id']) && !empty($_POST['kategori_id'])) {

        // Fetch state name base on country id
        $id = $_POST['kategori_id'];
        $query = "SELECT * FROM gambar WHERE id_kategori_gambar = '$id'";
        $result = mysqli_query($konek, $query);

        if(mysqli_num_rows($result) > 0){
            echo '<option value="">--PILIH--</option>'; 
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['id_gambar'].'">'.$row['nama_gambar'].'</option>'; 
            }
        }else {
            echo '<option value="">--PILIH--</option>';
        }
        
    } 

    if (isset($_POST['gambar_id']) && !empty($_POST['gambar_id'])) {

        // Fetch state name base on country id
        $id = $_POST['gambar_id'];
        $query = "SELECT gambar FROM gambar WHERE id_gambar = '$id'";
        $result = mysqli_query($konek, $query);
        
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<img src="assets/img/desain/'.$row['gambar'].'" class="rounded mx-auto d-block" width="200px" height="200px" alt="'.$row['gambar'].'">';
            }
        }else {
            echo '<p>Image not available</p>';
        }
        
    } 
    

?>
