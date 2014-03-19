<?php $this->set('title_for_layout', 'teste'); ?>
<h1>Adicionar Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('id' => 'title'));
echo $this->Form->input('body', array('rows' => '3', 'id' => 'body'));
/*echo $this->Js->submit('Enviar', array(
	'id'=> 'contatoEnvia',
	'update' => '#respostaAjax'
        )
);*/
echo $this->Form->end(array('label'=>'Enviar', 'class'=>'btn btn-primary btn-large'));
		?>
<div id="respostaAjax"></div>
