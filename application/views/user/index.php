<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-4">

            <!-- Flash data -->
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Profil berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <?= form_error('username', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('upload_error'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="profile" class="card-img-top rounded mt-0 mb-10 mx-auto" width="320" height="300">
                    <h4 class="card-title text-center font-weight-bold"><?= $user['username']; ?></h4>
                    <h5 class="card-title text-center mb-0"><?= $user['email']; ?></h5>
                    <p class="card-text text-center">Bergabung sejak. <?= date('d M Y', $user['date_created']); ?></p>
                    <button type="button" data-toggle="modal" data-target="#profileModal" class="btn btn-danger btn-block">Ubah Profile</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="profileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-success">
                <h5 class="modal-title" id="profileModalTitle">Form Ubah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-0">
                <?= form_open_multipart(); ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control shadow-sm" value="<?= $user['email']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control shadow-sm" value="<?= $user['username']; ?>" placeholder="masukkan username">
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Gambar</label>
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" id="output_image"/ height="120" width="150" class="shadow-sm p-2 rounded-sm">
                        </div>
                    </div>
                    <div class="col-8">
                        <label for="image">Upload gambar</label>
                        <div class="custom-file">
                            <input type="file" accept="image/*" onchange="preview_image(event)" class="custom-file-input shadow-sm" id="image" name="image">
                            <label class="custom-file-label shadow-sm" for="image">Choose file</label>
                            <div class="alert-info mt-1 pb-1 rounded text-center">
                                <small>* File dengan format .png, .jpg, .svg - maks. 512kb</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>`