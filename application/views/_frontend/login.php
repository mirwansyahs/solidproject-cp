<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
  <title>Solid Project | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="favicon icon" href="<?=base_url()?>assets/images/logo-spt.svg">

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/backend/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/backend/libs/owl.carousel/assets/owl.theme.default.min.css">

    <!-- Bootstrap Css -->
    <link href="<?=base_url()?>assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?=base_url()?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?=base_url()?>assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="<?=base_url()?>assets/backend/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="<?=base_url()?>assets/backend/libs/jquery/jquery.min.js"></script>
    
    <!-- Sweet Alerts js -->
    <script src="<?=base_url()?>assets/backend/libs/sweetalert2/sweetalert2.min.js"></script>
</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-50">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="<?=base_url()?>" class="d-block">
                                        <img src="<?=base_url()?>assets/images/logo-spt.svg" alt="" height="150"
                                            class="auth-logo-dark">
                                        <!-- <img src="<?=base_url()?>assets/images/logo-spt.svg" alt="" height="100"
                                            class="auth-logo-light"> -->
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to Panel Solidproject.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form method="post" id="form-login">

                                            <div class="mb-3">
                                                <label for="username" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="username"
                                                    placeholder="Enter username" name="email">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control"
                                                        placeholder="Enter password" aria-label="Password"
                                                        aria-describedby="password-addon" name="password">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i
                                                            class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Log In</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <h5 class="font-size-14 mb-3">Sign in with</h5>

                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript::void()"
                                                            class="social-list-item bg-danger text-white border-danger">
                                                            <i class="mdi mdi-google"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">©
                                        2020 - <?= date('Y')?> Solidproject.
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?=base_url()?>assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/backend/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?=base_url()?>assets/backend/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url()?>assets/backend/libs/node-waves/waves.min.js"></script>

    <!-- owl.carousel js -->
    <script src="<?=base_url()?>assets/backend/libs/owl.carousel/owl.carousel.min.js"></script>

    <!-- auth-2-carousel init -->
    <script src="<?=base_url()?>assets/backend/js/pages/auth-2-carousel.init.js"></script>

    <!-- App js -->
    <script src="<?=base_url()?>assets/backend/js/app.js"></script>
    <script>
        $('#form-login').submit(function(e)
        {
            e.preventDefault();
            auth();
        });

        $('#btnSubmit').click(function(e)
        {
            e.preventDefault();
            auth();
        })

        function auth()
        {
            let formData = $('#form-login').serialize();
            
            $('.load').html(`
            <div class="preloader">
                <div class="loading">
                <img src="<?= base_url('assets/img/logo-transparant.png') ?>" width="80">
                <p>Harap Tunggu</p>
                </div>
            </div>
            `);
            $.ajax({
            url     : '<?=base_url()?>login/sign', 
            type    : 'POST',
            data    : formData, 
            success : function(response)
            {
                response = JSON.parse(response);
                if (response.succ){
                    $('.load').html("");
                    swal.fire("Yeayyyy!", response.msg, "success");
                    location.replace("<?=base_url()?>" + response.data.redirect);
                }else{
                    $('.load').html("");
                    swal.fire("Ooppsss!", response.msg, "error");
                }
            },
            error   : function(err)
            {
                swal.fire("Ooppsss!", "Kamu tidak tersambung ke server kami.", "error");
            }
            });
        }
    </script>

</body>

</html>