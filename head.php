<?php 
$no_need_login=true;
include ('admin/components/config.php');
$info = $query -> ExecuteSQL("SELECT * FROM tb_info JOIN tb_administradores ON INF_ADM_ID = ADM_ID WHERE INF_ID=1") or die (mysql_error());
$email1 = $info['INF_EMAIL'];
$email2 = $info['INF_EMAIL2'];
$rua = $info['INF_RUA'];
$bairro = $info['INF_BAIRRO'];
$cep = $info['INF_CEP'];
$cidade = $info['INF_CIDADE'];
$estado = $info['INF_ESTADO'];
$data = $info['INF_DATA'];
$preview = $info['INF_PREVIA'];
$administrador = $info['ADM_NOME'];
$youtube = $info['INF_YOUTUBE'];
$twitter = $info['INF_TWITTER'];
$facebook = $info['INF_FACEBOOK'];
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $title_site;?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="orbit-1.2.3.css"/>
		<link rel="shortcut icon" href="imagens/icon.png">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.orbit-1.2.3.min.js"></script>
			<!--[if IE]>
			     <style type="text/css">
			         .timer { display: none !important; }
			         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			    </style>
			<![endif]-->
</head>
	<body>
		<div id="corpo">
		<div class="heade">
				<div class="barra-left-heade"></div>
				<div class="barra-heade">
				<div class="login">	
					<form name="login" method="post" action="admin/login.php">
						<input name="username" type="text" class="login-imput" placeholder="Usuário" />
						<input name="password" type="password" class="login-imput" placeholder="Senha" />
						<input type="submit" class="login-botao" value="entrar" />
					</form>
					<spam style="margin-left:15px;"><a href="#">Cadastre-se</a></spam><spam style="margin-left:107px;"><a href="#">Esqueci minha senha</a></spam>
				</div>
					</div>
				<div class="barra-right-heade"></div>
		</div>
		<div id="container">
			<div id="header">
				<div class="logo"><img src="imagens/ufrn-logo-1.png" style="max-height: 120px;margin-top: 30px;"></div>
				<div class="lateral-header">
						<p>SIGA-NOS:</p>
						<div class="lateral-header-twitter"><a href="<?php echo $twitter;?>" target="_blank"><img src="imagens/twitter.svg"></a></div>
						<div class="lateral-header-facebook"><a href="<?php echo $facebook;?>" target="_blank"><img src="imagens/facebook.svg"></a></div>
						<div class="lateral-header-youtube"><a href="<?php echo $youtube;?>" target="_blank"><img src="imagens/youtube.svg"></a></div>
						<div style="clear:both"></div>
						<div id="divBusca">
							<img src="imagens/img-lupa.png" id="btnBusca" alt="Buscar"/>
    						<input type="text" id="txtBusca" placeholder="Buscar..."/>
						</div>
				</div>
			</div>