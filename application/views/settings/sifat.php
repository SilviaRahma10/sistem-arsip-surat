<div class="container-fluid">
    
    <h3 class="h3 text-gray-800 my-2"><?= $judul ?></h3>

    <div class="row">
        <div class="col-sm-6">

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
                <div class="col-sm-6">
                    <button type="button" data-toggle="modal" data-target="#tambahSifat" class="mb-3 btn btn-primary">Tambah Data</button>

                    <?= form_error('sifat', '<div class="alert alert-danger p-1" role="alert">', '</div>'); ?>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sifat Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sifat as $num => $s) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $s['sifat']; ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#ubahSifat" data-id="<?= $s['id']; ?>" data-sifat="<?= $s['sifat']; ?>" class=" btn btn-sm btn-warning" id="ubah-sifat">ubah</button>

                                        <a href="" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="hapus-sifat" data-id="<?= $s['id']; ?>">hapus</a>
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
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Hapus <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/sifathapus'); ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahSifat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Tambah Sifat Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/sifat') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sifat">Sifat Surat</label>
                        <input type="text" name="sifat" id="sifat" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="ubahSifat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Ubah Sifat Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengaturan/sifatubah') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="sifat">Sifat</label>
                        <input type="text" name="sifat" id="sifat" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>