<?php include('header.php'); 
$path = 'PERFIL';
$url = 'profile.php';
include('components/path.php');
if(@$_POST['login']) {
	extract($_POST);
	$condition = $query -> ExecuteSQL("SELECT * FROM tb_administradores where ADM_ID != '$adm' AND ADM_LOGIN=='$login'");
	if (count($condition)==1){
		$id = $adm;
		$pastsenha = $query -> ExecuteSQL("SELECT ADM_SENHA FROM tb_administradores where ADM_ID = '$id'");
		if ($pastsenha['ADM_SENHA']==$senha){
			$status = 1;
			if ($senha2!==''){$senha = $senha2;}
			$query -> ExecuteSQL("UPDATE tb_administradores SET ADM_NOME = '$nome', ADM_LOGIN = '$login', ADM_EMAIL = '$email', ADM_SENHA = '$senha', ADM_ACESSO = '$data' WHERE ADM_ID= $id ");
			session_destroy();
			session_start();
			$_SESSION['usuario_logado'] = $id;
			//header("Location: profile.php?msg=4");
			echo '<script> location.replace("profile.php?msg=4"); </script>';
		}
		else {
			//header("Location: profile.php?msg=14");
			echo '<script> location.replace("profile.php?msg=14"); </script>';
		}
	}
}
$results = $query -> ExecuteSQL("SELECT * FROM tb_administradores where ADM_ID = '$adm' ");
$id = $results['ADM_ID'];
$nome = $results['ADM_NOME'];
$login = $results['ADM_LOGIN'];
$acesso = $results['ADM_ACESSO'];
$email = $results['ADM_EMAIL'];
$permissao = $results['ADM_TIPO'];	
	?>
<div class="row-fluid sortable">
				<div class="box span12">
					<?php 
					call_box(' Meu perfil', 'icon-user');
					include ('components/notify.php');
					?>
					<div class="box-content">
	<?php
						$formPost = new form();
						  $formPost -> open('profile.php', 'post');
							 echo '<table><tr><td>';
							 //element
							  $formPost -> element_open('Nome');
								$formPost -> input('text', 'focused', 'nome', 'focusedInput', $nome);
							  $formPost -> element_close();
							   //element
							  $formPost -> element_open('Login');
								$formPost -> input('text', 'focused', 'login', 'focusedInput', $login);
							  $formPost -> element_close();
							   //element
							  $formPost -> element_open('E-mail');
								$formPost -> input('text', 'focused', 'email', 'focusedInput', $email);
							  $formPost -> element_close();
							   echo '</td><td>';
							  //element
							  $formPost -> element_open('Senha');
								$formPost -> input('password', 'focused', 'senha', 'focusedInput', '');
							  $formPost -> element_close();
							   //element
							  $formPost -> element_open('Nova senha');
								$formPost -> input('password', 'focused', 'senha2', 'focusedInput', '');
							  $formPost -> element_close();
							  echo '</td></tr></table>';
							  $mensagem = 'Último login realizado em <i>'.datahora($acesso).'</i>';
							  $formPost -> labels($mensagem, 'info');
						  $formPost -> close('Salvar');
	?>
					</div>
				</div><!--/span-->
</div>
<?php include('footer.php'); ?>