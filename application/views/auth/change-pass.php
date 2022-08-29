<body class="bg-gradient-success">
    
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Change password for <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                                        </h1>
                                    </div>
                                    <!-- alert success registered -->
                                    <?= $this->session->flashdata('message'); ?>

                                    <!-- login form -->
                                    <form class="user" method="post" action="<?= base_url('auth/changePassword'); ?>">
                                        <div class="form-group">
                                            <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Enter new password...">
                                            <?= form_error('password1', '<div><small class="text-danger pl-3">', '</small></div>') ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Konfirmasi password...">
                                            <?= form_error('password2', '<div><small class="text-danger pl-3">', '</small></div>') ?>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-user btn-block">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>