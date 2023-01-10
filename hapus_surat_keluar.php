<?php
	include 'koneksi.php';

	$query = "SELECT * FROM surat_keluar WHERE id='$_GET[id]'";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$file = $data['file'];

	//jika filenya ada, hapus filenya
	if (file_exists("upload/surat_keluar/$file")) {
		unlink("upload/surat_keluar/$file");
	}

	$delete	= "DELETE FROM surat_keluar WHERE id='$_GET[id]'";
	$del = mysqli_query($connect, $delete);
	if ($del) {
		echo '<script> 
				window.alert("Data surat keluar berhasil di hapus");
				window.location.href="./admin.php?page=surat_keluar";
			 </script>';
	}else{
		echo '<script> 
				window.alert("Data gagal di hapus");
			 </script>';
	}
?>