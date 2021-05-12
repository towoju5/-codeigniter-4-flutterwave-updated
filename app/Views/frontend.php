<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Authentication Panel | DeliverASAP</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/login/img/favicon.ico">
    <!-- Bootstrap 4.5 CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
</head>

<body class="xlogin">

    <!-- End Navigation -->
    <!-- Login Form  -->
    <section class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 mx-auto text-center pt-3 pb-3">
            <div class="mt-3 mb-5">
                <a href="<?= base_url() ?>" class="nav-brand"><img src="<?= base_url() ?>/assets/login/img/asaplogo.png" alt="Logo" title="Logo"></a>
            </div>
            <div class="row bg-white login">
                <div class="container-fluid">
                <?= view('Myth\Auth\Views\_message_block') ?>
                    <h4 class="access-box-title text-center m-b-lg m-t-none ng-binding">Login</h4>
                    <form class="access-box ng-valid-email ng-dirty ng-valid-parse ng-valid ng-valid-required" method="post">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email address" class="form-control input-lg input-md">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control input-lg input-md">
                        </div>
                        <div class="row">
                            <button class="btn btn-lg btn-success btn-block loading-button ng-scope">Login to your account</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mx-auto my-3">
                <p>New to DeliverASAP? <a href="#">SignUp</a></p>
                <p><a href="#">Forgot Password?</a></p>
            </div>
        </div>
    </section>
    <!-- End Login -->

    <!-- <div class="container my-5"></div> -->

    <!-- Script Source Files -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/login/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4.5 JS -->
    <script src="<?= base_url() ?>/assets/login/js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="<?= base_url() ?>/assets/login/js/popper.min.js"></script>
    <!-- Font Awesome -->
    <script src="<?= base_url() ?>/assets/login/js/all.min.js"></script>

    <!-- End Script Source Files -->
</body>

</html>