<?php 
if (@$_GET['id']){
include('header.php'); 
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
$path = 'POSTAGENS';
$url = 'posts.php';
include('components/path.php');
if(@$_GET['del']){
$del = $_GET['del'];
$imageDel = $query -> ExecuteSQL("SELECT POS_IMG FROM tb_postagens WHERE POS_ID=$del");
$query -> ExecuteSQL("UPDATE tb_postagens SET POS_IMG='' WHERE POS_ID=$del");
deletar($imageDel['POS_IMG'], $imagens_posts);
//header ("Location: posts.php?msg=3");
echo '<script> location.replace("posts.php?msg=3"); </script>';
}
$id = $_GET['id'];
$results = $query -> ExecuteSQL("SELECT * FROM tb_postagens JOIN tb_administradores ON POS_ADM_ID = ADM_ID WHERE POS_ID='$id'") or die (mysql_error());
$categoriaR = $results['POS_CAT_ID'];
$tituloR = $results['POS_TITULO'];
$miniaturaR = $results['POS_IMG'];
$conteudoR = $results['POS_CONTEUDO'];
$statusR = $results['POS_STATUS'];
$administradorR = $results['ADM_NOME'];
$editadoR = $results['POS_EDITADO'];
$imgR = $results['POS_IMG'];
$dataR = $results['POS_DATA'];
if ($imgR==''){$imgR = $default_imagens_posts;}
$categorias = $query -> Select('tb_categorias');
$categoria_nome = result($categorias,'CAT_NOME');
$categoria_id = result($categorias,'CAT_ID');
if (@$_POST['form']){
extract($_POST);
$imagem = gera_miniatura('miniatura', '/'.$imagens_posts, 170, 170);
if($imagem==''){$imagem = $imgR;}
else{
if($imgR!=$default_imagens_posts){
deletar($imgR, $imagens_posts);
}
}
$query -> ExecuteSQL("UPDATE tb_postagens SET POS_ADM_ID='$adm', POS_CAT_ID='$categoria', POS_TITULO='$titulo', POS_CONTEUDO='$conteudo', POS_DATA='$dataR', POS_STATUS='$status', POS_IMG='$imagem', POS_EDITADO='$data' WHERE POS_ID=$id");
//header ("Location: posts.php?msg=4");
echo '<script> location.replace("posts.php?msg=4"); </script>';
}

 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Editar postagem', 'icon-th-list');?>
					<div class="box-content">
						<?php 
						  $formPost = new form();
						  $formPost -> open('posts.edit.php?id='.$id, 'post', 'multipart/form-data');
							  echo "<table width='100%'><tr><td>";
							  //element
							  $formPost -> element_open('Categoria');
								$formPost -> select('categoria', 'categoria', $categoria_nome, $categoria_id, $categoriaR);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Título');
								$formPost -> input('text', 'focused', 'titulo', 'focusedInput', $tituloR);
							  $formPost -> element_close();
							  //element
							  $formPost -> element_open('Miniatura');
								$formPost -> input('file', 'focused', 'miniatura', 'miniatura', '', 'image/*');
							  $formPost -> element_close();
							  echo "</td><td style='text-align:right;'>";
							  if($imgR != $default_imagens_posts){
							  echo '<a href="posts.edit.php?id='.$id.'&del='.$id.'"><img src="img/uploadify-cancel.png" width="30px" title="Remover esta imagem permanentemente."/></a>';
							  }
							  echo"<img src='".$imagens_posts.$imgR."' title='Esta é a miniatura atual.'style='box-shadow: 2px 4px 5px #666;'/>";
							  echo "</td></table>";
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
<?php include('footer.php');} else{echo '<script> location.replace("posts.php"); </script>';;}; ?>