<ul class="breadcrumb">
    <li><a href="/produtos">Loja todos os Santos</a> <span class="divider">/</span></li>
    <li><a href="/categoria/<?= $produto['Categoria']['id'] ?>"><?= $produto['Categoria']['nome'] ?></a> <span
            class="divider">/</span></li>
    <li class="active">Produto</li>
</ul>

<div class="row-fluid">
    <div class="span5">
        <div class="img-polaroid img-rounded">
            <?= $this->Upload->fancyboxImg($produto, 'Produto', 'foto', 350, 350); ?>
        </div>
        <p><i class="icon-zoom-in"></i> Clique na imagem para ampliar </p>

    </div>
    <div class="span5 offset1">
        <h3><?= $produto['Produto']['nome'] ?></h3>

        <?php if (!empty($produto['Produto']['codigo'])): ?>
            <p>Código: <?= $produto['Produto']['codigo'] ?> </p>
        <?php endif; ?>

        <?php if ($produto['Produto']['valor'] > 0): ?>
            <p>Valor: <?= $this->Money->format($produto['Produto']['valor']) ?> </p>
        <?php endif; ?>

        <p>
            <a href="/carrinho/adicionar/<?= $produto['Produto']['id'] ?>" class="btn btn-large btn-success">
                Adicionar ao carrinho de orçamento <i class="icon-shopping-cart"></i>
            </a>
        </p>
        <p class="text-error"><strong>Frete por conta do Cliente</strong></p>
    </div>
</div>

<div class="row-fluid margin-top-20px">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Descrição</a></li>
    </ul>
    <p>Material empregado na fabricação: <strong><?= $produto['Material']['nome'] ?></strong></p>

    <p><?= $produto['Produto']['descricao'] ?></p>
</div>


<div class="produtos-relacionados">
    <h5>Produtos Relacionados</h5>


    <ul class="unstyled productList">
        <?php foreach ($relacionados as $produto): ?>
            <li>
                <div class="photo">
                    <a href="/produto/<?= $produto['Produto']['id'] ?>">
                        <?= $this->Upload->imgTag($produto, "Produto", "foto", 140, 140); ?>
                    </a>
                </div>
                <div class="pi">
                    <p class="title">
                        <a href="/produto/<?= $produto['Produto']['id'] ?>">
                            <?= $produto['Produto']['nome'] ?>
                        </a>
                    </p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="clearfix"></div>
</div>
