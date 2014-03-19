<script type="text/javascript" src="/js/QapTcha.jquery.js"></script>
<script type="text/javascript" src="/js/jquery.contato-1.1.js"></script>
<?php
echo $this->Html->css('QapTcha.jquery');

?>
<script type="text/javascript">
    /* Máscaras ER */
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('contatoTelefone').onkeyup = function(){
            mascara( this, mtel );
        }
    }
</script>

<div class="span6">
    <div class="row-fluid">
        <form id="contatoForm" name="contatoForm" method="post" class="contact-frm">

            <label><span class="text-error">*</span>Nome:</label>

            <input type="text" name="contatoNome" id="contatoNome" placeholder="Nome" class="span10"><br>
            <label><span class="text-error">*</span>E-mail:</label>
            <input type="text" name="contatoEmail" id="contatoEmail" placeholder="nome@seuprovedor.com.br" class="span10"><a href="#" class="tooltip-test" title="Preencha com um email válido Ex: nome@seuprovedor.com.br"><i class="icon-info-sign"></i></a>
            <label><span class="text-error">*</span>Telefone:</label>
            <input type="text" name="contatoTelefone" id="contatoTelefone" autocomplete="off" placeholder="(DDD) + numero" class="span6"><a href="#" class="tooltip-test" title="Preencha com um telefone válido Ex: (DDD)+ número"><i class="icon-info-sign"></i></a>
            <label><span class="text-error">*</span>Cidade</label>
            <input type="text" class="span6" id="contatoCidade" placeholder="Sua Cidade" name="contatoCidade"><br>
            <label><span class="text-error">*</span>Assunto:</label>
            <input type="text" class="span5" id="contatoAssunto" placeholder="Assunto" name="contatoAssunto"><br>
            <label><span class="text-error">*</span>Mensagem:</label>
            <textarea name="contatoCorpo" id="contatoCorpo" placeholder="Escreva aqui a sua mensagem..." class="span10" rows="5" cols="50"></textarea><br>
            <div class="row-fluid">
                <div class="span6">
                    <div class="QapTcha"> <div id="cadeado"></div></div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <input type="button" value="Enviar Formulário" id="contatoEnvia" class="btn btn-success btn-large">
                </div>
            </div>
        </form>
    </div>
    <p class="text-error">* Campos Obrigatório.</p>
</div>
<div class="span4">
    <h3>Nossa Localização</h3>
    <p>Mapa personalizado com a nossa localização.</p>
    <div class="span12">
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt&amp;geocode=&amp;q=paraty+rj&amp;sll=-22.778071,-45.047576&amp;sspn=0.521037,0.610428&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Paraty+-+Rio+de+Janeiro&amp;ll=-23.132783,-44.710236&amp;spn=0.442005,0.583649&amp;z=10&amp;iwloc=A&amp;output=embed">Mapa Flora Graúna Paraty</iframe>
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.QapTcha').QapTcha({
            autoSubmit: false,
            autoRevert: true,
            PHPfile: '/contato_app/Qaptcha.jquery.php'
        });
    });
</script>