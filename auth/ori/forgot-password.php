<?php require_once "model/include.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Forgot Password</h3><hr>
                                    <p class="text-center">Enter your email address</p>
                                </div>
                                <div class="text-center">
                                <?php
                                    if(isset($_SESSION['alert'])){
                                        echo $_SESSION['alert'];
                                        unset($_SESSION['alert']);
                                    }
                                ?>
                                </div>
                                <div class="card-body">
                                    <form action="forgot-password.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email" value="<?php echo $email ?>" placeholder="Email address"/>
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <input class="form-control button btn-primary" type="submit" name="forgot-pass" value="Submit">
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
