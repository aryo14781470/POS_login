<?php require_once "model/include.php";?>
<?php
    $email = $_SESSION['email'];
    if($email == false){
        header('Location: login-user.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
<!--    --><?php //include("cdn.php")?>
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"-->
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card mb-3 shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">New Password</h3></div>
                                <div class="text-center">
                                <?php 
                                    if(isset($_SESSION['alert'])){
                                        echo $_SESSION['alert'];
                                        unset($_SESSION['alert']);
                                    }
                                ?>
                                </div>
                                <div class="card-body">
                                    <form action="new-password.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create new password" />
                                            <label class="form-label" for="inputPassword">Create new password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="cinputPassword" name="cpassword" type="password" placeholder="Confirm Password" />
                                            <label class="form-label" for="cinputPassword">Confirm Password</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <input class="form-control button btn-primary" type="submit" name="change-password" value="Change">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
