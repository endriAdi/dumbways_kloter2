<?php  
require 'functions.php';

if (isset($_POST['tambah'])) {
  if( tambah($_POST)> 0 ){
    echo "<script> 
    alert('data Berhasil ditambahkan');
    document.location.href='4.php';
    </script>";
  }else {
    echo "<script> 
    alert('data gagal ditambahkan');
    document.location.href='4.php';
    </script>";
  }
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

    <title>Tambah berita</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>TAMBAH BERITA</h2>
        </div>
      </div>
      
        <form action=""  method="post" enctype="multipart/form-data">
        <div class="col-md-5">
          <div class="form-group">
            <label>ID USER</label>
            <input type="text" required autocomplete="off" name="id_user" class="form-control">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" required autocomplete="off" name="title" class="form-control">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control" class="foto" onchange="previewImage()">
          </div>
          <img src="img/2.png" width="120" style="display: block;" class="img-preview">
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>Tanggal Kejadian</label>
            <input type="date" required autocomplete="off" name="create_time" class="form-control">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="10"></textarea>
          </div>
        </div>
        <button class="btn btn-primary" name="tambah">Tambahkan</button>
      </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>