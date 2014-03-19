<html>
<head>
<title><?=$_SERVER['HTTP_HOST']?></title>
<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
</head>
<body text=#000000 vLink=#000066 link=#000066 bgColor=#ffffff leftMargin=0 topMargin=0>
<TABLE height='100%' cellSpacing=0 cellPadding=0 width=600 border=0>
  <TBODY>
    <TR>
      <TD vAlign=top align=middle width=600><TABLE cellSpacing=0 cellPadding=10 width=580 bgColor=#ffffff>
          <TBODY>
            <TR>
              <TD><BR>
                <TABLE cellSpacing=0 cellPadding=0 width=675 align=center border=0>
                  <TBODY>
                    <TR bgColor=#f1f1f1>
                      <TD colspan=2 align='center'>
                          <FONT face=Verdana color=#3059ab size=2>
                              <br/>
                              <b>Contato do site <?=$_SERVER['HTTP_HOST']?>.</b>
                              <br/><br/>
                          </FONT>
                      </TD>
                    </TR>
                    <TR>
                      <TD><TABLE cellSpacing=0 cellPadding=0 width=673 align=center bgColor=#ffffff border=0>
                          <TBODY>
                            <TR>
                              <TD><TABLE cellSpacing=0 cellPadding=0 width=667 align=center border=0>
                                  <TBODY>
                                  </TBODY>
                                </TABLE>
                                <TABLE cellSpacing=2 cellPadding=2 width=667 align=center bgColor=#ffffff border=0>
                                  <TBODY>
                                    <TR>
                                      <TD><DIV align=center>
                                          <TABLE cellSpacing=0 cellPadding=3 width='100%' border=0>
                                            <TBODY>
                                              <TR>
                                                <TD bgColor=#9699b2 colSpan=2><FONT face=verdana color=#ffffff size=2><B>Dados do cliente</B></FONT></TD>
                                              </TR>
                                              <TR bgColor=#d9d8e2>
                                                  <td colSpan=2>
                                                  <table cellSpacing=0 width='100%'>
                                                      <TR>
                                                        <TD width='15%'><FONT face=Verdana color=#3059ab size=2>Nome:</FONT></TD>
                                                        <TD><FONT face=Verdana color=#3059ab size=2><?=$userdata['nome']?></FONT></TD>
                                                      </TR>
                                                      <TR bgColor=#d9d8e2>
                                                        <TD><FONT face=Verdana color=#3059ab size=2>E-Mail:</FONT></TD>
                                                        <TD><FONT face=Verdana color=#3059ab size=2><?=$userdata['email']?></FONT></TD>
                                                      </TR>
                                                      <TR bgColor=#d9d8e2>
                                                        <TD><FONT face=Verdana color=#3059ab size=2>Telefone:</FONT></TD>
                                                        <TD><FONT face=Verdana color=#3059ab size=2><?=$userdata['telefone']?></FONT></TD>
                                                      </TR>
                                                      <TR bgColor=#d9d8e2>
                                                        <TD><FONT face=Verdana color=#3059ab size=2>Cidade:</FONT></TD>
                                                        <TD><FONT face=Verdana color=#3059ab size=2><?=$userdata['cidade']?></FONT></TD>
                                                      </TR>
                                                      <TR bgColor=#d9d8e2>
                                                        <TD><FONT face=Verdana color=#3059ab size=2>Assunto:</FONT></TD>
                                                        <TD><FONT face=Verdana color=#3059ab size=2>Orçamento pelo site</FONT></TD>
                                                      </TR>

                                                  </table>
                                                  </td>
                                               </TR>
                                              <TR>
                                                <TD colSpan=2><FONT face=Verdana color=#3059ab size=2>&nbsp;</FONT></TD>
                                              </TR>
                                              <TR>
                                                <TD bgColor=#9699b2 colSpan=2><FONT face=verdana color=#ffffff size=2><B>Lista de Produtos</B></FONT></TD>
                                              </TR>
                                              <TR>
                                                <TD bgColor=#f1f1f1 colSpan=2><table width=656 cellPadding=0 cellSpacing=0 style='border:#9699b2 solid 1px;'>
                                                    <tr>
                                                      <td width=40 height=21 style='border-right:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px;'>
                                                          <FONT face=Verdana color=#3059ab size=2><strong>&nbsp;Cod.</strong></FONT></td>
                                                      <td style='border-right:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px;'>
                                                          <FONT face=Verdana color=#3059ab size=2><strong>&nbsp;Nome</strong></FONT></td>
                                                      <td width=80 height=21 style='border-right:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px;'>
                                                              <FONT face=Verdana color=#3059ab size=2><strong>&nbsp;Valor</strong></FONT></td>
                                                      <td width=30 height=21 style='border-right:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px;'>
                                                          <FONT face=Verdana color=#3059ab size=2><strong>&nbsp;Qnt.</strong></FONT></td>

                                                    </tr>
                                                    <?php foreach ($email_array as $data): ?>
                                                    <tr>
                                                      <td style='border-right:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px; padding:00 5px'>
                                                          <FONT face=Verdana color=#3059ab size=2> <?= $data['codigo'] ?> </FONT></td>
                                                      <td style='border-right:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px; padding: 0 5px'>
                                                          <FONT face=Verdana color=#3059ab size=2> <?= $data['nome'] ?> </FONT></td>
                                                      <td style='border-right:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px; padding: 0 5px'>
                                                              <FONT face=Verdana color=#3059ab size=2> <?= $this->Money->format($data['valor']) ?> </FONT></td>
                                                      <td style='border-bottom:#9699b2 solid 1px; border-bottom:#9699b2 solid 1px; padding: 0 5px'>
                                                          <FONT face=Verdana color=#3059ab size=2> <?= $data['quantidade'] ?> </FONT></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                  </table></TD>
                                              </TR>

                                              <TR>
                                                <TD colSpan=2><FONT face=Verdana color=#3059ab size=2>&nbsp;</FONT></TD>
                                              </TR>
                                              <TR>
                                                <TD bgColor=#9699b2 colSpan=2><FONT face=verdana color=#ffffff size=2><B> Mensagem Adicional</B></FONT></TD>
                                              </TR>
                                              <TR bgColor=#f1f1f1>
                                                <TD colspan=2 align='justify'><FONT face=Verdana color=#3059ab size=2> <?=$userdata['mensagem']?> </FONT></TD>
                                              </TR>
                                              <TR>
                                                <TD colSpan=2><FONT face=Verdana color=#3059ab size=2>&nbsp;</FONT></TD>
                                              </TR>
                                              <TR bgColor=#d9d8e2>
                                                <td colSpan=2>
                                                    <table cellSpacing=0 width='100%'>
                                                        <TR>
                                                            <TD width='20%'><FONT face=Verdana color=#3059ab size=2>Realizado em:</FONT></TD>
                                                            <TD><FONT face=Verdana color=#3059ab size=2><?=$dia?> às <?=$hora?></FONT></TD>
                                                        </TR>
                                                    </table>
                                                  </td>
                                               </TR>
                                            </TBODY>
                                          </TABLE>
                                        </DIV></TD>
                                    </TR>
                                  </TBODY>
                                </TABLE></TD>
                            </TR>
                          </TBODY>
                        </TABLE></TD>
                    </TR>
                  </TBODY>
                </TABLE>
                <BR>
                <BR></TD>
            </TR>
            <TR>
              <TD></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>
</BODY>
</html>