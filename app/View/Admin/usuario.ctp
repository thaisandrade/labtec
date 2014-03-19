<?php
$sessao = CakeSession::read('Auth.Usuario.id');
?>
<div class="row-fluid">
    <?php if(isset($usuario_edit) || $sessao == 1){ ?>
    <div class="span5">
        <form class="form-horizontal" method="post" action="<?= $this->here ?>">
            <fieldset>
                <legend><?= isset($usuario_edit) ? "Editar usuário" : "Cadastrar um novo usuário" ?></legend>
                <div class="control-group">
                    <label class="control-label" for="User[username]">Email</label>
                    <div class="controls">
                        <?php
                        if(!isset($usuario_edit['User']['username'])){
                            ?>

                            <input type="text" name="User[username]" class="span8" placeholder="Nome do usuário">
                        <?php
                        }else{
                            ?>
                            <label class="control-label"><?= $usuario_edit['User']['username'] ?></label>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="User[password]">Senha</label>
                    <div class="controls">
                        <input name="User[password]" class="span8" type="password" id="UserPassword" required="required"/><span class="help-block">Digite a <?= isset($usuario_edit) ? "nova senha" : "senha" ?> para este usuário</span>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success top-buffer">
                            <?= isset($usuario_edit) ? "Editar Usuário" : "Cadastrar usuário" ?>
                        </button>
                        <?php if (isset($usuario_edit)): ?>
                            <a class="btn btn-info top-buffer" href="/admin/usuario">
                                Cancelar edição
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
<?php
    }
?>

    <?php if(!isset($usuario_edit)){ ?>
        <div class="span6 offset1">
            <table class="table table-bordered">
                <caption>Lista de usuários</caption>
                <thead>
                <tr>
                    <th>Usuários</th>
                    <th class="minimum">Ações</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($usuarios as $usuario): ?>
                <?php
                if($sessao == 1 || $sessao == $usuario['User']['id']){
                ?>
                    <tr>
                        <td><?= $usuario['User']['username'] ?></td>
                        <td>
                            <div class="btn-group">

                                <a title="Alterar senha" href="/admin/usuario/<?= $usuario['User']['id'] ?>"
                                   class="btn btn-mini">
                                    <i class="icon-edit"></i>
                                </a>
                                <?php
                                if($sessao == 1){
                                    if($sessao != $usuario['User']['id']){
                                        ?>
                                        <a title="Exclui usuário" class="btn btn-mini" data-bb="confirm" data-text="Tem certeza que deseja excluir o usuário ' <?= $usuario['User']['username'] ?> '?" data-href="/admin/usuario_delete/<?= $usuario['User']['id'] ?>"><i class="icon-remove"></i></a>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                        </td>
                    </tr>

                <?php
                }
                 endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
</div>
<script type="text/javascript">
    $(document).on("click", "a[data-bb='confirm']", function (e) {
        e.preventDefault();
        var text = $(this).data("text");
        var href = $(this).data("href");
        bootbox.confirm(text, function (result) {
            if (result)
                document.location.href = href;
        });
    });
</script>