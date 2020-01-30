<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Logar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>.bordaForm{border: 1px solid #999;border-radius: 10px;}</style>
</head>
<body>
	<li style='width: 35px;height: 35px;border-radius: 20px;background-image: url("https://linuxacademy.com/site-content/themes/linux/img/generic-blog-post/default-img.png")';></li>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Shopping</a>
		<ul class="nav">
			<li class="nav-item">
				<?php session_start();if(isset($_SESSION['user'])):echo "<li style='width: 35px;height: 35px;border-radius: 20px;background-image: url('https://img.freepik.com/vetores-gratis/conceito-de-upload-de-imagem-para-a-pagina-de-destino_52683-22559.jpg?size=338&ext=jpg');'></li> "."<span class='nav-link' style='color: white;'>".$_SESSION['user']."</span>";endif; ?>
			</li>
		</ul>
	</nav>
	<div class="container mt-3">
		<div class="row">
			<form action="dados.php" method="POST" class="m-auto p-4 bordaForm">
				<?php require_once 'includes/session.php'; ?>
				<h1>Logar</h1>
				<div class="input-group">
					<input type="email" name="email" placeholder="Email" class="form-control" required />
				</div>
				<div class="input-group mt-2">
					<input type="password" name="password" placeholder="Senha" class="form-control" required />
				</div>
				<div class="mt-3 float-right">
					<a href="cadastrar.php" class="btn btn-primary">Cadastrar</a>
					<button class="btn btn-success" name="btn-logar">Entrar</button>
				</div>
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</body>
</html>