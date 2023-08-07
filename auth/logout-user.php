<?php

    session_start();
    $_SESSION[''];
    session_unset();
    session_destroy();
	$root = $_SERVER['DOCUMENT_ROOT'];
    header("Location: ../home/");
    exit();

?>
