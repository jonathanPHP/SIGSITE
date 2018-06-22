<style type="text/css">
	.alert-box {
		color:#555;
		border-radius:10px;
		font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
		padding:10px 36px;
		margin:10px;
	}
	.alert-box span {
		font-weight:bold;
		text-transform:uppercase;
	}
	.error {
		background:#ffecec url('imagens/error.png') no-repeat 10px 50%;
		border:1px solid #f5aca6;
	}
	.success {
		background:#e9ffd9 url('imagens/success.png') no-repeat 10px 50%;
		border:1px solid #a6ca8a;
	}
	.warning {
		background:#fff8c4 url('imagens/warning.png') no-repeat 10px 50%;
		border:1px solid #f2c779;
	}
	.notice {
		background:#e3f7fc url('imagens/notice.png') no-repeat 10px 50%;
		border:1px solid #8ed9f6;
	}
    </style>
<?php

$numeromensagem = @ $_GET['msg'];

switch ($numeromensagem){
	case '1';
$mensagem = "Mensagem enviada com sucesso."  ;
		break;
	case '2';
		$mensagem = "H&aacute; campos n&atilde;o preenchidos!";
		break;
	case '3';
		$mensagem = "Dados removidos com sucesso!";
		break;
	case '4';
		$mensagem = "Alterado com sucesso!";
		break;
	case '5';
		$mensagem = "Ocorreu um erro. Tente novamente.";
		break;
	case '6';
		$mensagem = "CPF j&aacute; existente.";
		break;
	case '7';
		$mensagem = "Cadastro efetuado com sucesso. Aguarde a autorização do administrador.";
		break;
	case '8';
		$mensagem = "Esse e-mail já encontra-se cadastrado.";
		break;
	case '9';
		$mensagem = "Esse login está indisponível.";
		break;
	case '10';
		$mensagem = "Caracteres digitados não correspondem!";
		break;
	case '11';
		$mensagem = "Nenhum usuário cadastrado com esse e-mail.";
		break;
	case '12';
		$mensagem = "Um e-mail com a sua senha lhe foi enviado. ";
		break;
	case '13';
		$mensagem = "Você ainda não realizou login. ";
		break;
	case '14';
		$mensagem = "Login e/ou senha incorretos. ";
		break;
	case '15';
		$mensagem = "Sua inscrição foi efetuada com sucesso. ";
		break;
		
		}
if (@ $mensagem){
if ($numeromensagem == 1 || $numeromensagem==4 || $numeromensagem==7 || $numeromensagem==12 ||$numeromensagem==15 ){
?>
<div class="alert-box success"><span><?php echo @ $mensagem; ?></span></div>
<?php
}
else if ($numeromensagem == 2 || $numeromensagem==5 || $numeromensagem==10|| $numeromensagem==11|| $numeromensagem==13|| $numeromensagem==14){?>
<div class="alert-box error"><span><?php echo @ $mensagem; ?></span></div><?php
}
else{?>
<div class="alert-box warning"><span><?php echo @ $mensagem; ?></span></div><?php
}
}
?>
