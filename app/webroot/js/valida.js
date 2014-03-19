
var showError = function(strObject,strTitle,strMessage){
    $('<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">'+strTitle+'</h3></div><div class="modal-body"><p>'+strMessage+'</p></div><div class="modal-footer"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Voltar ao Formulário</button></div></div>').modal('show');
};
var validateFields = function(){
    var tempString = $('#contatoNome').val();
    if(tempString.length < 3){
        showError('#contatoNome','Olá!','O campo nome é obrigatório.');
        return false;
    }
    var tempString = /^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9])+(\.[a-zA-Z0-9_-]+)+$/;
    var tempBoolean = true;
    if(!tempString.test($('#contatoEmail').val()))
        tempBoolean = false;
    if(!tempBoolean){
        showError('#contatoEmail','Olá!','O campo email é obrigatório, preencha com um e-mail válido!<br> Ex: seuemail@seuprovedor.com.br');
        return false;
    }
    var tempString = /^(\([1-9][1-9]\) [0-9][0-9]{4}-[0-9]{4})|(\([1-9][1-9]\) [0-9]{4}-[0-9]{4})$/;
    var tempBoolean = true;
    if(!tempString.test($('#contatoTelefone').val()))
        tempBoolean = false;
    if(!tempBoolean){
        showError('#contatoTelefone','Olá!','O campo telefone é obrigatório, preencha somente com números conforme o exemplo<br> Ex: (12) 3333-3333 ou (12) 99999-9999(nono dígito)<br> DDD mais o número do telefone!');
        return false;
    }
    var tempString = $('#contatoCidade').val();
    if(tempString.length < 3){
        showError('#contatoCidade','Olá!','O campo cidade é obrigatório.');
        return false;
    }
    var tempString = $('#contatoAssunto').val();
    if(tempString.length < 4){
        showError('#contatoAssunto','Olá!','O campo assunto é obrigatório. <br> São obrigatório no mínimo 4 caracteres.');
        return false;
    }

    var tempString = $('#contatoCorpo').val();
    if(tempString.length < 12){
        showError('#contatoCorpo','Olá!','O campo mensagem é obrigatório.<br> São obrigatório no mínimo 12 caracteres.');
        return false;
    }
    return true;
};
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
$(document).ready(function(){
    $('#contatoEnvia').click(function(){
        if(validateFields()){
            cleanForm();
            showError('','Olá!','Mensagem enviada com sucesso');
        }
        return false;
    });
});

