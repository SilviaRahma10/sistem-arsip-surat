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

    </style>
</head><body>
    
    <h2>Daftar Surat Keluar</h2>
    
    <div class="cetak">
        Tanggal di cetak: <?= date('d/m/Y'); ?>
    </div>

    <table>
        <tr>
            <th style="width: 6%">No. Agenda</th>
            <th style="width: 18%">Pengirim</th>
            <th style="width: 11%">No. Surat</th>
            <th style="width: 25%">Isi</th>
            <th style="width: 10%">Tanggal Surat</th>
            <th style="width: 10%">Tanggal Diterima</th>
            <th style="width: 20%">Keterangan</th>
        </tr>

        <?php if (!empty($sk)) : ?>
        <?php foreach($sk as $row) : ?>
        <tr>
            <td style="width: 6%"><?= $row->no_agenda; ?></td>
            <td style="width: 18%"><?= $row->pengirim; ?></td>
            <td style="width: 11%"><?= $row->no_surat; ?></td>
            <td style="width: 25%"><?= $row->isi; ?></td>
            <td style="width: 10%"><?= date('d/m/Y', strtotime($row->tgl_surat)); ?></td>
            <td style="width: 10%"><?= date('d/m/Y', strtotime($row->tgl_diterima)); ?></td>
            <td style="width: 20%"><?= $row->keterangan; ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <h3>Tidak ada data!</h3>
    <?php endif; ?>
    </table>

</body></html>
