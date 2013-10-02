<?php

	class Usuario {

		private $id;
        private $nome;
		private $email;
		private $senha;
        private $telefone;
        private $avatar;
        private $admin;

		function __construct($id, $nome, $email, $senha, $telefone, $avatar, $admin) {
            $this->id = $id;
            $this->nome = $nome;
			$this->email = $email;
			$this->senha = $senha;
            $this->telefone = $telefone;
            $this->avatar = $avatar;
            $this->admin = $admin;
		}

        public function getId() { 
            return $this->id; 
        } 
  
        public function setId($id) { 
            $this->id = $id;
            return $this;
        }

        public function getNome() { 
            return $this->nome; 
        }
  
        public function setNome($nome) { 
            $this->nome = $nome;
            return $this;
        }

        public function getEmail() { 
            return $this->email; 
        }
  
        public function setEmail($email) { 
            $this->email = $email;
            return $this;
        }

        public function getSenha() { 
            return $this->senha;
        } 
  
        public function setSenha($senha) { 
            $this->senha = $senha;
            return $this;
        }

        public function getTelefone() { 
            return $this->telefone;
        } 
  
        public function setTelefone($telefone) { 
            $this->telefone = $telefone;
            return $this;
        }

        public function getAvatar() { 
            return $this->avatar;
        } 
  
        public function setAvatar($avatar) { 
            $this->avatar = $avatar;
            return $this;
        }

        public function getAdmin() { 
            return $this->admin;
        } 
  
        public function setAdmin($admin) { 
            $this->admin = $admin;
            return $this;
        }

	}

?>