<?php
include('header.php');
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
$path = 'BANNER';
$url = 'banner.php';
include('components/path.php');
include ("components/notify.php");
if (@$_GET['id']){
$id = $_GET['id'];
$results = $query -> ExecuteSQL("SELECT * FROM tb_banner join tb_administradores ON BAN_ADM_ID = ADM_ID WHERE BAN_ID =$id");
$administradorR = $results['ADM_NOME'];
$dataR = $results['BAN_DATA'];
$imagemR = $results['BAN_IMG'];
$descricaoR = $results['BAN_DESCRICAO'];
$statusR = $results['BAN_STATUS'];
if (@$_POST['form']){
extract($_POST);
$imagem = gera_imagem_miniatura_double('foto', '/'.$imagens_banner, '/'.$imagens_banner_thumb, 100, 100, 840, 320);
if($imagem==''){$imagem = $imagemR;}
else{
deletar($imagemR, $imagens_banner);
deletar($imagemR, $imagens_banner_thumb);
}
$query -> ExecuteSQL("UPDATE tb_banner SET BAN_ADM_ID = '$adm', BAN_DATA = '$data', BAN_IMG = '$imagem', BAN_DESCRICAO = '$descricao', BAN_STATUS='$status' WHERE BAN_ID = $id");
//header ("Location: banner.php?msg=4");
echo '<script> location.replace("banner.php?msg=4"); </script>';
} 
}	
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<?php call_box(' Editar imagem do banner', 'icon-picture');?>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('banner.edit.php?id='.$id, 'post', 'multipart/form-data');
							  echo "<table width='100%'><tr><td>";
							  //element
							  $formPost -> element_open('Imagem');
								$formPost -> input('file', 'focused', 'foto', 'foto', '', 'image/*');
							  $formPost -> element_close();
							  echo "</td><td style='text-align:right;'>";
							  echo"<img src='".$imagens_banner.$imagemR."' title='Esta é a miniatura atual.'style='box-shadow: 2px 4px 5px #666;' width='400px'/>";
							  echo "</td></table>";
							 //element
							  $formPost -> element_open('Descrição');
								$formPost -> textarea('descricao', $descricaoR, 'cleditor');
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