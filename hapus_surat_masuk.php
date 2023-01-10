<?php
	include 'koneksi.php';

	$query 	= "SELECT * FROM surat_masuk WHERE id='$_GET[id]'";
	$sql	= mysqli_query($connect, $query);
	$data	= mysqli_fetch_array($sql);
	$file	= $data['file'];

	//jika filenya ada, hapus filenya
	if (file_exists("upload/surat_masuk/$file")) {
		unlink("upload/surat_masuk/$file");
	}

	$delete	= "DELETE FROM surat_masuk WHERE id='$_GET[id]'";
	$del	= mysqli_query($connect, $delete);
	if ($del) {
		echo '<script language=javascript> 
				window.alert("Data surat masuk berhasil di hapus");
				window.location.href="admin.php?page=surat_masuk";
			  </script>';
	}else{
		echo '<script>
				window.alert("Data gagal di hapus, Data Masih tersimpan");
				window.location.href="admin.php?page=surat_masuk";
			  </script>';
	}

?>