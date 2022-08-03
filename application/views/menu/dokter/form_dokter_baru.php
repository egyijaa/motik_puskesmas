<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Dokter Baru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Dokter Baru</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<!-- left column -->
        	<div class="col-md-12">
        		<!-- jquery validation -->
        		<div class="card card-primary">
        			<div class="card-header">
        				<h3 class="card-title">Data Dokter</h3>
        			</div>
        			<!-- /.card-header -->
        			<!-- form start -->
        			<?php echo form_open('Welcome/dokterbaru', array('id' => 'form', 'role' => 'form'));?>
        			<div class="card-body">
        				<div class="form-group">
        					<label>Nama Dokter</label>
        					<!-- <input type="text" name="form_intitule2" class="form-control" placeholder="Nama Lengkap"> -->
        					<?php echo form_input('form_intitule', '', array('class' => 'form-control', 'type' => 'text', 'placeholder' => 'Nama Lengkap', 'id' => 'form_intitule'));?>
        					<div class="print-error-msg 1" style="display:none"></div>
        				</div>
        				<div class="form-group">
        					<label>Username</label>
        					<!-- <input type="text" name="form_intitule2" class="form-control" placeholder="Nama Lengkap"> -->
        					<?php echo form_input('form_intitule6', '', array('class' => 'form-control', 'type' => 'text', 'placeholder' => 'Username', 'id' => 'form_intitule6'));?>
        					<div class="print-error-msg 6" style="display:none"></div>
        				</div>
        				<div class="form-group">
        					<label for="exampleInputPassword1">Nomor Hp Dokter</label>
        					<?php echo form_input('form_intitule2', '', array('class' => 'form-control noSpace noLetter', 'type' => 'number', 'placeholder' => 'Nomor Telepon', 'id' => 'form_intitule2'));?>
        					<div class="print-error-msg 2" style="display:none"></div>
        				</div>
        				<div class="form-group">
        					<label>Jenis Poli</label>
        					<select id="poliPilihan" name="poliPilihan" class="custom-select form-control-border">
        						<?php

                    echo "<option disabled selected>Pilih Jenis Poli</option>";
                    foreach ($poli as $row) { ?>
        						<option value='<?php echo $row['idPoli']; ?>'>
        							<?php echo $row['nama_poli']; ?>
        						</option>;
        						<?php }
                    ?>
        					</select>
        					<div class="print-error-msg 3" style="display:none"></div>
        				</div>
        				<!-- iCheck -->
        				<div class="card card-success">
        					<div class="card-header">
        						<h3 class="card-title">Pilih Hari Kerja</h3>
        					</div>
        					<div class="card-body">
        						<!-- Minimal style -->
        						<div class="row">
        							<?php if (!empty($hari)) : foreach ($hari as $row) : ?>
        							<div class="col-sm-3">
        								<!-- checkbox -->
        								<div class="form-group clearfix">
        									<div class="icheck-primary d-inline">
        										<input name="checkboxPrimary[]" type="checkbox" value="<?php echo $row['idHari']; ?>" id="checkboxPrimary<?php echo $row['idHari']; ?>">
        										<label for="checkboxPrimary<?php echo $row['idHari']; ?>">
        											<?php echo $row['nama_hari']; ?>
        										</label>
        									</div>
        								</div>
        							</div>
        							<?php endforeach; endif ; ?>
        						</div>
        						<div class="print-error-msg 4" style="display:none"></div>
        					</div>
        				</div>
        				<!-- /.card-body -->
        				<div class="card-footer">
        					Many more skins available. <a href="https://bantikyan.github.io/icheck-bootstrap/">Documentation</a>
        				</div>
                <div class="form-group">
                  <label>Alamat</label>
                  <?php echo form_input('form_intitule3', '', array('class' => 'form-control', 'type' => 'text', 'placeholder' => 'Alamat Domisili', 'id' => 'form_intitule3'));?>
                  <div class="print-error-msg 5" style="display:none"></div>
        			  </div>
        			</div>
        			<!-- /.card -->
        		</div>
        		<!-- /.card-body -->
        		<div class="card-footer">
        			<button type="button" name="simpan" class="btn btn-primary simpan"><i class="fas fa-pen-square"></i>
        				Submit</button>
        			<button type="reset" name="batal" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i>
        				Batal</button>
        			<a href="<?php echo base_url().'index.php/Welcome/dokter'?>" name="batal" class="btn btn-secondary"><i
        					class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
        		</div>
        		</form>
        	</div>
        	<!-- /.card -->
        </div>
        <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="../../" src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-validation/jquery.validate.min.js?t=<?php echo time();?>"></script>
  <script src="../../" src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-validation/additional-methods.min.js?t=<?php echo time();?>"></script>
<script>

    $(".simpan").click(function (e) {
        e.preventDefault();
          console.log($("#form").serialize());
            var spinner = $('#loader');
            Swal.fire({
                icon: 'question',
                title: 'Apakah sudah mengisi dengan Benar?',
                showCancelButton: true,
                confirmButtonText: `Submit/Sudah Benar`,
                cancelButtonText: `Batal/Periksa Kembali`,
                confirmButtonColor: `#28a745`,
                cancelButtonColor: '#dc3545',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    if (!$("input[name='form_intitule6']").val() || !$("input[name='form_intitule']").val() || !$("input[name='form_intitule2']").val() ||
        !$("input[name='form_intitule3']").val()) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap isi semua field yang ada!'
            })
            return false;
        }
        if (!$('input[name="checkboxPrimary[]"]').is(':checked')) {
          Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap pilih hari kerja minimal 1!'
            })
            return false;
        }
        if (!$('select[name="poliPilihan"]').val()) {
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Harap pilih Jenis Poli Dokter!'
            })
            return false;
        }
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Welcome/dokterbaru');?>",
                        data: $("#form").serialize(),
                        dataType: "json",
                        success: function (data) {
                            if ($.isEmptyObject(data.error)) {
                                if (data.message == "success") {
                                    Swal.fire(
                                        'DATA TERSIMPAN!',
                                        'Data Pasien Sudah Tersimpan!',
                                        'success'
                                    )
                                    $(".print-error-msg").css('display', 'none');
                                    $(".logo").html("");
                                    $("#form")[0].reset();
                                    setTimeout(function() { 
                                        var link = '<?php echo base_url(); ?>index.php/Welcome/dokter';
                                        window.location.href=link;
                                    }, 1500);
                                } else {
                                    Swal.fire(
                                        'DATA GAGAL DISIMPAN!',
                                        data.error,
                                        'error'
                                    );
                                }
                            } else {
                                $(".print-error-msg").css('display', 'block');
                                if (data.error.form_intitule) {
                                    $(".1").css('display', 'block');
                                    $(".1").html(data.error.form_intitule);
                                } else {
                                    $(".1").css('display', 'none');
                                }
                                if (data.error.form_intitule6) {
                                    $(".6").css('display', 'block');
                                    $(".6").html(data.error.form_intitule6);
                                } else {
                                    $(".6").css('display', 'none');
                                }
                                if (data.error.form_intitule2) {
                                    $(".2").css('display', 'block');
                                    $(".2").html(data.error.form_intitule2);
                                } else {
                                    $(".2").css('display', 'none');
                                }
                                if (data.error.poliPilihan) {
                                    $(".3").css('display', 'block');
                                    $(".3").html(data.error.poliPilihan);
                                } else {
                                    $(".3").css('display', 'none');
                                }
                                if (data.error.checkboxPrimary) {
                                    $(".4").css('display', 'block');
                                    $(".4").html(data.error.checkboxPrimary);
                                } else {
                                    $(".4").css('display', 'none');
                                }
                                if (data.error.form_intitule3) {
                                    $(".5").css('display', 'block');
                                    $(".5").html(data.error.form_intitule3);
                                } else {
                                    $(".5").css('display', 'none');
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
    })
    $(document).ready(function () {
        // do not allow users to enter spaces:
        $(".noSpace").on({
            keydown: function (event) {
                if (event.which === 32)
                    return false;
            }
        });
        $(document).on('paste', ".noSpace", function (e) {
            e.preventDefault();
            // prevent copying action
            var withoutSpaces = e.originalEvent.clipboardData.getData('Text');
            withoutSpaces = withoutSpaces.replace(/\s+/g, '');
            $(this).val(withoutSpaces);
            // you need to use val() not text()
        });
        $(".noLetter").bind('paste', function (e) {
            var self = this;
            setTimeout(function (e) {
                var val = $(self).val();
                if (val != '0') {
                    var regx = new RegExp(/^[0-9]+$/);
                    if (!regx.test(val)) {
                        $(".noLetter").val("");
                    }
                    $(this).val(val);
                }
            }, 0);
        });
    });
    $(function () {
            $(".noLetter").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("Hanya Angka!").show().fadeOut("slow");
                    return false;
                }
            });
    })
</script>