<?php require 'header.php'; 

?>

<div class="container mt-3">
	<div class="row d-flex justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg">
				<div class="card-body p-3">
					<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-10 form-group">
								<label>İsim Soyisim</label>
								<input type="text" name="form_isim" placeholder="İsminizi Girin" class="form-control">
							</div>
						</div>
						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-10 form-group">
								<label>Mail Adresi</label>
								<input type="text" name="form_mail" placeholder="Mail Adresi" class="form-control">
							</div>
						</div>
						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-10 form-group">
								<label>Konu</label>
								<input type="text" name="form_konu" placeholder="Konu Detayı" class="form-control">
							</div>
						</div>
						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-10 form-group">
								<label>Mesaj</label>
								<textarea  name="form_mesaj" placeholder="Mesajınız Girin" class="form-control" style="height: 15rem"></textarea>								
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary" name="iletisimformu">Gönder</button>
						</div>
					</form>
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
			text: 'Mail Gönderildi En Kısa Sürede Dönüş Yapılacaktır',
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