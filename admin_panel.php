<?php
	include_once('php/php_header_includes.php');
	unset($_SESSION['admin_cad-page_status']);
	if(isset($_SESSION['cd_client'])){
		if($_SESSION['st_client_admin'] == 1){

?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<?php
			include_once("php/head.php");
			Title('Administração');
		?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<?php
					include_once('php/menu.php');
				?>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<h1>Administração</h1>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<a href="new_product.php" class="btn btn-block btn-primary">Novo produto</a>
				</div>
				<div class="col-md-3">
					<button class="btn btn-block btn-primary">Nova categoria</button>
				</div>
				<div class="col-md-3"></div>
			</div>
			<br>
			<div class="row">
				<?php
					include_once('php/footer.php');
				?>
			</div>
		</div>
		<?php
			include_once('php/body_links.php');
		?>
	</body>
</html>
<?php
		}
		else{
			header('location: index.php');
		}
	}
	else{
		header('location: login.php');
	}
?>