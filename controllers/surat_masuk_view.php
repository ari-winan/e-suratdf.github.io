<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SIAS</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="../assets/template/user_view.css" rel="stylesheet">

<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Surat <b>Masuk</b></h2></div>
                    <div class="col-sm-4">
                        <!-- <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div> -->
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
						<th>No Agd, Jenis Surat <i class="fa fa-sort"></i></th>
						<th>Perihal</th>
						<th>Asal Surat</th>
						<th>Nomor, Tanggal Surat <i class="fa fa-sort"></i></th>
						<th>File</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            
                        // jika nilai halaman lebih besar dari 1 maka halaman awal adalah halaman dikali 10 - 10
                        // jika nilai halaman lebih kecil dari 1 maka halaman awal adalah 0
                        $halaman_awal = ($halaman > 1) ? ($halaman * 10) - 10 : 0;

                        $sebelum = $halaman - 1;
                        $setelah = $halaman + 1;

						include '../database/koneksi.php';

						$query = "SELECT * FROM surat_masuk";
						$sql = mysqli_query($connect, $query);
                        $jumlah_data = mysqli_num_rows($sql);
                        $total_halaman = ceil($jumlah_data / 10);
                        $data_surat = mysqli_query($connect, "select * from surat_masuk limit $halaman_awal, 10");
                        $nomor = $halaman_awal + 1;

						while($data = mysqli_fetch_array($data_surat)){
					?>
					<tr>
						<td><?php echo $nomor++; ?></td>
						<th scope="row"><?php echo $data['no_agenda'] ?>, <br> <?php echo $data['jenis_surat'] ?></th>
						<td><?php echo $data['perihal'] ?></td>
						<td><?php echo $data['asal_surat'] ?></td>
						<td><?php echo $data['no_surat'] ?>, <br> <?php echo $data['tgl_surat'] ?></td>
						<td><a href="../upload/surat_masuk/<?php echo $data['file']?>" class="btn btn-default btn-xs fa fa-download">&nbsp;<?php echo $data['file']?></a></td>
					</tr>
				    <?php
						}
					?>   
                </tbody>
            </table>
            <div class="clearfix">
                <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$sebelum'"; } ?>><<</a>
                    </li>
                    <?php 
                        for($x = 1; $x <= $total_halaman; $x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"> <?php echo $x; ?></a></li>
                    <?php
                        }
                    ?> 
                    <li class="page-item">
                        <a  class="page-link" <?php  if($halaman < $total_halaman) { echo "href='?halaman=$setelah'"; } ?>>>></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>  
</div>   
</body>
</html>