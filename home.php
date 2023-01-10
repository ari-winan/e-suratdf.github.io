	<?php
		//menghitung jumlah surat masuk
		$query = "SELECT * FROM surat_masuk";
		$sql = mysqli_query($connect, $query);
		$count1	= mysqli_num_rows($sql); 

		//menghitung jumlah surat keluar
		$query = "SELECT * FROM surat_keluar";
		$sql = mysqli_query($connect, $query);
		$count2	= mysqli_num_rows($sql);  
		 
		//menghitung jumlah surat masuk
		$query = "SELECT * FROM user";
		$sql = mysqli_query($connect, $query);
		$count4	= mysqli_num_rows($sql);  
	?>
	<!-- Info Box -->
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Dashboard</h3>
			</div>
		</div>	
		<div class="clearfix"></div>
		<div class="row top_tiles">
			<a href="admin.php?page=surat_masuk">
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-envelope-o"></i></div>
						<div class="count"><?php echo $count1 ?></div>
						<h3>Surat Masuk</h3>
					</div>
				</div>
			</a>

			<a href="admin.php?page=surat_keluar">
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-envelope-o"></i></div>
						<div class="count"><?php echo $count2 ?></div>
						<h3>Surat Keluar</h3>
					</div>
				</div>
			</a>
				
			<a href="admin.php?page=users">
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-users"></i></div>
						<div class="count"><?php echo $count4 ?></div>
						<h3>Users account</h3>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Grafik Data <small>Persentase</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   <div class="chart" id="chart" style="height: 100%; width: 100%"></div>
                </div>
            </div>
        </div>	
       
		<div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  	<h2>Log activity <small>Lates Update</small></h2>
                  	<ul class="nav navbar-right panel_toolbox">
                    	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    	<li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  	</ul>
                  	<div class="clearfix"></div>
                </div>
                <div class="x_content bs-example-popovers">
                	<?php
                		$query = "SELECT * FROM surat_masuk ORDER BY id DESC LIMIT 1";
                		$sql   = mysqli_query($connect, $query);
                		while ($data1 = mysqli_fetch_array($sql)) {
                	?>
                  	<div class="alert alert-success alert-dismissible fade in" role="alert">
                    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    	Perihal / Isi ringkas <strong><u><?php echo $data1['perihal'] ?></u></strong> Telah di tambahkan ke Surat Masuk.
                  	</div>
                  	<?php } ?>

					<?php
                		$query = "SELECT * FROM surat_keluar ORDER BY id DESC LIMIT 1";
                		$sql   = mysqli_query($connect, $query);
                		while ($data2 = mysqli_fetch_array($sql)) {
                	?>                  	
                 	 <div class="alert alert-info alert-dismissible fade in" role="alert">
                    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    	Perihal / Isi ringkas <strong><u><?php echo $data2['perihal']; ?></u></strong> Telah ditambahkan ke Surat Keluar.
                  	</div>
                  	<?php } ?>
                </div>
            </div>
        </div>
	</div>
		

