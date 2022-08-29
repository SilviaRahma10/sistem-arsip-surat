<body class="bg-gradient-danger">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body p-0">

                        <div class="card o-hidden border-0 shadow-lg bg-login">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-block d-lg-block" ><img src ="<?=base_url('assets/img/profile/solitaire.jpeg') ?>"/></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Selamat datang, silahkan login!</h1>
                                            </div>
                                            <!-- Show Flash_msg -->
                                            <?= $this->session->flashdata('message') ?>

                                            <!-- form login -->
                                            <form class="user" method="post" action="<?= base_url() ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user border-left-danger" name="username" value="<?= set_value('username') ?>" placeholder="Email atau username">
                                                    <?= form_error('username', '<div><small class="text-danger pl-3">', '</small></div>') ?>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user border-left-danger" name="pass" placeholder="Password">
                                                    <div class="input-group mb-3">
                                                        <?= form_error('pass', '<div><small class="text-danger pl-3">', '</small></div>') ?>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                                    Login
                                                </button>
                                            </form>
                                            <hr>

                                            <div class="text-center">
                                                <a class="small" href="<?= base_url('auth/registrasi'); ?>">Belum punya akun? daftar!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>