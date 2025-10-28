<?php

    //print_r($_POST);
    $id = $_POST["id"] ?? NULL;
    $nome =trim($_POST["nome"] ?? NULL);
    $descricao = trim($_POST["descricao"] ?? NULL);
    $categoria_id = $_POST["categoria_id"] ?? NULL;
    $valor = trim($_POST["valor"] ?? NULL);
    $destaque = $_POST["destaque"] ?? NULL;
    $ativo = $_POST["ativo"] ?? NULL;

    //1.500,00 -> 1500.00
    $valor = str_replace(".", "", str_replace(",", ".", $valor));

    if (empty($nome)) {
        echo "<script>mensagem('Digite o nome do produto!', 'produto', 'error');</script>";
        exit;
    } else if (empty($categoria_id)) {
        echo "<script>mensagem('Selecione a categoria!', 'produto', 'error');</script>";
    }

    //print_r($_FILES);

    //$imagem = $_POST["imagem"] ?? time().".jpg";
    //$_POST["imagem"] = $imagem;

    if (!empty($_FILES["imagem"]["name"])) {
        $imagem = time().".jpg";
        $_POST["imagem"] = $imagem;
    }

    $msg = $this->produto->salvar($_POST);

    if ($msg == 1) {
        //gravar a imagem no servidor
        if (!empty($imagem)) {
            $arquivoDestino = "../public/arquivos/{$imagem}";
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivoDestino);
        }
        
        echo "<script>mensagem('Dados gravados/atualizados com sucesso!!!', 'produto', 'ok');</script>";
    } else {
        echo "<script>mensagem('Erro ao gravar/atualizar dados!', 'produto', 'error');</script>";
    }

?>