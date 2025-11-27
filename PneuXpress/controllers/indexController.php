<?php 
    require "../config/Conexao.php";
    require "../models/Usuario.php";

    class indexController {
        private $conexao;
        public $usuario;

        public function __construct() {
            // Ensure a session is started before using $_SESSION
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            $db = new Conexao();
            $pdo = $db->conectar();
            $this->conexao = $pdo;
            // Instantiate the Usuario model (match class name capitalization)
            $this->usuario = new Usuario($pdo);
        }

        public function index() {
           require "../views/index/index.php";
        }

        public function erro() {
            require "../views/index/erro.php";
        }

        public function sair() {
            //session_destroy();
            unset($_SESSION["pneuxpress"]);
            echo "<script>location.href='index'</script>";
        }

        public function verificar($email, $senha) {
            $dadosUsuario = $this->usuario->getUsuario($email);

            if (empty($dadosUsuario->id)) {
                echo "<script>mensagem('Usuário inválido!', 'index', 'error');</script>";
                return; // stop further execution
            }

            if (!password_verify($senha, $dadosUsuario->senha)) {
                echo "<script>mensagem('Senha inválida!', 'index', 'error');</script>";
                return; // stop further execution
            }

            // Successful login -> store session and redirect
            $_SESSION["pneuxpress"] = array(
                "id" => $dadosUsuario->id,
                "nome" => $dadosUsuario->nome
            );
            echo "<script>location.href='index'</script>";
        }
    }