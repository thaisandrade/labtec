<!DOCTYPE html>
<!-- informando a linguagem utilizada no site -->
<html lang="pt-br">
<head>
    <!-- tipo de codificação -->
    <meta charset="utf-8">
    <!-- setando as compatibilidades com IE e Chrome -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <!-- importante para o css responsive  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_for_layout; ?></title>
    <?php
    echo $this->Html->meta('icon')."\n";
    // css para o bootstrap e o jquery principal
    echo $this->Html->css('bootstrap.min')."\n";
    echo $this->Html->css('bootstrap-responsive')."\n";
    echo $this->Html->css('estilo')."\n";

    echo $this->Html->script('jquery')."\n";?>

    <!--[if (gt IE 9)|!(IE)]><!-->
    <script type="text/javascript" src="/js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->

    <!-- O HTML5 shim, para o suporte dos elementos HTML5 no IE6-8 -->
    <!--[if lt IE 9]>
    <script src="/js/html5.js"></script>
    <![endif]-->

    <!--
    para a página de laboratórios
    <script type="text/javascript" src="/js/jquery.equalheights.js"></script>
    -->

    <?php if ($this->here == "/"): ?>
        <!-- Scripts para o funcionamento do banner -->
        <link rel="stylesheet" href="/css/default.css" type="text/css" media="screen" >
        <link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" media="screen" >
        <script type="text/javascript" src="/js/jquery.nivo.slider.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
        </script>
        <!-- fim scripts do banner -->
    <?php endif; ?>
</head>
<body>
<!-- topo do site -->
<header>
    <div class="row-fluid topo">
        <!-- nav (menu) fixa no topo -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="/"  title="Ir para a página principal do sistema">LabTec Web Control</a>
                    <!-- botão que só aparece no celular ou tablet -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>

                    <!-- Tudo que fica oculto no celular -->
                    <div class="nav-collapse collapse">
                        <ul class="nav menu">
                            <li><a href="/projeto" title="Saiba mais sobre o projeto e seus desenvolvedores"><i class="icon-book icon-white"></i> O Projeto</a></li>
                            <!-- <li class="active"><a href="#"><i class="icon-calendar icon-white"></i> Agendamento</a></li> -->
                            <li class="dropdown">
                                <a href="meu_agendamento.php" title="Listar os Agendamentos" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-calendar icon-white"></i> Agendamento</a>
                                <ul class="dropdown-menu">
                                    <li><a href="meu_agendamento.php" title="Listar os agendamentos"> Listar</a></li>
                                    <li><a href="#" title="Novo Agendamento"> Novo Agendamento</a></li>
                                </ul>
                            </li>
                            <li><a href="laboratorios_professor.php" title="Listar todos os Laboratórios"><i class="icon-cog icon-white"></i> Laboratórios</a></li>
                            <li><a href="meus_dados.php" title="Meus Dados"><i class="icon-user icon-white"></i> Meus Dados</a></li>
                            <li><a href="/contato" title="Fale Conosco"><i class="icon-envelope icon-white"></i> Contato</a></li>
                            <li><a href="/logout" title="Sair do Sistema"><i class="icon-off icon-white"></i> Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- fecha a nav (menu) -->
    </div>
    <!-- Saudações e data -->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span4 text-center logo">
                <a href="index.php"  title="Ir para a página principal do sistema"><img src="img/logo_labtec_webcontrol.jpg" alt="LabTec Web Control"></a>
            </div>
            <div class="span8">
                <div class="row-fluid saudacao">
                    <p><strong><?= $configuracoes['Configuracoes']['nome'] ?></strong></p>
                </div>
                <div class="row-fluid data">
                    <p class="text-left visible-phone"><img src="img/quadradinhos.png" alt="Quadradinhos"> </p>
                    <p class="text-right text-info"><small>Hoje é Quarta-feira dia <?php echo strftime("%d") ?> de <?php echo strftime("%m") ?> de <?php echo strftime("%Y") ?>.</small></p>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- fim do topo do site -->
<?php if($this->here == '/'): ?>
    <!-- banner da home page  -->
    <div class="container-fluid banner">
        <div class="row-fluid">
            <div class="span12">
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                        <img src="/banner/banner1.jpg" data-thumb="/banner/banner1.jpg" alt="banner1">
                        <img src="/banner/banner2.jpg" data-thumb="/banner/banner2.jpg" alt="banner2">
                        <img src="/banner/banner3.jpg" data-thumb="/banner/banner3.jpg" alt="banner3">
                        <img src="/banner/banner4.jpg" data-thumb="/banner/banner4.jpg" alt="banner4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fim banner -->
<?php
endif;
?>
<!-- Seção de conteúdos principais de páginas do site / sistema -->
<section>
    <div class="container-fluid">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
</section>
<!-- fim seção de conteúdos -->
<!-- inicia o rodapé do sistema -->
<footer>
    <!-- Container do rodape -->
    <div class="container-fluid">
        <!-- logo do sistema -->
        <div class="row-fluid">
            <div class="span12 text-center">
                <a href="/" title="Ir para a página principal do sistema"><img src="/img/logo_labtec_webcontrol_rodape.png" alt="LabTec Web control"></a>
            </div>
        </div>
        <!-- copyright e ano -->
        <div class="row-fluid">
            <div class="span12">
                <p class="copy text-center">labtec.com.br © <?php echo strftime("%Y") ?></p>
            </div>
        </div>
        <!-- Mapa do site -->
        <div class="row-fluid menuRod">
            <!-- Agendamentos -->
            <div class="span3">
                <ul class="nav nav-pills nav-stacked menuRodape">
                    <li class="active"><a href="#" title="Agendamentos"><i class="icon-calendar"></i> Agendamentos</a></li>
                    <li><a href="#" title="Agendamentos em aberto">Agendamentos em Aberto</a></li>
                    <li><a href="#" title="Agendamentos em Antigos">Agendamentos em Antigos</a></li>
                    <li><a href="#" title="Solicitar Agendamento">Solicitar Agendamento</a></li>

                </ul>
            </div>

            <!-- Laboratórios -->
            <div class="span3">
                <ul class="nav nav-pills nav-stacked menuRodape">
                    <li class="active"><a href="laboratorios_professor.php" title="Ver todos os laboratórios"><i class="icon-cog icon-white"></i> Laboratórios</a></li>
                    <li><a href="laboratotio_itrain_professor.php" title="Ver Laboratório do i-Train">i-Train</a></li>
                    <li><a href="laboratorios_professor.php" title="Ver Todos os Laboratórios">Ver todos</a></li>
                </ul>
            </div>

            <!-- Dados cadastrais e funcionalidades -->
            <div class="span3">
                <ul class="nav nav-pills nav-stacked menuRodape">
                    <li class="active"><a href="meus_dados.php" title="Meus dados"><i class="icon-user"></i> Meus Dados</a></li>
                    <li><a href="meus_dados.php" title="Alterar meus dados">Alterar dados</a></li>
                    <li><a href="meus_dados.php" title="Alterar minha senha">Alterar senha</a></li>
                    <li><a href="meus_dados.php" title="Cancelar minha conta">Cancelar minha conta</a></li>

                </ul>
            </div>

            <!-- suporte e ajuda -->
            <div class="span3">
                <ul class="nav nav-pills nav-stacked menuRodape">
                    <li class="active"><a href="#" title="Suporte"><i class="icon-info-sign"></i> Suporte</a></li>
                    <li><a href="projeto_professor.php" title="Saber mais sobre o projeto e seus desenvolvedores">O projeto</a></li>
                    <li><a href="formulario_contato_professor.php" title="formulário de contato">Fale conosco</a></li>
                    <li><a href="#" title="Manuais e Tutoriais">Ajuda</a></li>
                    <li><a href="#" title="Política de privacidade">Política de privacidade</a></li>
                    <li><a href="login.php" title="Sair do sistema">Sair do Sistema</a></li>
                </ul>
            </div>
        </div>
        <!-- fecha o mapa do site -->

        <!-- Instituição -->
        <div class="row-fluid">
            <div class="span12 instituicao">
                <p class="text-center">Licenciado para <?= $configuracoes['Configuracoes']['nome'] ?></p>
                <p class="text-center">Endereço: <?= $configuracoes['Configuracoes']['endereco'] ?></p>
                <p class="text-center">Tel.: <?= $configuracoes['Configuracoes']['telefone'] ?></p>
                <p class="text-center"><a href="maito:<?= $configuracoes['Configuracoes']['email'] ?>" title="Enviar email para a <?= $configuracoes['Configuracoes']['nome'] ?>"> <i class="icon-envelope icon-white"></i> <?= $configuracoes['Configuracoes']['email'] ?></a></p>
            </div>
        </div>
        <!-- link dos desenvolvedores do sistema -->
        <div class="row-fluid">
            <div class="span12 orions">
                <p class="text-center"><a href="#" title="Equipe de desenvolvedores">Equipe de desenvolvedores</a></p>
            </div>
        </div>
        <!-- fecha o container do rodapé -->
    </div>
</footer>
<!--
javascript
Colocado no fim, para que a página carregue mais rápido
-->
<!-- Scripts para os celulares touch -->
<script src="/js/jquery-ui-1.9.2.min.js" type="text/javascript"></script>
<script src="/js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<script src="/js/jquery.ui.touch.js" type="text/javascript"></script>

<!-- Scripts para os Bootstrap -->
<?php
echo $this->Html->script('bootstrap-transition')."\n";
echo $this->Html->script('bootstrap-alert')."\n";
echo $this->Html->script('bootstrap-modal')."\n";
echo $this->Html->script('bootstrap-dropdown')."\n";
echo $this->Html->script('bootstrap-scrollspy')."\n";
echo $this->Html->script('bootstrap-tab')."\n";
echo $this->Html->script('bootstrap-tooltip')."\n";
echo $this->Html->script('bootstrap-popover')."\n";
echo $this->Html->script('bootstrap-button')."\n";
echo $this->Html->script('bootstrap-collapse')."\n";
echo $this->Html->script('bootstrap-carousel')."\n";
echo $this->Html->script('bootstrap-typeahead')."\n";
echo $this->Html->script('bootstrap-affix')."\n";
echo $this->Html->script('application')."\n";
?>
</body>
</html>
