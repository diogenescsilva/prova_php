<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title>Gerenciador de Usuários</title>
	<style>
		h1 {
			text-align: center;
			font-family: 'Arial', sans-serif;
			color: #09c;
			text-shadow: 1px 1px 1px rgba(0,0,0,0.05);
		}
		#wrapper {
			margin: 0 auto;
			width: 400px;
		}

		#form {
			margin: auto;
			width: 215px;
			padding: 15px;
			background: #f9f9f9;
			border-radius: 3px;
			box-shadow: 1px 1px 1px rgba(0,0,0,0.05);
			font-family: 'Arial', sans-serif;
			font-size: 15px;
			text-shadow: 1px 1px 1px rgba(0,0,0,0.05);
			color: #444;
		}
		#form .form-row { 
			margin-bottom: 15px;
		}
		#form .form-row input { 
			outline: none;
			box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
			border: 1px solid #f0f0f0;
			border-radius: 3px;
			padding: 3px;
		}
		#form .form-row input[type="submit"] {
			bo
			cursor: pointer;
			display: block;
			margin: 0 auto;
			padding: 7px 15px;
			background: #092cff;
			color: #fff;
		}
		.login-erro {
			margin: 0 auto;
			width: 215px;
			font-family: 'Arial', sans-serif;
			border-radius: 3px;
			margin-bottom: 15px;
			font-size: 13px;
			padding: 15px;
			background: #c72a00;
			color: #fff;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<h1>Faça seu login para continuar</h1>
		<?php

			include "CRUDUsuario.class.php";

			$crud = new CRUDUsuario();

			// Verifica se o formulário de login foi submetido
			if(isset($_POST['submit'])) {
				$crud->login($_POST['email'], $_POST['senha']);
			}

			// Verifica se o processo de login retornou algum erro
			if(isset($_SESSION['login']) AND $_SESSION['login'] == false) {
				echo "<div class='login-erro'>E-mail ou senha inválidos. Tente novamente!</div>";
			}

		?>
		<form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-row">
				<label for="email">E-mail:</label>
				<input id="email" type="text" name="email" placeholder="Digite seu e-mail" />
			</div>
			<div class="form-row">
				<label for="senha">Senha:</label>
				<input id="senha" type="password" name="senha" placeholder="Digite sua senha" />
			</div>
			<div class="form-row">
				<input type="submit" name="submit" value="Enviar" />
			</div>
		</form>
	</div>
</body>
</html>