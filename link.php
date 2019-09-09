<?php require 'header.php'; 
if (isset($_GET['link'])) {
	$sorgu=$db->prepare("SELECT * FROM linkler WHERE link_kisa=:link_kisa");
	$sorgu->execute(array(
		'link_kisa' => guvenlik($_GET['link'])
	));
	$sonuc=$sorgu->rowcount();
	$linkdetay=$sorgu->fetch(PDO::FETCH_ASSOC);

	if ($sonuc==0) {
		header("location:404.php");
		exit;
	}

	if ($linkdetay['link_limit'] < $linkdetay['link_tiklanma_sayisi']) {
		header("location:404.php");
		exit;
	}

} else {
	header("location:index.php");
	exit;
}



?>

<?php 
if (strlen($linkdetay['link_sifre'])>0 AND !isset($_SESSION['sifre_durum'])) { ?>
	<div class="container mt-3">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<div class="card shadow-lg">
					<div class="card-body p-4">
						<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
							<div class="form-row d-flex justify-content-center text-center">
								<div class="col-md-8 form-group">
									<label>Link Şifresi</label>
									<input type="text" name="link_sifre" placeholder="Linkin Şifresini Girin" class="form-control">
									<input type="hidden" name="link_kisa" value="<?php echo guvenlik($_GET['link']) ?>">
								</div>
							</div>
							<div class="text-center">
								<button type="submit" name="sifrekontrol" class="btn btn-primary">Kontrol Et</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { 
	$sorgu=$db->prepare("UPDATE linkler SET link_tiklanma_sayisi=:link_tiklanma_sayisi WHERE link_kisa=:link_kisa");
	$sorgu->execute(array(
		'link_tiklanma_sayisi' => $linkdetay['link_tiklanma_sayisi']+1,
		'link_kisa' => $_GET['link']
	));
	?>
	<div class="container mt-3">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<div class="card shadow-lg">
					<?php if (isset($_SESSION['sifre_durum'])): ?>
						<div class="card-header">
							<div class="alert alert-danger text-center">
								10 Saniye Sonra İlerleme Butonu Aktif Olacak
							</div>
						</div>
					<?php endif ?>
					
					<div class="card-body p-3">
						<div class="text-center mb-2">
							<div class="badge badge-primary p-3" style="font-size: 1.1rem">
								<span>Kalan Süre</span><span id="sure" style="color: gray; background-color: white; border-radius: 5px; margin-left: 10px; padding: 5px">10</span>
							</div>
						</div>

						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- TEST -->
									<ins class="adsbygoogle"
									style="display:block"
									data-ad-client="ca-pub-3045625492376162"
									data-ad-slot="2791177158"
									data-ad-format="auto"
									data-full-width-responsive="true"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>

						<div class="text-center my-2">
							<a disabled href="#" rel="nofollow" id="gidileceklink"><button type="button" class="btn btn-info btn-lg disabled" disabled="" id="linkegitmebutonu">Linke Git</button></a>
						</div>


						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- TEST -->
									<ins class="adsbygoogle"
									style="display:block"
									data-ad-client="ca-pub-3045625492376162"
									data-ad-slot="2791177158"
									data-ad-format="auto"
									data-full-width-responsive="true"></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
<?php } unset($_SESSION['sifre_durum']) ?>


<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-md-3">
			<div class="card text-center shadow-lg istatistik">
				<div class="card-body">
					<h6 class="font-weight-bold">Toplam Tıklanma Sayısı</h6>
					<span><?php echo $linkdetay['link_tiklanma_sayisi'] ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card text-center shadow-lg istatistik">
				<div class="card-body">
					<h6 class="font-weight-bold">Eklenme Tarihi</h6>
					<span><?php echo $linkdetay['link_eklenme_tarih'] ?></span>
				</div>
			</div>
		</div>
	</div>
</div>


<?php require 'footer.php'; ?>


<script>
	function surebaslat() {
		sure = "10";
		zaman = setInterval(function () {
			$("#sure").text(sure);
			sure-=1;
			if (sure==-1) {
				clearInterval(zaman);
				$("#linkegitmebutonu").removeClass("disabled");
				$("#linkegitmebutonu").removeAttr('disabled');
				$("#gidileceklink").attr("href","<?php echo $linkdetay['link_uzun'] ?>");
				$("#gidileceklink").removeAttr('disabled');
			}


		},1000)
	}

	surebaslat()
</script>

<?php 
if (@$_GET['durum']=="sifreyanlis") { ?>
	<script type="text/javascript">
		Swal.fire({
			type: 'error',
			title: 'Hata',
			text: 'Girdiğiniz Şifre Yanlış',
			confirmButtonText: "Tamam"
		})
	</script>
	<?php } ?>