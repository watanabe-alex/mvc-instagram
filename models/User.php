<?php

    include("Conexao.php");

    class User extends Conexao {

        public function criarUsuario($email, $senha) {
            $db = parent::criarConexao();
            $query = $db->prepare('INSERT INTO usuarios (email, senha) VALUES (?,?)');
            return $query->execute([$email, $senha]);
        }

        //TODO: montar função para buscar usuário
        public function bucarUsuario() {
            $db = parent::criarConexao();
            $query = $db->prepare('SELECT * FROM usuarios WHERE id=?');


            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $resultado;
        }

    }


?>