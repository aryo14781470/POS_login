<?php
    function conn(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "cv_terlaksanajaya";
        return mysqli_connect($host,$user,$pass,$db);
    }

    #$conn = mysqli_connect("localhost", "root", "", "cv_terlaksanajaya");

?>