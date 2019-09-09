<?php require 'header.php'; ?>

<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-11">
      <div class="card shadow-lg">
        <form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
          <div class="card-body p-3">
            <div class="form-row d-flex justify-content-center">
              <div class="col-md-11 form-group">
                <div class="input-group">
                  <input required="" type="url" name="link_uzun" placeholder="Kısaltmak İstediğiniz Linki Girin" class="form-control" style="font-size: 1.5rem; padding: 1.5rem">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-primary" id="paylasmabutonu">Kısalt</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
           <button type="button" class="btn btn-danger" id="seceneklerbutonu">Seçenekler</button>
           <input type="submit"  value="Gönder" class="d-none" name="linkekleme" id="gondermebutonu">
           <div id="seceneklerbolumu" style="display: none;">
             <div class="form-row">
              <div class="col-md-6 mt-md-4 mt-lg-4 mt-sm-2 form-group">
                 <div class="custom-control custom-checkbox mr-sm-2">
                  <input type="checkbox" class="custom-control-input" id="linkturu" name="link_turu" value="1">
                  <label class="custom-control-label" for="linkturu">Kısaltılan Link Karmaşık Olsun</label>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <label>Tıklanma Limiti</label>
                <input type="number" name="link_limit" placeholder="Tıklanma Limiti" class="form-control">
              </div>
            </div>
            <div class="form-row">
             <div class="col-md-6 form-group">
              <label>Link Şifresi</label>
              <input type="password" name="link_sifre" placeholder="Linkiniz Şifresiniz Girin" class="form-control link-sifresi">
            </div>
            <div class="col-md-6 form-group">
              <label>Şifre Tekrar</label>
              <input type="password" placeholder="Şifrenizi Tekrar Girin" class="form-control link-sifresi-tekrar">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>


<div class="container mt-4">
  <div class="row d-flex justify-content-center">


    <?php 
    $sorgu=$db->prepare("SELECT link_id FROM linkler");
    $sorgu->execute();
    $sonuc=$sorgu->rowcount();
    ?>
    <div class="col-md-3">
      <div class="card text-center shadow-lg istatistik">
        <div class="card-body">
          <h6 class="font-weight-bold">Toplam Link Sayısı</h6>
          <span><?php echo $sonuc ?></span>
        </div>
      </div>
    </div>



    <?php 
    $sorgu=$db->prepare("SELECT SUM(link_tiklanma_sayisi) FROM linkler");
    $sorgu->execute();
    $sonuc=$sorgu->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="col-md-3">
      <div class="card text-center shadow-lg istatistik">
        <div class="card-body">
          <h6 class="font-weight-bold">Toplam Tıklanma Sayısı</h6>
          <span><?php echo $sonuc['SUM(link_tiklanma_sayisi)'] ?></span>
        </div>
      </div>
    </div>


    <?php 
    $sorgu=$db->prepare("SELECT kul_id FROM kullanicilar");
    $sorgu->execute();
    $sonuc=$sorgu->rowcount();
    ?>
    <div class="col-md-3">
      <div class="card text-center shadow-lg istatistik">
        <div class="card-body">
          <h6 class="font-weight-bold">Toplam Üye Sayısı</h6>
          <span><?php echo $sonuc ?></span>
        </div>
      </div>
    </div>


  </div>
</div>
<?php require 'footer.php'; ?>


<?php 
if (@$_GET['durum']=="ok") { ?>
  <script type="text/javascript">
    Swal.fire({
      type: 'success',
      title: 'İşlem Başarılı',
      text: 'İşleminiz Başarıyla Gerçekleştirildi',
      confirmButtonText: "Tamam"
    })
  </script>
<?php } ?>


<?php 
if (@$_GET['durum']=="no") { ?>
  <script type="text/javascript">
    Swal.fire({
      type: 'error',
      title: 'Hata',
      text: 'İşleminiz Başarısız Oldu Lütfen Tekrar Deneyin',
      confirmButtonText: "Tamam"
    })
  </script>
  <?php } ?>