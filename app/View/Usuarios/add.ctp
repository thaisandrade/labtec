<div class="users form">
    <form  method="post" action="<?= $this->here ?>">
    <fieldset>
        <legend><?php echo __('Add Usuarios'); ?></legend>
        <?php echo $this->Form->input('nome');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        ?>
        <?=
        $this->Form->Select('Usunivel.id', $usuniveis_selectbox,
            array('empty' => 'escolha um Nível', 'class' => 'selectpicker', 'value' => isset($produto_edit['Usunivel']['id']) ? $produto_edit['Usunivel']['id'] : "")); ?>
        <label>Perfil: </label>
        <?=
        $this->Form->Select('Perfil.id', $perfil_selectbox,
            array('empty' => 'escolha um Perfil', 'class' => 'selectpicker', 'value' => isset($produto_edit['Perfil']['id']) ? $produto_edit['Perfil']['id'] : "")); ?>
        <label>Status: </label>
        <?=
        $this->Form->Select('Statu.id', $status_selectbox,
            array('empty' => 'escolha um Status', 'class' => 'selectpicker', 'value' => isset($produto_edit['Statu']['id']) ? $produto_edit['Statu']['id'] : "")); ?>
    </fieldset>
    <?php echo $this->Form->end(__('Cadastrar'));?>

</div>