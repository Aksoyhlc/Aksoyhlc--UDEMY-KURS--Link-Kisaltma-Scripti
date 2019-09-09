<?php require 'header.php'; 

if ($_SESSION['kul_yetki']!=1) {
	$sorgu=$db->prepare("SELECT * FROM linkler WHERE link_id=:link_id AND link_ekleyen=:link_ekleyen");
	$sorgu->execute(array(
		'link_id' => guvenlik($_POST['link_id']),
		'link_ekleyen' => $_SESSION['kul_id']
	));
	$sonuc=$sorgu->rowcount();

	if ($sonuc==0) {
		header("location:../linkler.php?durum=hata");
		exit;
	}

}


$sorgu=$db->prepare("SELECT * FROM linkler WHERE link_id=:link_id");
$sorgu->execute(array(
	'link_id' => guvenlik($_POST['link_id'])
));
$link=$sorgu->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-3">
	<div class="row d-flex justify-content-center">
		<div class="col-md-10">
			<div class="card shadow-lg">
				<div class="card-body p-3">
					<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">		
						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-5 form-group">
								<label>Link Kısaltışmış Hali</label>
								<input disabled="" type="text" value="<?php echo $link['link_kisa'] ?>" class="form-control">
							</div>
						</div>

						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-5 form-group">
								<label>Link Limiti</label>
								<input type="number" name="link_limit" value="<?php echo $link['link_limit'] ?>" placeholder="Link Limitini Girin" class="form-control">
							</div>
						</div>

						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-5 form-group">
								<label>Link Şifre <small>Boş Bırakırsanız Şifre Değişmez</small></label>							
								<input type="text" name="link_sifre" placeholder="Link Şifresini Girin" class="form-control">
							</div>
						</div>

						<div class="text-center">
							<div class="form-row d-flex justify-content-center text-center">
								<div class="col-md-6 form-group">
									<div class="custom-control custom-checkbox mr-sm-2">
										<input type="checkbox" class="custom-control-input" id="linkturu" name="link_sifre_onay" value="1">
										<label class="custom-control-label" for="linkturu">Link Şifresi Kaldırılsın</label>
									</div>
								</div>
							</div>
						</div>

						<div class="form-row d-flex justify-content-center text-center">
							<div class="col-md-10 form-group">
								<label>Link Uzun Hali</label>
								<input type="url" name="link_uzun" value="<?php echo $link['link_uzun'] ?>" placeholder="Kısaltmak İstediğiniz Linki Girin" class="form-control">
							</div>
						</div>
						<input type="hidden" name="link_id" value="<?php echo guvenlik($_POST['link_id']) ?>">
						<div class="text-center">
							<button type="submit" class="btn btn-primary" name="linkguncelle">Kaydet</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>