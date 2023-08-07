<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <?php include 'cdn.php'; ?>
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
                                        <h3 class="text-center font-weight-light my-4">Registration</h3>
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
                                                <form action="data_auth.php" method="post">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputUsername" name="username" type="username" placeholder="Username" />
                                                        <label class="form-label" for="inputUsername">Username</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputEmail" name="email" type="email" placeholder="Email" />
                                                        <label class="form-label" for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="Password" name="Password" type="password" placeholder="Password" />
                                                        <label class="form-label" for="Password">Password</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="cPassword" name="cPassword" type="password" placeholder="Confirm Password" />
                                                        <label class="form-label" for="cPassword">Confirm Password</label>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                        <div class="d-grid">
                                                            <input class="form-control button btn-primary" type="submit" name="signup" value="Signup">
                                                        </div>
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