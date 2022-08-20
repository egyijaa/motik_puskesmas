<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Antrian Pasien</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Antrian</li>
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
            <!-- /.card-header -->
            <div class="card-body">
              <?php if ($this->session->flashdata('pesanHapus')) {
                echo $this->session->flashdata('pesanHapus');
              }; ?>
              <table id="example1" class="table table-bordered table-striped table-responsive-md">
                <thead>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>Jenis Pemeriksaan</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($riwayat)) : foreach ($riwayat as $row) : ?>
                      <tr>
                        <td><?php echo $row['nama_pasien']; ?></td>
                        <td><?php echo $row['nama_pemeriksaan']; ?></span></td>
                        <td>
                          <p class=" bg-gradient-success text-center text-bold">
                            <?php $date = date("d-M-Y H:i", strtotime($row['tanggal_periksa']));
                            echo $date; ?>
                          </p>
                        </td>
                        <?php
                        $span;
                        if ($row['diagnosa'] != null && $row['keterangan'] != null) {
                          $span = '<span class ="d-flex justify-content-center badge badge-success text-md"> Selesai';
                        } else {
                          $span = '<span class ="d-flex justify-content-center badge badge-warning text-md"> Belum Proses';
                        }
                        ?>
                        <td><?php echo $span; ?></span></td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <div class="btn-group ">
                              <?php
                              if ($row['diagnosa'] != null && $row['keterangan'] != null) :
                              ?>
                              <button data-target="#detailPemeriksaan" name="detil2" title="Periksa" data-kode="<?php echo $row['idRiwayat']; ?>" data-id="<?php echo $row['pasien_no_ktp']; ?>" data-nama="<?php echo $row['nama_pasien']; ?>" data-petugas="<?php echo $row['nama_Petugas']; ?>" data-periksa="<?php echo $row['nama_pemeriksaan']; ?>" data-diagnosa="<?php echo $this->vigenere->decrypt($row['diagnosa'], 'diag'); ?>"  data-keterangan="<?php echo $this->vigenere->decrypt($row['keterangan'], 'ket'); ?>"data-toggle="modal" class="btn btn-info zoomPilih" value="<?php echo $row['pasien_no_ktp']; ?>"><i class="fas fa-eye"></i></button>
                              <!-- <button data-target="#konfirmasiDel" name="detil" title="Hapus"
                                                            data-id="<?php echo $row['idRiwayat']; ?>" data-toggle="modal"
                                                            class="btn btn-danger zoomPilih" href="#detailModal"
                                                            value="<?php echo $row['idRiwayat']; ?>"><i class="fas fa-user-slash"></i></button> -->
                              <?php endif; ?>
                              <button data-target="#detailPemeriksaan" name="detil2" title="Periksa" data-kode="<?php echo $row['idRiwayat']; ?>" data-id="<?php echo $row['pasien_no_ktp']; ?>" data-nama="<?php echo $row['nama_pasien']; ?>" data-petugas="<?php echo $row['nama_Petugas']; ?>" data-periksa="<?php echo $row['nama_pemeriksaan']; ?>" data-toggle="modal" class="btn btn-danger zoomPilih" value="<?php echo $row['pasien_no_ktp']; ?>" <?php $retVal = ($row['diagnosa'] != null && $row['keterangan'] != null) ? print 'disabled' : print ''; ?>><i class="fas fa-plus-square"></i></button>
                              <!-- <button data-target="#konfirmasiDel" name="detil" title="Hapus"
                                                            data-id="<?php echo $row['idRiwayat']; ?>" data-toggle="modal"
                                                            class="btn btn-danger zoomPilih" href="#detailModal"
                                                            value="<?php echo $row['idRiwayat']; ?>"><i class="fas fa-user-slash"></i></button> -->
                            </div>
                          </div>
                        </td>
                      </tr>
                  <?php endforeach;
                  endif; ?>
                </tbody>
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
        <form action="<?php echo base_url(); ?>index.php/Welcome/delRiwayat" method="POST">
          <button id="delAlumni" name="delAlumni" class="btn btn-danger" value="">Ya</a>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="detailPemeriksaan" class="modal fade show" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" style="max-width: 700px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="judul" class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <?php echo form_open('Welcome/pasienPeriksaBaru', array('id' => 'formPeriksa', 'role' => 'form')); ?>
              <div class="row">
                <div class="form-group col-lg-3">
                  <label for="message-text2" class="col-form-label">Kode Periksa:</label>
                  <input type="text" class="form-control" id="kode" name="kode" readonly></input>
                </div>
                <div class="form-group col-lg-9">
                  <label for="message-text2" class="col-form-label">Nama Pasien:</label>
                  <input type="text" class="form-control" id="noKTP" name="noKTP" readonly></input>
                </div>
                <div class="form-group col-lg-6">
                  <label for="message-text3" class="col-form-label">Petugas:</label>
                  <input type="text" class="form-control" id="namaPetugas" name="namaPetugas" readonly></input>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label for="message-text2" class="col-form-label">Jenis Periksa:</label>
                  <input type="text" class="form-control" id="periksa" name="periksa" readonly></input>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label for="message-text5" class="col-form-label">Diagnosa: </label>
                  <textarea type="text" class="form-control alphaonly" id="diagnosa" name="diagnosa"></textarea>
                  <div class="print-error-msg 1" style="display:none"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label for="message-text5" class="col-form-label">Keterangan: </label>
                  <textarea type="text" class="form-control alphaonly" id="keterangan" name="keterangan"></textarea>
                  <div class="print-error-msg 2" style="display:none"></div>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
                <div class="form-group col-lg-6">
                <button hidden type="button" name="simpan" class="btn btn-success btn-block zoomPilih effect01 simpan"><span><b>Simpan Periksa</b></span>
                </button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <div class="text-center">
          <button type="button" class="btn btn-secondary btn-block zoomPilih effect01" data-dismiss="modal"><span><b>Tutup</b></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#delAlumni').click(function() {
      Swal.fire({
        title: '<strong><i class="fa fa-thumbs-up"></i> Akun Berhasil Dihapus</strong>',
        icon: 'info',
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
        confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
      })
    })
    $('#konfirmasiDel').on('show.bs.modal', function(event) {
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
    $('#detailPemeriksaan').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var ses = "<?php echo $_SESSION['ses_id'] ?>";
      var modal = $(this);
      var date = new Date();
      var day = ("0" + date.getDate()).slice(-2);
      var month = ("0" + (date.getMonth() + 1)).slice(-2);
      var today = date.getFullYear() + "-" + (month) + "-" + (day);
      $('#tanggal_periksa').val(today);
      // modal.find('.modal-body #profilDetail').attr('src',
      //     "<?php echo base_url(); ?>/assets/image/foto_profil/" + button.data('foto_profil'));
      modal.find('.modal-body #noKTP').val(button.data('nama'));
      modal.find('.modal-body #kode').val(button.data('kode'));
      modal.find('.modal-body #namaPetugas').val(button.data('petugas'));
      modal.find('.modal-body #periksa').val(button.data('periksa'));
      modal.find('.modal-body #diagnosa').val(button.data('diagnosa'));
      modal.find('.modal-body #keterangan').val(button.data('keterangan'));
      if (button.data('diagnosa') == null && button.data('keterangan') == null) {
          $(".simpan").attr('hidden', false);
          $("#diagnosa").attr('disabled', false);
          $("#keterangan").attr('disabled', false);
      }
      else {
          $("#diagnosa").attr('disabled', true);
          $("#keterangan").attr('disabled', true);
          $(".simpan").attr('hidden', true);
      }
      $(".simpan").click(function(e) {
        e.preventDefault();
        Swal.fire({
          icon: 'question',
          title: 'Apakah sudah mengisi dengan Benar?',
          text: 'PENTING! HARAP PERHATIKAN DENGAN TELILI, jangan sampau ada kesalahan dalam data!',
          showCancelButton: true,
          confirmButtonText: `Submit/Sudah Benar`,
          cancelButtonText: `Batal/Periksa Kembali`,
          confirmButtonColor: `#28a745`,
          cancelButtonColor: '#dc3545',
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            var dataForm = $("#formPeriksa").serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo site_url('Welcome/updHasilPeriksa'); ?>",
              data: $("#formPeriksa").serialize(),
              dataType: "json",
              success: function(data) {
                if ($.isEmptyObject(data.error)) {
                  if (data.message == "success") {
                    Swal.fire(
                      'DATA TERSIMPAN!',
                      'Data Pemeriksaan Pasien Sudah Tersimpan!',
                      'success'
                    )
                    $(".print-error-msg").css('display', 'none');
                    $(".logo").html("");
                    setTimeout(function() {
                      var link = '<?php echo base_url(); ?>index.php/Welcome/antrian';
                      window.location.href = link;
                    }, 1700);
                  } else {
                    Swal.fire(
                      'DATA GAGAL DISIMPAN!',
                      data.error,
                      'error'
                    );
                  }
                } else {
                  $(".print-error-msg").css('display', 'block');
                  if (data.error.dokter) {
                    $(".1").css('display', 'block');
                    $(".1").html(data.error.dokter);
                  } else {
                    $(".1").css('display', 'none');
                  }
                  if (data.error.keterangan) {
                    $(".2").css('display', 'block');
                    $(".2").html(data.error.keterangan);
                  } else {
                    $(".2").css('display', 'none');
                  }
                  Swal.fire(
                    'DATA GAGAL DISIMPAN!',
                    '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">Terjadi kesalahan saat menyimpan data, harap perhatikan kembali!</div>',
                    'error'
                  )
                }
              }
            });
          } else {
            Swal.fire('Data Belum Disimpan', '', 'info')
            return false;
          }
        })
      });
    })
  })
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables/jquery.dataTables.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.html5.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.print.min.js?t=<?php echo time(); ?>">
</script>
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js?t=<?php echo time(); ?>">
</script>

<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-select/js/dataTables.select.min.js?t=<?php echo time(); ?>">
</script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "order": [
        [3, "asc"]
      ],
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2000,
    });
    $("#diagnosa, #keterangan").on("input", function(){
        var regexp = /[^a-zA-Z]/g;
        if($(this).val().match(regexp)){
          $(this).val( $(this).val().replace(regexp,'') );
          Toast.fire({
            icon: 'warning',
            title: ' Tidak Bisa Angka!.'
          })
        }
    });
  });
</script>