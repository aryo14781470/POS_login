<?php
    session_start();
    if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
        header('Location: auth.php');
        exit;
    }
    $sesiId = $_SESSION['id'];
    $conn = conn();
    $sql = "SELECT * FROM user WHERE id_user ='$sesiId'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    $username = $row['username'];
    $level = $row['level'];
    $acces = $row['acces'];

?>