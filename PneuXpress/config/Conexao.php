<?php
    class Conexao {
        private static $host = 'localhost';
        // private static $email = 'lessio@gmail.com';
        private static $usuario = 'root';
        private static $senha = '1234';
        private static $banco = 'pneuxpress';

        public static function conectar() {
            try {

                return new PDO("mysql:host=".self::$host.";dbname=".self::$banco.";charset=utf8", self::$usuario, self::$senha);
                
            } catch (PDOException $e) {
                die('Erro ao conectar com o banco de dados: {$e->getMessage()}');
            }
        }
    }