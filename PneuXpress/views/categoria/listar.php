<div class="card">
    <div class="card-header">
        <h2 class="float-start">Lista de usuarios</h2>
        <div class="float-end">
            <a href="usuario" title="Novo" class="btn btn-success">
                <i class="fas fa-file"></i> Novo Registro
            </a>

            <a href="usuario/listar" title="Listar" class="btn btn-success">
                <i class="fas fa-file"></i> Listar
            </a>
        </div>
    </div>
    <div class="card-body">
        <!-- <p>Abaixo as usuarios cadastradas:</p> -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome de Usuário</td>
                    <td>Telefone</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $dadosusuario = $this->usuario->listar();
                    foreach ($dadosusuario as $dados) {

                        // $ativo = "<span class='alert alert-success'>Sim</span>";
                        // if ($dados->ativo == 'N') $ativo = "<span class='alert alert-danger'>Não</span>";
                        ?>
                        <tr>
                            <td><?=$dados->id?></td>
                            <td><?=$dados->nome?></td>
                            <td><?=$dados->telefone?></td>
                            <td width="150px">
                                <!-- <a href="javascript:excluir(<?=$dados->id?>, 'usuario')" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a> -->
                                <a href="usuario/index/<?=$dados->id?>" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>