<?php
    class usuario {

        private $pdo;

        public function __contruct($pdo) {
            $this->pdo = $pdo;
        }

        public function getUsuario($email) {
            $sql = "select id, nome, ativo from usuario where email = :email limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":email", $email);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }
    }