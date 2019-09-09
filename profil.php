<?php include 'header.php';
$sorgu=$db->prepare("SELECT * FROM kullanicilar WHERE kul_id=:kul_id");
$sorgu->execute(array(
	'kul_id' => $_SESSION['kul_id']
));
$kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-fluid mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="font-weight-bold text-primary">Profil</h5>
				</div>
				<div class="card-body">
					<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-10 form-group">
								<label>İsim</label>
								<input type="text" name="kul_isim" class="form-control" value="<?php echo $kullanici['kul_isim'] ?>" placeholder="İsminizi Girin">
							</div>
						</div>

						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-10 form-group">
								<label>Şifre <small>(Boş Bırakırsanız Şifre Değişmez)</small></label>
								<input type="password" name="kul_sifre" class="form-control" placeholder="Şifrenizi Girin">
							</div>
						</div>
						<div class="text-center">
							<button type="submit" name="profilkaydet" class="btn btn-primary">Kaydet</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>



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
