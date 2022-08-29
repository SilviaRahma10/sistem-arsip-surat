<div class="container-fluid">

    <h3 class="h3 text-gray-800 my-4"><?= $judul ?></h3>
    <div class="row">
        <?php foreach ($file as $data) : ?>
            <div class="col-md-3 mb-2">
                <div class="card">
                    <?php
                    // get by extension
                    $img = get_mime_by_extension($data['file']);
                    // explode (data file dengan . sebagai delimiter)
                    $img = explode(".", $data['file']);
                    // ambil data dari titik terakhir
                    $img_ext = end($img);

                    // lakukan pengecekan ext
                    if ($img_ext == 'pdf') {
                        $image = 'pdf.svg';
                    } elseif ($img_ext == 'jpeg' or $img_ext == 'jpg' or $img_ext == 'png') {
                        $image = 'img.svg';
                    } else {
                        $image = 'question.svg';
                    }
                    ?>
                    <img class=" card-img-top mt-2" height="200rem" src="<?= base_url('assets/img/') . $image; ?>">
                    <div class="card-body" style="width: 18rem;">
                        <h5 class="card-title"><?= substr($data['pengirim'], 0, 16); ?>...</h5>
                        <a href="<?= base_url('openfile/') . $data['file']; ?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-fw fa-eye"></i> Preview</a>
                        <a href="<?= base_url('export/download/') . $data['file']; ?>" class="btn btn-sm btn-success"><i class="fa fa-fw fa-download"></i> Download</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>