<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="row">
        <div class="col-10">
            <h3 class="h3 text-gray-800"><?= $judul; ?></h3>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <div class="form-group">
                <label>No. Agenda</label>
                <input type="text" class="form-control border-left-success" value="<?= $surat['no_agenda']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Pengirim</label>
                <input type="text" class="form-control border-left-success" value="<?= $surat['pengirim']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>No. Surat</label>
                <input type="text" class="form-control border-left-success" value="<?= $surat['no_surat']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Isi Ringkas</label>
                <textarea id="indeks" cols="30" rows="3" class="form-control border-left-success" readonly><?= $surat['isi']; ?></textarea>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="text" class="form-control border-left-success" value="<?= date('d/m/Y', strtotime($surat['tgl_surat'])); ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Diterima</label>
                <input type="text" class="form-control border-left-success" value="<?= date('d/m/Y', strtotime($surat['tgl_diterima'])); ?>" readonly>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control border-left-success" value="<?= $surat['keterangan']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>File <sup class="text-success">Download</sup></label>
                <?php if ($surat['file'] == '') : ?>
                    <input type="text" class="form-control border-left-danger" value="File tidak ditemukan!" readonly>
                <?php else : ?>
                    <a href="<?= base_url('export/download/') . $surat['file']; ?>" class="form-control border-left-success"><?= $surat['file']; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="container">
            <a href="<?= base_url('surat-keluar/ubah/') . $surat['id']; ?>" class="float-right btn btn-success">Ubah</a>
            <a href="<?= base_url('surat-keluar'); ?>" class="float-right btn btn-warning mr-2">Kembali</a>
        </div>
    </div>
</div>