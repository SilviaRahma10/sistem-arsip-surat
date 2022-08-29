<div class="container-fluid">
    
    <h3 class="h3 text-gray-800 my-2"><?= $judul ?></h3>

    <div class="row">
        <div class="col-sm-8">

            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>


        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">

            <div class="row">
                <div class="col-sm-8">
                    <button type="button" data-toggle="modal" data-target="#tambahJabatan" class="mb-3 btn btn-success">Tambah Data</button>

                    <?= form_error('jabatan', '<div class="alert alert-danger p-1" role="alert">', '</div>'); ?>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-8">

                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jabatan as $num => $j) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $j['nama']; ?></td>
                                    <td><?= $j['jabatan']; ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#ubahJabatan" data-id="<?= $j['id']; ?>" data-nama="<?= $j['nama']; ?>" data-jabatan="<?= $j['jabatan']; ?>" class="btn btn-sm btn-warning" id="ubah-jabatan">ubah</button>

                                        <a href="" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="hapus-jabatan" data-id="<?= $j['id']; ?>">hapus</a>
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
            <form action="<?= base_url('pengaturan/jabatanhapus'); ?>" method="post">
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-success">
                <h5 class="modal-title">Tambah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/jabatan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah-jabatan" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="ubahJabatan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-success">
                <h5 class="modal-title">Ubah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/jabatanubah') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control">
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