<?php include('header.php'); 
$path = 'PÁGINAS';
$url = 'pages.php';
include('components/path.php');
if(@$_GET['id']){
$id = $_GET['id'];
$query -> ExecuteSQL("DELETE FROM tb_paginas WHERE PAG_ID=$id");
//header("Location: pages.php?msg=3");
echo '<script> location.replace("pages.php?msg=3"); </script>';
}
$results = $query -> ExecuteSQL("SELECT * FROM tb_paginas JOIN tb_administradores ON PAG_ADM_ID = ADM_ID ORDER BY PAG_EDITADO DESC");
$id = result($results,'PAG_ID');
$administrador = result($results,'ADM_NOME');
$titulo = result($results,'PAG_TITULO');
$data = result($results,'PAG_DATA');
$status = result($results,'PAG_STATUS');
$editado = result($results,'PAG_EDITADO');

 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
				<p class="center"><a id="insert" href="pages.insert.php" class="btn btn-large btn-primary visible-desktop">CADASTRAR PÁGINA</a></p>
					<?php call_box(' Visualizar páginas', 'icon-list-alt');?>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Título</th>
								  <th>Data</th>
								  <th>Administrador</th>
								  <th>Status</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php for ($i=0;$i<count($id);$i++){?>
							<tr>
								<td title="<?php echo 'Última edição feita por '.$administrador[$i].' em '.datahora($editado[$i]);?>"><?php echo $titulo[$i];?></td>
								<td class="center"><?php echo datahora($data[$i]);?></td>
								<td class="center"><?php echo $administrador[$i];?></td>
								<td class="center"><?php echo status($status[$i]);?></td>
								<td class="center">
									<a class="btn btn-success" href="../view.php?page=<?php echo $id[$i];?>" target="_blank">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="pages.edit.php?id=<?php echo $id[$i];?>">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="pages.php?id=<?php echo $id[$i];?>">
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