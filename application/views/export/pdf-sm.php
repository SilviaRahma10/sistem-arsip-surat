<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
        body {
            font-family: arial, sans-serif;
            margin: 1cm 1cm 1cm 1cm;
        }

        h2 {
            margin-top: auto;
            text-align: center;
            position: fixed;
            left: 0px;
            right: 0px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            padding: 4px;
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
        }

        tr:nth-child(even) {
            background-color: #ddd; /* still not working */
        }
    </style>
</head><body>
    <h2>Daftar Surat Masuk</h2>
    
    <div>
        Tanggal di cetak: <?= date('d/m/Y'); ?>
    </div>

    <table cellpadding="1">
        <tr>
            <th style="width: 4%">No. Agenda</th>
            <th style="width: 16%">Pengirim</th>
            <th style="width: 10%">No. Surat</th>
            <th style="width: 22%">Isi</th>
            <th style="width: 9%">Tanggal Surat</th>
            <th style="width: 9%">Tanggal Diterima</th>
            <th style="width: 13%">Disposisi</th>
            <th style="width: 17%">Keterangan</th>
        </tr>

        <?php if (!empty($sm)) : ?>
        <?php foreach($sm as $row) : ?>
        <tr>
            <td style="width: 4%"><?= $row->no_agenda; ?></td>
            <td style="width: 16%"><?= $row->pengirim; ?></td>
            <td style="width: 10%"><?= $row->no_surat; ?></td>
            <td style="width: 22%"><?= $row->isi; ?></td>
            <td style="width: 9%"><?= date('d/m/Y', strtotime($row->tgl_surat)); ?></td>
            <td style="width: 9%"><?= date('d/m/Y', strtotime($row->tgl_diterima)); ?></td>
            <td style="width: 13%"><?= str_replace(",", "". '<br>' ."", $row->disposisi); ?></td>
            <td style="width: 17%"><?= $row->keterangan; ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <h3>Tidak ada data!</h3>
    <?php endif; ?>
    </table>

</body></html>
