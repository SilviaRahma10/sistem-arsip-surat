<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <h3 class="h3 text-gray-800"><?= $judul; ?></h3>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <div class="form-group">
                <label>Pengirim</label>
                <input type="text" class="form-control border-left-success" value="<?= $dispos['pengirim']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" class="form-control border-left-success" value="<?= $dispos['jabatan']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Isi</label>
                <textarea cols="30" rows="3" class="form-control border-left-success" readonly><?= $dispos['isi']; ?></textarea>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Batas Waktu</label>
                <input type="text" class="form-control border-left-success" value="<?= ($dispos['batas_waktu']  == 0000 - 00 - 00) ? '-' : date('d/m/Y', strtotime($dispos['batas_waktu'])) ?>" readonly>
            </div>
            <div class="form-group">
                <label>Sifat Surat</label>
                <input type="text" class="form-control border-left-success" value="<?= $dispos['sifat']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Catatan</label>
                <textarea cols="30" rows="3" class="form-control border-left-success" readonly><?= $dispos['catatan']; ?></textarea>
            </div>
            <div class="form-group">
                <a href="<?= base_url('disposisi/ubah/') . $dispos['id']; ?>" class="btn btn-success float-right ml-2">Ubah</a>
                <a href="<?= base_url('disposisi/') . $dispos['sm_id']; ?>" class="btn btn-warning float-right">Kembali</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->