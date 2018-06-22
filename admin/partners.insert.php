<?php include('header.php');
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
$path = 'PARCEIROS';
$url = 'partners.php';
include('components/path.php');
if (@$_POST['form']){
extract($_POST);
$imagem = gera_miniatura('miniatura', '/'.$imagens_partners, 150, 90);
$query -> ExecuteSQL("INSERT INTO tb_parceiros (PAR_ADM_ID, PAR_NOME, PAR_URL, PAR_DATA, PAR_IMG, PAR_INFORMACOES, PAR_STATUS) VALUES ( '$adm', '$nome', '$url', '$data', '$imagem', '$informacoes', '$status')");
//header ("Location: partners.php?msg=1");
echo '<script> location.replace("partners.php?msg=1"); </script>';
}
 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Cadastrar parceiro', 'icon-user');?>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('partners.insert.php', 'post', 'multipart/form-data');
							  //element
							  $formPost -> element_open('Nome');
								$formPost -> input('text', 'focused', 'nome', 'focusedInput', '');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Url');
								$formPost -> input('text', 'focused', 'url', 'focusedInput', '');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Miniatura');
								$formPost -> input('file', 'focused', 'miniatura', 'miniatura', '', 'image/*');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Comentários');
								$formPost -> textarea('informacoes', '', 'cleditor');
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