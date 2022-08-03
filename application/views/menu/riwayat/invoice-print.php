<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MotikPunye | Invoice Print</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>/assets/adminLte/plugins/fontawesome-free/css/all.min.css?t=<?php echo time();?>">
	<!-- Theme style -->
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>/assets/adminLte/dist/css/adminlte.min.css?t=<?php echo time();?>">
</head>

<body>
	<div class="wrapper">
		<!-- Main content -->
		<section class="invoice">
			<!-- title row -->
			<div class="row">
				<div class="col-12">
					<h2 class="page-header">
						<i class="fas fa-globe"></i> AdminLTE, Inc.
						<small class="float-right">Date: 2/10/2014</small>
					</h2>
				</div>
				<!-- /.col -->
			</div>
      <?php if (!empty($detail)) : foreach ($detail as $row) : ?>
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
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $row['nama_pemeriksaan']; ?></td>
								<td><?php echo $row['nama_poli']; ?></td>
								<td><?php echo $this->vigenere->decrypt($row['keterangan'], 'ket'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<div class="row">
				<!-- accepted payments column -->
				<div class="col-6">
					<p class="lead">Payment Methods:</p>
					<i class="fab fa-cc-visa"></i> Visa
					<i class="fab fa-cc-mastercard"></i> MasterCard
					<i class="fab fa-cc-paypal"></i> Paypay
				</div>
				<!-- /.col -->
				<div class="col-6">
					<p class="lead">Amount Due 2/22/2014</p>

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
				<!-- /.col -->
			</div>
      <?php endforeach; endif ; ?>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- ./wrapper -->
	<!-- Page specific script -->
	<script>
		window.addEventListener("load", window.print());
	</script>
</body>

</html>
