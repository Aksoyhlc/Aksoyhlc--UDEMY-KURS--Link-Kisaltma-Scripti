<?php require 'header.php'; 

?>

<div class="container mt-3">
	<div class="row d-flex justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-lg">
				<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">		
					<div class="card-body p-3">
						<div class="alert alert-danger text-center lead">
							Aradığınız Not Bulunamadı
						</div>
						<div class="text-center">
							<a href="index.php"><button type="button" class="btn btn-primary">Ana Sayfa</button></a>
						</div>
					</div>					
				</form>
			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>