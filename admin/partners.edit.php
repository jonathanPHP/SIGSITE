<?php 
if (@$_GET['id']){
include('header.php'); 
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
$path = 'PARCEIROS';
$url = 'partners.php';
include('components/path.php');
if(@$_GET['del']){
$del = $_GET['del'];
$imageDel = $query -> ExecuteSQL("SELECT PAR_IMG FROM tb_parceiros WHERE PAR_ID=$del");
$query -> ExecuteSQL("UPDATE tb_parceiros SET PAR_IMG='' WHERE PAR_ID=$del");
deletar($imageDel['PAR_IMG'], $imagens_partners);
//header ("Location: partners.php?msg=3");
echo '<script> location.replace("partners.php?msg=3"); </script>';
}
$id = $_GET['id'];
$results = $query -> ExecuteSQL("SELECT * FROM tb_parceiros JOIN tb_administradores ON PAR_ADM_ID = ADM_ID WHERE PAR_ID='$id'") or die (mysql_error());
$administradorR = $results['ADM_NOME'];
$nomeR = $results['PAR_NOME'];
$urlR = $results['PAR_URL'];
$dataR = $results['PAR_DATA'];
$miniaturaR = $results['PAR_IMG'];
$informacoesR = $results['PAR_INFORMACOES'];
$statusR = $results['PAR_STATUS'];
$imgR = $results['PAR_IMG'];
if ($imgR==''){$imgR = $default_imagens_partners;}
if (@$_POST['form']){
extract($_POST);
$imagem = gera_miniatura('miniatura', '/'.$imagens_partners, 150, 90);
if($imagem==''){$imagem = $imgR;}
else{
if($imgR!=$default_imagens_partners){
deletar($imgR, $imagens_partners);
}
}
$query -> ExecuteSQL("UPDATE tb_parceiros SET PAR_ADM_ID='$adm', PAR_NOME='$nome', PAR_URL='$url', PAR_DATA='$data', PAR_IMG='$imagem', PAR_INFORMACOES='$informacoes', PAR_STATUS='$status' WHERE PAR_ID=$id");
//header ("Location: partners.php?msg=4");
echo '<script> location.replace("partners.php?msg=4"); </script>';
}

 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Editar parceiro', 'icon-user');?>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('partners.edit.php?id='.$id, 'post', 'multipart/form-data');
							  echo "<table width='100%'><tr><td>";
							  //element
							  $formPost -> element_open('Nome');
								$formPost -> input('text', 'focused', 'nome', 'focusedInput', $nomeR);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Url');
								$formPost -> input('text', 'focused', 'url', 'focusedInput', $urlR);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Miniatura');
								$formPost -> input('file', 'focused', 'miniatura', 'miniatura', '', 'image/*');
							  $formPost -> element_close();
							  echo "</td><td style='text-align:right;'>";
							  if($imgR != $default_imagens_partners){
							  echo '<a href="partners.edit.php?id='.$id.'&del='.$id.'"><img src="img/uploadify-cancel.png" width="30px" title="Remover esta imagem permanentemente."/></a>';
							  }
							  echo"<img src='".$imagens_partners.$imgR."' title='Esta é a miniatura atual.'style='box-shadow: 2px 4px 5px #666;'/>";
							  echo "</td></table>";
							  //element
							  $formPost -> element_open('Conteúdo');
								$formPost -> textarea('informacoes', $informacoesR, 'cleditor');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Status');
								$formPost -> select('status', 'status', array("Ativo", "Inativo"), array("1", "0"), $statusR);
							  $formPost -> element_close();
						  $formPost -> close('Salvar');
						  $mensagem = 'Última edição feita por <i>'.$administradorR.'</i> em '.datahora($dataR);
						  $formPost -> labels($mensagem, 'info');
						  ?>				
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php');} else{echo '<script> location.replace("partners.php"); </script>';;}; ?>