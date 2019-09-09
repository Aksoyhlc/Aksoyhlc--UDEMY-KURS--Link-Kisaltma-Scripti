<?php require 'header.php'; 

?>

<div class="container mt-3">
	<div class="row d-flex justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg">
				<div class="card-body p-3">
					<form id="a1" onsubmit="return false">		
						<div class="form-row text-center d-flex justify-content-center">
							<div class="col-md-10 form-group">
								<label>Mail Adresi</label>
								<input type="text" name="kul_mail" placeholder="Mail Adresinizi Girin" class="form-control">
								<input type="hidden" name="sifre_sifirlama_a1" value="sifre_sifirlama_a1">
							</div>						
						</div>
						<div class="text-center">
							<button type="button" class="btn btn-primary asama-1">İleri</button>
						</div>
					</form>

					<form id="a2" onsubmit="return false" style="display: none;">		
						<div class="form-row text-center d-flex justify-content-center">
							<div class="col-md-10 form-group">
								<label>Güvenlik Kodu</label>
								<input type="text" name="guvenlik_kodu" placeholder="Güvenlik Kodunuzu Girin" class="form-control">
								<input type="hidden" name="sifre_sifirlama_a2" value="sifre_sifirlama_a2">
							</div>						
						</div>
						<div class="text-center">
							<button type="button" class="btn btn-primary asama-2">İleri</button>
						</div>
					</form>

					<form id="a3" onsubmit="return false" style="display: none;">		

						<div class="form-row text-center d-flex justify-content-center">
							<div class="col-md-10 form-group">
								<label>Yeni Şifrenizi Girin</label>
								<input type="text" name="yeni_sifre" placeholder="Yeni Şifrenizi Yazın" class="form-control">
								<input type="hidden" name="sifre_sifirlama_a3" value="sifre_sifirlama_a3">
							</div>						
						</div>
						<div class="text-center">
							<button type="button" class="btn btn-primary asama-3">Kaydet</button>
						</div>

					</form>


				</div>
			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>

<script type="text/javascript">
	$(".asama-1").click(function () {
		$.ajax({
			url: 'islemler/ajax.php',
			type: 'POST',
			data: $("#a1").serialize(),
			success:function (donenveri) {
				var gelen=JSON.parse(donenveri);
				var deger=gelen.sonuc;
				if (deger=="ok"){
					$("#a1").css("display","none");
					$("#a2").css("display","block");
				} else if (deger=="no"){
					Swal.fire({
						type: 'error',
						title: 'Mail Bulunamadı',
						text: 'Girdiğiniz Mail Adresine Ait Kullanıcı Bulunamadı',
						confirmButtonText: "Tamam"
					})
				} else {
					Swal.fire({
						type: 'error',
						title: 'Hata',
						text: 'İşleminiz Başarısız Oldu Lütfen Tekrar Deneyin',
						confirmButtonText: "Tamam"
					})
				}
			}
		})
	})


	$(".asama-2").click(function () {
		$.ajax({
			url: 'islemler/ajax.php',
			type: 'POST',
			data: $("#a2").serialize(),
			success:function (donenveri) {
				var gelen=JSON.parse(donenveri);
				var deger=gelen.sonuc;
				if (deger=="ok"){
					$("#a2").css("display","none");
					$("#a3").css("display","block");
				} else if (deger=="no"){
					Swal.fire({
						type: 'error',
						title: 'Hata',
						text: 'Güvenlik Kodu Yanlış',
						confirmButtonText: "Tamam"
					})
				} else {
					Swal.fire({
						type: 'error',
						title: 'Hata',
						text: 'İşleminiz Başarısız Oldu Lütfen Tekrar Deneyin',
						confirmButtonText: "Tamam"
					})
				}
			}
		})
	})



	$(".asama-3").click(function () {
		$.ajax({
			url: 'islemler/ajax.php',
			type: 'POST',
			data: $("#a3").serialize(),
			success:function (donenveri) {
				var gelen=JSON.parse(donenveri);
				var deger=gelen.sonuc;
				if (deger=="ok"){
					window.location="login.php?durum=sifredegisti"
				} else {
					window.location="login.php?durum=no"
				}
			}
		})
	})



</script>



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
