<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h3 text-gray-800"><?= $judul; ?></h3>
            <div class="row mt-4">
                <div class="col">
                    <?= form_open_multipart() ?>
                    <input type="hidden" name="id" value="<?= $dispos['id']; ?>">
                    <input type="hidden" name="sm_id" value="<?= $dispos['sm_id']; ?>">
                    <div class="form-group">
                        <label for="sm_id">Pengirim</label>
                        <input type="text" class="form-control border-left-success" value="<?= $dispos['pengirim']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_id">Tujuan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control border-left-success">
                            <?php foreach ($jabatan as $j) : ?>
                                <?php if ($dispos['jabatan_id'] == $j['id']) : ?>
                                    <option value="<?= $j['id']; ?>" selected><?= $j['jabatan']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $j['id']; ?>"><?= $j['jabatan']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea name="isi" id="isi" cols="30" rows="3" class="form-control border-left-success"><?= set_value('isi') == false ? $dispos['isi'] : set_value('isi'); ?></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="batas_waktu">Batas Waktu</label>
                        <input type="date" name="batas_waktu" id="batas_waktu" cols="30" rows="4" class="form-control <?= form_error('batas_waktu') ? 'is-invalid' : 'border-left-success' ?>" value="<?= $dispos['batas_waktu']; ?>"></input>
                        <div class="invalid-feedback">
                            <?= form_error('batas_waktu') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sifat_id">Sifat</label>
                        <select name="sifat_id" id="sifat_id" class="form-control border-left-success">
                            <?php foreach ($sifat as $s) : ?>
                                <?php if ($dispos['sifat_id'] == $s['id']) : ?>
                                    <option value="<?= $s['id']; ?>" selected><?= $s['sifat']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['sifat']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="3" class="form-control border-left-success"><?= set_value('catatan') == false ? $dispos['catatan'] : set_value('catatan'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="float-right btn btn-success">Ubah Data</button>
                        <a href="<?= base_url('disposisi/') . $dispos['sm_id']; ?>" class="float-right btn btn-warning mr-2">Kembali</a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

</div>

</div>