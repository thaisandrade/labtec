<form id="cadastro" class="form-horizontal" method="post" action="<?= $this->here ?>" enctype="multipart/form-data">
    <fieldset>
        <div class="row">
            <legend><?= isset($produto_edit) ? "Editar produto" : "Cadastrar um novo produto" ?></legend>
            <div class="span3">


                <label>Código: </label>
                <input type="text" name="Produto[codigo]" class="input-small required" placeholder="Código"
                       value="<?= isset($produto_edit['Produto']['codigo']) ? $produto_edit['Produto']['codigo'] : "" ?>">

                <label>Valor: </label>

                <div class="input-prepend input-append">
                    <span class="add-on">R$</span>
                    <input type="text" name="Produto[valor]" class="input-mini" placeholder="Valor"
                           value="<?= isset($produto_edit['Produto']['valor']) ? $this->Money->formatWithoutRS($produto_edit['Produto']['valor']) : "" ?>">
                </div>

                <label>Categoria: </label>
                <?=
                $this->Form->Select('Categoria.id', $categoria_selectbox,
                    array('empty' => 'escolha uma Categoria', 'class' => 'selectpicker', 'value' => isset($produto_edit['Categoria']['id']) ? $produto_edit['Categoria']['id'] : "")); ?>


                <label>Material: </label>
                <?=
                $this->Form->Select('Material.id', $material_selectbox,
                    array('empty' => false, 'class' => 'selectpicker', 'value' => isset($produto_edit['Material']['id']) ? $produto_edit['Material']['id'] : "")); ?>


                <label>Nível de relevância: </label>
                <?=
                $this->Form->Select('Produto.nivel_relevancia', $relevancia_selectbox,
                    array('empty' => false, 'class' => 'selectpicker', 'value' => isset($produto_edit['Produto']['nivel_relevancia']) ? $produto_edit['Produto']['nivel_relevancia'] : "")); ?>


            </div>
            <div class="span5">


                <label>Nome</label>
                <input type="text" name="Produto[nome]" class="input-xlarge required" placeholder="Nome do produto"
                       value="<?= isset($produto_edit['Produto']['nome']) ? $produto_edit['Produto']['nome'] : "" ?>">

                <label>Descrição</label>
                <textarea name="Produto[descricao]" class="input-xxlarge" id="descricao"
                          placeholder="Descrição do produto"
                          rows="6"><?= isset($produto_edit['Produto']['descricao']) ? $produto_edit['Produto']['descricao'] : "" ?></textarea>

            </div>
            <div class="span4">
                <?php if (isset($produto_edit)): ?>
                    <img class="img-polaroid"
                         width="200px" height="200px"
                         alt="<?= $produto_edit['Produto']['nome'] ?>"
                         src="/files/produto/foto/<?= $produto_edit['Produto']['foto_dir'] ?>/350x350_<?= $produto_edit['Produto']['foto'] ?>">

                    <div class="btn-toolbar">
                        <a id="cropLnk" class="btn btn-warning" data-toggle="modal" data-target="#crop"
                           href="/admin/produto_editar_cortar/<?= $produto_edit['Produto']['id'] ?>">Cortar imagem</a>
                    </div>
                <?php endif; ?>
                <label>Foto: </label>
                <input type="file" name="data[Produto][foto]" <?php if (!isset($produto_edit)): ?>class="required" <?php endif; ?> id="foto" style="display: none"
                       onchange="$('#nome_arquivo').val(this.value)"/>

                <input class="input-large" id="nome_arquivo" type="text" placeholder="" disabled>

                <div class="clearfix"></div>
                <!-- Fazer upload em realtime -->
                <input type="button" value="Selecione um arquivo" class="btn" onclick="$('#foto').click();">
                <?php if (isset($produto_edit)){
                 echo $this->Form->input('Produto.foto_dir', array('type' => 'hidden', 'value' => $produto_edit['Produto']['id']));
                }else{
                    echo $this->Form->input('Produto.foto_dir', array('type' => 'hidden'));
                }?>
                <span class="help-block">Resolução mínima de 350x350 pixels.</span>
                <?php if (isset($produto_edit)): ?>
                    <span class="help-block">Não selecionar uma nova foto irá manter a foto anterior.</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="row text-center top-buffer">
            <button type="submit" class="btn btn-success">
                <?= isset($produto_edit) ? "Editar produto" : "Cadastrar produto" ?>
            </button>
            <?php if (isset($produto_edit)): ?>
                <a class="btn" href="/admin/produto">
                    Cancelar edição
                </a>
            <?php endif; ?>
        </div>

    </fieldset>
</form>


<?php if (isset($produto_edit)): ?>
    <div id="crop" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Redimencionar imagem</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button id="cortar" class="btn btn-warning">Salvar</button>
            <button class="btn" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
<?php endif; ?>



<script type="text/javascript">
    $('.selectpicker').selectpicker();
    $('.money-mask').maskMoney({thousands: '', decimal: '.'});

    CKEDITOR.replace('descricao');

    $('input[type="checkbox"]').checkbox();

    $('#cortar').click(function () {
        //event.preventDefault();
        $('#crop_form').submit();
    });

    $(".required").each(function () {
        $(this).contents().wrapAll("<b>");
        $(this).contents().append(" *");
    });

    $('#cadastro').submit(function () {
        var isFormValid = true;
        var message = "";
        if($('#CategoriaId').val() == ""){
            isFormValid = false;
            message = "Por favor escolha uma categoria para este produto!!!";
        }else{
        $("input.required").each(function () {
            if ($.trim($(this).val()).length == 0) {
                isFormValid = false;
                message = "Por favor preencha todos os campos antes de enviar (exceto 'valor' e 'descrição')"
            }
        });
        }

        if (!isFormValid)
            bootbox.alert(message);

        var valor = $("input[name='Produto[valor]']");
                valor.val(valor.val().replace(",", "."));

        return isFormValid;
    });

</script>