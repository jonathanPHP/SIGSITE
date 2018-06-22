<?php
include('header.php');
$path = 'ADMINISTRADORES';
$url = 'admins.php';
include('components/path.php');
if (@$_POST['nome']){
extract($_POST);
	$qtd = $query -> ExecuteSQL("SELECT * FROM tb_administradores WHERE ADM_LOGIN='$login'");
	if(count($qtd)>0){header ("Location: admins.insert.php?msg=15");};
	if ($senha!==$senha2){header ("Location: admins.insert.php?msg=16");};
	$query -> ExecuteSQL("INSERT INTO tb_administradores (ADM_NOME, ADM_LOGIN, ADM_EMAIL, ADM_SENHA, ADM_DATA, ADM_ACESSO, ADM_STATUS, ADM_TIPO) VALUES ( '$nome', '$login', '$email', '$senha', '$data', '$data', '1', '$tipo')");
	//header ("Location: admins.php?msg=1");
	echo '<script> location.replace("admins.php?msg=1"); </script>';
	}
	?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<?php call_box(' Cadastrar administrador', 'icon-user');?>
					<div class="box-content">
						<?php
						 $formPost = new form();
						  $formPost -> open('admins.insert.php', 'post');
							 echo '<table><tr><td>';
							 //element
							  $formPost -> element_open('Nome');
								$formPost -> input('text', 'focused', 'nome', 'focusedInput', '');
							  $formPost -> element_close();
							   //element
							  $formPost -> element_open('Login');
								$formPost -> input('text', 'focused', 'login', 'focusedInput', '');
							  $formPost -> element_close();
							   //element
							  $formPost -> element_open('E-mail');
								$formPost -> input('text', 'focused', 'email', 'focusedInput', '');
							  $formPost -> element_close();
							   echo '</td><td>';
							  //element
							  $formPost -> element_open('Senha');
								$formPost -> input('password', 'focused', 'senha', 'focusedInput', '');
							  $formPost -> element_close();
							   //element
							  $formPost -> element_open('Repita a senha');
								$formPost -> input('password', 'focused', 'senha2', 'focusedInput', '');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Permissão');
								$formPost -> select('tipo', 'tipo', array("Normal", "Total"), array("0", "1"));
							  $formPost -> element_close();
							  echo '</td></tr></table>';
						  $formPost -> close('Salvar');
						?>  
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>	