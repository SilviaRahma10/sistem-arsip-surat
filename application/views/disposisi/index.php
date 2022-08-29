<div class="container-fluid">

    <div class="row">
        <div class="col-10">

            <h3 class="h3 text-gray-800 mb-3">Daftar <?= $judul ?></h3>

            <!-- Flash data -->
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?= base_url('disposisi/tambah/') . $sm_id; ?>" class="btn btn-success">Tambah Data</a>
                        </div>
                        <div class="col my-auto">
                            <a href="<?= base_url('surat-masuk'); ?>" class="float-right btn btn-outline-dark "><i class="fa fa-reply"> Kembali</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tujuan</th>
                                    <th>Sifat</th>
                                    <th>Batas Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($disposisi) : ?>
                                    <?php foreach ($disposisi as $num => $d) : ?>
                                        <tr>
                                            <td><?= $num + 1 ?></td>
                                            <td><?= $d['jabatan'] ?></td>
                                            <td><?= $d['sifat'] ?></td>
                                            <td>
                                                <?php if ($d['batas_waktu'] == 0000 - 00 - 00) : ?>
                                                    -
                                                <?php else : ?>
                                                    <?= date('d/m/Y', strtotime($d['batas_waktu'])); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-fw fa-list"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a href="<?= base_url('disposisi/detail/') . $d['id'] ?>" class="dropdown-item">Detail disposisi</a>
                                                        <a href="" data-toggle="modal" data-target="#modalHapus" class="dropdown-item" id="hapus-dispos" data-id="<?= $d['id']; ?>">Hapus disposisi</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">
                                    <h5>Data tidak ditemukan!</h5>
                                </td>
                            </tr>

                        <?php endif; ?>
                        </table>
                    </div>
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
            <form action="<?= base_url('disposisi/hapus/'); ?>" method="post">
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