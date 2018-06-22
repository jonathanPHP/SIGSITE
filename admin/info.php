<?php 
include('header.php'); 
$path = 'INFORMAÇÕES';
$url = 'info.php';
include('components/path.php');
$id = 1;
if (@$_POST['form']){
extract($_POST);
$query -> ExecuteSQL("UPDATE tb_info SET INF_ADM_ID='$adm', INF_EMAIL='$email1', INF_EMAIL2='$email2', INF_RUA='$rua', INF_BAIRRO='$bairro', INF_CEP='$cep', INF_CIDADE='$cidade', INF_ESTADO='$estado', INF_PREVIA='$preview', INF_DATA='$data', INF_YOUTUBE='$youtube', INF_TWITTER='$twitter', INF_FACEBOOK='$facebook'  WHERE INF_ID=$id");
//header ("Location: info.php?msg=4");
echo '<script> location.replace("info.php?msg=4"); </script>';
}
$results = $query -> ExecuteSQL("SELECT * FROM tb_info JOIN tb_administradores ON INF_ADM_ID = ADM_ID WHERE INF_ID='$id'") or die (mysql_error());
$email1 = $results['INF_EMAIL'];
$email2 = $results['INF_EMAIL2'];
$rua = $results['INF_RUA'];
$bairro = $results['INF_BAIRRO'];
$cep = $results['INF_CEP'];
$cidade = $results['INF_CIDADE'];
$estado = $results['INF_ESTADO'];
$data = $results['INF_DATA'];
$preview = $results['INF_PREVIA'];
$administrador = $results['ADM_NOME'];
$youtube = $results['INF_YOUTUBE'];
$twitter = $results['INF_TWITTER'];
$facebook = $results['INF_FACEBOOK'];

 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Editar informações de contato', 'icon-briefcase');?>
					<script type="text/javascript" src="js/formatacampos.js"></script>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('info.php', 'post');
							  echo '<table><tr><td>';
							  //element
							  $formPost -> element_open('E-mail');
								$formPost -> input('text', 'focused', 'email1', 'focusedInput', $email1);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('E-mail 2');
								$formPost -> input('text', 'focused', 'email2', 'focusedInput', $email2);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Youtube');
								$formPost -> input('text', 'focused', 'youtube', 'focusedInput', $youtube);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Twitter');
								$formPost -> input('text', 'focused', 'twitter', 'focusedInput', $twitter);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Facebook');
								$formPost -> input('text', 'focused', 'facebook', 'focusedInput', $facebook);
							  $formPost -> element_close();
							  echo '</td><td>';
							  //element
							  $formPost -> element_open('Rua');
								$formPost -> input('text', 'focused', 'rua', 'focusedInput', $rua);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Bairro');
								$formPost -> input('text', 'focused', 'bairro', 'focusedInput', $bairro);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('CEP');
								$formPost -> input('text', 'focused', 'cep', 'focusedInput', $cep);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Cidade');
								$formPost -> input('text', 'focused', 'cidade', 'focusedInput', $cidade);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Estado');
								$formPost -> input('text', 'focused', 'estado', 'focusedInput', $estado);
							  $formPost -> element_close();
							echo '</td></tr></table>';
							  //element
							  $formPost -> element_open('Introdução');
								$formPost -> textarea('preview', $preview);
							  $formPost -> element_close();
						  $formPost -> close('Salvar');
						  $mensagem = 'Última edição feita por <i>'.$administrador.'</i> em '.datahora($data);
						  $formPost -> labels($mensagem, 'info');
						  ?>				
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php');?>