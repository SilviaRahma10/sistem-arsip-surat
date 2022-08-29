<div class="container-fluid">

    <div class="row mt-4">
        <div class="col-12">

            <!-- Flash data -->
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('err')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data <strong><?= $this->session->flashdata('err'); ?></strong>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col">

                    <h3 class="judul h3 text-gray-800">Daftar <?= $judul ?></h3>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= base_url('surat-masuk/tambah'); ?>" target="_blank" class="btn btn-danger "><i class="fas fa-fw fa-plus"></i> Tambah Data</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display nowrap" style="width: 100%;" id="dataSm">
                                    <thead>
                                        <tr>
                                            <th>No. Agenda</th>
                                            <th>Pengirim</th>
                                            <th>No. Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            <form action="<?= base_url('sm/hapus'); ?>" method="post">
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