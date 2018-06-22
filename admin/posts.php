<?php include('header.php'); ?>
<?php 
$path = 'POSTAGENS';
$url = 'posts.php';
include('components/path.php');
if(@$_GET['id']){
$id = $_GET['id'];
$imageDel = $query -> ExecuteSQL("SELECT POS_IMG FROM tb_postagens WHERE POS_ID=$id");
deletar($imageDel['POS_IMG'], $imagens_posts);
$query -> ExecuteSQL("DELETE FROM tb_postagens WHERE POS_ID=$id");
//header("Location: posts.php?msg=3");
echo '<script> location.replace("posts.php?msg=3"); </script>';
}
$results = $query -> ExecuteSQL("SELECT * FROM tb_postagens JOIN tb_administradores ON POS_ADM_ID = ADM_ID JOIN tb_categorias ON POS_CAT_ID = CAT_ID ORDER BY POS_EDITADO DESC");
$id = result($results,'POS_ID');
$categoria = result($results,'CAT_NOME');
$administrador = result($results,'ADM_NOME');
$titulo = result($results,'POS_TITULO');
$data = result($results,'POS_DATA');
$status = result($results,'POS_STATUS');
$editado = result($results,'POS_EDITADO');

 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
				<p class="center"><a id="insert" href="posts.insert.php" class="btn btn-large btn-primary visible-desktop">CADASTRAR POSTAGEM</a></p>
					<?php call_box(' Visualizar postagens', 'icon-th-list');?>
					<div class="box-content">
					<i>É recomendável que haja ao menos 2 postagens de cada categoria.</i>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Título</th>
								  <th>Data</th>
								  <th>Categoria</th>
								  <th>Status</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php for ($i=0;$i<count($id);$i++){?>
							<tr>
								<td title="<?php echo 'Última edição feita por '.$administrador[$i].' em '.datahora($editado[$i]);?>"><?php echo $titulo[$i];?></td>
								<td class="center"><?php echo datahora($data[$i]);?></td>
								<td class="center"><?php echo $categoria[$i];?></td>
								<td class="center"><?php echo status($status[$i]);?></td>
								<td class="center">
									<!--a class="btn btn-success" href="../view.php?id=<?php echo $id[$i];?>" target="_blank">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a-->
									<a class="btn btn-info" href="posts.edit.php?id=<?php echo $id[$i];?>">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="posts.php?id=<?php echo $id[$i];?>">
										<i class="icon-trash icon-white"></i> 
										Deletar
									</a>
								</td>
							</tr>
							<?php }?>
						  </tbody>
					  </table>  
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>