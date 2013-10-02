<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title>Editar Usuário</title>
	<style>
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
	</style>
</head>
<body>
	<?php

		include "CRUDUsuario.class.php";

		$crud = new CRUDUsuario();

		if(isset($_GET['id'])) {
			$usuario = $crud->byId($_GET['id']);
		}

		if(isset($_POST['submit'])) {
			$usuario = $crud->byId($_POST['id']);
			$usuario->nome = $_POST['nome'];
			$usuario->email = $_POST['email'];
			$usuario->senha = $_POST['senha'];
			$usuario->telefone = $_POST['telefone'];
			$usuario->avatar = $_POST['avatar'];
			$usuario->admin = $_POST['admin'];
			$crud->updateUsuario($usuario);
			header('Location: visualizar-usuario.php?usuario='.$usuario->id);
		}

	?>
	<?php if(isset($_COOKIE['admin']) AND $_COOKIE['admin'] == 1) : ?>
		<div id="wrapper">
			<form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>" />
				<div class="form-row">
					<label for="nome">Nome:</label>
					<input id="nome" type="text" name="nome" value="<?php echo $usuario->nome; ?>" placeholder="Digite o nome do usuário" />
				</div>
				<div class="form-row">
					<label for="email">E-mail:</label>
					<input id="email" type="email" name="email" value="<?php echo $usuario->email; ?>" placeholder="Digite o e-mail do usuário" />
				</div>
				<div class="form-row">
					<label for="senha">Senha:</label>
					<input id="senha" type="password" name="senha" value="<?php echo $usuario->senha; ?>" placeholder="Digite a senha do usuário" />
				</div>
				<div class="form-row">
					<label for="telefone">Telefone:</label>
					<input id="telefone" type="text" name="telefone" value="<?php echo $usuario->telefone; ?>" placeholder="Digite o telefone do usuário" />
				</div>
				<div class="form-row">
					<label for="avatar">Gravatar:</label>
					<input id="avatar" type="text" name="avatar" value="<?php echo $usuario->avatar; ?>" placeholder="Cole o link do Gravatar do usuário" />
				</div>
				<div class="form-row">
					<div>Administrador?</div>
					<label for="admin-sim">Sim</label>
					<input id="admin-sim" type="radio" name="admin" value="1" <?php if($usuario->admin == 1) echo "checked"; ?> />
					<label for="admin-nao">Nao</label>
					<input id="admin-nao" type="radio" name="admin" value="0" <?php if($usuario->admin == 0) echo "checked"; ?> />
				</div>
				<div class="form-row">
					<input type="submit" name="submit" value="Editar" />
				</div>
			</form>
	<?php else : ?>
		<h1>Você não tem permissão para acessar esta página!</h1>
		</div>
	<?php endif; ?>
</body>
</html>