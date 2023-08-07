<?php 
    include('conn.php');
    include('alert.php');
    session_start();
    function checkInput($data){
        $data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = checkInput($_POST['username']);
        //untuk cek tidak boleh ada space dan spesial karakter
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $_SESSION['msg'] = warningAlert("Warning! ", "Username should not contain space and special characters!");
			header('location: auth.php');
        } else {
            
            $fusername = $username;
            $password = checkInput($_POST["password"]);
            $fpassword = md5($password);
            
            $conn = conn();
            $sql = "SELECT * FROM user WHERE username='$fusername' AND password='$fpassword'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 0) {
                $_SESSION['msg'] = dangerAlert("Danger! ","Login Failed, Invalid input");
                header('Location: auth.php');
            } else {

                $row = mysqli_fetch_array($result);
                if ($row['acces'] == 1) {
                    $_SESSION['id'] = $row['id_user'];
                    echo'<script> 
                            alert ("selamat datang '.$row['username'].'");
                            window.location.href="admin/";
                        </script>';
                }

            }

        }
    }
?>