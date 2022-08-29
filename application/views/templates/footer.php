</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-danger">
                <h5 class="modal-title" id="logoutModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "logout" jika ingin mengakhiri sesi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-success" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

<script>
    // Upload file (name)
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // Preview Gambar
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    // DataTables - Surat Masuk
    $(document).ready(function() {
        $('#dataSm').DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= base_url('sm/ambildata') ?>",
                "type": "POST"
            },
            scrollY: '270px',
            // dom: 'Brftip',

            "columnDefs": [{
                "targets": [2, 4],
                "orderable": false,
                // "width": 5
            }],
        });
    });

    // DataTables - Surat Keluar
    $(document).ready(function() {
        $('#dataSk').DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= base_url('sk/ambildata') ?>",
                "type": "POST"
            },
            scrollY: '270px',

            "columnDefs": [{
                "targets": [2, 4],
                "orderable": false,
                // "width": 5
            }],
        });
    });

    // DataTables - Memo Masuk
    $(document).ready(function() {
        $('#dataMm').DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= base_url('mm/ambildata') ?>",
                "type": "POST"
            },
            scrollY: '270px',
            // dom: 'Brftip',

            "columnDefs": [{
                "targets": [2, 2],
                "orderable": false,
                // "width": 5
            }],
        });
    });

    // DataTables - Memo Keluar
    $(document).ready(function() {
        $('#dataMk').DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= base_url('mk/ambildata') ?>",
                "type": "POST"
            },
            scrollY: '270px',

            "columnDefs": [{
                "targets": [2, 2],
                "orderable": false,
                // "width": 5
            }],
        });
    });

    // Modal Ubah (pengaturan)
    $(document).on("click", "#ubah-jabatan", function() {
        $(".modal-body #id").val($(this).data('id'));
        $(".modal-body #nama").val($(this).data('nama'));
        $(".modal-body #jabatan").val($(this).data('jabatan'));
    });

    $(document).on("click", "#ubah-sifat", function() {
        $(".modal-body #id").val($(this).data('id'));
        $(".modal-body #sifat").val($(this).data('sifat'));
    });

    $(document).on("click", "#ubah-role", function() {
        $(".modal-body #id").val($(this).data('id'));
        $(".modal-body #role").val($(this).data('role'));
    });

    // Modal Hapus
    $(document).on("click", "#hapus-pengguna", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-role", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-jabatan", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-sifat", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-dispos", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-sm", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-sk", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-mk", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
    $(document).on("click", "#hapus-mm", function() {
        $(".modal-body #id").val($(this).data('id'));
    });
</script>

</body>

</html>