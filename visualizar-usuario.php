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
			width: 90%;
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
		.usuario img {
			display: block;
			margin: 15px auto;
		}
		.usuario .content {
			text-align: center;
			padding: 15px;
		}
		.usuario .content div:first-child {
			margin-bottom: 15px;
		}
	</style>
</head>
<body>
	<?php

		include "CRUDUsuario.class.php";
		$crud = new CRUDUsuario();

		// Recupera o usuário cuja a id é passada na URL
		$usuario = $crud->byId($_GET['usuario']);

	?>
	<?php
	// Determina as permissões necessárias para acessar a página
	if(isset($_COOKIE['admin']) AND $_COOKIE['admin'] == 1 OR $_COOKIE['admin'] == 0) :
	?>
	<div id="wrapper">
		<div id="lista">
			<h2><?php echo $usuario->nome; ?></h2>
			<div class="usuario">
				<img src="<?php if(!empty($usuario->avatar)) { echo $usuario->avatar; } else { echo "img/avatar.png"; } ?>" width="64" height="64" />
				<div class="content">
					<div><b>E-mail:</b> <?php echo $usuario->email; ?></div>
					<div><b>Telefone:</b> <?php echo $usuario->telefone ?></div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<h1>Você não tem permissão para acessar esta página!</h1>
	<?php endif; ?>
	</div>
</body>
</html>