<div class="container-fluid">
    
    <div class="row mt-2">
        <div class="col-12">
            <h3 class="h3 text-gray-800 my-2"><?= $judul ?></h3>

            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Pengguna berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-sm-6">
                    <a href="<?= base_url('pengaturan/tambah'); ?>" class="my-3 btn btn-success">Tambah Data</a>
                </div>
            </div>


            <div class="row">
                <div class="col">

                    <table class="table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengguna as $num => $p) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $p['name']; ?></td>
                                    <td><?= $p['username']; ?></td>
                                    <td><?= $p['email']; ?></td>
                                    <td><?= $p['role']; ?></td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="hapus-pengguna" data-id="<?= $p['id']; ?>">hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-success">
                <h5 class="modal-title">Hapus <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/penggunahapus'); ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Ubah -->
<div class="modal fade" id="ubahRole" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-success">
                <h5 class="modal-title">Ubah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/roleubah') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" id="role" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>