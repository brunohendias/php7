<?php 

	require_once 'db/db_connect.php';

	session_start();

	class Cadastro {
		private $nome;
		private $sobrenome;
		private $email;
		private $password;
		private $connection;
		public $msg;

		public function setNome($nome){
			$nome = mysqli_escape_string($this->connection, $nome);
			$this->nome = $nome;
		}
		public function setSobrenome($sobrenome){
			$sobrenome = mysqli_escape_string($this->connection, $sobrenome);
			$this->sobrenome = $sobrenome;
		}
		public function setEmail($email){
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			$email = mysqli_escape_string($this->connection, $email);
			$this->email = $email;
		}
		public function setPassword($password){
			$password = mysqli_escape_string($this->connection, $password);
			$this->password = $password;
		}
		public function setConnection($connection) {
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
		private $email;
		private $password;
		private $connection;

		public function setEmail($email) {
			$email = mysqli_escape_string($this->connection, $email);
			$this->email = $email;
		}
		public function setPassword($password) {
			$password = mysqli_escape_string($this->connection, $password);
			$this->password = $password;
		}
		public function setConnection($connection) {
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
				$_SESSION['mensagem'] = "Email incorretos";
			endif;
		}
	}
	
	if(isset($_POST['btn-logar'])):
		$novoLogin = new Loga();
		$novoLogin->setEmail($_POST['email']);
		$novoLogin->setPassword($_POST['password']);
		$novoLogin->setConnection($connection);
		$novoLogin->logar();

	elseif(isset($_POST['btn-cadastrar'])):
		$novoCadastro = new Cadastro();
		$novoCadastro->setConnection($connection);
		$novoCadastro->setNome($_POST['nome']); 
		$novoCadastro->setSobrenome($_POST['sobrenome']);
		$novoCadastro->setEmail($_POST['email']); 
		$novoCadastro->setPassword($_POST['password']);
		$novoCadastro->cadastrar();
	endif;
	header('location: index.php');

 ?>