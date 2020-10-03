<?php  
Require 'functions.php';

$id=$_GET['id'];
$n=query("SELECT * FROM news WHERE id_news=$id");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Detail Berita</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h3><?php echo $n['title'] ?></h3>
          <p>Tanggal kejadian : <?php echo $n['create_time'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <img src="img/<?php echo $n['image'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p><?php echo $n['deskripsi'] ?></p>
        </div>
      </div>
      <a href="ubah.php?id=<?php echo $n['id_news']; ?>" class="btn btn-success">Ubah</a>
      <a href="hapus.php?id=<?php echo $n['id_news']; ?>" class="btn btn-danger">Hapus</a>
      <a href="4.php" class="btn btn-primary">Kembali</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>