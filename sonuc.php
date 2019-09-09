<?php require 'header.php'; 
if (!isset($_SESSION['link_link'])) {
	header("location:index.php");
	exit;
}


$sonuclink=$ayarcek['site_link']."/". $_SESSION['link_link'];
?>

<div class="container mt-3">
	<div class="row d-flex justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg">
				<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
					<div class="card-header">
						<div class="alert alert-danger text-center">
							Sayfayı Kapatmadan Önce Aşağıda Ki Linki Kopyalayın
						</div>
					</div>
					<div class="card-body p-3">
						<div class="form-row d-flex justify-content-center">
							<div class="col-md-11 text-center mt-4">								
								<a href="<?php echo $sonuclink ?>"><h3><?php echo $sonuclink ?></h3></a>
							</div>						
						</div>
						<div class="form-row mt-4">
							<div class="col-md-12 text-center">
								<a href="https://www.facebook.com/sharer.php?u=<?php echo $sonuclink ?>&t=<?php echo $ayarcek['site_baslik'] ?>" class="btn btn-primary btn-circle">
									<i class="fab fa-facebook-f"></i>
								</a>
								<a href="https://twitter.com/intent/tweet?text=<?php echo $sonuclink ?>" class="btn btn-info btn-circle ml-1">
									<i class="fab fa-twitter"></i>
								</a>
								<a href="mailto:?body=<?php echo $sonuclink ?>" class="btn btn-danger btn-circle mx-1">
									<i class="far fa-envelope"></i>
								</a>
								<a href="https://wa.me/?text=<?php echo $sonuclink ?>" class="btn btn-success btn-circle">
									<i class="fab fa-whatsapp"></i>
								</a>
							</div>
						</div>
					</div>					
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
unset($_SESSION['link_link']);

?>
<?php require 'footer.php'; ?>