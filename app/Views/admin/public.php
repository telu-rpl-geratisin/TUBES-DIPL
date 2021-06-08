<?= $this->extend('layout_admin/app') ?>

<?= $this->section('import_styles') ?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/fontawesome-free/css/all.min.css') ?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<!-- Toastr -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/toastr/toastr.min.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('public/template/dist/css/adminlte.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('custom_style') ?>
<style type="text/css">
    #user-detail-table th,
    #user-detail-table td {
        padding: .5rem;
    }

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Pengguna Publik</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="public-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Nama Lengkap</th>
        <th>No HP</th>
        <th>Aksi</th>
      </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<!-- Modals -->
<div id="userInfoModal" class="modal fade" tabindex="-1" aria-labelledby="userInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="overlay d-flex justify-content-center align-items-center" style="visibility: hidden">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div>
        <div class="modal-header">
            <h5 class="modal-title" id="userInfoModalLabel">Detail Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table id="user-detail-table">
                <tr>
                    <th>Username</th>
                    <td id="ud-username"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td id="ud-email"></td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td id="ud-fullname"></td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td id="ud-phone"></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td id="ud-address"></td>
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
        <div class="overlay d-flex justify-content-center align-items-center" style="visibility: hidden">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div>
        <div class="modal-header">
            <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus pengguna dengan username <span id="dc-username">USERNAME</span>?</p>
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

    const table = $("#public-table").DataTable({
        aoColumnDefs: [{ 
            bSortable: false,
            aTargets: [ 4 ] 
        }],
        order: [],
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
          url:"<?= base_url('admin/public/ajax_fetch_all') ?>",
          type: "POST"
        }
    });
    
    $('#userInfoModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let userId = button.data('user-id') // Extract info from data-* attributes
        let modal = $(this);

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        $.ajax({
            async: false,
            url: "<?= base_url() ?>"+"/api/public_user/"+userId, 
            success: function(result){
                let userData = result;
                modal.find('.modal-body #ud-username').text(userData.username);
                modal.find('.modal-body #ud-email').text(userData.email);
                modal.find('.modal-body #ud-fullname').text(userData.first_name+' '+userData.last_name);
                modal.find('.modal-body #ud-phone').text(userData.phone);
                modal.find('.modal-body #ud-address').text(userData.address);
                console.log(result);
            }    
        });
    });

    $('#deleteConfirmModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let userId = button.data('user-id') // Extract info from data-* attributes
        let username = button.data('username');

        let modal = $(this);
        modal.find('.modal-body #dc-username').text(username);

        modal.find('.modal-footer #confirm-delete').click(function(){
            $.ajax({
                async: false,
                url: "<?= base_url() ?>"+"/api/public_user/"+userId,
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