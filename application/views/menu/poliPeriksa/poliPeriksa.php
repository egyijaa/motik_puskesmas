<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Poli dan Pemeriksaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PoliPeriksa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-7">

            <div class="card">
              <div class="card-header bg-gradient-lime">
                <div class="row d-flex justify-content-center">
                    <div class="card-title">Daftar Jenis Poli</div>
                </div>
                <br>
                <?php if ($this->session->userdata('akses')=='0') : ?>
                <button data-toggle="modal" name="tambahPoli" href="#modalPoli" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Tambah Jenis Poli</button>
                <?php endif;?>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if($this->session->flashdata('pesanHapus')){echo $this->session->flashdata('pesanHapus');};?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Poli</th>
                    <?php if($this->session->userdata('akses')=='0'):?>
                    <th>Aksi</th>
                    <?php endif;?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($poli)) : foreach ($poli as $row) : ?>
                  <tr>
                    <td><?php echo $row['nama_poli']; ?></td>
                    <?php if($this->session->userdata('akses')=='0'):?>
                    <td>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group ">
                                <button data-target="#konfirmasiDel" name="detil" title="Hapus"
                                                            data-id="<?php echo $row['idPoli']; ?>" data-toggle="modal"
                                                            class="btn btn-danger zoomPilih" href="#detailModal"
                                                            value="<?php echo $row['idPoli']; ?>"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </td>
                    <?php endif;?>
                  </tr>
                  <?php endforeach; endif ; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12">

            <div class="card">
              <div class="card-header bg-gradient-lime">
                <div class="row d-flex justify-content-center">
                    <div class="card-title">Daftar Jenis Pemeriksaan</div>
                </div>
                <br>
                <?php if ($this->session->userdata('akses')=='0') : ?>
                <button data-toggle="modal" name="tambahPemeriksaan" href="#modalPemeriksaan" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Tambah Jenis Pemeriksaan</button>
                <?php endif;?>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if($this->session->flashdata('pesanHapus2')){echo $this->session->flashdata('pesanHapus2');};?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Pemeriksaan</th>
                    <th>Harga Pemeriksaan</th>
                    <th>Jenis Poli</th>
                    <?php if($this->session->userdata('akses')=='0'):?>
                    <th>Aksi</th>
                    <?php endif;?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($pemeriksaan)) : foreach ($pemeriksaan as $row) : ?>
                  <tr>
                    <td><?php echo $row['nama_pemeriksaan']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <?php if ($row['poli_idPoli'] == 1) {
                        $span = '<span class ="d-flex justify-content-center badge badge-success text-md">';
                    }
                    elseif ($row['poli_idPoli'] == 2) {
                        $span = '<span class ="d-flex justify-content-center badge badge-primary text-md">';
                    }
                    else {
                        $span = '<span class ="d-flex justify-content-center badge badge-danger text-md">';
                    }?>
                    <td><?php echo $span.$row['nama_poli']; ?></span></td>
                    <?php if($this->session->userdata('akses')=='0'):?>
                    <td>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group ">
                                <button data-target="#konfirmasiDel2" name="detil" title="Hapus" id="delPem"
                                                            data-id="<?php echo $row['idPemeriksaan']; ?>" data-toggle="modal"
                                                            class="btn btn-danger zoomPilih" href="#detailModal2"
                                                            value="<?php echo $row['idPemeriksaan']; ?>"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </td>
                    <?php endif;?>
                  </tr>
                  <?php endforeach; endif ; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <a href="<?php echo base_url().'index.php/Welcome/home'?>" name="batal" class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <div id="modalPoli" class="modal fade show" data-keyboard="false" data-backdrop="static">
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
                            <?php echo form_open('Welcome/poliBaru', array('id' => 'formPoli', 'role' => 'form'));?>
								<div class="row">
									<div class="form-group col-lg-5">
										<label for="message-text3" class="col-form-label">Petugas: </label>
										<input type="text" class="form-control" id="namaPetugas" name="namaPetugas" value="<?php echo $this->session->userdata('ses_nama'); ?>" readonly></input>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-12">
										<label for="message-text2" class="col-form-label">Nama Jenis Poli: </label>
										<input type="text" class="form-control" id="namaPoli" name="namaPoli"></input>
                                        <div class="print-error-msg 2" style="display:none"></div>
									</div>
								</div>
                                <div class="row">
									<div class="form-group col-lg-5">
                                    <button type="button" name="simpanPoli" class="btn btn-success btn-block zoomPilih effect01 simpanPoli"><span><b>Tambah Poli Baru</b></span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
      <div class="text-center">
                                <button type="button" class="btn btn-secondary btn-block zoomPilih effect01"
                                    data-dismiss="modal"><span><b>Tutup</b></span>
                                </button>
                            </div>
			</div>
		</div>
	</div>
</div>

<div id="modalPemeriksaan" class="modal fade show" data-keyboard="false" data-backdrop="static">
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
                            <?php echo form_open('Welcome/pemeriksaanBaru', array('id' => 'formPemeriksaan', 'role' => 'form'));?>
								<div class="row">
									<div class="form-group col-lg-5">
										<label for="message-text3" class="col-form-label">Petugas: </label>
										<input type="text" class="form-control" id="namaPetugas" name="namaPetugas" value="<?php echo $this->session->userdata('ses_nama'); ?>" readonly></input>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-12">
										<label for="message-text2" class="col-form-label">Nama Jenis Pemeriksaan: </label>
										<input type="text" class="form-control" id="namaPemeriksaan" name="namaPemeriksaan"></input>
                                        <div class="print2-error-msg 1" style="display:none"></div>
									</div>
									<div class="form-group col-lg-5">
										<label for="message-text2" class="col-form-label">Harga Pemeriksaan: </label>
										<input type="number" class="form-control" id="hargaPemeriksaan" name="hargaPemeriksaan"></input>
                                        <div class="print2-error-msg 2" style="display:none"></div>
									</div>
									<div class="form-group col-lg-7">
										<label for="message-text2" class="col-form-label">Nama Jenis Poli: </label>
										<select id ="jenisPoli" name="jenisPoli" class="custom-select form-control-border" >
                                        <?php

                                            echo "<option disabled selected>Pilih Jenis Poli</option>";
                                            foreach ($poli as $row) { ?>
                                            <option value='<?php echo $row['idPoli']; ?>'>
                                            <?php echo $row['nama_poli']; ?>
                                            </option>;
                                            <?php }
                                            ?>
                                        </select>
                                        <div class="print2-error-msg 3" style="display:none"></div>
									</div>
								</div>
                                <div class="row d-flex justify-content-center">
									<div class="form-group col-lg-6">
                                    <button type="button" name="simpanPemeriksaan" class="btn btn-success btn-block zoomPilih effect01 simpanPemeriksaan"><span><b>Tambah Pemeriksaan Baru</b></span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
             <div class="text-center">
                                <button type="button" class="btn btn-secondary btn-block zoomPilih effect01"
                                    data-dismiss="modal"><span><b>Tutup</b></span>
                                </button>
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
                <p>Apakah anda yakin ingin menghapus jenis poli ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                <form action="<?php echo base_url(); ?>index.php/Welcome/delPoli" method="POST">
                    <button id="delAlumni" name="delAlumni" class="btn btn-danger" value="">Ya</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="konfirmasiDel2" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus jenis Pemeriksaan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                <form action="<?php echo base_url(); ?>index.php/Welcome/delPemeriksaan" method="POST">
                    <button id="hapusPemeriksaan" name="hapusPemeriksaan" class="btn btn-danger" value="">Ya</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function () {
        $('#modalPoli').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var ses = "<?php echo $_SESSION['ses_id'] ?>";
            var modal = $(this);
            $(this).on('hidden.bs.modal', function () {
                $("#formPoli")[0].reset();
            })
            $(".simpanPoli").click(function (e) {
              e.preventDefault();
                Swal.fire({
                  icon: 'question',
                  title: 'Apakah sudah mengisi dengan Benar?',
                  text: 'PENTING! HARAP PERHATIKAN DENGAN TELILI, jangan sampai ada kesalahan dalam data!',
                  showCancelButton: true,
                  confirmButtonText: `Submit/Sudah Benar`,
                  cancelButtonText: `Batal/Periksa Kembali`,
                  confirmButtonColor: `#28a745`,
                  cancelButtonColor: '#dc3545',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    if (!$("input[name='namaPoli']").val()) {
                        Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: 'Harap isi nama Poli!'
                        })
                        return false;
                    }
                    var dataForm = $("#formPoli").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Welcome/poliBaru');?>",
                        data: $("#formPoli").serialize(),
                        dataType: "json",
                        success: function (data) {
                            if ($.isEmptyObject(data.error)) {
                                if (data.message == "success") {
                                    Swal.fire(
                                        'DATA TERSIMPAN!',
                                        'Data Jenis Poli Baru Sudah Tersimpan!',
                                        'success'
                                    )
                                    $(".print-error-msg").css('display', 'none');
                                    $(".logo").html("");
                                    setTimeout(function() { 
                                        var link = '<?php echo base_url(); ?>index.php/Welcome/poliPeriksa';
                                        window.location.href=link;
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
                                
                                if (data.error.namaPoli) {
                                    $(".2").css('display', 'block');
                                    $(".2").html(data.error.namaPoli);
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
        $('#modalPemeriksaan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var ses = "<?php echo $_SESSION['ses_id'] ?>";
            var modal = $(this);
            $(this).on('hidden.bs.modal', function () {
                $("#formPemeriksaan")[0].reset();
                $(".print2-error-msg").css('display', 'none');
            })
            $(".simpanPemeriksaan").click(function (e) {
              e.preventDefault();
                Swal.fire({
                  icon: 'question',
                  title: 'Apakah sudah mengisi dengan Benar?',
                  text: 'PENTING! HARAP PERHATIKAN DENGAN TELILI, jangan sampai ada kesalahan dalam data!',
                  showCancelButton: true,
                  confirmButtonText: `Submit/Sudah Benar`,
                  cancelButtonText: `Batal/Periksa Kembali`,
                  confirmButtonColor: `#28a745`,
                  cancelButtonColor: '#dc3545',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    if (!$("input[name='namaPemeriksaan']").val() || !$("input[name='hargaPemeriksaan']").val()) {
                        Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: 'Harap isi nama field yang kosong!'
                        })
                        return false;
                    }
                    if (!$('select[name="jenisPoli"]').val()) {
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Harap pilih jenis Poli!'
                        })
                        return false;
                    }
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Welcome/pemeriksaanBaru');?>",
                        data: $("#formPemeriksaan").serialize(),
                        dataType: "json",
                        success: function (data) {
                            if ($.isEmptyObject(data.error)) {
                                if (data.message == "success") {
                                    Swal.fire(
                                        'DATA TERSIMPAN!',
                                        'Data Jenis Pemeriksaan Baru Sudah Tersimpan!',
                                        'success'
                                    )
                                    $(".print2-error-msg").css('display', 'none');
                                    $(".logo").html("");
                                    setTimeout(function() { 
                                        var link = '<?php echo base_url(); ?>index.php/Welcome/poliPeriksa';
                                        window.location.href=link;
                                    }, 1700);
                                } else {
                                    Swal.fire(
                                        'DATA GAGAL DISIMPAN!',
                                        data.error,
                                        'error'
                                    );
                                }
                            } else {
                                $(".print2-error-msg").css('display', 'block');
                                
                                if (data.error.namaPemeriksaan) {
                                    $(".1").css('display', 'block');
                                    $(".1").html(data.error.namaPemeriksaan);
                                } else {
                                    $(".1").css('display', 'none');
                                }
                                if (data.error.hargaPemeriksaan) {
                                    $(".2").css('display', 'block');
                                    $(".2").html(data.error.hargaPemeriksaan);
                                } else {
                                    $(".2").css('display', 'none');
                                }
                                if (data.error.jenisPoli) {
                                    $(".3").css('display', 'block');
                                    $(".3").html(data.error.jenisPoli);
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
        $('#delAlumni').click(function () {
            Swal.fire({
                title: '<strong><i class="fa fa-thumbs-up"></i> Jenis Poli Berhasil Dihapus</strong>',
                icon: 'info',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
        $('#hapusPemeriksaan').click(function () {
            Swal.fire({
                title: '<strong><i class="fa fa-thumbs-up"></i> Jenis Pemeriksaan Berhasil Dihapus</strong>',
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
                html: 'Jika jenis poli dihapus maka segala hal yang berkaitan dengan jenis poli tersebut juga terhapus<br><br>' +
                    'Seperti<b> riwayat pemeriksaan</b>, yang pernah diunggah/upload!<br><br>' +
                    'Harap Pastikan<b> riwayat pemeriksaan</b> dari jenis poli yang akan dihapus sudah tidak dibutuhkan!',
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Mengerti!',
                confirmButtonAriaLabel: 'Thumbs up, Mengerti!',
            })
        })
        $('#konfirmasiDel2').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('.modal-footer #hapusPemeriksaan').attr('value', button.data('id'));
            Swal.fire({
                title: '<strong>PENTING, MOHON DIBACA!</strong>',
                icon: 'info',
                html: 'Jika jenis pemeriksaan dihapus maka segala hal yang berkaitan dengan jenis pemeriksaan tersebut juga terhapus<br><br>' +
                    'Seperti<b> riwayat pemeriksaan</b>, yang pernah diunggah/upload!<br><br>' +
                    'Harap Pastikan<b> riwayat pemeriksaan</b> dari jenis pemeriksaan yang akan dihapus sudah tidak dibutuhkan!',
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
            "responsive": true, "lengthChange": false, "autoWidth": false,"order": [[ 0, "asc" ]]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example2").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,"order": [[ 0, "asc" ]]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        </script>