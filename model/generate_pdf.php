<?php

	function generate_invoice_PDF(){
		$konek = conn();
//		Tangkap Post
		$nomer = $_POST['nomer'];
		$id_customer = $_POST['id_customer'];
		$nama_customer = $_POST['nama_customer'];
//		$email = $_POST['email'];

		#ambil pembayaran terakhir dengan end() jika teratas maka dengan array_pop() dan tidak perlu di loop
		$data = array();
		$row = mysqli_fetch_all(view_transaksi_paymnet($nomer), MYSQLI_ASSOC);
		foreach ($row as $rows){
			$data[] = $rows;
		}
		$latest = end($data);
		$pembayaran = $latest['pembayaran'];

		// Buat objek TCPDF
	//	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, '', '', array(0, 0, 0), array(255, 255, 255));
		$pdf->SetMargins(20, 10, 20, true);
		$pdf->SetFont('helvetica', '', 11);

		// Tambahkan halaman baru
		$pdf->AddPage();

		//buat nama pdf dan lokasi pdf
		$filename = "INV_$nomer-$pembayaran-$id_customer";
		$filePath = '../admin/assets/img/invoice_pdf/';

		// Konten HTML untuk invoice
		$html = invoice($nomer, $id_customer, $filename);

		// Tampilkan konten HTML pada PDF
		$pdf->writeHTML($html, true, false, true, false, '');

		// save PDF
		$pdf_content = $pdf->Output($filename.'.pdf', 'S');
		$output_file = $filePath.$filename.'.pdf';
		$sql = "UPDATE transaksi SET pdf_file = '$filename.pdf' WHERE id_transaksi = '$nomer'";
		mysqli_query($konek, $sql);
		if (file_put_contents($output_file, $pdf_content)){
			$email = 'aryoyusuf313@gmail.com';
			$subject = 'Invoice CV XYZ';
			$body = "Purchase Order $nama_customer dengan CV.XYZ";
			$attach = $filename.'.pdf';
			send_email($email, $subject, $body, $attach);
		}

//		file_put_contents($output_file, $pdf_content);
	}

	function print_invoice(){
		$file_pdf = $_POST['pdf_file'];
		$filePath = '../admin/assets/img/invoice_pdf/'.$file_pdf; // Ganti dengan path ke file PDF yang ingin diunduh

		if (file_exists($filePath)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . basename($filePath));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($filePath));
			ob_clean();
			flush();
			readfile($filePath);
			exit;
		} else {
			// File tidak ditemukan
			$_SESSION = dangerAlert("Danger! ", "File tidak ditemukan.");
		}
	}

