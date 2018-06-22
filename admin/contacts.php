<?php 
include('header.php'); 
$path = 'CONTATOS';
$url = 'contacts.php';
include('components/path.php');
if(@$_GET['id']){
$id = $_GET['id'];
$query -> ExecuteSQL("DELETE FROM tb_contatos WHERE CON_ID=$id");
//header("Location: contacts.php?msg=3");
echo '<script> location.replace("contacts.php?msg=3"); </script>';
}
if(@$_GET['read']){
$read = $_GET['read'];
$query -> ExecuteSQL("UPDATE tb_contatos SET CON_STATUS='0' WHERE CON_ID=$read");
//header("Location: contacts.php?msg=4");
echo '<script> location.replace("contacts.php?msg=4"); </script>';
}
if(@$_GET['notread']){
$read = $_GET['notread'];
$query -> ExecuteSQL("UPDATE tb_contatos SET CON_STATUS='1' WHERE CON_ID=$read");
//header("Location: contacts.php?msg=4");
echo '<script> location.replace("contacts.php?msg=4"); </script>';
}
$results = $query -> ExecuteSQL("SELECT * FROM tb_contatos ORDER BY CON_DATA DESC");
$id = result($results,'CON_ID');
$nome = result($results,'CON_NOME');
$email = result($results,'CON_EMAIL');
$assunto = result($results,'CON_ASSUNTO');
$mensagem = result($results,'CON_MENSAGEM');
$data = result($results,'CON_DATA');
$status = result($results,'CON_STATUS');
 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
				<?php include ('components/notify.php');?>
					<?php call_box(' Visualizar contatos', 'icon-envelope');?>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Assunto</th>
								  <th>Data</th>
								  <th>Remetente</th>
								  <th>E-mail</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php for ($i=0;$i<count($id);$i++){
							$window_message = 'Remetente: '.$nome[$i].' ['.$email[$i].']\n\nData: '.datahora($data[$i]).'\n\nMENSAGEM:\n '.$mensagem[$i];
							?>
							<tr <?php if($status[$i]==1){echo 'style="font-weight:bold;"';};?>>
								<td><?php echo $assunto[$i];?></td>
								<td class="center"><?php echo datahora($data[$i]);?></td>
								<td class="center"><?php echo $nome[$i];?></td>
								<td class="center"><?php echo $email[$i];?></td>
								<td class="center">
									<a class="btn btn-success" href="#" onClick="javascript:window.alert('<?php echo $window_message;?>');" target="_blank">
										<i class="icon-zoom-in icon-white"></i>  
										Ver                                            
									</a>
									<a class="btn btn-info" href="contacts.php?<?php if($status[$i]==1){echo 'read='.$id[$i];}else{echo 'notread='.$id[$i];};?>">
										<i class="icon-edit icon-white"></i>  
										<?php if($status[$i]==1){echo 'Marcar lida';}else{echo 'Marcar não lida.';};?>                                        
									</a>
									<a class="btn btn-danger" href="contacts.php?id=<?php echo $id[$i];?>">
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