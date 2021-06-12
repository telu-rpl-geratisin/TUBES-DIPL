<?= $this->extend('layout_admin/app') ?>

<?= $this->section('import_styles') ?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/fontawesome-free/css/all.min.css') ?>">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('public/template/dist/css/adminlte.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
    #scholarship-detail-table th,
    #scholarship-detail-table td {
        padding: .5rem;
    }

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    <table id="scholarship-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nama</th>
        <th>Dibuat Oleh</th>
        <th>Dokumen Verifikasi</th>
        <th>Aksi</th>
      </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<!-- Modals -->
<div id="verifyScholarshipModal" class="modal fade" tabindex="-1" aria-labelledby="verifyScholarshipModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="verifyScholarshipModalLabel">Verifikasi Beasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Pilih aksi untuk beasiswa <span id="ds-name">NAME</span></p>
        </div>
        <div class="modal-footer">
            <div class="row w-100">
                <div class="col-6">
                    <button id="acceptBtn" type="button" class="w-100 btn btn-success" data-dismiss="modal" onclick="">Terima</button>
                </div>
                <div class="col-6">
                    <button id="deniedBtn" type="button" class="w-100 btn btn-danger" data-dismiss="modal">Tolak</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('import_scripts') ?>
<!-- jQuery -->
<script src="<?= base_url('public/template/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('public/template/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('public/template/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/template/dist/js/adminlte.min.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
<script>
$( document ).ready(function() {
    const table = $("#scholarship-table").DataTable({
        aoColumnDefs: [{ 
            bSortable: false,
            aTargets: [1,2] 
        }],
        order: [],
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
          url:"<?= base_url('admin/scholarship/ajax_fetch_unverified') ?>",
          type: "POST"
        }
    });

    $('#verifyScholarshipModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let scholarshipId = button.data('id') // Extract info from data-* attributes
        let name = button.data('name');

        let modal = $(this);
        modal.find('.modal-body #ds-name').text(name);

        modal.find('.modal-footer #acceptBtn').click(function(){
            $.ajax({
                async: false,
                url: "<?= base_url() ?>"+"/api/scholarship/verify/"+scholarshipId,
                type: "POST",
                data: 'status=accept',
                success: function(result){
                    console.log(result);
                }    
            });
            $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Pesan',
                body: 'Verifikasi beasiswa telah berhasil. Beasiswa telah diterima',
                autohide: true,
                delay: 5000,
            });
            table.ajax.reload();
        });
    });
});
</script>
<?= $this->endSection() ?>