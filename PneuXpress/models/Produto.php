<?php 
    class Produto {

        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function listarCategoria() {
            $sql = "select * from categoria order by descricao";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }

        public function salvar($dados) {
            //atualizar ou salvar o produto
            if (empty($dados["id"])) {
                $sql = "insert into produto (id, nome, descricao, categoria_id, valor, destaque, ativo, imagem) 
                        values (NULL, :nome, :descricao, :categoria_id, :valor, :destaque, :ativo, :imagem)";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome", $dados["nome"]);
                $consulta->bindParam(":descricao", $dados["descricao"]);
                $consulta->bindParam(":categoria_id", $dados["categoria_id"]);
                $consulta->bindParam(":valor", $dados["valor"]);
                $consulta->bindParam(":destaque", $dados["destaque"]);
                $consulta->bindParam(":ativo", $dados["ativo"]);
                $consulta->bindParam(":imagem", $dados["imagem"]);
            } else {
                $sql = "update produto set nome = :nome, descricao = :descricao, categoria_id = :categoria_id, 
                        valor = :valor, destaque = :destaque, ativo = :ativo, imagem = :imagem
                        where id = :id limit 1";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":nome", $dados["nome"]);
                $consulta->bindParam(":descricao", $dados["descricao"]);
                $consulta->bindParam(":categoria_id", $dados["categoria_id"]);
                $consulta->bindParam(":valor", $dados["valor"]);
                $consulta->bindParam(":destaque", $dados["destaque"]);
                $consulta->bindParam(":ativo", $dados["ativo"]);
                $consulta->bindParam(":imagem", $dados["imagem"]);
                $consulta->bindParam(":id", $dados["id"]);
            }
            return $consulta->execute();
        }

        public function listar() {
            $sql = "select * from produto order by nome";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }

        public function editar($id) {
            $sql = "select * from produto where id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }

        public function excluir($id) {
            $sql = "delete from produto where id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id", $id);
            return $consulta->execute();
        }

    }