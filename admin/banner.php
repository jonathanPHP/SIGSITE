<?php
include('header.php');
if(@$_GET['id']){
$id = $_GET['id'];
$imageDel = $query -> ExecuteSQL("SELECT BAN_IMG FROM tb_banner WHERE BAN_ID=$id");
deletar($imageDel['BAN_IMG'], $imagens_banner);
$query -> ExecuteSQL("DELETE FROM tb_banner WHERE BAN_ID=$id");
//header("Location: banner.php?msg=3");
echo '<script> location.replace("banner.php?msg=3"); </script>';
}
	$results = $query -> ExecuteSQL("SELECT * FROM tb_banner JOIN tb_administradores ON BAN_ADM_ID = ADM_ID ORDER BY BAN_DATA DESC");
	$id = result($results,'BAN_ID');
	$administrador = result($results,'ADM_NOME');
	$data = result($results,'BAN_DATA');
	$img = result($results,'BAN_IMG');
	$descricao = result($results,'BAN_DESCRICAO');
	$status = result($results,'BAN_STATUS');
$path = 'BANNER';
$url = 'banner.php';
include('components/path.php');
?>
			<p class="center"><a id="insert" href="banner.insert.php" class="btn btn-large btn-primary visible-desktop">ADICIONAR IMAGEM AO BANNER</a></p>
			<div class="row-fluid sortable">
				<div class="box span12">
					<?php include ('components/notify.php');?>
					<?php call_box(' Visualizar imagens do banner', 'icon-picture');?>
					<div class="box-content">
					<?php if(count($id)!=0){?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Última alteração</th>
								  <th>Administrador</th>
								  <th>Data</th>
								  <th>Imagem</th>
								  <th>Ação</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php for ($i=0;$i<count($id);$i++){?>
							<tr>
								<td title="<?php echo 'Última edição feita por '.$administrador[$i].' em '.datahora($data[$i]);?>">
								<?php echo '<img src="'.$imagens_banner.$img[$i].'" width="170px"/>'; ?>
								</td>
								<td class="center"><?php echo $administrador[$i];?></td>
								<td class="center"><?php echo datahora($data[$i]);?></td>
								<td class="center"><?php echo status($status[$i]);?></td>
								<td class="center">
									<a class="btn btn-success" href="../" target="_blank">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="banner.edit.php?id=<?php echo $id[$i];?>">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="banner.php?id=<?php echo $id[$i];?>">
										<i class="icon-trash icon-white"></i> 
										Deletar
									</a>
								</td>
							</tr>
							<?php };?>
						  </tbody>
						</table>            
					  <?php }else{echo "<center><h3>NENHUMA IMAGEM NO BANNER AINDA.</h3></center>";}?>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
<?php include('footer.php'); ?>