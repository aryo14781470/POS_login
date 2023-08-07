<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <?php include('cdn.php'); ?>
        <?php require("include.php");?>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <?php include('header.php') ?>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('menu.php') ?>
            </div>
            <div id="layoutSidenav_content">
                <?php include('getPage.php') ?>
                <footer class="py-4 bg-light mt-auto">
                    <?php include('footer.php') ?>
                </footer>
            </div>
        </div>
        
    </body>
</html>
