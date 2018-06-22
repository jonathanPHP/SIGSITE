<?php 
if (@$_GET['id']){
include('header.php'); 
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
$path = 'PÁGINAS';
$url = 'pages.php';
include('components/path.php');
$id = $_GET['id'];
$results = $query -> ExecuteSQL("SELECT * FROM tb_paginas JOIN tb_administradores ON PAG_ADM_ID = ADM_ID WHERE PAG_ID='$id'") or die (mysql_error());
$tituloR = $results['PAG_TITULO'];
$conteudoR = $results['PAG_CONTEUDO'];
$statusR = $results['PAG_STATUS'];
$administradorR = $results['ADM_NOME'];
$editadoR = $results['PAG_EDITADO'];
$dataR = $results['PAG_DATA'];
if (@$_POST['form']){
extract($_POST);
$query -> ExecuteSQL("UPDATE tb_paginas SET PAG_ADM_ID='$adm', PAG_TITULO='$titulo', PAG_CONTEUDO='$conteudo', PAG_DATA='$dataR', PAG_STATUS='$status', PAG_EDITADO='$data' WHERE PAG_ID=$id");
//header ("Location: pages.php?msg=4");
echo '<script> location.replace("pages.php?msg=4"); </script>';
}

 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Editar página', 'icon-list-alt');?>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('pages.edit.php?id='.$id, 'post');
							  //element
							  $formPost -> element_open('Título');
								$formPost -> input('text', 'focused', 'titulo', 'focusedInput', $tituloR);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Conteúdo');
								$formPost -> textarea('conteudo', $conteudoR);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Status');
								$formPost -> select('status', 'status', array("Ativo", "Inativo"), array("1", "0"), $statusR);
							  $formPost -> element_close();
						  $formPost -> close('Salvar');
						  $mensagem = 'Última edição feita por <i>'.$administradorR.'</i> em '.datahora($editadoR);
						  $formPost -> labels($mensagem, 'info');
						  ?>				
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php');} else{header("Location: pages.php");}; ?>