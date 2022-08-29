<div class="container-fluid">

    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h3 text-gray-800"><?= $judul ?></h3>
            <div class="row mt-4">
                <div class="col">
                    <?= form_open_multipart() ?>
                    <input type="hidden" name="sm_id" value="<?= $sm_id; ?>">
                    <div class="form-group">
                        <label for="jabatan_id">Tujuan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control shadow-sm <?= form_error('jabatan_id') ? 'is-invalid' : 'border-left-success' ?>">
                            <option></option>
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?= $j['id'] ?>" <?= set_select('jabatan_id', $j['id']); ?>><?= $j['jabatan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('jabatan_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Ringkas</label>
                        <textarea name="isi" id="isi" cols="30" rows="6" class="form-control border-left-success shadow-sm"><?= set_value('isi') ?></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="batas_waktu">Batas Waktu</label>
                        <input type="date" name="batas_waktu" id="batas_waktu" class="border-left-success form-control shadow-sm" value="<?= set_value('batas_waktu') ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="sifat_id">Sifat</label>
                        <select name="sifat_id" id="sifat_id" class="form-control shadow-sm <?= form_error('sifat_id') ? 'is-invalid' : 'border-left-success' ?>">
                            <option></option>
                            <?php foreach ($sifat as $s) : ?>
                                <option value="<?= $s['id'] ?>" <?= set_select('sifat_id',  $s['id']); ?>><?= $s['sifat'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('sifat_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="2" class="form-control border-left-success shadow-sm"><?= set_value('catatan') ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="float-right btn btn-success">Tambah Data</button>
                        <a href="<?= base_url('disposisi/') . $sm_id; ?>" class="float-right btn btn-warning mr-2">Kembali</a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

</div>

</div>