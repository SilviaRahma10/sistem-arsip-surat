<div class="container-fluid">
    
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

            <h3 class="mt-1 mb-3"><?= $judul ?></h3>

            <form action="" method="POST">

                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : 'border-left-success' ?>" value="<?= set_value('name'); ?>" placeholder="Masukkan nama lengkap...">
                    <div class="invalid-feedback">
                        <?= form_error('name'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control <?= form_error('username') ? 'is-invalid' : 'border-left-success' ?>" value="<?= set_value('username'); ?>" placeholder="Masukkan username...">
                    <div class="invalid-feedback">
                        <?= form_error('username'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : 'border-left-success' ?>" value="<?= set_value('email'); ?>" placeholder="Masukkan Email...">
                    <div class="invalid-feedback">
                        <?= form_error('email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="password" name="pass1" id="password" class="form-control <?= form_error('pass1') ? 'is-invalid' : 'border-left-success' ?>" placeholder="Password...">
                    <div class="invalid-feedback">
                        <?= form_error('pass1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="password" name="pass2" id="password" class="form-control <?= form_error('pass2') ? 'is-invalid' : 'border-left-success' ?>" placeholder="Konfirmasi Password...">
                    <div class="invalid-feedback">
                        <?= form_error('pass2'); ?>
                    </div>
                </div>

                <label>Role: </label>
                <?php foreach ($role as $data) : ?>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="role_id" id="<?= $data['role']; ?>" value="<?= $data['id']; ?>" checked>
                        <label class="form-check-label" for="<?= $data['role']; ?>">
                            <?= $data['role']; ?>
                        </label>
                    </div>
                <?php endforeach; ?>

                <div class="form-group">
                    <button type="submit" class="float-right btn btn-success">Tambah Data</button>
                    <a href="<?= base_url('pengaturan/pengguna'); ?>" class="float-right btn btn-warning mr-2">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

</div>