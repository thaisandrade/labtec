<?php if (!$this->request->is("ajax")): ?>
    <h2><?= $section_title ?></h2>
<? endif; ?>

<div id="master_render" class="plist">

    <?php if (sizeof($produtos) === 0): ?>
    <small>Nenhum produto encontrado.</small>
    <?php else: ?>
        <?php
        //*
        //$hasPages = ($this->params['paging']['Produto']['pageCount'] > 1);
        if (isset($show_pagination)) {
            $this->Paginator->options(array(
                'update' => '#master_render',
                'evalScripts' => true,
                'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
                'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
            ));

            echo $this->Paginator->numbers(array(
                'before' => '<div class="pagination pagination-small pagination-centered"><ul>',
                'separator' => '',
                'currentClass' => 'active',
                'currentTag' => 'a',
                'tag' => 'li',
                'after' => '</ul></div>'
            ));
        }/**/
        ?>
        <?php echo $this->Html->image('ajax-loader.gif', array('id' => 'busy-indicator', 'style' => 'display: none')); ?>
        <ul class="unstyled productList">
            <?php foreach ($produtos as $produto): ?>
                <li>
                    <div class="photo">
                        <a href="/produto/<?= $produto['Produto']['id'] ?>">
                            <?php //$this->Upload->imgTag($produto, "Produto", "foto", 100, 140); ?>
                            <img alt="<?=$produto['Produto']['nome']; ?>" src="/files/produto/foto/<?=$produto['Produto']['foto_dir']; ?>/140x140_<?=$produto['Produto']['foto']; ?>">
                        </a>
                    </div>
                    <div class="pi">
                        <p class="title">
                            <a href="/produto/<?= $produto['Produto']['id'] ?>">
                                <?php if (!empty($produto['Produto']['codigo'])): ?>
                                    Cod: <?= $produto['Produto']['codigo'] ?><br>
                                <?php endif; ?>
                                <?= $produto['Produto']['nome'] ?>
                            </a>
                        </p>
                        <?php if ($produto['Produto']['material_id'] != 1): ?>
                            <p class="informacao"><small>Material: <?= $produto['Material']['nome']; ?></small></p>
                        <?php endif; ?>
                        <?php if ($produto['Produto']['valor'] > 0): ?>
                            <p class="preco"><?= $this->Money->format($produto['Produto']['valor']) ?></p>
                        <?php endif; ?>
                        <p><a href="/produto/<?= $produto['Produto']['id'] ?>" class="btn btn-primary btn-small">[+] Detalhes</a> </p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="clearfix"></div>
    <?php
    //*
    //$hasPages = ($this->params['paging']['Produto']['pageCount'] > 1);
    if (isset($show_pagination)) {
        $this->Paginator->options(array(
            'update' => '#master_render',
            'evalScripts' => true,
            'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
            'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
        ));

        echo $this->Paginator->numbers(array(
            'before' => '<div class="pagination pagination-small pagination-centered"><ul>',
            'separator' => '',
            'currentClass' => 'active',
            'currentTag' => 'a',
            'tag' => 'li',
            'after' => '</ul></div>'
        ));
    }/**/
    ?>
</div>

<?php echo $this->Js->writeBuffer(); ?>
