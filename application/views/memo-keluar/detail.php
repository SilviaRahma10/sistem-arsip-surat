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
                <label>Penerima</label>
                <input type="text" class="form-control border-left-success" value="<?= $memo['penerima']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control border-left-success" value="<?= $memo['keterangan']; ?>" readonly>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control border-left-success" value="<?= date('d/m/Y', strtotime($memo['tgl'])); ?>" readonly>
            </div>

            <div class="form-group">
                <label>File</label>
                <?php if ($memo['file'] == '') : ?>
                    <input type="text" class="form-control border-left-danger" value="File tidak ditemukan!" readonly>
                <?php else : ?>
                    <a href="<?= base_url('export/download/') . $memo['file']; ?>" class="form-control border-left-success"><?= $memo['file']; ?></a>
                <?php endif; ?>
                <sup class="text-success">Download</sup>
            </div>
            <a href="<?= base_url('memo-keluar/ubah/') . $memo['id']; ?>" class="float-right btn btn-success">Ubah</a>
            <a href="<?= base_url('memo-keluar'); ?>" class="float-right btn btn-warning mr-2">Kembali</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->