<?php
require_once("../model/include.php");

$unik = false;
while (!$unik){
	$id_set = set_id_users();
	$cek_id = view_user($id_set);
	$count = mysqli_num_rows($cek_id);
	if ($count == NULL) {
		$id = set_id_users();
		$unik = true;
	}
}
echo "IDnya adalah = ".$id;

