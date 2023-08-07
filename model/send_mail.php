<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	function send_email($email, $subject, $body, $attach = NULL){
		$mail = new PHPMailer(true);

	//	$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output untuk melihat log
		$mail->isSMTP();  //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';	//Set the SMTP server to send through
		$mail->SMTPAuth   = true;    //Enable SMTP authentication
		$mail->Username   = 'mailerphp000@gmail.com';    //SMTP username
		$mail->Password   = 'gxdueaaiqtqlyvzo';    //SMTP password
	//	$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->Port = 587;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		$mail->mailer = "smtp";

		//Recipients
		$mail->setFrom('mailerphp000@gmail.com', 'CV. Aryo');
		$mail->addAddress($email);     //Add a recipient

		//Content
		$mail->isHTML(true);     //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body = "<h4><strong>$body</strong></h4>";
		if ($attach != null){
			$attachmentPath = "../admin/assets/img/invoice_pdf/$attach";
			$mail->addAttachment($attachmentPath);
		}

		// Kirim email
		if ($mail->send()) {
			$_SESSION['alert'] = successAlert("Success! ", "Email berhasil terkirim!");
		} else {
			$pesan = $mail->ErrorInfo;
			$_SESSION['alert'] = dangerAlert("Danger! ", "Email gagal terkirim. Pesan kesalahan: $pesan");
	//		echo 'Email gagal terkirim. Pesan kesalahan: ' . $mail->ErrorInfo;
		}
	}

