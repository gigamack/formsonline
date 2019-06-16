<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/site.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>PSU Phuket Online Forms</title>
    <style>
        @media screen and (max-width: 991.98px) {
            .nav-link {
                display: block;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-success navbar-dark">
            <a class="navbar-brand" href="">
                <img src="<?php echo base_url(); ?>assets/images/PSU_EN-H.gif" width="70" class="d-inline-block align-top" alt="">
            </a>
            <a href="" class="navbar-brand">
                <h5>Online Form System</h5>
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="#navbarsExampleDefault" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                </ul>
                <div class="dropdown">
                    <a class="dropdown-toggle" style="color: white !important;" href="#" id="fullname" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <?php echo $UserInfo->UsernameWithFullname ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/Authentication/logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>