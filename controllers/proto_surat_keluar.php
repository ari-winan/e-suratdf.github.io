<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maribelajarcoding.com - Pagination dengan PHP dan Mysql</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div align="center">
    <h3><b>Surat Keluar</b></h3>
  </div>
  <!--Panel Form pencarian -->
  <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading"><b>Pencarian Nomor Surat</b></div>
        <div class="panel-body">
          <form class="form-inline" >
            
            <div class="form-group">
              <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Cari..." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="proto_surat_keluar.php" class="btn btn-danger">Reset</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Tabel data Surat -->
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>No Agd, Jenis Surat</th>
        <th>Perihal</th>
        <th>Tujuan Surat</th>
        <th>No Surat, Tanggal Surat</th>
        <th>File</th>
      </tr>
    </thead>  
    <tbody>
      <?php
      include "../database/koneksi.php";
     
      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
      
      $kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
     
      $kolomKataKunci=(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

      // Jumlah data per halaman
      $limit = 1;

      $limitStart = ($page - 1) * $limit;
      
      //kondisi jika parameter pencarian kosong
      if($kolomKataKunci==""){
        $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar LIMIT ".$limitStart.",".$limit);
      }
      else{
        //kondisi jika parameter kolom pencarian diisi
        $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar WHERE no_surat LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
      }
      
      $no = $limitStart + 1;
      
      while($row = mysqli_fetch_array($SqlQuery)){ 
      ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['no_agenda']; ?>, <?php echo $row['jenis_surat']; ?></td>
                    <td><?php echo $row['perihal']; ?></td>
                    <td><?php echo $row['tujuan']; ?></td>
                    <td><?php echo $row['no_surat']; ?>, <?php echo $row['tgl_kirim']; ?></td>
                    <td><a href="../upload/surat_keluar/<?php echo $row['file']?>" class="btn btn-default btn-xs fa fa-download">&nbsp;<?php echo $row['file']?></a></td>
                  </tr>
      <?php           
      }
      ?>
    </tbody>      
  </table>
  <div align="right">
    <ul class="pagination">
      <?php
        // Jika page = 1, maka LinkPrev disable
        if($page == 1){ 
      ?>        
        <!-- link Previous Page disable --> 
        <li class="disabled"><a href="#">Previous</a></li>
      <?php
        }
        else{ 
          $LinkPrev = ($page > 1)? $page - 1 : 1;  

          if($kolomCari=="" && $kolomKataKunci==""){
          ?>
            <li><a href="proto_surat_keluar.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
       <?php     
          }else{
        ?> 
          <li><a href="proto_surat_keluar.php?KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
         <?php
           } 
        }
      ?>

      <?php
        //kondisi jika parameter pencarian kosong
        if($kolomCari=="" && $kolomKataKunci==""){
          $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar");
        }else{
          //kondisi jika parameter kolom pencarian diisi
          $SqlQuery = mysqli_query($connect, "SELECT * FROM surat_keluar WHERE no_surat LIKE '%$kolomKataKunci%'");
        }     
      
        //Hitung semua jumlah data yang berada pada tabel Sisawa
        $JumlahData = mysqli_num_rows($SqlQuery);
        
        // Hitung jumlah halaman yang tersedia
        $jumlahPage = ceil($JumlahData / $limit); 
        
        // Jumlah link number 
        $jumlahNumber = 1; 

        // Untuk awal link number
        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
        
        // Untuk akhir link number
        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
        
        for($i = $startNumber; $i <= $endNumber; $i++){
          $linkActive = ($page == $i)? ' class="active"' : '';

          if($kolomCari=="" && $kolomKataKunci==""){
      ?>
          <li<?php echo $linkActive; ?>><a href="proto_surat_keluar.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

      <?php
        }else{
          ?>
          <li<?php echo $linkActive; ?>><a href="proto_surat_keluar.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
        }
      }
      ?>
      
      <!-- link Next Page -->
      <?php       
       if($page == $jumlahPage){ 
      ?>
        <li class="disabled"><a href="#">Next</a></li>
      <?php
      }
      else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
       if($kolomCari=="" && $kolomKataKunci==""){
          ?>
            <li><a href="proto_surat_keluar.php?page=<?php echo $linkNext; ?>">Next</a></li>
       <?php     
          }else{
        ?> 
           <li><a href="proto_surat_keluar.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
        }
      }
      ?>
    </ul>
  </div>
</div>

</body>
</html>