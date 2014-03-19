<div class="row">
    <div class="span4">
        <form class="form-horizontal" method="post" action="<?= $this->here ?>" enctype="multipart/form-data">
            <fieldset>
                <legend><?= isset($material_edit) ? "Editar material" : "Cadastrar um novo material" ?></legend>
                <label>Nome</label>
                <input type="text" name="Material[nome]" class="input-xlarge" placeholder="Nome do material" value="<?= isset($material_edit['Material']['nome']) ? $material_edit['Material']['nome'] : "" ?>">

                <button type="submit" class="btn btn-success top-buffer">
                    <?= isset($material_edit) ? "Editar material" : "Cadastrar material" ?>
                </button>
                <?php if (isset($material_edit)): ?>
                    <a class="btn btn-info top-buffer" href="/admin/material">
                        Cancelar edição
                    </a>
                <?php endif; ?>
            </fieldset>
        </form>
    </div>

    <div class="span8">
        <table class="table table-bordered">
            <caption>Lista de materiais</caption>
            <thead>
            <tr>
                <th>Nome</th>
                <th class="minimum">Produtos</th>
                <th class="minimum"></th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($materiais as $material): ?>
                <tr>
                    <td><?= $material['Material']['nome'] ?></td>
                    <td><?= sizeof($material['Produto']) ?></td>
                    <td>
                        <div class="btn-group">
                            <a title="Editar material" href="/admin/material/<?= $material['Material']['id'] ?>"
                               class="btn btn-mini">
                                <i class="icon-edit"></i>
                            </a>
                            <a title="Exclui material" href="/admin/material_delete/<?= $material['Material']['id'] ?>"
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
