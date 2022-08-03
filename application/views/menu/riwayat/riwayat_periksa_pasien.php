<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Riwayat Pemeriksaan Pasien</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Riwayat</li>
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
              <?php if ($this->session->userdata('ses_role') != '' || $this->session->userdata('ses_role') != null) : ?>
                <button data-target="#detailModal" name="detil2" title="Periksa" data-toggle="modal" class="btn btn-primary zoomPilih"><i class="fas fa-plus-square"></i> Tambah Pemeriksaan</button>
              <?php endif; ?>
              <a href="<?php echo base_url() . 'index.php/Welcome/home' ?>" name="batal" class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php if ($this->session->flashdata('pesanHapus')) {
                echo $this->session->flashdata('pesanHapus');
              }; ?>
              <?php if ($this->session->flashdata('pesanAkses')) {
                echo $this->session->flashdata('pesanAkses');
              }; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Poli</th>
                    <th>Dokter</th>
                    <th>Status Akses</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($riwayat)) : foreach ($riwayat as $row) : ?>
                      <tr>
                        <td><?php echo $row['idRiwayat']; ?></td>
                        <td><?php echo $row['nama_pasien']; ?></td>
                        <?php
                        $span;
                        if ($row['idPoli'] == '1') {
                          $span = '<span class ="d-flex justify-content-center badge badge-success text-md">';
                        } elseif ($row['idPoli'] == '2') {
                          $span = '<span class ="d-flex justify-content-center badge badge-primary text-md">';
                        } else {
                          $span = '<span class ="d-flex justify-content-center badge badge-danger text-md">';
                        }
                        ?>
                        <td><?php echo $span . $row['nama_poli']; ?></span></td>
                        <td><?php echo $row['nama_dokter']; ?></span></td>
                        <?php
                        $akses;
                        if ($row['akses'] == '2') {
                          $akses = '<span class ="d-flex justify-content-center badge badge-success text-md">Terbuka</span>';
                        } elseif ($row['akses'] == '1') {
                          $akses = '<span class ="d-flex justify-content-center badge badge-info text-md">Menunggu Izin</span>';
                        } 
                        elseif ($row['akses'] == '3') {
                          $akses = '<span class ="d-flex justify-content-center badge badge-danger text-md">Akses Ditolak</span>';
                        }
                        else {
                          $akses = '<span class ="d-flex justify-content-center badge badge-warning text-md">Tertutup</span>';
                        }
                        ?>
                        <td><?php echo $akses; ?></td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <div class="btn-group ">
                              <form action="<?php echo base_url(); ?>index.php/Welcome/cek" method="post">
                                <input type="text" id="riwayatID" class="form-control" hidden name="riwayatID" value="<?php echo $row['idRiwayat']; ?>" title="enter your password.">
                                <button type="submit" title="Lihat Invoice" data-toggle="modal" name="tombolNich" class="btn btn-info zoomPilih"><i class="fas fa-file-invoice-dollar"></i></button>
                              </form>
                              <?php
                              $dis = '';
                              if ($row['diagnosa'] != null && $row['keterangan'] != null) {
                                $dis = 'disabled';
                                if ($this->session->userdata('akses') == '0') {
                                  $dis = '';
                                }
                              }
                              if ($row['akses'] == 0 || $row['akses'] == 3) {
                                $dis2 = '';
                                $zoom2 = 'zoomPilih';
                                $lock = '<i class="fas fa-user-lock"></i>';
                                $hidden = '';
                              } elseif ($row['akses'] == 1) {
                                $dis2 = 'disabled';
                                $zoom2 = '';
                                $lock = '<i class="fas fa-spinner"></i>';
                                $hidden = '';
                              } else {
                                $hidden = 'hidden';
                                $dis2 = 'disabled';
                                $zoom2 = '';
                                $lock = '';
                              }  ?>
                              <button <?php echo $hidden; ?> data-target="#mintaAkses" name="akses" title="akses" data-id="<?php echo $row['idRiwayat']; ?>" data-toggle="modal" class="btn btn-warning <?php echo $zoom2; ?>" href="#mintaAkses" value="<?php echo $row['idRiwayat']; ?>" <?php echo $dis2; ?>><?php echo $lock; ?></button>
                              <?php
                              if ($row['akses'] == 2) :
                              ?>
                                <button data-target="#detailPemeriksaan" name="detil2" title="Lihat Pemeriksaan" data-kode="<?php echo $row['idRiwayat']; ?>" data-id="<?php echo $row['pasien_no_ktp']; ?>" data-nama="<?php echo $row['nama_pasien']; ?>" data-petugas="<?php echo $row['nama_Petugas']; ?>" data-periksa="<?php echo $row['nama_pemeriksaan']; ?>" data-diagnosa="<?php echo $this->vigenere->decrypt($row['diagnosa'], 'diag'); ?>" data-keterangan="<?php echo $this->vigenere->decrypt($row['keterangan'], 'ket'); ?>" data-toggle="modal" class="btn btn-warning zoomPilih" value="<?php echo $row['pasien_no_ktp']; ?>"><i class="fas fa-eye"></i></button>
                                <!-- <button data-target="#konfirmasiDel" name="detil" title="Hapus"
                                                                  data-id="<?php echo $row['idRiwayat']; ?>" data-toggle="modal"
                                                                  class="btn btn-danger zoomPilih" href="#detailModal"
                                                                  value="<?php echo $row['idRiwayat']; ?>"><i class="fas fa-user-slash"></i></button> -->
                              <?php endif; ?>
                            </div>
                            <button data-target="#konfirmasiDel" name="detil" title="Hapus" data-id="<?php echo $row['idRiwayat']; ?>" data-toggle="modal" class="btn btn-danger" href="#detailModal" value="<?php echo $row['idRiwayat']; ?>" <?php echo $dis; ?>><i class="fas fa-trash"></i></button>
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
                  <textarea type="text" class="form-control" id="diagnosa" name="diagnosa"></textarea>
                  <div class="print-error-msg 1" style="display:none"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label for="message-text5" class="col-form-label">Keterangan: </label>
                  <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
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
<div id="mintaAkses" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Minta izin dokter yang berasngkutan untuk membuka akses pemeriksaaan?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
        <form action="<?php echo base_url(); ?>index.php/Welcome/mintaAkses" method="POST">
          <button id="delAlumni" name="delAlumni" class="btn btn-danger" value="">Ya</a>
        </form>
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
        <form action="<?php echo base_url(); ?>index.php/Welcome/delRiwayat" method="POST">
          <button id="delAlumni" name="delAlumni" class="btn btn-danger" value="">Ya</a>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="detailModal" class="modal fade show" data-keyboard="false" data-backdrop="static">
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
              <?php echo form_open('Welcome/pasienPeriksaBaru', array('id' => 'formModal', 'role' => 'form')); ?>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="message-text2" class="col-form-label">Nama Pasien:</label>
                  <select id="noKTP" name="noKTP" class="custom-select form-control-border">
                    <?php
                    echo "<option disabled selected>Pilih Pasien</option>";
                    foreach ($pasien as $row) { ?>
                      <option value='<?php echo $row['no_ktp']; ?>'>
                        <?php echo $row['nama_pasien']; ?>
                      </option>;
                    <?php }
                    ?>
                  </select>
                </div>
                <div class="form-group col-lg-6">
                  <label for="message-text3" class="col-form-label">Petugas:</label>
                  <input type="text" class="form-control" id="namaPetugas" name="namaPetugas" value="<?php echo $this->session->userdata('ses_nama'); ?>" readonly></input>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="recipient-name" class="col-form-label">Jenis Periksa:</label>
                  <select id="jenisPeriksa" name="jenisPeriksa" class="custom-select form-control-border">
                    <?php

                    echo "<option disabled selected>Pilih Pemeriksaan</option>";
                    foreach ($periksa as $row) { ?>
                      <option name="<?php echo $row['idPemeriksaan']; ?>" value='<?php echo $row['poli_idPoli']; ?>'>
                        <?php echo $row['nama_pemeriksaan']; ?>
                      </option>;
                    <?php }
                    ?>
                  </select>
                  <div class="print-error-msg 2" style="display:none"></div>
                </div>
                <div class="form-group col-lg-6">
                  <label for="recipient-name" class="col-form-label">Dokter:</label>
                  <select name="dokter" id="dokter" class="custom-select form-control-border">
                    <option value="">Pilih Dokter</option>
                  </select>
                  <div class="print-error-msg 3" style="display:none"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-4">
                  <label for="message-text4" class="col-form-label">Tanggal Daftar Periksa:</label>
                  <input type="date" class="form-control" id="tanggal_periksa" name="tanggal_periksa"></input>
                </div>
              </div>
              <button type="button" name="simpan" class="btn btn-success btn-block zoomPilih effect01 simpan"><span><b>Tambah Periksa Baru</b></span>
              </button>
              </form>
              <a href="<?php echo base_url() . 'index.php/Welcome/form'; ?>">Pasien belum Terdaftar?</a>
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
          $("#diagnosa").attr('disabled', false);
          $("#keterangan").attr('disabled', false);
      }
      else {
          $("#diagnosa").attr('disabled', true);
          $("#keterangan").attr('disabled', true);
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
    $('#mintaAkses').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      modal.find('.modal-footer #delAlumni').attr('value', button.data('id'));
    })
    $('#detailModal').on('show.bs.modal', function(event) {
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
      modal.find('.modal-body #noKTP').val(button.data('id'));
      modal.find('.modal-body #namaLengkap').val(button.data('nama'));

      // $('#detailPemeriksaan').on('hidden.bs.modal', function () {
      //     $("#formPeriksa")[0].reset();
      // })
      // modal.find('.modal-body #lihatProfil').attr('value', button.data('ktp'));
      // $('#noHp').click(function () {
      //     phone = button.data('hp');
      //     modal.find('.modal-body #notelepon').html(phone);
      // })
      $('#jenisPeriksa').change(function() {
        var periksaID = $('#jenisPeriksa').val();
        console.log(periksaID);
        if (periksaID != '') {
          $.ajax({
            url: "<?php echo site_url('Welcome/fetch_state'); ?>",
            method: "POST",
            data: {
              periksaID: periksaID
            },
            success: function(data) {
              $('#dokter').html(data);
            }
          });
        } else {
          $('#dokter').html('<option value="">Pilih Dokter</option>');
        }
      });
      $(".simpan").click(function(e) {
        e.preventDefault();
        var periksa = $.trim($("#jenisPeriksa option:selected").text());
        var idPeriksa = $("#jenisPeriksa option:selected").attr('name');
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
            if (!$('select[name="noKTP"]').val()) {
              Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Harap pilih Nama!'
              })
              return false;
            }
            if (!$('select[name="jenisPeriksa"]').val()) {
              Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Harap pilih jenis pemeriksaan!'
              })
              return false;
            }
            if (!$('select[name="dokter"]').val()) {
              Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Harap pilih Dokter!'
              })
              return false;
            }
            var dataForm = $("#formModal").serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo site_url('Welcome/pasienPeriksaBaru'); ?>",
              data: $("#formModal").serialize() + "&moredata=" + periksa + "&moredata2=" + idPeriksa,
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
                      var link = '<?php echo base_url(); ?>index.php/Welcome/riwayat';
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

                  if (data.error.jenisPeriksa) {
                    $(".2").css('display', 'block');
                    $(".2").html(data.error.jenisPeriksa);
                  } else {
                    $(".2").css('display', 'none');
                  }
                  if (data.error.dokter) {
                    $(".3").css('display', 'block');
                    $(".3").html(data.error.dokter);
                  } else {
                    $(".3").css('display', 'none');
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
        [0, "desc"]
      ],
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