<?php
    include('conn.php');
    include('alert.php');

    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //if user signup button
    if(isset($_POST['signup'])){
        
        $con = conn();
        $username = checkInput($_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['Password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cPassword']);
        $array = array($username, $email, $password);
        
        //Cek username tidak boleh ada space dan spesial karakter
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $_SESSION['alert'] = warningAlert("Warning! ", "Username should not contain space and special characters!");
            #header('location: signup.php');
            #var_dump($username);
        }

        //Cek Email jika sudah terdaftar
        $username_check = "SELECT username FROM user WHERE username = '$username'";
	    $result_username = mysqli_query ($con, $username_check);
        if(mysqli_fetch_array($result_username)){
            #$errors['email'] = "Email that you have entered is already exist!";
            $_SESSION['alert'] = warningAlert("Warning! ", "Email is alredy exist!");
            #header('location: signup.php');
            #return false;
        }
        
        //Cek Email jika sudah terdaftar
        $email_check = "SELECT * FROM user WHERE email = '$email'";
        $result_email = mysqli_query($con, $email_check);
        if(mysqli_fetch_array($result_email)){
            #$errors['email'] = "Email that you have entered is already exist!";
            $_SESSION['alert'] = warningAlert("Warning! ", "Email is alredy exist!");
            #header('location: signup.php');
            #return false;
        }

        //Cek Password
        if($password !== $cpassword){
            #$errors['password'] = "Confirm password not matched!";
            $_SESSION['alert'] = warningAlert("Warning! ", "Confirm password not matched!");
            #header('location: signup.php');
            #return false;
        }

        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "not verified";
        $sql = "INSERT INTO user (username, email, password, code, status, login_fail, create_user)
                values('$username', '$email', '$encpass', '$code', '$status', '0', NOW())";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            $eror = mysqli_error($con);
            $_SESSION['alert'] = dangerAlert("Danger! ","Failed while inserting data into database!");
        }else{
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: mailerphp000@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                #$info = "We've sent a verification code to your email - $email";
                $_SESSION['alert'] = infoAlert("Info! ","We've sent a verification code to your email - $email");
                #$_SESSION['info'] = $info;
                #$_SESSION['email'] = $email;
                #$_SESSION['password'] = $password;
                header('location: verify_code.php');
                exit();
            }else{
                $_SESSION['alert'] = dangerAlert("Danger! ","Failed while sending code!");
                header('location: signup.php');
                return false;
                #$errors['otp-error'] = "Failed while sending code!";
            }
        }

    }

?>