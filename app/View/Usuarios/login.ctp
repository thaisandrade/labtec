<?php echo $this->Form->create('Usuario', array('class' => 'form-signin')); ?>
<?= $this->Form->input('email', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => true)); ?>
<?= $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Senha')); ?>
<?php echo $this->Form->end(array('label' => 'Logar', 'class' => 'btn btn-large  btn-primary btn-block')); ?>
<?=isset($obs)?'<div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Atenção!</strong>
    '.$obs.'
</div>':'';?>
<div class="span12">
    <a href="#myModal"  data-toggle="modal">Esqueci minha senha</a><br><br>
    <a href="#">Ainda não tenho cadastro</a>
</div>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Esqueci minha senha</h3>
    </div>
    <form method="post" action="usuarios/redefinirsenha">
    <div class="modal-body">
        <p>Enviar link de redefinição de senha para o email <br><br> <label><strong>Email de cadastro</strong></label><input type="text" placeholder="email@seuprovedor.com.br" id="emailcadastro" name="emailcadastro"></p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="OK">
    </div>
    </form>
</div>

