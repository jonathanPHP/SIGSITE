<?php 
include('header.php'); 
$path = 'PARCEIROS';
$url = 'partners.php';
include('components/path.php');
if(@$_GET['id']){
$id = $_GET['id'];
$imageDel = $query -> ExecuteSQL("SELECT PAR_IMG FROM tb_parceiros WHERE PAR_ID=$id");
deletar($imageDel['PAR_IMG'], $imagens_posts);
$query -> ExecuteSQL("DELETE FROM tb_parceiros WHERE PAR_ID=$id");
//header("Location: partners.php?msg=3");
echo '<script> location.replace("partners.php?msg=3"); </script>';
}
$results = $query -> ExecuteSQL("SELECT * FROM tb_parceiros JOIN tb_administradores ON PAR_ADM_ID = ADM_ID ORDER BY PAR_DATA DESC");
$id = result($results,'PAR_ID');
$administrador = result($results, 'ADM_NOME');
$nome = result($results,'PAR_NOME');
$url = result($results,'PAR_URL');
$data = result($results,'PAR_DATA');
$informacoes = result($results,'PAR_INFORMACOES');
$status = result($results,'PAR_STATUS');
$imgs = result($results, 'PAR_IMG');
 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
				<p class="center"><a id="insert" href="partners.insert.php" class="btn btn-large btn-primary visible-desktop">CADASTRAR PARCEIRO</a></p>
					<?php call_box(' Visualizar parceiros', 'icon-user');?>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Logomarca</th>
								  <th>Parceiro</th>
								  <th>Data</th>
								  <th>Status</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php for ($i=0;$i<count($id);$i++){?>
							<tr>
								<td title="<?php echo 'Última edição feita por '.$administrador[$i].' em '.datahora($data[$i]);?>">
								<?php 
								if($imgs[$i]!==''){
								echo '<img src="'.$imagens_partners.$imgs[$i].'" />';
								}
								else{
								echo '<img src="'.$imagens_partners.$default_imagens_partners.'" />';
								}
								?>
								</td>
								<td class="center"><?php echo '<a href="'.$url[$i].'" target="_blank">'.$nome[$i].'</a>';?></td>
								<td class="center"><?php echo datahora($data[$i]);?></td>
								<td class="center"><?php echo status($status[$i]);?></td>
								<td class="center">
									<a class="btn btn-success" href="<?php echo $url[$i];?>" target="_blank">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="partners.edit.php?id=<?php echo $id[$i];?>">
										<i class="icon-edit icon-white"></i>  
										Editar                                            
									</a>
									<a class="btn btn-danger" href="partners.php?id=<?php echo $id[$i];?>">
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