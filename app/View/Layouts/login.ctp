<!DOCTYPE HTML>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/login/signin.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <!-- O HTML5 shim, para o suporte dos elementos HTML5 no IE6-8 -->
    <!--[if lt IE 9]>
    <script src="/js/html5.js"></script>
    <![endif]-->
    <?php
    echo $this->Html->meta('icon');
    ?>
    <script type="text/javascript">
        var cleanForm = function(){
            $('input').each(function(index, Element){
                if($(this).attr('type') != 'hidden' && $(this).attr('type') != 'button' && $(this).attr('type') != 'submit' && $(this).attr('type') != 'reset'){
                    $(this).val('');
                }
            });
            $('textarea').each(function(index, Element){

                $(this).val('');
            });
        };
        $(document).ready(function() {
            cleanForm();
            //$('#flashMessage').delay(3000).hide('slow');
            $('.teste').delay(9000).hide('slow');
        });
    </script>

</head>

<body>
<div class="container-fluid">
    <div class="logo text-center">
        <img src="/img/logo_labtec_webcontrol.jpg" alt="LabTec web control">
    </div>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
</div>


<!-- javascript
        ================================================== -->
<!-- Colado no fim, para que a página carregue mais rápido -->
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