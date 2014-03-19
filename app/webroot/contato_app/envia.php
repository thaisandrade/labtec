<?php
session_start();

/*
 * Campos Obrigatórios
 * - contatoEmail				:: E-mail de quem esta escrevendo no formulário de contato
 * - contatoAssunto 			:: Assunto abordado para o contato
 * - contatoCorpo				:: Corpo da mensagem do contato
 * - receptorEmail				:: E-mail para onde será enviado o contato preenchido do site
 *
 * Campos Opcionais, mas fixos ( já computados no sistema )
 * - contatoNome				:: Nome de quem esta escrevendo no formulário de contato, se deixado em branco será
 * 									utilizada a primeira parte do e-mail.
 * 									EX : fulano@de.tal => contatoNome padrão = fulano
 * - receptorNome				:: Nome do receptor dos dados do contato, se deixado em brando será utilizado um valor
 * 									padrão de "Contado do Site".
 *
 * Campos de Configuração
 *
 * - assuntoPrefixo				:: Utilizado para definir um prefixo ao assunto do e-mail que o receptor irá receber,
 * 									se deixado em branco será utilizado o valor padrão do endereço do site
 * - respostaAutomatica			:: Utilizado para enviar ou não uma resposta de confirmação para quem escreveu o formulário
 * 									de contato, sendo que este campo aceita valores de S ou N, e seu padrão é S
 * - assuntoResposta			:: Utilzado para definir um assunto para o e-mail de auto resposta, se deixado em branco
 * 									será utilizado o valor padrão de "Contato com %SITE% realizado com sucesso"
 * 									NOTA ADICIONAL : esta configuração depende de 'respostaAutomatica' definido como 'S'
 */

//* ////////// Configuração ///////////////////

$_POST['receptorEmail'] = "contato@lojatodosossantos.com.br";
$_POST['receptorNome'] = "Loja Todos os Santos";
$_POST['assuntoPrefixo'] = "[SITE] Contato ";
$_POST['respostaAutomatica'] = "Resposta Automática";
$_POST['assuntoResposta'] = "N";

/*////////////////////////////////////////////*/


/* MENSAGENS DE ERRO - PODEM SER ALTERADAS */
$ERRORS['EMAIL']['FROM']['MISSING'] = 'Você deve informar seu e-mail para que possamos retornar seu contato!';
$ERRORS['EMAIL']['FROM']['INVALID'] = 'O e-mail que você informou é inválido, por favor informe um e-mail válido e tente novamente!';
$ERRORS['SUBJECT']['FROM']['INVALID'] = 'Você deve informar o assunto de seu contato!';
$ERRORS['CONTENT']['FROM']['INVALID'] = 'Você deve descrever com mais detalhes o assunto ao qual este contato se refere!';
$ERRORS['EMAIL']['TO']['MISSING'] = 'Não será possível enviar seu formulário de contato devido a um erro na configuração do servidor!';
$ERRORS['EMAIL']['TO']['INVALID'] = 'Não será possível enviar seu formulário de contato devido a um erro na configuração do servidor!';
$ERRORS['SEND']['FAIL'] = 'Não foi possível finalizar seu contato, aguarde alguns instantes e tente novamente mais tarde.';
$ERRORS['SEND']['SPAN'] = 'Você deve estar com o javascript desabilitado, por favor abilite para poder enviar este formulário de contato';
$ERRORS['AUTO']['FAIL'] = 'Seu contato foi realizado com sucesso, mas não foi possível entregar a mensagem de confirmação automática em seu e-mail pessoal!';
$ERRORS['TEMPLATE']['SEND']['NOT_FOUND'] = 'Não foi possível localizar o template de envio do contato!';
$ERRORS['TEMPLATE']['AUTO']['NOT_FOUND'] = 'Não foi possível localizar o template de envio do contato!';

/* MENSAGENS DE NOTIFICAÇÃO - PODEM SER ALTERADAS */
$MESSAGE['SEND']['DONE'] = "Seu contato foi realizado com sucesso!";
$MESSAGE['AUTO']['DONE'] = "Seu contato foi realizado com sucesso, , em alguns instantes você receberá um e-mail confirmando que este contato foi bem sucedido!";

/* FUNCTIONS :: BEGIN */
/* NÃO MODIFIQUE NADA */

function scriptRoot() {
    $SCRIPT_PATH = $_SERVER['SCRIPT_FILENAME'];
    $SCRIPT_DATA = explode('/', $SCRIPT_PATH);
    $SCRIPT_FILE = $SCRIPT_DATA[count($SCRIPT_DATA) - 1];
    $SCRIPT_PATH = substr($SCRIPT_PATH, 0, strlen($SCRIPT_PATH) - strlen($SCRIPT_FILE));
    return $SCRIPT_PATH;
}

function sendPHP($TO, $SUBJECT, $MESSAGE, $HEADERS) {
    $MAIL_HEADER = '';
    foreach ($HEADERS AS $HEADERS_DATA) {
        $MAIL_HEADER .= $HEADERS_DATA . "\r\n";
    }
    return mail($TO, $SUBJECT, $MESSAGE, $MAIL_HEADER);
}

function setHeader(&$HEADER, $VALUE) {
    $HEADER[] = $VALUE;
}

function getMessage(&$DATA, $FORM) {
    $INFO = array(
        'SERVER_HOST' => $_SERVER['HTTP_HOST'],
        'contatoData' => date('d/m/Y'),
        'contatoHora' => date('H:i:s'),
    );
    // LENDO ARQUIVO DE TEMPLATE
    $DATA['FILE'] = fopen($DATA['PATH'], 'r');
    while (!feof($DATA['FILE'])) {
        $DATA['DATA'] .= fread($DATA['FILE'], 1024);
    }
    fclose($DATA['FILE']);
    // DEFININDO VARIAVEIS NA TEMPLATE
    foreach ($FORM AS $FORM_VAR => $FORM_VAL) {
        $DATA['DATA'] = str_replace("%" . $FORM_VAR . "%", $FORM_VAL, $DATA['DATA']);
    }
    // DEFININDO VARIAVEIS FIXAS NA TEMPLATE
    foreach ($INFO AS $INFO_VAR => $INFO_VAL) {
        $DATA['DATA'] = str_replace("%" . $INFO_VAR . "%", $INFO_VAL, $DATA['DATA']);
    }
    return $DATA['DATA'];
}

/* FUNCTIONS :: END */

// Variaveis que NÃO DEVEM SER TOCADAS
$_TEMPLATE['SEND']['PATH'] = scriptRoot() . 'template/send.htm';
$_TEMPLATE['SEND']['DATA'] = '';
$_TEMPLATE['SEND']['FILE'] = '';
$_TEMPLATE['SEND']['HEAD'] = array();
$_TEMPLATE['AUTO']['PATH'] = scriptRoot() . 'template/auto.htm';
$_TEMPLATE['AUTO']['DATA'] = '';
$_TEMPLATE['AUTO']['FILE'] = '';
$_TEMPLATE['AUTO']['HEAD'] = array();
if (isset($_SESSION['qaptcha_key']) && !empty($_SESSION['qaptcha_key'])) {
    $myVar = $_SESSION['qaptcha_key'];

    // check if the random input created exists and is empty
    if (isset($_POST['' . $myVar . '']) && empty($_POST['' . $myVar . ''])) {


        if (empty($_POST['spann'])) {

            $assuntoPrefixo = 'Contato :: ';
            if (isset($_POST['assuntoPrefixo']))
                $assuntoPrefixo = $_POST['assuntoPrefixo'];
            $assuntoPrefixoAutoResposta = 'Auto Resposta';
            if (isset($_POST['assuntoPrefixoAutoResposta']))
                $assuntoPrefixo = $_POST['assuntoPrefixoAutoResposta'];

            if (!isset($_POST['contatoEmail']))
                die('{"Status":"FAIL","Message":"' . $ERRORS['EMAIL']['FROM']['MISSING'] . '"}');
            if (!isset($_POST['contatoNome'])) {
                $DATA = explode('@', $_POST['contatoEmail']);
                if (count($DATA) != 0)
                    $_POST['contatoNome'] = $DATA[0];
                else
                    $_POST['contatoNome'] = 'Unknow Sender';
            }


            if (!isset($_POST['contatoAssunto']))
                die('{"Status":"FAIL","Message":"' . $ERRORS['SUBJECT']['FROM']['MISSING'] . '"}');
            if (!isset($_POST['contatoCorpo']))
                die('{"Status":"FAIL","Message":"' . $ERRORS['CONTENT']['FROM']['MISSING'] . '"}');


            //* ////////////////////////////////////////////////////////////
            if (!isset($_POST['receptorEmail']))
                die('{"Status":"FAIL","Message":"' . $ERRORS['EMAIL']['TO']['MISSING'] . '"}');

            if (!isset($_POST['receptorNome'])) {
                $_POST['receptorNome'] = 'Contato do Site';
            }

            if (!isset($_POST['assuntoPrefixo'])) {
                $_POST['assuntoPrefixo'] = $_SERVER['HTTP_HOST'] . " - ";
            }

            if (isset($_POST['respostaAutomatica']) && $_POST['respostaAutomatica'] == 'N') {
                $_POST['respostaAutomatica'] = false;
            } else {
                $_POST['respostaAutomatica'] = true;
                if (!isset($_POST['assuntoResposta'])) {
                    $_POST['assuntoResposta'] = 'Contato com ' . $_SERVER['HTTP_HOST'] . ' foi realizado com sucesso';
                }
            }
            /*//////////////////////////////////////////////////////////*/


            /* MONTANDO MENSAGEM - ENVIO PARA O DESTINATARIO */
            if (file_exists($_TEMPLATE['SEND']['PATH'])) {
                // SETANDO HEADERS
                setHeader($_TEMPLATE['SEND']['HEAD'], 'MIME-Version: 1.0');
                setHeader($_TEMPLATE['SEND']['HEAD'], 'Content-type: text/html; charset=utf-8');
                setHeader($_TEMPLATE['SEND']['HEAD'], 'From: ' . $_POST['contatoNome'] . ' <' . $_POST['contatoEmail'] . '>');
                if (sendPHP($_POST['receptorEmail'], $_POST['assuntoPrefixo'] . $_POST['contatoAssunto'], getMessage($_TEMPLATE['SEND'], $_POST), $_TEMPLATE['SEND']['HEAD'])) {
                    if ($_POST['respostaAutomatica']) {
                        /* MONTANDO MENSAGEM - ENVIO PARA DE RESPOSTA AUTOMATICA */
                        if (file_exists($_TEMPLATE['AUTO']['PATH'])) {
                            // SETANDO HEADERS
                            setHeader($_TEMPLATE['AUTO']['HEAD'], 'MIME-Version: 1.0');
                            setHeader($_TEMPLATE['AUTO']['HEAD'], 'Content-type: text/html; charset=utf-8');
                            setHeader($_TEMPLATE['AUTO']['HEAD'], 'From: ' . $_POST['receptorNome'] . ' <' . $_POST['receptorEmail'] . '>');
                            if (sendPHP($_POST['contatoEmail'], $_POST['assuntoResposta'], getMessage($_TEMPLATE['AUTO'], $_POST), $_TEMPLATE['AUTO']['HEAD'])) {
                                die('{"Status":"DONE","Message":"' . $MESSAGE['AUTO']['DONE'] . '"}');
                            } else {
                                die('{"Status":"FAIL","Message":"' . $ERRORS['AUTO']['FAIL'] . '"}');
                            }
                        } else
                            die('{"Status":"FAIL","Message":"' . $ERRORS['TEMPLATE']['AUTO']['NOT_FOUND'] . '"}');
                    } else
                        die('{"Status":"DONE","Message":"' . $MESSAGE['SEND']['DONE'] . '"}');
                } else
                    die('{"Status":"FAIL","Message":"' . $ERRORS['SEND']['FAIL'] . '"}');
            } else {
                die('{"Status":"FAIL","Message":"' . $ERRORS['TEMPLATE']['SEND']['NOT_FOUND'] . '"}');
            }
        }
        //mail can be sent
    } else {
        die('{"Status":"FAIL","Message":"' . $ERRORS['SEND']['SPAN'] . '"}');
    }
} else {
    die('{"Status":"FAIL","Message":"' . $ERRORS['SEND']['SPAN'] . '"}');
}
session_destroy();