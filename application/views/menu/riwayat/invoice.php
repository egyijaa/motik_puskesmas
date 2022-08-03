<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>

            <?php if (!empty($detail)) : foreach ($detail as $row) : ?>
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Puskesmas Desa.
                    <small class="float-right text-cyan">Tanggal Periksa: <?php $date = date("H:i d-M-Y", strtotime($row['tanggal_periksa'])); echo $date;?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <span class="text-md">Dokter: </span><b><?php echo $row['nama_dokter']; ?></b>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Pasien
                  <address>
                    <strong><?php echo $row['nama_pasien']; ?></strong><br>
                    <?php echo $row['pasien_no_ktp']; ?><br>
                    HP: <?php echo $row['no_hp']; ?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Riwayat ID:</b> PUS--<?php echo $row['idRiwayat']; ?><br>
                  <span class="text-md">Petugas: </span><b><?php echo $row['nama_Petugas']; ?></b>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Jenis Pemeriksaan</th>
                      <th>Jenis Poli</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?php echo $row['nama_pemeriksaan']; ?></td>
                      <td><?php echo $row['nama_poli']; ?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <i class="fab fa-cc-visa"></i> Visa
                  <i class="fab fa-cc-mastercard"></i> MasterCard
                  <i class="fab fa-cc-paypal"></i> Paypay
                </div>
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <!-- <form action="<?php echo base_url(); ?>index.php/Welcome/print" method="post">
                                    <input type="text" id="riwayatID" class="form-control" hidden
                                                            name="riwayatID" value="<?php echo $id; ?>"
                                                            title="enter your password.">
                                    <button type="submit" title="Detail" name="tombolNich"
                                    rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                                </form> -->
                  <?php if (!empty($id)) : ?>
                  <a href="<?php echo site_url("Welcome/print/" . $id)?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <?php else:?>
                  <a href="<?php echo site_url("Welcome/print/" . $row['idRiwayat'])?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <?php endif ; ?>
                  <?php if ($this->session->userdata('ses_role')!='' || $this->session->userdata('ses_role')!=null) : ?>
                  <a href="<?php echo base_url().'index.php/Welcome/riwayat'?>" name="batal" class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                  <?php else: ?>
                  <a href="<?php echo base_url().'index.php/Welcome/antrian'?>" name="batal" class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
          <?php endforeach; endif ; ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>