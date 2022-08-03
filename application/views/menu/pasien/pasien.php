<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pasien</li>
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
                <?php if ($this->session->userdata('ses_role')!='' || $this->session->userdata('ses_role')!=null) : ?>
                <a href="<?php echo base_url().'index.php/Welcome/form'?>" name="tambahPasien" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Pasien</a>
                <?php endif; ?>
                <a href="<?php echo base_url().'index.php/Welcome/home'?>" name="batal" class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if($this->session->flashdata('pesanHapus')){echo $this->session->flashdata('pesanHapus');};?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>Nomor KTP</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($pasien)) : foreach ($pasien as $row) : ?>
                  <tr>
                    <td><?php echo $row['nama_pasien']; ?></td>
                    <td><span class ="d-flex justify-content-center badge badge-primary text-md"><?php echo $row['no_ktp']; ?></span></td>
                    <td><p class=" bg-gradient-success text-center text-bold">
                                                        <?php $date = date("d-M-Y H:i", strtotime($row['daftar'])); echo $date;?>
                                                    </p>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group ">
                                <button type="button" title="Riwayat" data-toggle="modal" name="tombolNich"
                                                            data-ses="<?php $this->session->userdata('ses_id') ?>"
                                                            data-ktp="<?php echo $row['no_ktp']; ?>"
                                                            data-hp="<?php echo $row['no_hp']; ?>"
                                                            data-kota="<?php echo $row['nama_kota']; ?>"
                                                            data-tanggal="<?php echo $row['tgl_lahir']; ?>"
                                                            data-alamat="<?php echo $row['alamat']; ?>"
                                                            class="btn btn-info zoomPilih" href="#detailRiwayat"><i class="fas fa-info-circle"></i><?php $egy=16; echo"hasilnya : $egy";?></button>
                                <button type="button" title="Detail" data-toggle="modal" name="tombolNich"
                                                            data-ses="<?php $this->session->userdata('ses_id') ?>"
                                                            data-ktp="<?php echo $row['no_ktp']; ?>"
                                                            data-nama="<?php echo $row['nama_pasien']; ?>"
                                                            data-hp="<?php echo $row['no_hp']; ?>"
                                                            data-kota="<?php echo $row['nama_kota']; ?>"
                                                            data-tanggal="<?php echo $row['tgl_lahir']; ?>"
                                                            data-alamat="<?php echo $row['alamat']; ?>"
                                                            class="btn btn-info zoomPilih" href="#detailModal"><i class="fas fa-info-circle"></i></button>
                                <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                <button data-target="#konfirmasiDel" name="detil" title="Hapus"
                                                            data-id="<?php echo $row['no_ktp']; ?>" data-toggle="modal"
                                                            class="btn btn-danger zoomPilih" href="#detailModal"
                                                            value="<?php echo $row['no_ktp']; ?>"><i class="fas fa-user-slash"></i></button>
                                <button data-target="#detailPemeriksaan" name="detil2" title="Periksa"
                                                            data-id="<?php echo $row['no_ktp']; ?>" data-nama="<?php echo $row['nama_pasien']; ?>" data-toggle="modal"
                                                            class="btn btn-success zoomPilih"
                                                            value="<?php echo $row['no_ktp']; ?>"><i class="fas fa-plus-square"></i></button>
                                <?php endif;?>
                            </div>
                        </div>
                    </td>
                  </tr>
                  <?php endforeach; endif ; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>Nomor KTP</th>
                    <th>Tanggal Terdaftar</th>
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
                <h4 class="modal-title">DATA PASIEN</h4>
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
                                <?php if ($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1') : ?>
                                <li id="no_ktp" class="list-group-item fas fa-id-card" value="0" ;>
                                    <a id="ktp" class="float-right"></a>
                                </li>
                                <li id="noHp" class="list-group-item fas fa-phone-square-alt" value="0" ;>
                                    <a id="notelepon" class="float-right"></a>
                                </li>
                                <li id="city" class="list-group-item fas fa-baby" value="0" ;>
                                    <a id="kota" class="float-right"></a>
                                </li>
                                <li id="born" class="list-group-item fas fa-calendar-day" value="0" ;>
                                    <a id="tanggal" class="float-right"></a>
                                </li>
                                <li id="address" class="list-group-item fas fa-map-marker-alt" value="0" ;>
                                    <a id="alamat" class="float-right"></a>
                                </li>
                                <?php else : ?>
                                <?php endif; ?>
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
             <?php echo form_open('Welcome/pasienPeriksaBaru', array('id' => 'formPeriksa', 'role' => 'form'));?>
								<div class="row">
									<div class="form-group col-lg-3">
										<label for="message-text1" class="col-form-label">Nomor KTP:</label>
										<input type="text" class="form-control" id="noKTP" name="noKTP" readonly></input>
									</div>
									<div class="form-group col-lg-4">
										<label for="message-text2" class="col-form-label">Nama Pasien:</label>
										<input type="text" class="form-control" id="namaLengkap" name="namaLengkap" readonly></input>
									</div>
									<div class="form-group col-lg-5">
										<label for="message-text3" class="col-form-label">Petugas:</label>
										<input type="text" class="form-control" id="namaPetugas" name="namaPetugas" value="<?php echo $this->session->userdata('ses_nama'); ?>" readonly></input>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-6">
										<label for="recipient-name" class="col-form-label">Keperluan Pasien:</label>
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
										<label for="recipient-name" class="col-form-label">Daftar Dokter Hari ini:</label>
										<select name="dokter" id="dokter" class="custom-select form-control-border">
											<option value="">Pilih Dokter</option>
										</select>
                    <div class="print-error-msg 3" style="display:none"></div>
									</div>
								</div>
                <div class="row">
									<div class="form-group col-lg-4">
										<label for="message-text4" class="col-form-label">Tanggal Daftar Periksa:</label>
										<input type="date" class="form-control" id="tanggal_periksa" name="tanggal_periksa" readonly value="<?php date_default_timezone_set("Asia/Bangkok"); echo date("d-M-Y",time());?>"></input>
									</div>
								</div>
                <button type="button" name="simpan" class="btn btn-success btn-block zoomPilih effect01 simpan"><span><b>Tambah Periksa Baru</b></span>
                </button>
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
                <p>Apakah anda yakin ingin menghapus user ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                <form action="<?php echo base_url(); ?>index.php/Welcome/delPasien" method="POST">
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
            var a = button.data('ktp');
            phone = phone1.toString().slice(0, -5) + "xxxxx";
            var modal = $(this);
            var format = new Date(button.data('tanggal'));
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            // modal.find('.modal-body #profilDetail').attr('src',
            //     "<?php echo base_url(); ?>/assets/image/foto_profil/" + button.data('foto_profil'));
            modal.find('.modal-body #namalengkap').html(button.data('nama'));
            // modal.find('.modal-body #status').html(button.data('status') + " : " + button.data(
            //     'keterangan'));
            modal.find('.modal-body #ktp').html(a);
            modal.find('.modal-body #notelepon').html(phone);
            modal.find('.modal-body #tanggal').html(format.toLocaleDateString("en-US", options));
            // modal.find('.modal-body #resetPassword').html('Reset Password');
            // modal.find('.modal-body #resetPassword').attr('value', button.data('username'));
           
            modal.find('.modal-body #alamat').html(button.data('alamat'));
            modal.find('.modal-body #kota').html(button.data('kota'));
            if (a == ses) {
                var para = document.createElement("BUTTON");
                para.id = 'baru';
                para.className = 'btn btn-info btn-block zoomPilih'; // Create a <p> element
                para.innerHTML = "<b>Update Profil</b>"; // Insert text
                document.getElementById("tampil").appendChild(para);
                $("#lihatProfil").attr('hidden', true);
            }
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
        $('#detailPemeriksaan').on('show.bs.modal', function (event) {
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

            $('#detailPemeriksaan').on('hidden.bs.modal', function () {
                $("#formPeriksa")[0].reset();
            })
            // modal.find('.modal-body #lihatProfil').attr('value', button.data('ktp'));
            // $('#noHp').click(function () {
            //     phone = button.data('hp');
            //     modal.find('.modal-body #notelepon').html(phone);
            // })
            $('#jenisPeriksa').change(function(){
              var periksaID = $('#jenisPeriksa').val();
              if(periksaID != '')
              {
                $.ajax({
                  url:"<?php echo site_url('Welcome/fetch_state');?>",
                  method:"POST",
                  data:{periksaID:periksaID},
                  success:function(data)
                  {
                    $('#dokter').html(data);
                  }
                });
              }else {
                $('#dokter').html('<option value="">Pilih Dokter</option>');
              }
            });
            $(".simpan").click(function (e) {
                console.log($('#noKTP').val());
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
                    var dataForm = $("#formPeriksa").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Welcome/pasienPeriksaBaru');?>",
                        data: $("#formPeriksa").serialize() + "&moredata=" + periksa + "&moredata2=" + idPeriksa,
                        dataType: "json",
                        success: function (data) {
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
            "responsive": true, "lengthChange": false, "autoWidth": false,"order": [[ 2, "desc" ]],
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