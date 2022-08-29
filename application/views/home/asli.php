<!-- Load Library Chart.js -->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

<div class="container-fluid">

    <?php if ($this->session->flashdata('message')) : ?>
        <!-- Modal Dialog berhasil login-->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Login</strong> berhasil, selamat datang <strong><?= $this->session->flashdata('message'); ?></strong>.
        </div>
    <?php endif; ?>

    <!-- Section 1 -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?= base_url('surat-masuk'); ?>" target="_blank" style="text-decoration: none; color: inherit;">Jumlah Surat Masuk</a> </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $suratMasuk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?= base_url('surat-keluar'); ?>" target="_blank" style="text-decoration: none; color: inherit;">Jumlah Surat Keluar</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $suratKeluar; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah File</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $file; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-archive fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?= base_url('pengaturan/klasifikasi'); ?>" target="_blank" style="text-decoration: none; color: inherit;">Jumlah Klasifikasi</a> </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $klasifikasi; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?= base_url('memo-masuk'); ?>" target="_blank" style="text-decoration: none; color: inherit;">Jumlah Memo Masuk</a> </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $memoMasuk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?= base_url('memo-keluar'); ?>" target="_blank" style="text-decoration: none; color: inherit;">Jumlah Memo Keluar</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $memoKeluar; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Pie Chart -->
        <div class="col-4"></div>
        <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Surat Masuk
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Surat Keluar
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-danger"></i> Memo Masuk
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-secondary"></i> Memo Keluar
            </span>
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url('assets/highcharts/code/highcharts.js'); ?>"></script>

<!-- Bar Chart -->
<?php
$kosong = [];

// surat masuk
foreach ($smTahun as $data) {
    $monthSm = date('m', strtotime($data['created_at'])); // ambil bulan saja
    $bulanSm[] = $monthSm;
}

$countSm = array_count_values(!empty($bulanSm) ? $bulanSm : $kosong); // hitung jumlah value dari masing-masing elemen
ksort($countSm); // sorting array keys

// surat keluar
foreach ($skTahun as $row) {
    $monthSk = date('m', strtotime($row['created_at']));
    $bulanSk[] = $monthSk;
}
$countSk = array_count_values(!empty($bulanSk) ? $bulanSk : $kosong);
ksort($countSk);

// memo masuk
foreach ($mmTahun as $data) {
    $monthMm = date('m', strtotime($data['created_at'])); // ambil bulan saja
    $bulanMm[] = $monthMm;
}

$countMm = array_count_values(!empty($bulanMm) ? $bulanMm : $kosong); // hitung jumlah value dari masing-masing elemen
ksort($countMm); // sorting array keys

// memo keluar
foreach ($mkTahun as $row) {
    $monthMk = date('m', strtotime($row['created_at']));
    $bulanMk[] = $monthMk;
}
$countMk = array_count_values(!empty($bulanMk) ? $bulanMk : $kosong);
ksort($countMk);
?>



<div class="col-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Statistik 12 Bulan Terakhir</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area pt-4 pb-2">
                <canvas id="myBarChart"></canvas>
                <script>
                    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';

                    var ctz = document.getElementById("myBarChart");
                    var chart = new Chart(ctz, {
                        type: 'bar', // bisa juga horizontalBar

                        data: {
                            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                            datasets: [{
                                label: "Surat Masuk",
                                backgroundColor: 'rgb(78,115,223)',
                                hoverBackgroundColor: '#2e59d9',
                                data: [
                                    <?= !empty($countSm['01']) ? $countSm['01'] : 0; ?>, <?= !empty($countSm['02']) ? $countSm['02'] : 0; ?>, <?= !empty($countSm['03']) ? $countSm['03'] : 0; ?>, <?= !empty($countSm['04']) ? $countSm['04'] : 0; ?>, <?= !empty($countSm['05']) ? $countSm['05'] : 0; ?>, <?= !empty($countSm['06']) ? $countSm['06'] : 0; ?>, <?= !empty($countSm['07']) ? $countSm['07'] : 0; ?>, <?= !empty($countSm['08']) ? $countSm['08'] : 0; ?>, <?= !empty($countSm['09']) ? $countSm['09'] : 0; ?>, <?= !empty($countSm['10']) ? $countSm['10'] : 0; ?>, <?= !empty($countSm['11']) ? $countSm['11'] : 0; ?>, <?= !empty($countSm['12']) ? $countSm['12'] : 0; ?>
                                ]
                            }, {
                                label: "Surat Keluar",
                                backgroundColor: 'rgb(28,200,138)',
                                hoverBackgroundColor: 'rgba(22, 160, 133, 1)',
                                data: [
                                    <?= !empty($countSk['01']) ? $countSk['01'] : 0; ?>, <?= !empty($countSk['02']) ? $countSk['02'] : 0; ?>, <?= !empty($countSk['03']) ? $countSk['03'] : 0; ?>, <?= !empty($countSk['04']) ? $countSk['04'] : 0; ?>, <?= !empty($countSk['05']) ? $countSk['05'] : 0; ?>, <?= !empty($countSk['06']) ? $countSk['06'] : 0; ?>, <?= !empty($countSk['07']) ? $countSk['07'] : 0; ?>, <?= !empty($countSk['08']) ? $countSk['08'] : 0; ?>, <?= !empty($countSk['09']) ? $countSk['09'] : 0; ?>, <?= !empty($countSk['10']) ? $countSk['10'] : 0; ?>, <?= !empty($countSk['11']) ? $countSk['11'] : 0; ?>, <?= !empty($countSk['12']) ? $countSk['12'] : 0; ?>
                                ]
                            }, {
                                label: "Memo Masuk",
                                backgroundColor: '#e74a3b',
                                hoverBackgroundColor: '#e74a3b',
                                data: [
                                    <?= !empty($countMm['01']) ? $countMm['01'] : 0; ?>, <?= !empty($countMm['02']) ? $countMm['02'] : 0; ?>, <?= !empty($countMm['03']) ? $countMm['03'] : 0; ?>, <?= !empty($countMm['04']) ? $countMm['04'] : 0; ?>, <?= !empty($countMm['05']) ? $countMm['05'] : 0; ?>, <?= !empty($countMm['06']) ? $countMm['06'] : 0; ?>, <?= !empty($countMm['07']) ? $countMm['07'] : 0; ?>, <?= !empty($countMm['08']) ? $countMm['08'] : 0; ?>, <?= !empty($countMm['09']) ? $countMm['09'] : 0; ?>, <?= !empty($countMm['10']) ? $countMm['10'] : 0; ?>, <?= !empty($countMm['11']) ? $countMm['11'] : 0; ?>, <?= !empty($countMm['12']) ? $countMm['12'] : 0; ?>
                                ]
                            }, {
                                label: "Memo Keluar",
                                backgroundColor: '#858796',
                                hoverBackgroundColor: '#858796',
                                data: [
                                    <?= !empty($countMk['01']) ? $countMk['01'] : 0; ?>, <?= !empty($countMk['02']) ? $countMk['02'] : 0; ?>, <?= !empty($countMk['03']) ? $countMk['03'] : 0; ?>, <?= !empty($countMk['04']) ? $countMk['04'] : 0; ?>, <?= !empty($countMk['05']) ? $countMk['05'] : 0; ?>, <?= !empty($countMk['06']) ? $countMk['06'] : 0; ?>, <?= !empty($countMk['07']) ? $countMk['07'] : 0; ?>, <?= !empty($countMk['08']) ? $countMk['08'] : 0; ?>, <?= !empty($countMk['09']) ? $countMk['09'] : 0; ?>, <?= !empty($countMk['10']) ? $countMk['10'] : 0; ?>, <?= !empty($countMk['11']) ? $countMk['11'] : 0; ?>, <?= !empty($countMk['12']) ? $countMk['12'] : 0; ?>
                                ]
                            }]
                        },

                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                mode: 'index',
                            },
                            scales: {
                                xAxes: [{
                                    stacked: true, // buat false untuk horizontal Bar
                                }],
                                yAxes: [{
                                    stacked: true,
                                    ticks: {
                                        beginAtZero: true,
                                        callback: function(value) {
                                            if (Number.isInteger(value)) {
                                                return value;
                                            }
                                        },
                                        stepSize: 1
                                    }
                                }]
                            }
                        }
                    })
                </script>
            </div>
        </div>
    </div>
</div>

</div>

</div>

</div>