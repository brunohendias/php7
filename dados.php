<?php 

	require_once 'db/db_connect.php';

	session_start();

	class Cadastro {
		private $connection;
		private $nome;
		private $sobrenome;
		private $email;
		private $password;

		public function setValue($connection, $nome $sobrenome, $email, $password){
			$nome = mysqli_escape_string($this->connection, $nome);
			$sobrenome = mysqli_escape_string($this->connection, $sobrenome);
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			$email = mysqli_escape_string($this->connection, $email);
			$password = mysqli_escape_string($this->connection, $password);
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->email = $email;
			$this->password = $password;
			$this->connection = $connection;
		}

		public function cadastrar() {
			$sql = "INSERT INTO cadastro(nome, sobrenome, email, password) VALUES('$this->nome', '$this->sobrenome', '$this->email', '$this->password')";
			$cadastro = mysqli_query($this->connection, $sql);
			if($cadastro):
				$_SESSION['mensagem'] = "Cadastrado com sucesso";
			else:
				$_SESSION['mensagem'] = "Erro no cadastro";
			endif;
		}
	}

	class Loga {
		private $connection;
		private $email;
		private $password;

		public function setValues($connection, $email, $password) {
			$email = mysqli_escape_string($this->connection, $email);
			$password = mysqli_escape_string($this->connection, $password);
			$this->email = $email;
			$this->password = $password;
			$this->connection = $connection;
		}

		public function Logar() {
			$sql = "SELECT * FROM cadastro WHERE email = '$this->email'";
			$registro = mysqli_query($this->connection, $sql);
			$data = mysqli_fetch_array($registro);
			if($data > 0):
				if($data['email'] == $this->email and $data['password'] == $this->password):
					$_SESSION['mensagem'] = "Logado com sucesso";
					$_SESSION['user'] = $data['nome']." ".$data['sobrenome'];
				else:
					$_SESSION['mensagem'] = "Email/Senha incorretos";
				endif;
			else:
				$_SESSION['mensagem'] = "Email/Senha incorretos";
			endif;
		}
	}
	
	if(isset($_POST['btn-logar'])):
		$novoLogin = new Loga();
		$novoLogin->setValues($_POST['email'], $_POST['password'], $connection);
		$novoLogin->logar();

	elseif(isset($_POST['btn-cadastrar'])):
		$novoCadastro = new Cadastro();
		$novoCadastro->setValues($connection, $_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['password']);
		$novoCadastro->cadastrar();
	endif;
	header('location: index.php');

 ?>