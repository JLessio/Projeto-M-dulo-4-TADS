<?php
    if (empty($id)) {
        echo "<script>mensagem('Registro inválido!', 'produto', 'error');</script>";
        exit;
    } else {
        $msg = $this->produto->editar($id);
        if ($msg == 1) {
            echo "<script>mensagem('Registro excluído com sucesso!', 'produto/listar', 'ok');</script>";
            exit;
        } else {
            echo "<script>mensagem('Erro ao excluir o registro!', 'produto', 'error');</script>";
            exit;
        }
    }