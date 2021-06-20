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
<!-- Toastr -->
<link rel="stylesheet" href="<?= base_url('public/template/plugins/toastr/toastr.min.css'); ?>">
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
        <th>Tanggal Berakhir</th>
        <th>Rating</th>
        <th>Link</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<!-- Modals -->
<div id="scholarshipInfoModal" class="modal fade" tabindex="-1" aria-labelledby="scholarshipInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="scholarshipInfoModalLabel">Detail Beasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table id="scholarship-detail-table">
                <tr>
                    <th>Nama</th>
                    <td id="sd-name"></td>
                </tr>
                <tr>
                    <th>Dibuat Oleh</th>
                    <td id="sd-user"></td>
                </tr>
                <tr>
                    <th>Tanggal Berakhir</th>
                    <td id="sd-end-date"></td>
                </tr>
                <tr>
                    <th>Rating</th>
                    <td id="sd-rating"></td>
                </tr>
                <tr>
                    <th>Link</th>
                    <td id="sd-link"></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td id="sd-status"></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td id="sd-description"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button id="btn-brochure" type="button" class="btn btn-info" data-toggle="modal" data-target="#viewBrochureModal" data-photo="" data-name="">Lihat Brosur</button>
                    </td>
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
            <p>Apakah anda yakin ingin menghapus beasiswa <span id="dc-name">NAME</span>?</p>
        </div>
        <div class="modal-footer">
            <button id="cancel-delete" type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
            <button id="confirm-delete" type="button" class="btn btn-danger" data-dismiss="modal">Ya</button>
        </div>
    </div>
  </div>
</div>
<div id="viewBrochureModal" class="modal fade" tabindex="-1" aria-labelledby="viewBrochureModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewBrochureModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body p-0">
            <img src="#" alt="brosur beasiswa" class="w-100">
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
<!-- Toastr -->
<script src="<?= base_url('public/template/plugins/toastr/toastr.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/template/dist/js/adminlte.min.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('custom_script') ?>
<script>
$( document ).ready(function() {

    const table = $("#scholarship-table").DataTable({
        aoColumnDefs: [{ 
            bSortable: false,
            aTargets: [ 4, 6 ] 
        }],
        order: [],
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
          url:"<?= base_url('admin/scholarship/ajax_fetch_all') ?>",
          type: "POST"
        }
    });
    
    $('#scholarshipInfoModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let scholarshipId = button.data('scholarship-id') // Extract info from data-* attributes
        let modal = $(this);

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        $.ajax({
            async: false,
            url: "<?= base_url() ?>"+"/api/scholarship/"+scholarshipId, 
            success: function(result){
                let scholarshipData = result;
                modal.find('.modal-body #sd-name').text(scholarshipData.name);
                modal.find('.modal-body #sd-user').text(scholarshipData.user_name);
                modal.find('.modal-body #sd-end-date').text(scholarshipData.end_date);
                modal.find('.modal-body #sd-rating').text(
                    scholarshipData.rating != null ?
                    parseFloat(scholarshipData.rating).toFixed(2)
                    : '0.00'
                );
                modal.find('.modal-body #sd-link').text(scholarshipData.link);

                let text = '';
                switch(scholarshipData.status) {
                    case 'unverified':
                        text = 'Belum Terverifikasi';
                        break;
                    case 'verified':
                        text = 'Terverifikasi';
                        break;
                    case 'denied':
                        text = 'Verifikasi Ditolak';
                        break;
                    default:
                        break;
                }
                modal.find('.modal-body #sd-status').text(text);
                
                modal.find('.modal-body #sd-description').text(scholarshipData.description);

                modal.find('.modal-body #btn-brochure').attr('data-photo', scholarshipData.photo);
                modal.find('.modal-body #btn-brochure').attr('data-name', scholarshipData.name);

                console.log(result);
            }    
        });
    });

    $('#viewBrochureModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let photo = button.data('photo');
        let name = button.data('name');

        let modal = $(this);
        modal.find('.modal-body img').attr('src', '<?= base_url() ?>/public/storage/images/'+photo);
        modal.find('.modal-header .modal-title').text('Brosur '+name);
    });

    let scholarshipId = 0;

    $('#deleteConfirmModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        scholarshipId = button.data('scholarship-id') // Extract info from data-* attributes
        let name = button.data('name');

        let modal = $(this);
        modal.find('.modal-body #dc-name').text(name);
    });

    $('#confirm-delete').click(function(){
        $.ajax({
            async: false,
            url: "<?= base_url() ?>"+"/api/scholarship/"+scholarshipId,
            type: "DELETE",
            success: function(result){
                console.log(result);
            }    
        });
        toastr.success('Hapus data telah berhasil.');
        table.ajax.reload();
    });
});
</script>
<?= $this->endSection() ?>