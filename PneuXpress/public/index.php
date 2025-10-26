<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle - PneuXpress</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.inputmask.min.js"></script>
    <script src="js/jquery.maskedinput-1.2.1.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/sweetalert2.js"></script>

    <script>

        //funcao para mostrar senha
        mostrarSenha = function() {
            const campo = document.getElementById('senha');
            if (campo.type === "password") {
                campo.type = "text";
            } else {
                campo.type = "password";
            }
        }

    </script>
</head>
<body>
    <?php
        if ((!isset($_SESSION["pneuxpress"])) && (!$_POST)) {
            //nao tem secao e nao foi dado post
            require "../views/index/login.php";
        } else if ((!isset($_SESSION["pneuxpress"])) && ($_POST)) {
            //nao tem secao mas foi dado post
            require "../controllers/index/loginController.php";
        } else {
            require "";
            
        }
    ?>
</body>
</html>