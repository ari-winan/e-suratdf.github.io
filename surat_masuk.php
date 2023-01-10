	<div class="">
 		<div class="page-title">
 			<div class="title_left">
 				<h3>Surat Masuk</h3>
 			</div>
 		</div>
 		<div class="clearfix"></div>

 		<div class="row">
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="x_panel">
 					<div class="x_title">
 						<h2>Data Surat Masuk</h2>&nbsp; &nbsp;<a href="admin.php?page=tambah_surat_masuk" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Surat Masuk</a>
 						<ul class="nav navbar-right panel_toolbox">
 							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
 						</ul>
 						<div class="clearfix"></div>
 					</div>
 					<div class="x_content">
 						<table id="surat_masuk" class="table table-striped table-bordered table-hover">
 							<thead>
 								<tr style="font-size: 13px;">
 									<th width="1" style="vertical-align: middle;">No</th>
 									<th><center>No Agd,<br>Jenis Surat</center></th>
 									<th><center>Isi Ringkas,<br> File</center></th>
 									<th style="vertical-align: middle;"><center>Asal Surat</center></th>
 									<th><center>Nomor,<br> Tanggal Surat</center></th>
 									<th style="vertical-align: middle;"><center>Action</center></th>
 								</tr>
 							</thead>
 							<tbody>
 								<tr>
 									<?php
 										$no=1;
 										$sql = "SELECT * FROM surat_masuk";
 										$result	= mysqli_query($connect, $sql);
 									    while ($data = mysqli_fetch_array($result)){
 									?>
 									<td width="1" style="vertical-align: middle;"><?php echo $no++; ?></td>
 									<td style="vertical-align: middle;"><?php echo $data['no_agenda'] ?>,<br> <?php echo $data['jenis_surat']; ?></td>
 									<td style="vertical-align: middle;"><?php echo $data['perihal'] ?><br> <b>FILE :</b>
 										<a href="upload/surat_masuk/<?php echo $data['file']?>" class="btn btn-default btn-xs fa fa-download">&nbsp;<?php echo $data['file'];?></a>
 									</td>
 									<td style="vertical-align: middle;"><?php echo $data['asal_surat'] ?></td>
 									<td style="vertical-align: middle;"><?php echo $data ['no_surat'] ?>,<br><?php echo IndonesiaTgl($data['tgl_surat']) ?></td>
 									<td>
 										<center>
 											<a href="admin.php?page=edit_surat_masuk&id=<?php echo $data['id']; ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
 											<a href="admin.php?page=hapus_surat_masuk&id=<?php echo $data['id'] ?>" class="btn btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
 										</center>
 									</td>
 								</tr>
 									<?php } ?>
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>