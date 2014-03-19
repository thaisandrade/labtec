<div class="container-fluid">
	<div class="span12">
    <h1>Posts do Blog</h1>
    <?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'adicionar'));?>
<table>
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Data de Criação</th>
        <th>Data de Modificação</th>
    </tr>

    <!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
         as informações dos posts -->
	    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'ver', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td><?php echo $post['Post']['modified']; ?></td>
        <td><?php echo $this->Html->link('Editar', array('action'=> 'edita', $post['Post']['id'])); ?></td>
    </tr>
    <?php endforeach; ?>

</table>
</div>
</div>