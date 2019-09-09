<?php require 'header.php'; 

?>

<div class="container mt-3">
	<div class="row d-flex justify-content-center">
		<div class="col-md-10">
			<div class="card shadow-lg">	
					<div class="card-body p-3">
						<form onsubmit="return false" id="kayitformu">
							<div class="form-row d-flex justify-content-around">
								<div class="col-md-5 form-group">
									<label>İsminiz</label>
									<input type="text" name="kul_isim" placeholder="İsminizi Girin" class="form-control">
								</div>
								<div class="col-md-5 form-group">
									<label>Mail Adresiniz</label>
									<input type="text" name="kul_mail" placeholder="Mail Adresiniz" class="form-control">
								</div>
							</div>
							<div class="form-row d-flex justify-content-around">
								<div class="col-md-5 form-group">
									<label>Şifreniz</label>
									<input type="password" name="kul_sifre" placeholder="Şifrenizi Girin" class="form-control not-sifresi">
								</div>								
								<div class="col-md-5 form-group">
									<label>Şifreniz Tekrar Girin</label>
									<input type="password" placeholder="Şifreniz Tekrar Girin" class="form-control not-sifresi-tekrar">
								</div>		
							</div>
							<input class="d-none" type="submit" name="kayitol" value="gönder" id="gondermebutonu">
							<div class="text-center">
								<button type="button" class="btn btn-primary" id="kontrolbuton">Kayıt Ol</button>
							</div>
						</form>
					</div>					
			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>


<script type="text/javascript">
	$(document).ready(function() {

		$("#kontrolbuton").click(function () {
			metin1 = $(".not-sifresi").val();
			metin2 = $(".not-sifresi-tekrar").val();
			if (metin1!=metin2) {
				alert("Şifreler Aynı Değil")
			} else {
				$.ajax({
					url: 'islemler/ajax.php',
					type: 'POST',
					data: $("#kayitformu").serialize()+"&kayitol=kayitol",
					success:function (donenveri) {
						var gelen=JSON.parse(donenveri);
						var deger=gelen.sonuc;
						if (deger=="ok") {
							window.location="login.php";
						} else if (deger="mailalindi") {
							alert("Bu Mail Adresi Önceden ALınmış")
						} else {
							alert("Kayıt Başarısız")
						}
					}
				})
			}
		});
		
	});
</script>

