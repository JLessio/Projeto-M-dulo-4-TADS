<?php
    header("Content-Type: application/json");

    require "../../config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    $id = $_GET["id"] ?? NULL;
    $categoria = $_GET["categoria"] ?? NULL;

    if (!empty($categoria)) {
        //todos os produtos de uma categoria
        $sql = "select * from produto where ativo = 'S' AND categori_id = :categoria order by nome";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":categoria", $categoria);
        $consulta->execute();

        $dadosProduto = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } elseif (!empty($id)) {
        //um determinado produto
        $sql = "select * from produto where ativo = 'S' AND id = :id limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();

        $dadosProduto = $consulta->fetch(PDO::FETCH_ASSOC);
    } else {
        //todos os produtos
        $sql = "select * from produto where ativo = 'S' order by nome";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        $dadosProduto = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode($dadosProduto);