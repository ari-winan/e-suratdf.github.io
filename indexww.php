<!-- <!doctype html>
<html lang="en">
	<head>
  	<title>SIAS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/templateBeranda/css/style.css">

	</head>
	
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Surat Masuk</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped">
						  <thead>
						    <tr>
						      <th>No</th>
						      <th>No Agd, Jenis Surat</th>
						      <th>Perihal</th>
						      <th>Asal Surat</th>
						      <th>Nomor, Tanggal Surat</th>
						      <th>File</th>
						    </tr>
						  </thead>
						  <tbody>
						    <?php
								include 'database/koneksi.php';

								$no = 1;
								$query = "SELECT * FROM surat_masuk";
								$sql = mysqli_query($connect, $query);
								while($data = mysqli_fetch_array($sql)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<th scope="row"><?php echo $data['no_agenda'] ?>, <br> <?php echo $data['jenis_surat'] ?></th>
								<td><?php echo $data['perihal'] ?></td>
								<td><?php echo $data['asal_surat'] ?></td>
								<td><?php echo $data['no_surat'] ?>, <br> <?php echo $data['tgl_surat'] ?></td>
								<td><a href="upload/surat_masuk/<?php echo $data['file']?>" class="btn btn-default btn-xs fa fa-download">&nbsp;<?php echo $data['file']?></a></td>
							</tr>
							<?php
								}
							?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/templateBeranda/js/jquery.min.js"></script>
  <script src="assets/templateBeranda/js/popper.js"></script>
  <script src="assets/templateBeranda/js/bootstrap.min.js"></script>
  <script src="assets/templateBeranda/js/main.js"></script>

	</body>
</html>
 -->
