<div class="row">
    <div class="span3 offset9">
        <?=
        $this->Form->Select('Categoria.id', $categoria_selectbox,
            array('empty' => true, 'class' => 'selectpicker', 'value' => isset($categoria_filtro_id) ? $categoria_filtro_id : "")); ?>
    </div>
</div>
<script type="text/javascript">
    $('.selectpicker').selectpicker({'noneSelectedText': "Filtro por categoria"});
    $('#CategoriaId').change(function () {
        <?php if (isset($inativos)): ?>
        document.location = '/admin/produto_inativo/' + $(this).val();
        <?php else: ?>
        document.location = '/admin/produto_ativo/' + $(this).val();
        <?php endif; ?>
    });
</script>

<div class="row">
    <div class="span12">

        <?php if (sizeof($produtos) > 0): ?>
                <table class="table table-bordered">
                <caption>Lista de Produtos</caption>
                <thead>
                <tr>
                    <th class="minimum">Cod.</th>
                    <th class="minimum">Foto</th>
                    <th> Nome</th>
                    <th>Material</th>
                    <th class="small">Categoria</th>
                    <th class="small">Preço</th>
                    <th class="minimum">Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= $produto['Produto']['codigo'] ?></td>
                        <td><?= $this->Upload->imgTag($produto, 'Produto', 'foto', 140, 140, 35, 35) ?></td>
                        <td><?= $produto['Produto']['nome'] ?></td>
                        <td><?= $produto['Material']['nome'] ?></td>
                        <td><?= $produto['Categoria']['nome'] ?></td>
                        <td><?= $produto['Produto']['valor'] ?></td>
                        <td>
                            <div class="btn-group hand-hover">
                                <a title="Ver na loja" href="/produto/<?= $produto['Produto']['id'] ?>"
                                   class="btn btn-mini">
                                    <i class="icon-eye-open"></i>
                                </a>
                                <a title="Editar produto" href="/admin/produto_editar/<?= $produto['Produto']['id'] ?>"
                                   class="btn btn-mini">
                                    <i class="icon-edit"></i>
                                </a>
                                <?php if (isset($inativos)): ?>
                                    <a title="Ativar produto"
                                       href="/admin/produto_ativar/<?= $produto['Produto']['id'] ?>"
                                       class="btn btn-mini">
                                        <i class="icon-ok-circle"></i>
                                    </a>
                                <?php else: ?>
                                    <a title="Inativar produto"
                                       href="/admin/produto_inativar/<?= $produto['Produto']['id'] ?>"
                                       class="btn btn-mini">
                                        <i class="icon-ban-circle"></i>
                                    </a>
                                <?php endif; ?>
                                <a title="Deletar produto" href="/admin/produto_delete/<?= $produto['Produto']['id'] ?>"
                                   class="btn btn-mini">
                                    <i class="icon-remove"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <span>Nenhum produto a exibir.</span>
        <?php endif; ?>
    </div>
</div>


