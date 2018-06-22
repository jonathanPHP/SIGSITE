<?php
include('header.php');
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
if (@$_POST['form']){
extract($_POST);
$imagem = gera_imagem_miniatura_double('foto', '/'.$imagens_banner, '/'.$imagens_banner_thumb, 100, 100, 840, 320);
$query -> ExecuteSQL("INSERT INTO tb_banner (BAN_ADM_ID, BAN_DATA, BAN_IMG, BAN_DESCRICAO, BAN_STATUS) VALUES ( '$adm', '$data', '$imagem', '$descricao', '$status') ");
//header ("Location: banner.php?msg=1");
echo '<script> location.replace("banner.php?msg=1"); </script>';
}
$path = 'BANNER';
$url = 'banner.php';
include('components/path.php');
include ("components/notify.php");
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<?php call_box(' Adicionar imagem ao banner', 'icon-picture');?>
					<div class="box-content">
						<?php
						  $formPost = new form();
						  $formPost -> open('banner.insert.php', 'post', 'multipart/form-data');
							  //element
							  $formPost -> element_open('Imagem');
								$formPost -> input('file', 'focused', 'foto', 'foto', '', 'image/*');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Descrição');
								$formPost -> textarea('descricao', '', 'cleditor');
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
