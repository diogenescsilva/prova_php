<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title>Painel de Controle</title>
	<style>

		body {
			font-family: 'Arial', sans-serif;
		}
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

		#menu {
			margin-bottom: 30px;
		}
		#menu ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		#menu ul li a {
			text-decoration: none;
			background: #ff4a00;
			border-radius: 3px;
			padding: 3px;
			color: #fff;
		}
		#menu ul li a:hover {
			text-decoration: underline;
		}

		#lista {
			width: 400px;
			display: table;
			background: #f9f9f9;
			padding: 15px;
		}
		#lista h2 {
		margin: 0;
		margin-bottom: 30px;
		}
		.usuario {
			background: #fff;
			display: table;
			margin: 0 10px;
			margin-bottom: 15px;
			float: left;
			padding: 5px;
			border: 1px solid #f1f1f1;
		}

		.usuario .info {
			width: 135px;
			margin: 3px;
		}
		.usuario .info,
		.usuario .options {
			float: left;
		}
		.usuario .info a img {
			display: block;
			margin: 0 auto;
			margin-bottom: 5px;
		}
		
		.usuario .options {
			padding: 3px;
			height: 100%;
			background: #f0f0f0;
		}
		.usuario .options ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}
	</style>
</head>
<body>
	<?php

		include "CRUDUsuario.class.php";
		$crud = new CRUDUsuario();

		// Verifica se o administrador submeteu a exclusão de algum usuário e executa a ação de exclusão
		if(isset($_GET['excluir'])) {
			$crud->deleteById($_GET['excluir']);
		}

	?>


	<?php
	// Determinna as permissões necessárias para acessar a página
	if(isset($_COOKIE['admin']) AND $_COOKIE['admin'] == 1) :
	?>
	<div id="wrapper">
		<h1>Seja bem-vindo ao painel de controle!</h1>
		<nav id="menu">
			<ul>
				<li><a href="cadastrar-usuario.php" title="Cadastrar um novo usuário">Novo usuário</a></li>
				<li><a href="index.php" title="Sair">Sair</a></li>
			</ul>
		</nav>
		<div id="lista">
			<h2>Usuários cadastrados</h2>
			<?php $usuarios = $crud->getAll(); ?>
			<?php foreach ($usuarios as $usuario) : ?>
				<div class="usuario">
					<div class="info">
						<a href="visualizar-usuario.php?usuario=<?php echo $usuario['id']; ?>" title="Visualizar perfil">
							<img src="<?php if(!empty($usuario['avatar'])) { echo $usuario['avatar']; } else { echo "img/avatar.png"; } ?>" width="64" height="64" />
						</a>
						<div><?php echo $usuario['nome']; ?></div>
					</div>
					<nav class="options">
						<ul>
							<li><a href="editar-usuario.php?id=<?php echo $usuario['id']; ?>" title="Editar usuário"><img src="img/edit.png" width="20" height="20" /></a></li>
							<li><a href="?excluir=<?php echo $usuario['id']; ?>" title="Excluir usuário"><img src="img/close.png" width="20" height="20" /></a></li>
						</ul>
					</nav>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php else : ?>
		<h1>Você não tem permissão para acessar esta página!</h1>
	<?php endif; ?>
</body>
</html>