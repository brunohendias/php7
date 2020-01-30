<?php 

	require_once 'db/db_connect.php';

	session_start();

	if(isset($_POST['btn-logar'])):
		$email = mysqli_escape_string($connection, $_POST['email']);
		$password = mysqli_escape_string($connection, $_POST['password']);
		$sql = "SELECT * FROM cadastro WHERE email = '$email'";
		$registro = mysqli_query($connection, $sql);
		$data = mysqli_fetch_array($registro);
		if($data > 0):
			if($data['email'] == $email and $data['password'] == $password):
				$_SESSION['mensagem'] = "Logado com sucesso";
				$_SESSION['user'] = $data['nome']." ".$data['sobrenome'];
			else:
				$_SESSION['mensagem'] = "Email/Senha incorretos";
			endif;				
		else:
			$_SESSION['mensagem'] = "Email/Senha incorretos";
		endif;

	elseif(isset($_POST['btn-cadastrar'])):
		$nome = mysqli_escape_string($connection, $_POST['nome']);
		$sobrenome = mysqli_escape_string($connection, $_POST['sobrenome']);
		$email = mysqli_escape_string($connection, $_POST['email']);
		$password = mysqli_escape_string($connection, $_POST['password']);

		$sql = "INSERT INTO cadastro(nome, sobrenome, email, password) VALUES('$nome', '$sobrenome', '$email', '$password')";
		$cadastro = mysqli_query($connection, $sql);

		if($cadastro):
			$_SESSION['mensagem'] = "Cadastrado com sucesso";
		else:
			$_SESSION['mensagem'] = "Erro no cadastro";
		endif;
	endif;
	header('location: index.php');

 ?>