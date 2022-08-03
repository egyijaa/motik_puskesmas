<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Petugas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Petugas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <br>
                <?php if ($this->session->userdata('akses')=='0') : ?>
                <a href="<?php echo base_url().'index.php/Welcome/form_petugas'?>" name="tambahPetugas" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Petugas</a>
                <?php endif;?>
                <a href="<?php echo base_url().'index.php/Welcome/home'?>" name="batal" class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if($this->session->flashdata('pesanHapus')){echo $this->session->flashdata('pesanHapus');};?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Jenis Poli</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($petugas)) : foreach ($petugas as $row) : ?>
                  <tr>
                    <td><?php echo $row['nama_petugas']; ?></td>
                    <?php if ($row['poli_idPoli'] == 1) {
                        $span = '<span class ="d-flex justify-content-center badge badge-success text-md">';
                    }
                    elseif ($row['poli_idPoli'] == 2) {
                        $span = '<span class ="d-flex justify-content-center badge badge-primary text-md">';
                    }
                    else {
                        $span = '<span class ="d-flex justify-content-center badge badge-danger text-md">';
                    }?>
                    <td><?php echo $row['username']; ?></span></td>
                    <td><?php echo $span.$row['nama_poli']; ?></span></td>
                    <?php if ($row['role'] == 'supervisor') {
                        $span2 = '<span class ="d-flex justify-content-center badge badge-danger text-md">';
                    }
                    else {
                        $span2 = '<span class ="d-flex justify-content-center badge badge-info text-md">';
                    }?>
                    <td><?php echo $span2.$row['role']; ?></span></td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group ">
                                <button type="button" title="Detail" data-toggle="modal" name="tombolNich"
                                                            data-ses="<?php $this->session->userdata('ses_id') ?>"
                                                            data-id="<?php echo $row['idPetugas']; ?>"
                                                            data-nama="<?php echo $row['nama_petugas']; ?>"
                                                            data-username="<?php echo $row['username']; ?>"
                                                            data-hp="<?php echo $row['no_hp']; ?>"
                                                            data-role="<?php echo $row['role']; ?>"
                                                            data-alamat="<?php echo $row['alamat_petugas']; ?>"
                                                            data-poli="<?php echo $row['nama_poli']; ?>"
                                                            class="btn btn-info zoomPilih" href="#detailModal"><i class="fas fa-info-circle"></i></button>
                                <?php if($this->session->userdata('akses')=='0'):?>
                                <?php if($this->session->userdata('ses_user') != $row['username']):?>
                                <button data-target="#konfirmasiDel" name="detil" title="Hapus"
                                                            data-id="<?php echo $row['username']; ?>" data-toggle="modal"
                                                            class="btn btn-danger zoomPilih" href="#detailModal"
                                                            value="<?php echo $row['username']; ?>"><i class="fas fa-user-slash"></i></button>
                                <?php endif;?>
                                <?php endif;?>
                            </div>
                        </div>
                    </td>
                  </tr>
                  <?php endforeach; endif ; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Jenis Poli</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <div id="detailModal" class="modal fade show">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DETAIL PETUGAS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img id="profilDetail" src=""
                                    class="profile-user-img img-fluid img-circle zoomPilih testing" alt="Belum diatur"
                                    style="width:150px;height:150px;object-fit:cover">
                            </div>
                            <h3 id="namalengkap" class="profile-username text-center"></h3>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li id="no_ktp" class="list-group-item fas fa-id-card" value="0" ;>
                                    <a id="ktp" class="float-right"></a>
                                </li>
                                <li id="noHp" class="list-group-item fas fa-phone-square-alt" value="0" ;>
                                    <a id="notelepon" class="float-right"></a>
                                </li>
                                <li id="city" class="list-group-item fas fa-baby" value="0" ;>
                                    <a id="poli" class="float-right"></a>
                                </li>
                                <li id="city2" class="list-group-item fas fa-baby" value="0" ;>
                                    <a id="hari" class="float-right"></a>
                                </li>
                                <li id="address" class="list-group-item fas fa-map-marker-alt" value="0" ;>
                                    <a id="alamat" class="float-right"></a>
                                </li>
                                <?php if ($this->session->userdata('akses')=='2') : ?>
                                <div class="text-center">
                                    <form action="<?php echo base_url(); ?>Page/toProfile" method="POST">
                                        <div id="tampil" name="tampil">
                                        </div>
                                    </form>
                                </div>
                                <?php endif; ?>
                                <!-- <div class="text-center">
                                    <form action="<?php echo base_url(); ?>page/toProfilebyOther"
                                        method="POST">
                                        <button id="lihatProfil" name="lihatProfil"
                                            class="btn btn-info btn-block zoomPilih effect01" value=""><span>Lihat
                                                Profil</span></a>
                                    </form>
                                </div> -->
                            </ul>
                            <div class="text-center">
                                <button id="tutup" name="tutup" type="button"
                                    class="btn btn-success btn-block zoomPilih effect01"
                                    data-dismiss="modal"><span>Tutup</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="konfirmasiDel" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus user ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                <form action="<?php echo base_url(); ?>index.php/Welcome/delPetugas" method="POST">
                    <button id="delAlumni" name="delAlumni" class="btn btn-danger" value="">Ya</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function () {
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var phone1 = button.data('hp');
            var ses = "<?php echo $_SESSION['ses_id'] ?>";
            var a = button.data('username');
            phone = phone1.toString().slice(0, -5) + "xxxxx";
            var modal = $(this);
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            // modal.find('.modal-body #profilDetail').attr('src',
            //     "<?php echo base_url(); ?>/assets/image/foto_profil/" + button.data('foto_profil'));
            modal.find('.modal-body #namalengkap').html(button.data('nama'));
            // modal.find('.modal-body #status').html(button.data('status') + " : " + button.data(
            //     'keterangan'));
            modal.find('.modal-body #ktp').html(a);
            modal.find('.modal-body #notelepon').html(phone);
            // modal.find('.modal-body #resetPassword').html('Reset Password');
            // modal.find('.modal-body #resetPassword').attr('value', button.data('username'));
           
            modal.find('.modal-body #alamat').html(button.data('alamat'));
            modal.find('.modal-body #poli').html(button.data('poli'));
            modal.find('.modal-body #hari').html(button.data('role'));
            $('#detailModal').on('hidden.bs.modal', function () {
                var myobj = document.getElementById("baru");
                if (myobj != null) {
                    myobj.remove();
                }
                $("#lihatProfil").attr('hidden', false);
            })
            modal.find('.modal-body #lihatProfil').attr('value', button.data('ktp'));
            $('#noHp').click(function () {
                phone = button.data('hp');
                modal.find('.modal-body #notelepon').html(phone);
            })
        })
        $('#delAlumni').click(function () {
            Swal.fire({
                title: '<strong><i class="fa fa-thumbs-up"></i> Akun Berhasil Dihapus</strong>',
                icon: 'info',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
        $('#konfirmasiDel').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('.modal-footer #delAlumni').attr('value', button.data('id'));
            Swal.fire({
                title: '<strong>PENTING, MOHON DIBACA!</strong>',
                icon: 'info',
                html: 'Jika data pasien dihapus maka segala hal yang berkaitan dengan pasien tersebut juga terhapus<br><br>' +
                    'Seperti<b> riwayat pemeriksaan</b>, yang pernah diunggah/upload!<br><br>' +
                    'Harap Pastikan<b> riwayat pemeriksaan</b> dari akun yang akan dihapus sudah tidak dibutuhkan!',
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
  })
</script>
<script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables/jquery.dataTables.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js?t=<?php echo time();?>">
        </script>
<script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.html5.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.print.min.js?t=<?php echo time();?>">
        </script>
        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js?t=<?php echo time();?>">
        </script>

        <script
            src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-select/js/dataTables.select.min.js?t=<?php echo time();?>">
        </script>
        <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,"order": [[ 0, "asc" ]],
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
        </script>