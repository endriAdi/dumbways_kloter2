<?php

function koneksi(){
	return mysqli_connect('localhost', 'root', '', 'dumbways_kloter2');
}

function query($query)
{
	$conn=koneksi();

	$result = mysqli_query($conn, $query);

	//jika hasilnya hanya 1 data
	if (mysqli_num_rows($result)==1) {
		return mysqli_fetch_assoc($result);
	}

	$rows=[];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}

	return $rows;
}

function tambah($data){
	$conn=koneksi();

	$title=htmlspecialchars($data['title']);
	// $image=htmlspecialchars($data['image']);
	$deskripsi=htmlspecialchars($data['deskripsi']);
	$create_time=htmlspecialchars($data['create_time']);
	$id_user=htmlspecialchars($data['id_user']);
	
	$image=upload();
	if (!$image) {
		return false;
	}

	$query="INSERT INTO news VALUES (null,'$id_user', '$title', '$image', '$deskripsi', '$create_time')";
	
	mysqli_query($conn, $query)OR die(mysqli_error($conn));

	return mysqli_affected_rows($conn);
}

function hapus($id){
	$conn=koneksi();
	//menghapus foto di folder
	$news=query("SELECT * FROM news WHERE id_news=$id");
	if ($news['image'] !='2.png') {
		unlink('img/' . $news['image']);
	}
	mysqli_query($conn, "DELETE FROM news WHERE id_news=$id") OR die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function ubah($data){
	$conn=koneksi();

	$id=$data['id_news'];
	$title=htmlspecialchars($data['title']);
	$foto_lama=htmlspecialchars($data['foto_lama']);
	$deskripsi=htmlspecialchars($data['deskripsi']);
	$create_time=htmlspecialchars($data['create_time']);
	$id_user=htmlspecialchars($data['id_user']);
	

	$image=upload();
	if (!$image) {
		return false;
	}

	if ($image=='2.png') {
		$image=$foto_lama;
	}

	$query="UPDATE news SET
			id_user='$id_user',
			title='$title',
			image='$image',
			deskripsi='$deskripsi',
			create_time='$create_time' 
			WHERE id_news=$id
			";
	
	mysqli_query($conn, $query)OR die(mysqli_error($conn));

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$conn=koneksi();
	$query="SELECT * FROM news LEFT JOIN user ON news.id_user=user.id_user WHERE 
		title LIKE '%$keyword%' OR
		deskripsi LIKE '%$keyword%' OR
		create_time LIKE '%$keyword%' OR
		name LIKE '%$keyword%'
		";

	$result=mysqli_query($conn, $query);
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}

	return $rows;
}

function upload()
{
	$nama_file=$_FILES['image']['name'];
	$tipe_file=$_FILES['image']['type'];
	$ukuran_file=$_FILES['image']['size'];
	$error=$_FILES['image']['error'];
	$tmp_file=$_FILES['image']['tmp_name'];

	//ketika tidak ada gambar yg dipilih
	if ($error==4) {
		// echo "<script> alert('Pilih Gambar terlebih dahulu'); </script>";
		return '2.png';
	}

	//cek ekstensi file
	$daftar_gambar=['jpg', 'jpeg', 'png'];
	$ekstensi_file=explode('.', $nama_file);
	$ekstensi_file=strtolower(end($ekstensi_file));
	if (!in_array($ekstensi_file, $daftar_gambar)) {
		echo "<script> alert('Yang anda pilih bukan gambar'); </script>";
		return false;
	}

	//cek tipe file
	if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
		echo "<script> alert('Yang anda pilih bukan gambar'); </script>";
		return false;
	}

	//cek ukuran file max 5 mb ==  5000000 bit
	if ($ukuran_file > 5000000) {
		echo "<script> alert('Ukuran Gambar Terlalu besar'); </script>";
		return false;
	}

	//generate ke nama file yang baru
	$nama_file_baru=uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $ekstensi_file;
	//lolos pengecekan dan siap  upload foto
	move_uploaded_file($tmp_file, 'img/' .$nama_file_baru);

	return $nama_file_baru;
}