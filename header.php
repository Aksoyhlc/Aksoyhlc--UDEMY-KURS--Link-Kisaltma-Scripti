<?php 
require 'islemler/baglan.php';
include_once 'fonksiyonlar.php';
?>
<!doctype html>
<html lang="tr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/png" href="dosyalar/<?php echo $ayarcek['site_logo'] ?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/sb-admin-2.min.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <title><?php echo $ayarcek['site_baslik'] ?></title>

  <style type="text/css" media="screen">
    body {
     background: #70e1f5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffd194, #70e1f5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    .istatistik{
      border: 2px solid gray;
    }
  </style>


</head>
<body>

  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-md-12 text-center">
       <a href="index.php">
        <button type="button" class="btn btn-success">Link Kısalt</button>
      </a>
      <?php 
      if (isset($_SESSION['kul_id'])) { ?>
       <a href="linkler.php">
        <button type="button" class="btn btn-light">Linklerim</button>
      </a>
      <a href="profil.php">
        <button type="button" class="btn btn-info">Profil</button>
      </a>

      <a href="islemler/cikis.php">
        <button type="button" class="btn btn-light">Çıkış</button>
      </a>

    <?php } else { ?>
      <a href="kayit.php">
        <button type="button" class="btn btn-info">Kayıt Ol</button>
      </a>

      <a href="login.php">
        <button type="button" class="btn btn-success">Giriş Yap</button>
      </a>

    <?php } ?>

    <a href="iletisim.php">
      <button type="button" class="btn btn-light">İletişim</button>
    </a>

    <a href="hakkimizda.php">
      <button type="button" class="btn btn-light">Hakkımızda</button>
    </a>

    <?php 
    if (yetkikontrol()) { ?>

      <a href="ayarlar.php">
        <button type="button" class="btn btn-outline-light">Ayarlar</button>
      </a>
    <?php } ?>

  </div>
</div>
</div>
