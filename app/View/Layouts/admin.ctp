<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Painel Administrativo <?= $nome_aplicacao ?></title>


    <?php echo $this->Html->css('twitter/bootstrap/bootstrap.min'); ?>

    <?php echo $this->Html->css('bootstrap-select.min'); ?>

    <?php echo $this->Html->css('bootstrap-checkbox'); ?>

    <?php //echo $this->Html->css('bootstrap-modal'); ?>

    <?php echo $this->Html->css('font-awesome/css/font-awesome.min'); ?>

    <?php echo $this->Html->css('admin'); ?>

    <?php echo $this->Html->script('jquery-1.9.0.min'); ?>

    <?php echo $this->Html->script('jquery-ui-1.9.2.min'); ?>

    <?php echo $this->Html->script('jquery.maskMoney'); ?>

    <?php echo $this->Html->script('twitter/bootstrap/bootstrap.min'); ?>

    <?php echo $this->Html->script('bootstrap-select.min'); ?>

    <?php echo $this->Html->script('bootstrap-checkbox'); ?>

    <?php //echo $this->Html->script('bootstrap-modal.js'); ?>

    <?php //echo $this->Html->script('bootstrap-modalmanager.js'); ?>

    <?php echo $this->Html->script('ckeditor/ckeditor'); ?>

    <?php echo $this->Html->css('/js/jwindowcrop/jWindowCrop.css'); ?>

    <?php echo $this->Html->script('jwindowcrop/jquery.jWindowCrop.js');  ?>

    <?php echo $this->Html->script('bootbox.min');  ?>

</head>

<body>
<div class="container">
    <div class="row">
        <div class="row">
        <div class="span12 logo">
            <?php if ($msg = $this->Session->flash()): ?>
                <div id="flash_box"><?php echo $msg; ?></div>
            <?php endif; ?>

                <a href="/"><img src="/img/logo.png" alt="Logo <?= $nome_aplicacao ?>"></a>
            </div>
            </div>

            <div class="row">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="brand" href="/admin">Painel Administrativo</a>

                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li><a href="/admin/usuario">Usuário</a> </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            Produtos <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/admin/produto_cadastrar">Cadastrar</a></li>
                                            <li><a href="/admin/produto">Listar</a></li>
                                            <li><a href="/admin/produto_inativo">Listar Inativos</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Categorias <b
                                                class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/admin/categoria">Cadastrar/Listar</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Materiais <b
                                                class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/admin/material">Cadastrar/Listar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a class="btn" href="/logout"><i class="icon-signin"></i> Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->fetch('content'); ?>
            <div class="row">
                <div class="span12">
                    <p class="text-right">
                        <a href="http://www.orions.com.br">
                            <span class="badge badge-info"><i
                                    class="icon-code"></i> Orions</span>
                        </a>
                    </p>

                </div>

            </div>
        </div>
    </div>
</body>
</html>