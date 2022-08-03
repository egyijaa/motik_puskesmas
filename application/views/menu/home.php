<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">
          <?php if ($this->session->userdata('ses_role')!='' || $this->session->userdata('ses_role')!=null) : ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo $totalDokter?></h3>

                <p>Daftar Dokter</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-md"></i>
              </div>
              <a href="<?php echo base_url().'index.php/Welcome/dokter'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalPetugas?></h3>

                <p>Daftar Petugas</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-cog"></i>
              </div>
              <a href="<?php echo base_url().'index.php/Welcome/petugas'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalPasien?></h3>

                <p>Daftar Pasien</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-injured"></i>
              </div>
              <a href="<?php echo base_url().'index.php/Welcome/pasien'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $totalPoli?></h3>

                <p>Daftar Poli</p>
              </div>
              <div class="icon">
                <i class="fas fa-hospital-user"></i>
              </div>
              <a href="<?php echo base_url(); ?>index.php/Welcome/poliPeriksa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $totalPemeriksaan?></h3>

                <p>Daftar Layanan Pemeriksaan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url(); ?>index.php/Welcome/poliPeriksa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($this->session->userdata('ses_role')=='') : ?>
          <div class="col-lg-6 col-6">
          <?php else: ?>
          <div class="col-lg-4 col-6">
          <?php endif; ?>
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php if ($this->session->userdata('ses_role')=='') : ?>
                <h3><?php echo $totalRiwayatDokter?></h3>
                <?php else: ?>
                  <h3><?php echo $totalRiwayat?></h3>
                  <?php endif; ?>
                <?php if ($this->session->userdata('ses_role')!='' || $this->session->userdata('ses_role')!=null) : ?>
                <p>Riwayat Pemeriksaan</p>
                <?php else: ?>
                <p>Riwayat/Daftar Antrian Pasien</p>
                <?php endif; ?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <?php if ($this->session->userdata('ses_role')=='') : ?>
              <a href="<?php echo base_url(); ?>index.php/Welcome/antrian" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php else: ?>
              <a href="<?php echo base_url(); ?>index.php/Welcome/riwayat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php endif; ?>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-lg-6 col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dokter Hari ini. <span class="badge badge-secondary"><?php setlocale(LC_ALL, 'id-ID', 'id_ID'); echo strftime("%A %d %B %Y", time());?></span></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <?php if (!empty($ready)) : foreach ($ready as $row) : ?>
                <li class="item">
                  <div class="product-info">
                    <a href="#" class="product-title"><?php echo $row['nama_dokter']; ?>
                      <?php 
                          if ($row['nama_poli']=='Poli Gigi') {
                            echo '<span class="badge badge-info float-right">'.$row['nama_poli'];
                          }
                          elseif($row['nama_poli']=='Poli Umum') {
                            echo '<span class="badge badge-success float-right">'.$row['nama_poli']; 
                          }
                          else{
                            echo '<span class="badge badge-danger float-right">'.$row['nama_poli']; 
                          }
                          ?></span></a>
                    <span class="product-description">
                    <?php echo $row['no_hp_dokter']; ?>
                    </span>
                  </div>
                </li>
                <?php endforeach; endif ; ?>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <div class="card">
                <div class="card-header border-0 d-flex justify-content-center">
                  <h3 class="card-title">Petugas Login/Tersedia Hari ini</h3>
                </div>
                <div class="card-body">
                  <?php if (!empty($PetugasLogin)) : foreach ($PetugasLogin as $row) : ?>
                  <div class="d-flex justify-content-end align-items-center border-bottom mb-3">
                    <p class="d-flex flex-column text-right float-right">
                      <span class="font-weight-bold">
                        <?php echo $row['nama_petugas']; ?>
                      </span>
                      <span class="text-muted"><?php echo $row['no_hp']; ?></span>
                    </p>
                  </div>
                  <?php endforeach; endif ; ?>
                </div>
              </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->