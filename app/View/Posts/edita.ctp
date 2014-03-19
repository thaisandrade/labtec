<h1>Edit Post</h1>
<?php
    echo $this->Form->create('Post', array('action' => 'edita'));
    echo $this->Form->input('title');
    echo $this->Form->input('body', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end(array('label'=>'Atualizar Post', 'class'=>'btn btn-primary'));