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
    #company-detail-table th,
    #company-detail-table td {
        padding: .5rem;
    }

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Pengguna Perusahaan</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="company-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Nama Perusahaan</th>
        <th>Kontak</th>
        <th>Aksi</th>
      </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<!-- Modals -->
<div id="companyInfoModal" class="modal fade" tabindex="-1" aria-labelledby="companyInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="companyInfoModalLabel">Detail Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table id="company-detail-table">
                <tr>
                    <th>Username</th>
                    <td id="cd-username"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td id="cd-email"></td>
                </tr>
                <tr>
                    <th>Nama Perusahaan</th>
                    <td id="cd-name"></td>
                </tr>
                <tr>
                    <th>Kontak</th>
                    <td id="cd-contact"></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td id="cd-address"></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
  </div>
</div>
<div id="deleteConfirmModal" class="modal fade" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus perusahaan <span id="dc-name">NAME</span>?</p>
        </div>
        <div class="modal-footer">
            <button id="cancel-delete" type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
            <button id="confirm-delete" type="button" class="btn btn-danger" data-dismiss="modal">Ya</button>
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

    const table = $("#company-table").DataTable({
        aoColumnDefs: [{ 
            bSortable: false,
            aTargets: [ 3, 4 ] 
        }],
        order: [],
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
          url:"<?= base_url('admin/company/ajax_fetch_all') ?>",
          type: "POST"
        }
    });
    
    $('#companyInfoModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let companyId = button.data('company-id') // Extract info from data-* attributes
        let modal = $(this);

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        $.ajax({
            async: false,
            url: "<?= base_url() ?>"+"/api/user/"+companyId, 
            success: function(result){
                let companyData = result;
                modal.find('.modal-body #cd-username').text(companyData.username);
                modal.find('.modal-body #cd-email').text(companyData.email);
                modal.find('.modal-body #cd-name').text(companyData.name);
                modal.find('.modal-body #cd-contact').text(companyData.contact);
                modal.find('.modal-body #cd-address').text(companyData.address);
                console.log(result);
            }    
        });
    });

    $('#deleteConfirmModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let companyId = button.data('company-id') // Extract info from data-* attributes
        let name = button.data('name');

        let modal = $(this);
        modal.find('.modal-body #dc-name').text(name);

        modal.find('.modal-footer #confirm-delete').click(function(){
            $.ajax({
                async: false,
                url: "<?= base_url() ?>"+"/api/user/"+companyId,
                type: "DELETE",
                success: function(result){
                    console.log(result);
                }    
            });
            $(document).Toasts('create', {
                class: 'bg-success', 
                title: 'Pesan',
                body: 'Hapus data telah berhasil.',
                autohide: true,
                delay: 5000,
            });
            table.ajax.reload();
        });
    });
});
</script>
<?= $this->endSection() ?>