<?php

	include "Usuario.class.php";

	class CRUDUsuario {

		private $pdo;

		function __construct() {
			$this->pdo = new PDO('mysql:host=localhost;dbname=prova', 'root', '');
		}

		function addUsuario($usuario) {
			$this->pdo->query("INSERT INTO `usuario` (`nome`, `email`, `senha`, `telefone`, `avatar`, `admin`) VALUES ('{$usuario->getNome()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}', '{$usuario->getTelefone()}', '{$usuario->getAvatar()}', '{$usuario->getAdmin()}')");
			header('Location: painel-admin.php');
		}

		function updateUsuario($usuario) {
			$this->pdo->query("UPDATE `usuario` SET `nome`='{$usuario->nome}',`email`='{$usuario->email}',`senha`='{$usuario->senha}',`telefone`='{$usuario->telefone}',`avatar`='{$usuario->avatar}',`admin`='{$usuario->admin}' WHERE id = $usuario->id");
		}

		function getAll() {
			$stmt = $this->pdo->prepare("SELECT * FROM usuario");
			$stmt->execute();
			$stmt->fetch(PDO::FETCH_ASSOC);
			$usuarios = $stmt->fetchAll();

			return $usuarios;
		}

		function byId($id) {
			$stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE id = $id");
			$stmt->execute();
			$usuario = $stmt->fetchObject();

			return $usuario;

		}

		function deleteById($id) {
			$stmt = $this->pdo->query("DELETE FROM usuario WHERE id = $id");
		}

		function login($email, $senha) {
			$stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
			$stmt->bindParam(1, $email, PDO::PARAM_STR);
			$stmt->bindParam(2, $senha, PDO::PARAM_STR);

			$stmt->execute();

			$usuario = $stmt->fetchObject();

			session_start();

			if($usuario) {
				$_SESSION['login'] = true;
				if($usuario->admin == 1) {
					setcookie("admin", 1);
					header('Location: painel-admin.php');
				} else {
					setcookie("admin", 0);
					header('Location: painel-usuario.php');
				}
			} else {
				$_SESSION['login'] = false;
			}
		}

	}

?>