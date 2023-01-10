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
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
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
                    <div class="col-sm-8"><h2>Surat <b>Keluar</b></h2></div>
                    <div class="col-sm-4">
                        <form class="form-inline">
                            <!-- <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                
                            </div> -->
                            <div class="form-group">
                                <input type="text" name="KataKunci" id="KataKunci" class="form-control" value="<?php if(isset($_GET['KataKunci'])) { echo $_GET['KataKunci']; } ?>" placeholder="Cari&hellip;" required="">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <a href="surat_keluar_view.php" class="btn btn-danger">Reset</a>
                            </div>
                        </form>
                        <form class="form-inline">
                            
                            
                        </form>
                    </div>
                    <div class="col-sm-8">
                        
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
						<th>No Agd, Jenis Surat</i></th>
						<th>Perihal</th>
						<th>Asal Surat</th>
						<th>Nomor, Tanggal Surat</i></th>
						<th>File</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                        include '../database/koneksi.php';

                        $page = (isset($_GET['page']))?(int)$_GET['page'] : 1;
                        
                        $kolomKataKunci = (isset($_GET['KataKunci']))? $_GET['KataKunci']:"";

                        $limit = 10;

                        $limitStart = ($page - 1) * $limit;
                        // jika nilai halaman lebih besar dari 1 maka halaman awal adalah halaman dikali 10 - 10
                        // jika nilai halaman lebih kecil dari 1 maka halaman awal adalah 0
                        // $halaman_awal = ($halaman > 1) ? ($halaman * 10) - 10 : 0;

                        // $sebelum = $halaman - 1;
                        // $setelah = $halaman + 1;

						if($kolomKataKunci == ""){
                            $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar LIMIT ".$limitStart.",".$limit);
                        }else{
                            $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar WHERE no_surat LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
                        }

                        $nomor = $limitStart + 1;

						while($data = mysqli_fetch_array($SqlQuery)){
					?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['no_agenda'] ?>, <br> <?php echo $data['jenis_surat'] ?></td>
                            <td><?php echo $data['perihal'] ?></td>
                            <td><?php echo $data['tujuan'] ?></td>
                            <td><?php echo $data['no_surat'] ?>, <br> <?php echo $data['tgl_kirim'] ?></td>
                            <td><a href="../upload/surat_keluar/<?php echo $data['file']?>" class="btn btn-default btn-xs fa fa-download">&nbsp;<?php echo $data['file']?></a></td>
                        </tr>
				    <?php
						}
					?>   
                </tbody>
            </table>
            <div class="clearfix">
                <ul class="pagination">
                    <li class="page-item">
                        <?php
                            //jika page = 1, link sebelumnya akan disable
                            if($page == 1){
                        ?>
                            <!-- untuk mematikan link sebelumnya -->
                            <li class="disabled"><a href="#">Sebelumnya</a></li>
                            
                            <?php
                            }else{
                                $linkPrev = ($page > 1)? $page - 1 : 1;

                                if($kolomKataKunci == ""){    
                            ?>
                                    <li><a href="surat_keluar_view.php?page=<?php echo $linkPrev; ?>">Sebelumnya</a></li>

                            <?php
                                }else{
                            ?>
                                <li><a href="surat_keluar_view.php?KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkPrev; ?>">Sebelumnya</a></li>

                            <?php
                                }
                            }
                            ?>

                            <?php
                                //kondisi jika parameter pencarian kosong
                                if($kolomKataKunci == ""){
                                    $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar");
                                }else{
                                    //kondisi jika parameter pencarian di isi
                                    $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar WHERE no_surat LIKE '%$kolomKataKunci%'");
                                }
                                //menghitung jumlah data yang berada dalam tabel surat_keluar
                                $jumlahData = mysqli_num_rows($SqlQuery);

                                //menghitung jumlah halaman yang tersedia
                                $jumlahPage = ceil($jumlahData / $limit);

                                $jumlahNumber = 1;

                                $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1;

                                $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage;

                                for($i = $startNumber; $i <= $endNumber; $i++){
                                    $linkActive = ($page == $i)? '  class="page" ':'';
                                    
                                    if($kolomKataKunci == ""){
                            ?>
                                        <li<?php echo $linkActive; ?>><a href="surat_keluar_view.php?page=<?php echo $i; ?>"><?php echo $i ?></a></li>

                                <?php

                                    }else{
                                ?>
                                    <li<?php echo $linkActive; ?>><a href="surat_keluar_view.php?KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                    <?php
                                    }
                                }
                                ?>

                        <!-- halaman berikutnya  -->
                        <?php
                            if($page == $jumlahPage){
                        ?>
                            <li class="disabled"><a href="#">Berikutnya</a></li>
                        
                        <?php
                            }else{
                                $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
                                if($kolomKataKunci == ""){
                        ?>
                                    <li><a href="surat_keluar_view.php?page=<?php echo $linkNext; ?>">Berikutnya</a></li>
                            <?php
                                }else{
                            ?>
                                    <li><a href="surat_keluar_view.php?KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $linkNext; ?>">Berikutnya</a></li>
                            <?php
                                }
                            }
                            ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>  
</div>   
</body>
</html>