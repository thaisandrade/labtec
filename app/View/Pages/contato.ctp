<script type="text/javascript" src="/js/valida.js"></script>
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
<div class="row-fluid">

    <div class="span6">
        <form class="form-horizontal">
            <h3 class="hHome">Formulário de Contato</h3>
            <div class="control-group">
                <label class="control-label" for="contatoNome">*Nome</label>
                <div class="controls">
                    <input type="text" id="contatoNome" placeholder="Nome">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="contatoEmail">*Email</label>
                <div class="controls">
                    <input type="text" id="contatoEmail" placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contatoTelefone">*Telefone</label>
                <div class="controls">
                    <input type="text" id="contatoTelefone" placeholder="(22) 2222-2222">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contatoCidade">*Cidade</label>
                <div class="controls">
                    <input type="text" id="contatoCidade" placeholder="Cidade">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contatoAssunto">*Assunto</label>
                <div class="controls">
                    <input type="text" id="contatoAssunto" placeholder="Assunto">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contatoCorpo">*Mensagem</label>
                <div class="controls">
                    <textarea id="contatoCorpo" placeholder="Escreva sua mensagem aqui" rows="6"></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-large btn-primary" id="contatoEnvia" title="Enviar Formulário">Enviar Fomulário</button>
                </div>
            </div>
        </form>
    </div>
    <div class="span6">
        <div class="hero-unit">
            <h3>Observações</h3>
            <p>Através deste formulário você pode nos enviar suas sugestões, elogios, reclamações e outros.</p>
            <p><small>(*) Campos obrigatórios. </small></p>
        </div>
    </div>
</div>