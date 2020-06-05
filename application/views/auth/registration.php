<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient ">

    <div class="container center ">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto ">
            <div class="card-body p-0 ">
                <!-- Nested Row within Card Body -->
                <div class="row ">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="<?= base_url('auth/registration') ?>" method="post">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Full name" name="name" value="<?= set_value('name'); ?>">
                                    <?php if (form_error('name')) : ?>
                                        <small id="emailHelp" class="form-text text-danger"><?= form_error('name'); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
                                    <?php if (form_error('email')) : ?>
                                        <small id=" emailHelp" class="form-text text-danger"><?= form_error('email'); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6  mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password1">
                                        <?php if (form_error('password1')) : ?>
                                            <small id=" emailHelp" class="form-text text-danger"><?= form_error('password1'); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password2">
                                    </div>
                                </div>
                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn" type="submit">
                                        Register Account
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small txt2" href="<?= base_url('auth/index'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>