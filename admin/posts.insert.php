<?php include('header.php'); ?>
<?php 
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
$path = 'POSTAGENS';
$url = 'posts.php';
include('components/path.php');
if (@$_POST['form']){
extract($_POST);
$imagem = gera_miniatura('miniatura', '/'.$imagens_posts, 170, 170);
$query -> ExecuteSQL("INSERT INTO tb_postagens (POS_ADM_ID, POS_CAT_ID, POS_TITULO, POS_CONTEUDO, POS_DATA, POS_STATUS, POS_IMG, POS_EDITADO) VALUES ( '$adm', '$categoria', '$titulo', '$conteudo', '$data', '$status', '$imagem', '$data')");
//header ("Location: posts.php?msg=1");
echo '<script> location.replace("posts.php?msg=1"); </script>';
}
$results = $query -> Select('tb_categorias');
$categoria = result($results,'CAT_NOME');
$id = result($results,'CAT_ID');
 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Cadastrar postagem', 'icon-th-list');?>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('posts.insert.php', 'post', 'multipart/form-data');
							  //element
							  $formPost -> element_open('Categoria');
								$formPost -> select('categoria', 'categoria', $categoria, $id);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Título');
								$formPost -> input('text', 'focused', 'titulo', 'focusedInput', '');
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Miniatura');
								$formPost -> input('file', 'focused', 'miniatura', 'miniatura', '', 'image/*');
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