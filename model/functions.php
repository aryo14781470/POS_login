<?php 
    function conn(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "cv_terlaksanajaya";
        $result = mysqli_connect($host,$user,$pass,$db);
        if (!$result) {
            die("Connction Failed: ". $result->connect_error);
        }else{
            return $result;
        }

    }
    
    function tanggal($tgl){
        return date('Y-m-d H:i:s', strtotime($tgl));
    }

	function rupiah($angka){
		$rupiah = "Rp, " . number_format($angka,0,',','.');
		return $rupiah;
	}

    function set_id($kunci = null){
		$konek = conn();
		$tanggal = date('Ymd');

		if ($kunci == 'BRG'){
			$sql = "SELECT max(id_barang) AS kode FROM items";
			$result = mysqli_query($konek, $sql);
			$data = mysqli_fetch_assoc($result);
			$kode_barang = $data['kode'];
			$urutan = (int) substr($kode_barang, 3, 3);
			$urutan++;
			$kode = $kunci.sprintf("%03s", $urutan);

		}elseif ($kunci == 'CST') {
			$sql = "SELECT max(id_customer) AS kode FROM customer";
			$result = mysqli_query($konek, $sql);
			$data = mysqli_fetch_assoc($result);
			$kode_barang = $data['kode'];
			$urutan = (int) substr($kode_barang, 3, 3);
			$urutan++;
			$kode = $kunci.sprintf("%03s", $urutan);

		}elseif ($kunci == 'SPL') {
			$sql = "SELECT max(id_supplier) AS kode FROM supplier";
			$result = mysqli_query($konek, $sql);
			$data = mysqli_fetch_assoc($result);
			$kode_barang = $data['kode'];
			$urutan = (int) substr($kode_barang, 3, 3);
			$urutan++;
			$kode = $kunci.sprintf("%03s", $urutan);

		}else{
//			Opsi 1
//			$sql_cart = "SELECT MAX(id_cart) as kode_cart FROM cart_order WHERE id_cart LIKE '%$tanggal%'";
//			$result_cart = mysqli_query($konek, $sql_cart);
//			$row_cart = mysqli_fetch_assoc($result_cart);
//			$row_max_cart = $row_cart['kode_cart'];
//
//			$sql_tran = "SELECT MAX(id_transaksi) as kode_tran FROM transaksi WHERE id_transaksi LIKE '%$tanggal%'";
//			$result_tran = mysqli_query($konek, $sql_tran);
//			$row_tran = mysqli_fetch_assoc($result_tran);
//			$row_max_tran = $row_tran['kode_tran'];
//			if ($row_max_cart != null || $row_max_tran != null) {
//				$max = max($row_max_cart, $row_max_tran);
//				$nomer_urut = intval($max) + 1;
//				$kode = sprintf("%04s", $nomer_urut);
//			}else {
//				$nomer_urut = 1;
//				$kd = sprintf("%04s", $nomer_urut);
//				$kode = $tanggal.$kd;
//			}

//			Opsi 2
			$sql = "SELECT MAX(max_val) AS max_val FROM 
                    (SELECT MAX(id_cart) AS max_val FROM cart_order WHERE id_cart LIKE '%$tanggal%' UNION
					SELECT MAX(id_transaksi) AS max_val FROM transaksi WHERE id_transaksi LIKE '%$tanggal%') AS subquery";
			$result = mysqli_query($konek, $sql);
			$row = mysqli_fetch_assoc($result);
			$row_max = $row['max_val'];

			if ($row_max != null){
				$nomer_urut = intval($row_max) + 1;
				$kode = sprintf("%04s", $nomer_urut);
			}else {
				$nomer_urut = 1;
				$kd = sprintf("%04s", $nomer_urut);
				$kode = $tanggal.$kd;
			}
		}

		return $kode;
    }

	function fetch_array_id($kode, $function){
		if ($function == "barang"){
			$array = viewBarang($kode);
		}
		if ($function == "customer"){
			$array = viewCustomer($kode);
		}
		if ($function == "cart"){
			$array = view_detail_cart($kode);
		}
		if ($function == "status"){
			$array = view_status($kode);
		}

		while ($row = mysqli_fetch_assoc($array)){
			$data[] = $row;
		}

		return $data;
	}

	function total_harga($id_transaksi, $kunci){
		$konek = conn();

		if ($kunci == "detail"){
			$sql = "SELECT SUM(detail_qty * detail_harga) AS total FROM transaksi_detail WHERE id_transaksi = '$id_transaksi'";
		}
		if ($kunci == "payment"){
			$sql = "SELECT COALESCE(SUM(bayar), 0) AS total FROM transaksi_payment WHERE id_transaksi = '$id_transaksi'";
		}
		$result = mysqli_query($konek, $sql);
		if (!$konek){
			mysqli_error($konek);
		}else { return $result; }
	}

	function move_file($files, $move = null, $id_transaksi = null){
		$konek = conn();
		$name = $files['name']; #ambil nama file gambar
		$size = $files['size']; #ambil ukuran filenya
		$fileTemp = $files['tmp_name']; #ambil lokasi/directory file

		$fileInfo = pathinfo($name); #mengambil nama file termasuk extensinya
		$fileName = $fileInfo['filename']; #menagmbil nama file tanpa extensi
		if ($id_transaksi != null){
			$data = payment_exist($id_transaksi);
			$exist = mysqli_num_rows($data);
			if ($exist > 0){
				$sql_max = "SELECT MAX(pembayaran) as max_kode FROM transaksi_payment WHERE id_transaksi = $id_transaksi";
				$result_max = mysqli_query($konek, $sql_max);
				$row_max = mysqli_fetch_assoc($result_max);
				$max = $row_max['max_kode'] + 1;
				$nama_baru = substr_replace($id_transaksi, "-".$max, 13, 0);
				$newFileName = "$nama_baru.png"; #merubah extensi file tanpa merubah nama file
			}else{
				$nama_baru = substr_replace($id_transaksi, "-1", 13, 0);
				$newFileName = "$nama_baru.png"; #merubah extensi file tanpa merubah nama file
			}
		}else{
//			$file = md5(rand());
			$panjangString = 40;
			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$charactersLength = strlen($characters);
			$file = '';
			for ($i = 0; $i < $panjangString; $i++) {
				$index = mt_rand(0, $charactersLength - 2);
				$file .= $characters[$index];
			}
			$newFileName = "$file.png"; #merubah extensi file tanpa merubah nama file
		}

		if ($move == "desain"){
			$fileTo = '/../admin/assets/img/desain/'; #directory tujuan
		}else{
			$fileTo = '/../admin/assets/img/recipt_transaksi/'; #directory tujuan
		}
//		$fileTo = '../assets/img/'.$move.'/'; #directory tujuan
		$allowExtensions = array('jpg', 'png'); #memilih file extensi
		$extension = $fileInfo['extension']; #ambil extensi
		$max_size = 2 * 1024 * 1024;

		if (in_array($extension, $allowExtensions) == true) {
			#validasi file size
			if ($size > $max_size || $size == 0) {
				#file lebih dari 15mb
				$session = infoAlert("Info! ","File Lebih dari 2Mb");
			}else{
				move_uploaded_file($fileTemp, __DIR__.$fileTo.$newFileName);
				$session = $newFileName;
			}
		}else {
			#file tidak jpg/png
			$session = infoAlert("Info! ", "File Harus Berupa jpg/png");
		}
		return $session;
	}

	function reload(){
		$currentURL = $_SERVER['PHP_SELF'];
// 		Menggabungkan data dari $_GET ke URL saat ini
		if (!empty($_GET)) {
			$currentURL .= '?' . http_build_query($_GET);
		}
// 		Melakukan redirect ke halaman yang sama dengan data dari $_GET
		header("Location: " . $currentURL);
		exit();
	}

	function cekHapusTombol(){
		$konek = conn();
		// Mengambil data dari tabel transaksi
		$sql = "SELECT DISTINCT id_barang FROM transaksi_detail";
		$result = mysqli_query($konek, $sql);

		// Membuat array untuk menyimpan id_barang yang ada di tabel transaksi
		$id_barang_transaksi = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$id_barang_transaksi[] = $row['id_barang'];
		}

		return $id_barang_transaksi;
	}

?>
