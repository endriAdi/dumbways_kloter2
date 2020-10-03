<?php
	$koneksi= new mysqli("localhost","root","","dumbways_kloter2");
	$semuadata=array(); 
	//jika tombol Cari ditekan
	if (isset($_POST["cari"])) 
	{
		$tgl_mulai=$_POST["tglm"];
		$tgl_selesai=$_POST["tgls"];

		$ambil=$koneksi->query("SELECT * FROM news WHERE create_time BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
	}
	 ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Soal nomor 2</title>
</head>
<body>
	
		<div class="container">
			<h2>Laporan Peristiwa</h2><hr>
			<form action="" method="post">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Mulai Tangal</label>
							<input type="date" name="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Sampai Tanggal</label>
							<input type="date" name="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
						</div>
					</div>
					<div class="col-md-2">
						<label>&nbsp;</label><br>
						<button class="btn btn-primary" name="cari">Cari</button>
					</div>
				</div>
			</form>

			<?php foreach ($semuadata as $key => $value): ?>
		        <div class="row">
		          <div class="col-md-4">
		            <div class="card" style="width: 23rem;">
		              <img src="img/<?php echo $value['image']; ?>" class="card-img-top" alt="...">
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="card-body pt-0">
		              <h3 class="card-title"><?php echo $value['title']; ?></h3>
		              <span>Created  by : <strong><?php echo $value['name'] ?></strong></span>
		              <p class="card-text mt-2"><?php echo $value['deskripsi']; ?></p>
		              <a href="detail.php?id=<?php echo $value['id_news']; ?>" class="btn btn-info">Baca Berita</a>
		            </div>
		          </div>
		        </div>
	        <?php endforeach; ?>
		</div>


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>