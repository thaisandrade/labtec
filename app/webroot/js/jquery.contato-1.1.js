var ajaxCall = undefined;
var ajaxHold = undefined;
var objCaller = undefined;
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
var focusFirst = function(){
    var firstElement = undefined;
    $('input').each(function(index, Element){
        if($(this).attr('type') != 'hidden' && $(this).attr('type') != 'button' && $(this).attr('type') != 'submit'){
            if(firstElement == undefined){
                firstElement = this;
                $(firstElement).focus();
                $(firstElement).select();
            }
        }
    });
};
var errorData = function(iErrCode) {
    var aErrData = {httpCode:0, shortInfo:'',fullInfo:''};
    aErrData.httpCode = iErrCode;
    switch(iErrCode)
    {
        // 400 Bad Request
        // The request contains bad syntax or cannot be fulfilled.
        case 400:
            aErrData.shortInfo = 'Falha de requisição ( Bad Request )';
            aErrData.fullInfo = 'Requisição HTTP enviada ao servidor se encontra numa formatação não valida segundo os padrões da W3C.';
            break;
        // 401 Unauthorized
        // Similar to 403 Forbidden, but specifically for use when authentication is possible but has failed or not yet been provided. The response must include a WWW-Authenticate header field containing a challenge applicable to the requested resource. See Basic access authentication and Digest access authentication.
        case 401:
            aErrData.shortInfo = 'Acesso negado';
            aErrData.fullInfo = 'O acesso ao recurso foi negado devido a uma falha na autenticação.';
            break;
        // 403 Forbidden
        // The request was a legal request, but the server is refusing to respond to it. Unlike a 401 Unauthorized response, authenticating will make no difference.
        case 403:
            aErrData.shortInfo = 'Acesso negado';
            aErrData.fullInfo = 'O servidor negou explicitamente o acesso ao recurso solicitado, procure o administrador do sistema caso este problema persista.';
            break;
        // 404 Not Found
        // The requested resource could not be found but may be available again in the future. Subsequent requests by the client are permissible.
        case 404:
            aErrData.shortInfo = 'Página não encontrada';
            aErrData.fullInfo = 'Não foi possivel localizar o recurso solicitado em nosso servidor, talvez o recurso não exista ou tenha sido deletado.';
            break;
        // 405 Method Not Allowed
        // A request was made of a resource using a request method not supported by that resource; for example, using GET on a form which requires data to be presented via POST, or using PUT on a read-only resource.
        case 405:
            aErrData.shortInfo = 'Falha de requisição ( Method Not Allowed )';
            aErrData.fullInfo = 'A requisição HTTP efetuou a chamada de um metodo que não é suportada pelo servidor.';
            break;
        // 406 Not Acceptable
        // The requested resource is only capable of generating content not acceptable according to the Accept headers sent in the request.
        case 406:
            aErrData.shortInfo = 'Não aceito';
            aErrData.fullInfo = 'Devido a requisição HTTP enviada ao servidor, o conteúdo retornado não pode ser aceito por estar conflitante com o solicitado.';
            break;
        // 407 Proxy Authentication Required
        // ?!?!?!?!?!?!?!?!?!?!?!?!?!?!?!?!?!
        case 407:
            aErrData.shortInfo = 'Autenticação de proxy requerida';
            aErrData.fullInfo = 'Não foi possivel acessar o recurso solicitado devido a solicitação da autenticação de seu proxy.';
            break;
        // 408 Request Timeout
        // The server timed out waiting for the request. According to W3 HTTP specifications: "The client did not produce a request within the time that the server was prepared to wait. The client MAY repeat the request without modifications at any later time."
        case 408:
            aErrData.shortInfo = 'Tempo de resposta esgotado';
            aErrData.fullInfo = 'Não foi possivel concluir a requisição HTTP ja que o tempo de espera pelo recurso ultrapassou o limite permitido.';
            break;
        // 409 Conflict
        // Indicates that the request could not be processed because of conflict in the request, such as an edit conflict.
        case 409:
            aErrData.shortInfo = 'Falha de requisição ( Conflict ) ';
            aErrData.fullInfo = 'Devido a um conflito na requisição HTTP não foi possivel recuperar o recurso desejado.';
            break;
        // 410 Gone
        // Indicates that the resource requested is no longer available and will not be available again. This should be used when a resource has been intentionally removed; however, it is not necessary to return this code and a 404 Not Found can be issued instead. Upon receiving a 410 status code, the client should not request the resource again in the future. Clients such as search engines should remove the resource from their indexes.
        case 410:
            aErrData.shortInfo = 'Permanentemente deletado';
            aErrData.fullInfo = 'O recurso solicitado não se encontra mais disponivel, pois foi deletado do sistema.';
            break;
        // 411 Length Required
        // The request did not specify the length of its content, which is required by the requested resource.
        case 411:
            aErrData.shortInfo = 'Falha de requisição ( Length )';
            aErrData.fullInfo = 'A requisição HTTP não informou o tamanho total de seu conteúdo.';
            break;
        // 412 Precondition Failed
        // The server does not meet one of the preconditions that the requester put on the request.
        case 412:
            aErrData.shortInfo = 'Pré-condição não retornada';
            aErrData.fullInfo = 'O servidor não é compatível com uma, ou mais, pré-condição da requisição HTTP.';
            break;
        // 413 Request Entity Too Large
        // The request is larger than the server is willing or able to process.
        case 413:
            aErrData.shortInfo = 'Requisição HTTP muito longa';
            aErrData.fullInfo = 'A requisição HTTP enviada ao servidor é muito longa e não foi processada, contate o administrador do sistema caso esse problema presista.';
            break;
        // 414 Request-URI Too Long
        // The URI provided was too long for the server to process.
        case 414:
            aErrData.shortInfo = 'Endereço muito longo';
            aErrData.fullInfo = 'O endereço informado na requisição HTTP é muito longo e não pode ser processado pelo servidor, contate o administrador do sistema caso esse problema presista.';
            break;
        // 415 Unsupported Media Type
        //  The request entity has a media type which the server or resource does not support. For example the client uploads an image as image/svg+xml, but the server requires that images use a different format.
        case 415:
            aErrData.shortInfo = 'Tipo de arquivo não suportado';
            aErrData.fullInfo = 'A midia do arquivo enviado não é suportada pelo servidor.';
            break;
        // 416 Requested Range Not Satisfiable
        // The client has asked for a portion of the file, but the server cannot supply that portion. For example, if the client asked for a part of the file that lies beyond the end of the file.
        case 416:
            aErrData.shortInfo = 'Falha de resposta (  Range Not Satisfiable )';
            aErrData.fullInfo = 'O navegador solicitou uma parte do arquivo requisitado e o servidor não pode suprir esta requisição.';
            break;
        // 417 Expectation Failed
        // The server cannot meet the requirements of the Expect request-header field.
        case 417:
            aErrData.shortInfo = 'Falha do servidor ( Expectation Failed )';
            aErrData.fullInfo = 'O servidor não é compatível com os requerimentos esperados pela requisição HTTP.';
            break;
        // 422 Unprocessable Entity (WebDAV) (RFC 4918)
        // The request was well-formed but was unable to be followed due to semantic errors.
        case 422:
            aErrData.shortInfo = 'Entidade não processada';
            aErrData.fullInfo = 'A requisição HTTP se encontra bem formatada, mas a resposta foi negada devido a falhas na semântica.';
            break;
        // 423 Locked (WebDAV) (RFC 4918)
        // The resource that is being accessed is locked.
        case 423:
            aErrData.shortInfo = 'Recurso travado';
            aErrData.fullInfo = 'O recurso solicitado se encontra travado pelo sistema do servidor, não sendo possivel recupera-lo no momento.';
            break;
        // 424 Failed Dependency (WebDAV) (RFC 4918)
        // The request failed due to failure of a previous request (e.g. a PROPPATCH).
        case 424:
            aErrData.shortInfo = 'Falha de requisição ( Failed Dependency )';
            aErrData.fullInfo = 'A requisição HTTP falhou devido a uma falha da requisição anterior.';
            break;
        // 450 Blocked by Windows Parental Controls
        // A Microsoft extension. This error is given when Windows Parental Controls are turned on and are blocking access to the given webpage.
        case 450:
            aErrData.shortInfo = 'Controle dos Pais';
            aErrData.fullInfo = 'A requisição HTTP falhou devido a negação imposta pelo controle dos pais.';
            break;
        // 450 Blocked by Windows Parental Controls
        // A Microsoft extension. This error is given when Windows Parental Controls are turned on and are blocking access to the given webpage.
        case 450:
            aErrData.shortInfo = 'Controle dos Pais';
            aErrData.fullInfo = 'A requisição HTTP falhou devido a negação imposta pelo controle dos pais.';
            break;
        // 500 Internal Server Error
        // A generic error message, given when no more specific message is suitable.
        case 500:
            aErrData.shortInfo = 'Erro interno do servidor';
            aErrData.fullInfo = 'O recurso solicitado nao pode ser retornado devido a um erro do servidor.';
            break;
        // 501 Not Implemented
        // The server either does not recognise the request method, or it lacks the ability to fulfill the request.
        case 501:
            aErrData.shortInfo = 'Erro de protocolo ( Not Implemented )';
            aErrData.fullInfo = 'O servidor não reconheceu todos os dados da requisição HTTP e não pode proseguir.';
            break;
        // 502 Bad Gateway
        // The server was acting as a gateway or proxy and received an invalid response from the upstream server.
        case 502:
            aErrData.shortInfo = 'Gateway inválido';
            aErrData.fullInfo = 'O servidor esta atuando como um Gateway ou Proxy e não obteve uma resposta válida do recurso solicitado.';
            break;
        // 503 Service Unavailable
        // The server is currently unavailable (because it is overloaded or down for maintenance). Generally, this is a temporary state.
        case 503:
            aErrData.shortInfo = 'Serviço temporariamente indisponivel';
            aErrData.fullInfo = 'O servidor da plataforma está temporariamente indisponivel, ou devido a uma sobrecarga, ou a uma manutenção do sistema.';
            break;
        // 504 Gateway Timeout
        // The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.
        case 504:
            aErrData.shortInfo = 'Tempo limite alcançado para o Gateway';
            aErrData.fullInfo = 'O servidor esta atuando como um Gateway ou Proxy e não obteve uma resposta válida do recurso solicitado durante o tempo maximo de espera.';
            break;
        // 505 HTTP Version Not Supported
        // The server does not support the HTTP protocol version used in the request.
        case 505:
            aErrData.shortInfo = 'Erro de protocolo ( HTTP Version Not Supported )';
            aErrData.fullInfo = 'O servidor não suporta a versão o procolo HTTP enviado na requisição.';
            break;
        // 509 Bandwidth Limit Exceeded (Apache bw/limited extension)
        // This status code, while used by many servers, is not specified in any RFCs
        case 509:
            aErrData.shortInfo = 'Limite de banda alcançado';
            aErrData.fullInfo = 'O servidor não retornou o recurso solicitado devido a banda de transferencia do site ter ultrapassado o limite, contate o administrador do sistema caso esse problema presista.';
            break;
        // 601 Script não concluido
        // Erro interno da plataforma, solicitação de script não concluída
        case 601:
            aErrData.shortInfo = 'Script não concluido';
            aErrData.fullInfo = 'A plataforma solicitou a execução de um script para a configuração do recurso atual, porem não obteve sucesso na execução.';
            break;
        // 601 Estrutura XML invalida
        // Erro interno da plataforma, estrutura XML não compativel com a solicitada e esperada
        case 602:
            aErrData.shortInfo = 'Estrutura  inválida';
            aErrData.fullInfo = 'A plataforma solicitou uma estrutura XML, porem não obteve uma estrutura não válida para a requisição.';
            break;
        default:
            aErrData.shortInfo = 'Erro desconhecido';
            aErrData.fullInfo = 'A requisição HTTP falhou devido a um erro desconhecido.';
            break;
    }
    return aErrData;
};
var sendData = function(){
    $('<div id="enviando" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">Sistema</h3></div><div class="modal-body"><p>Enviando...</p></div></div>').modal('show').on('shown', function(){
        $.ajax({
            type:"POST",
            url: 'envia.php',
            data: $('form').serialize(),
            cache:false,
            complete: function(){
                $(objCaller).attr('disabled','');
                $('#enviando').remove();
            },
            beforeSend: function(){

            },
            success: function(data,status) {
                var jsonData = undefined;
                try {
                    jsonData = jQuery.parseJSON(data);
                }
                catch(errData){
                    jsonData = undefined;
                };
                if(jsonData != undefined){
                    if(jsonData.Status == 'FAIL'){
                        $('#enviando').modal('hide');
                        $('<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">Erro</h3></div><div class="modal-body"><p>'+jsonData.Message+'</p></div><div class="modal-footer"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button></div></div>').modal('show');
                    }
                    else{
                        $('#enviando').modal('hide');
                        $('<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">Sucesso</h3></div><div class="modal-body"><p>'+jsonData.Message+'</p></div><div class="modal-footer"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button></div></div>').modal('show').on('hide', function(){
                            cleanForm();
                            focusFirst();
                        });
                    }
                }
                else {
                    $('#enviando').modal('hide');
                    $('<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">Ocorreu um erro desconhecido</h3></div><div class="modal-body"><p>Não foi possível identificar a fonte do problema, entre em contato comigo através do meu email!</p></div><div class="modal-footer"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button></div></div>').modal('show');
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                errorInfo = errorData(xhr.status);
                $('#enviando').modal('hide');
                $('<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">Erro '+xhr.status+' - '+errorInfo.shortInfo+'</h3></div><div class="modal-body"><p>'+errorInfo.fullInfo+'</p></div><div class="modal-footer"><button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Ok</button></div></div>').modal('show');
            }
        });
    });
};
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
$(document).ready(function(){
    $('#contatoEnvia').click(function(){
        if(validateFields()){
            sendData();
        }
        return false;
    });
});