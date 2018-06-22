<?php include('header.php'); ?>
<?php 
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
$path = 'PÁGINAS';
$url = 'pages.php';
include('components/path.php');
if (@$_POST['form']){
extract($_POST);
$query -> ExecuteSQL("INSERT INTO tb_paginas (PAG_ADM_ID, PAG_TITULO, PAG_CONTEUDO, PAG_DATA, PAG_STATUS, PAG_EDITADO) VALUES ( '$adm', '$titulo', '$conteudo', '$data', '$status', '$data')");
//header ("Location: pages.php?msg=1");
echo '<script> location.replace("pages.php?msg=1"); </script>';
}
 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Cadastrar página', 'icon-list-alt');?>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('pages.insert.php', 'post');
							  //element
							  $formPost -> element_open('Título');
								$formPost -> input('text', 'focused', 'titulo', 'focusedInput', '');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Conteúdo');
								$formPost -> textarea('conteudo');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Status');
								$formPost -> select('status', 'status', array("Ativo", "Inativo"), array("1", "0"));
							  $formPost -> element_close();
						  $formPost -> close('Salvar');
						  ?>				
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>