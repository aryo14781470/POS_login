<?php

	$email = "";
	$name = "";
	$con = conn();

	function set_id_users(){
		$panjang_pass = 10;
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$charactersLength = strlen($characters);
		$file = '';
		for ($i = 0; $i < $panjang_pass; $i++) {
			$index = mt_rand(0, $charactersLength - 2);
			$file .= $characters[$index];
		}
		$id_user = $file;
		return $id_user;
	}

	function view_user($id_user = NULL){
		global $con;

		if ($id_user != NULL) {
			$cari = "WHERE id_user = '$id_user'";
		}else{
			$cari = "";
		}
		$sql = "SELECT * FROM users $cari ORDER BY id_user ASC";
		$result = mysqli_query($con, $sql);
		if (!$result) {
			echo mysqli_error($con);
		}else{ return $result; }
	}

	function view_level_users(){
		global $con;
		$sql = "SELECT * FROM level ORDER BY acces_level ASC";
		$result = mysqli_query($con, $sql);
		$result = mysqli_query($con, $sql);
		if (!$result) {
			echo mysqli_error($con);
		}else{ return $result; }
	}

	function delete_user(){
		global $con;
		$id_user = $_POST['id_user'];
		$sql = "DELETE FROM users WHERE id_user = '$id_user'";
		$result = mysqli_query($con, $sql);
		if(!$result){
			$eror = mysqli_error($con);
			$_SESSION['alert'] = warningAlert("Warning! ","User gagal dihapus. ($eror)");
		}else{
			$_SESSION['alert'] = successAlert("Success! ","User berhasil dihapus");
		}
		reload();
	}

	function update_user(){
		global $con;
		$id_user = $_POST['id_user'];
		$level = $_POST['level'];
		$status = $_POST['status'];
		$fail = $_POST['fail'];
		$sql = ("UPDATE users SET acces = '$level', status = '$status', fail = '$fail', diupdate_tgl = NOW() WHERE id_user = '$id_user'");
		$result = mysqli_query($con, $sql);
		if(!$result){
			$eror = mysqli_error($con);
			$_SESSION['alert'] = warningAlert("Warning! ","User gagal diperbarui. ($eror)");
		}else{
			$_SESSION['alert'] = successAlert("Success! ","User berhasil diperbarui");
		}
		reload();
	}

	function login(){
		global $con;
		if (empty($_POST['email']) || empty($_POST['password'])){
			$_SESSION['alert'] = warningAlert("Warning! ", "Email / Password tidak boleh kosong!");
			return false;
		}
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$check_email = "SELECT * FROM users WHERE email = '$email'";
		$result = mysqli_query($con, $check_email);
		#Cek Email jika sudah terdaftar
		if (mysqli_num_rows($result) == 0) {
			$_SESSION['alert'] = warningAlert("Warning! ", "Your email ($email) is not registered");
			return false;
		}
		if (mysqli_num_rows($result) > 0) {
			#Cek Password
			$row = mysqli_fetch_array($result);
			if (password_verify($password, $row['password'])) {
				#Cek Status
				if ($row['status'] == 'verified') {
					#Cek Ban
					if ($row['fail'] > 2) {
						$_SESSION['alert'] = dangerAlert("Danger!", "Your account is being banned, please contact admin");

					}else{
						$sql = "UPDATE users SET fail = 0 WHERE email = '$email'";
						$result = mysqli_query($con, $sql);
						$_SESSION['email'] = $email;
						$acces = $row['acces'];
						#Cek Hak Akses
						if ($acces == 1) {
							$_SESSION['email'] = $email;
							echo "<script type=text/javascript>
							alert('Selamat Datang $email');
								window.location = '../admin/'
						</script>";
						}elseif ($acces == 2) {
							$_SESSION['email'] = $email;
							echo "<script type=text/javascript>
							alert('Selamat Datang $email');
								window.location = '../supplier/'
						</script>";
						}else{
							$_SESSION['email'] = $email;
							echo "<script type=text/javascript>
							alert('Selamat Datang $email');
								window.location = '../customer/'
						</script>";
						}
					}
				}else{
					$_SESSION['email'] = $email;
					$_SESSION['alert'] = warningAlert("Warning! ", "It's look like you haven't still verify your email - $email");
					header('location: user-otp.php');
				}
			}else{
				$sql = "UPDATE users SET fail = fail + 1 WHERE email = '$email'";
				$result = mysqli_query($con, $sql);
				$sql2= "SELECT fail FROM users WHERE email = '$email'";
				$result2 = mysqli_query($con, $sql2);
				$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
				$fail = $row['fail'];
				#Cek Kesalahan Password
				if($fail > 2){
					$_SESSION['alert'] = dangerAlert("Danger! ", "Your email has been blocked, please contact the administrator");
				}else {
					$_SESSION['alert'] = warningAlert("Warning! ", "Wrong password, Tried $fail time");
				}
				return false;
			}
		}
	}

	function signup(){
		global $con;
		if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword'])){
			$_SESSION['alert'] = warningAlert("Warning! ", "Form tidak boleh kosong!");
			return false;
		}
		$name = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
		//Cek username tidak boleh ada space dan spesial karakter
		if (!preg_match("/^[a-zA-Z0-9_]*$/", $name)) {
			$_SESSION['alert'] = warningAlert("Warning! ", "Username should not contain special characters!");
			return false;
		}
		//Cek kesamaan Username
		$username_check = "SELECT username FROM users WHERE username = '$name'";
		$result_username = mysqli_query ($con, $username_check);
		if(mysqli_num_rows($result_username) > 0){
			$_SESSION['alert'] = infoAlert("Info! ", "Username is alredy exist!");
			return false;
		}
		#Cek Password
		if($password !== $cpassword){
			$_SESSION['alert'] = infoAlert("Info! ", "Confirm password not matched!");
			return false;
		}
		#Cek Email
		$email_check = "SELECT * FROM users WHERE email = '$email'";
		$res = mysqli_query($con, $email_check);
		if(mysqli_num_rows($res) > 0){
			$_SESSION['alert'] = infoAlert("Info! ", "Email is already exist!");
			return false;
		}
		#ID UNIQ
		$unik = false;
		while (!$unik){
			$id_set = set_id_users();
			$cek_id = view_user($id_set);
			$count = mysqli_num_rows($cek_id);
			if ($count == NULL) {
				$id_user = set_id_users();
				$unik = true;
			}
		}
		$encpass = password_hash($password, PASSWORD_BCRYPT);
		$code = rand(999999, 111111);
		$status = "not verified";
		$insert_data = "INSERT INTO users (id_user, username, email, password, code, status, dibuat_tgl, diupdate_tgl)
                        VALUE ('$id_user','$name', '$email', '$encpass', '$code', '$status', NOW(), NOW())";
		$result = mysqli_query($con, $insert_data);
		if($result){
			$subject = "Email Verification Code";
			$message = "Hai. $name ini adalah kode verifikasi kamu $code";
//            $sender = "From: mailerphp000@gmail.com";
			send_email($email, $subject, $message);
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			header('location: user-otp.php');
			exit();
		}else{
			$_SESSION['alert'] = dangerAlert("Danger! ", "Failed while inserting data into database!");
		}
	}

	function forgot_password(){
		global $con;
		if (empty($_POST['email'])){
			$_SESSION['alert'] = warningAlert("Warning! ", "Email tidak boleh kosong!");
			return false;
		}
		$email = mysqli_real_escape_string($con, $_POST['email']);
		var_dump($email);
		$check_email = "SELECT * FROM users WHERE email = '$email'";
		$run_sql = mysqli_query($con, $check_email);
		#Cek Email
		if(mysqli_num_rows($run_sql) > 0){
			$code = rand(999999, 111111);
			$insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
			$run_query =  mysqli_query($con, $insert_code);
			var_dump($run_query);
			if($run_query){
				$subject = "Password Reset Code";
				$message = "Your password reset code is $code";
				send_email($email, $subject, $message);
				$_SESSION['email'] = $email;
				header('location: reset-code.php');
				exit();
			}else{
				$_SESSION['alert'] = warningAlert("Warning! ", "Something went wrong!");
			}
		}else{
			$_SESSION['alert'] = dangerAlert("Danger! ", "This email address does not exist!");
		}
	}

	function check_otp(){
		global $con;
		if (empty($_POST['otp'])){
			$_SESSION['alert'] = warningAlert("Warning! ", "OTP code tidak boleh kosong!");
			return false;
		}
		$_SESSION['info'] = "";
		$otp_code = mysqli_real_escape_string($con, $_POST['otp']);
		$check_code = "SELECT * FROM users WHERE code = $otp_code";
		$code_res = mysqli_query($con, $check_code);
		if(mysqli_num_rows($code_res) > 0){
			$fetch_data = mysqli_fetch_assoc($code_res);
			$fetch_code = $fetch_data['code'];
			$email = $fetch_data['email'];
			$code = 0;
			$status = 'verified';
			$update_otp = "UPDATE users SET code = '$code', status = '$status', diupdate_tgl = NOW() WHERE code = $fetch_code";
			$update_res = mysqli_query($con, $update_otp);
			if($update_res){
				$_SESSION['alert'] = successAlert("Succes! ", "Your account has been created, please login");
				header('location: login-user.php');
				exit();
			}else{
				$_SESSION['alert'] = dangerAlert("Danger! ", "Failed while updating code!");
			}
		}else{
			$_SESSION['alert'] = dangerAlert("Danger! ", "You've entered incorrect code!");
		}
	}

	function reset_code_otp(){
		global $con;
		if (empty($_POST['otp'])){
			$_SESSION['alert'] = warningAlert("Warning! ", "OTP code tidak boleh kosong!");
			return false;
		}
		$otp_code = mysqli_real_escape_string($con, $_POST['otp']);
		$check_code = "SELECT * FROM users WHERE code = '$otp_code'";
		$code_res = mysqli_query($con, $check_code);
		var_dump($otp_code);
		if(mysqli_num_rows($code_res) > 0){
			$fetch_data = mysqli_fetch_assoc($code_res);
			$email = $fetch_data['email'];
			$_SESSION['email'] = $email;
			$_SESSION['alert'] = successAlert("Succes! ", "Please create a new password that you don't use on any other site.");
			header('location: new-password.php');
			exit();
		}else{
			$_SESSION['alert'] = dangerAlert("Danger! ", "You've entered incorrect code!");
		}
	}

	function change_password(){
		global $con;
		if (empty($_POST['password']) || empty($_POST['cpassword'])){
			$_SESSION['alert'] = warningAlert("Warning! ", "Password code tidak boleh kosong!");
			return false;
		}
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
		if($password !== $cpassword){
			$_SESSION['alert'] = warningAlert("Warning! ", "Confirm password not matched!");
		}else{
			$code = 0;
			$email = $_SESSION['email']; //getting this email using session
			$encpass = password_hash($password, PASSWORD_BCRYPT);
			$update_pass = "UPDATE users SET code = '$code', password = '$encpass', diupdate_tgl = NOW() WHERE email = '$email'";
			$run_query = mysqli_query($con, $update_pass);
			var_dump($email, $update_pass, $run_query);
			if($run_query){
				$_SESSION['alert'] = successAlert("Succes! ", "Your password changed. Now you can login with your new password.");
				header('Location: login-user.php');
				exit();
			}else{
				$_SESSION['alert'] = dangerAlert("Danger! ", "Failed to change your password!");
			}
		}
	}


