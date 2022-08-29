<div class="container-fluid">

    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h3 text-gray-800"><?= $judul; ?></h3>
            <?= form_open_multipart() ?>
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group">
                        <label for="pengirim">Penerima</label>
                        <input type="text" name="penerima" id="penerima" class="form-control <?= form_error('penerima') ? 'is-invalid' : 'border-left-success' ?>" value="<?= set_value('penerima') ?>">
                        <div class="invalid-feedback">
                            <?= form_error('penerima') ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control border-left-success" value="<?= set_value('keterangan') ?>">
                        <sup>*opsional</sup>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input type="date" name="tgl" id="tgl" class="form-control <?= form_error('tgl') ? 'is-invalid' : 'border-left-success' ?>" value="<?= set_value('tgl') ?>">
                        <div class="invalid-feedback">
                            <?= form_error('tgl') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload File</label>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                            <small class="text-sm text-info">Format file yang diizinkan .jpg, .png, .pdf dan ukuran maks 2 MB!</small>
                        </div>
                        <?php if ($this->session->flashdata('err')) : ?>
                            <?= $this->session->flashdata('err'); ?>
                        <?php endif; ?>
                    </div>

                    <!-- User Saved -->
                    <input type="hidden" name="user_id" value="<?= $user['role_id']; ?>">
                    <div class="form-group">
                        <button type="submit" class="float-right btn btn-success">Tambah Data</button>
                        <a href="<?= base_url('memo-keluar'); ?>" class="float-right btn btn-warning mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <?= form_close() ?>
    </div>
</div>
</div>