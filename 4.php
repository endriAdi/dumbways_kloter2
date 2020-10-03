<?php 
require 'functions.php';
$news=query("SELECT * FROM news LEFT JOIN user ON news.id_user=user.id_user");

//ketika tombol cari di tekan
if (isset($_POST['cari'])) {
  $news=cari($_POST['keyword']);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Soal nomor 4</title>
  </head>
  <body>
    
    <!-- Kontent -->
    <section class="kontent mt-5">
      <div class="container">
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah +</a>

      <form action="" method="post">
        <input type="text" name="keyword" autocomplete="off" autofocus placeholder="Masukan Kata Kunci">
        <button type="submit" name="cari">Cari</button>
      </form><br>
      
      <?php foreach ($news as $n): ?>

        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 23rem;">
              <img src="img/<?php echo $n['image']; ?>" class="card-img-top" alt="...">
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-body pt-0">
              <h3 class="card-title"><?php echo $n['title']; ?></h3>
              <span>Created  by : <strong><?php echo $n['name'] ?></strong></span>
              <p class="card-text mt-2"><?php echo $n['deskripsi']; ?></p>
              <a href="detail.php?id=<?php echo $n['id_news']; ?>" class="btn btn-info">Baca Berita</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
    <!-- Akhir Kontent -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>