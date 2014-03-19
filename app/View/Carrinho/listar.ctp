<table class="table table-condensed bg-gray">
    <caption><h2>Lista de itens no carrinho</h2></caption>
    <thead>
    <tr>
        <th>Código</th>
        <th></th>
        <th>Nome do Produto</th>
        <th style="width: 100px">Quantidade</th>
        <th>Remover</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produtos_carrinho as $produto): ?>
        <tr>
            <td><?= $produto['Produto']['codigo'] ?></td>
            <td><?= $this->Upload->imgTag($produto, 'Produto', 'foto', 140, 140, 50, 50); ?></td>
            <td><?= $produto['Produto']['nome'] ?></td>
            <td>
                <div class="input-prepend input-append">
                    <span class="add-on">
                    <a href="/carrinho/atualizar_menos/<?= $produto['Produto']['id'] ?>">
                        <i class="icon-minus"></i>
                    </a>
                    </span>
                    <input style="width: 20px" type="text" id="produto_<?= $produto['Produto']['id'] ?>"
                           value="<?= $produtos_quantidade[$produto['Produto']['id']] ?>"
                           onKeyUp="envia_quantidade(<?= $produto['Produto']['id'] ?>)" autocomplete="off"/>
                    <span class="add-on">
                    <a href="/carrinho/atualizar_mais/<?= $produto['Produto']['id'] ?>">
                        <i class="icon-plus"></i>
                    </a>
                    </span>
                </div>
            </td>
            <td>
                <p class="text-center">
                    <a class="btn" href="/carrinho/remover/<?= $produto['Produto']['id'] ?>" title="Remover item">
                        <i class="icon-remove"></i>
                    </a>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="pull-right ">
    <p class="text-error"><strong>Frete por conta do Cliente</strong></p>
    <p><a class="btn btn-success btn-large" href="/carrinho/finalizar">Finalizar orçamento <i
                class="icon-external-link-sign icon-large"></i> </a></p>

    <p><a class="btn btn-primary" href="<?= isset($categoria_ultimo_produto_adicionado) ? "/categoria/" . $categoria_ultimo_produto_adicionado : "/produtos" ?>"><i class="icon-reply"></i> Continuar comprando</a></p>

    <p><a class="btn btn-warning" data-bb="confirm" data-text="Tem certeza que deseja esvaziar o carrinho?"
          data-href="/carrinho/limpar"><i class="icon-remove"></i> Limpar
            carrinho</a>
    </p>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    resTime = false;
    function envia_quantidade(pId) {
        if (!resTime) {
            resTime = true;
            var context = $('#produto_' + pId);
            setTimeout(function () {
                context.fadeOut(100).fadeIn(100, function () {
                    document.location.href = '/carrinho/atualizar/' + pId + '/' + context.val();
                });
            }, 1000);

        }
    }
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