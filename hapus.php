<?php  

require 'functions.php';

//mengambil id dari URL
$id=$_GET['id'];

//jika tidak ada id di URL
if (!isset($_GET['id'])) {
	header("location:4.php");
	exit;
}

if (hapus($id) > 0) {
		echo "<script> 
		alert('data Berhasil dihapus');
		document.location.href='4.php';
		</script>";
	} else {
		echo "<script> 
		alert('data gagal dihapus');
		document.location.href='4.php';
		</script>";
	}