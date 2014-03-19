<div class="row">
    <div class="span4">
        <form class="form-horizontal" method="post" action="<?= $this->here ?>" enctype="multipart/form-data">
            <fieldset>
                <legend><?= isset($categoria_edit) ? "Editar categoria" : "Cadastrar um novo categoria" ?></legend>
                <label>Título</label>
                <input type="text" name="Categoria[nome]" class="input-xlarge" placeholder="Título da categoria" value="<?= isset($categoria_edit['Categoria']['nome']) ? $categoria_edit['Categoria']['nome'] : "" ?>">

                <button type="submit" class="btn btn-success top-buffer">
                    <?= isset($categoria_edit) ? "Editar categoria" : "Cadastrar categoria" ?>
                </button>
                <?php if (isset($categoria_edit)): ?>
                    <a class="btn btn-info top-buffer" href="/admin/categoria">
                        Cancelar edição
                    </a>
                <?php endif; ?>
            </fieldset>
        </form>
    </div>

    <div class="span8">
        <table class="table table-bordered">
            <caption>Lista de categorias</caption>
            <thead>
            <tr>
                <th>Nome</th>
                <th class="minimum">Produtos</th>
                <th class="minimum">Ação</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $categoria['Categoria']['nome'] ?></td>
                    <td><?= sizeof($categoria['Produto']) ?></td>
                    <td>
                        <div class="btn-group">
                            <a title="Editar categoria" href="/admin/categoria/<?= $categoria['Categoria']['id'] ?>"
                               class="btn btn-mini">
                                <i class="icon-edit"></i>
                            </a>
                            <a title="Exclui categoria" href="/admin/categoria_delete/<?= $categoria['Categoria']['id'] ?>"
                               class="btn btn-mini">
                                <i class="icon-remove"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
