<?php
if(@$_GET['msg']){
$msg = $_GET['msg'];
//ARRAY DE MENSAGENS
$message = array(
'THERE IS NO EXISTING!',
'Cadastrado com sucesso.',//1
'H&aacute; campos n&atilde;o preenchidos.',//2
'Dados removidos com sucesso.',//3
'Alterado com sucesso.',//4
'Estes dados n&atilde;o podem ser apagados.',//5
'Você n&atilde;o tem permiss&atilde;o para alterar esses dados.',//6
'Ocorreu um erro! Tente novamente.',//7
'Login e/ou senha incorretos.',//8
'Arquivos copiados com sucesso.',//9
'Dados enviados com sucesso. Entraremos em contato o mais breve poss&iacute;vel.',//10
'Cadastro efetuado com sucesso! Obrigado pela sua participa&ccedil;&atilde;o.',//11
'Esse e-mail j&aacute; encontra-se cadastrado em nosso site.',//12
'Entre com seu usu&aacute;rio e senha.',//13
'Senha incorreta.',//14
'Nome e/ou login j&aacute; est&atilde;o em uso.',//15
'As senhas digitadas n&atilde;o coincidem.',//16
'Nenhum arquivo encontrado com esse c&oacute;digo. Certifique-se de que o c&oacute;digo est&aacute; ativo e tente novamente.',//17
'Mensagem n&atilde;o programada!'//18
);
$type = array(
'error',
'success',//1
'error',//2
'success',//3
'success',//4
'block',//5
'error',//6
'error',//7
'error',//8
'success',//9
'success',//10
'success',//11
'block',//12
'info',//13
'error',//14
'error',//15
'error',//16
'block',//17
'info'//18
);
if($msg<count($message)){
$notify = new form();
$notify -> boxes($message, $msg, $type[$msg]);
}
}
?>