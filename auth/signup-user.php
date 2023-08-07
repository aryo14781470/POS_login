<?php require_once "../model/include.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
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
                                        <h3 class="text-center font-weight-light my-4">Registration</h3><hr>
                                        <p class="text-center">It's quick and easy.</p>
                                    </div>
                                    <div class="text-center">
                                    <?php
                                        if(isset($_SESSION['alert'])){
                                            echo $_SESSION['alert'];
                                            unset($_SESSION['alert']);
                                        }
                                    ?>
                                    </div>
                                    <div class="card-body text-center">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                                            <div class="card-body">
                                                <form action="signup-user.php" method="POST">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputUsername" name="username" type="text" placeholder="Username" value="<?php echo $name ?>" />
                                                        <label class="form-label" for="inputUsername">Username</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputEmail" name="email" type="email" placeholder="Email" value="<?php echo $email ?>" />
                                                        <label class="form-label" for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                        <label class="form-label" for="password">Password</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" />
                                                        <label class="form-label" for="cpassword">Confirm Password</label>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                        <div class="d-grid">
															<input type="hidden" name="postOperator" value="signup">
                                                            <input class="form-control button btn-primary" type="submit" name="signup" value="Signup">
                                                        </div>
                                                        <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
