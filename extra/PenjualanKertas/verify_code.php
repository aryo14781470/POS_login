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
        <title>Verification Code</title>
        <?php include 'cdn.php'; ?>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card mb-3 shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Verification</h3></div>
                                    <div class="text-center">
                                        <?php
                                            if(isset($_SESSION['alert'])){
                                                echo $_SESSION['alert'];
                                                unset($_SESSION['alert']);
                                            }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <form action="data_auth.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Verification" type="number" placeholder="Enter Verification"/>
                                                <label for="Verification>">Verification</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input class="form-control button btn-primary" type="submit" name="verify_code" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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