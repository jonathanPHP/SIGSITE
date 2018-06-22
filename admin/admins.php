<?php 
include('header.php');
$path = 'ADMINISTRADORES';
$url = 'admin.php';
include('components/path.php');
//Administrator type
$condition = $query -> ExecuteSQL("SELECT ADM_ID FROM tb_administradores WHERE ADM_ID = '$adm' AND ADM_TIPO = 1");
if($condition['ADM_ID']==$adm){
	$tipo_user=1;
}
else{
	$tipo_user=0;
}
if (@$_GET['edit']&&$tipo_user==1){
$edit = $_GET['edit'];
$foi = $query -> ExecuteSQL("UPDATE tb_administradores SET ADM_STATUS='0' WHERE ADM_ID=$edit");
//header("Location: admins.php?msg=4");
}
if (@$_GET['reedit']&&$tipo_user==1){
$reedit = $_GET['reedit'];
$var = 1;
$query -> ExecuteSQL("UPDATE tb_administradores SET ADM_STATUS='1' WHERE ADM_ID=$reedit");
//header("Location: admins.php?msg=4");
}

	$results = $query -> ExecuteSQL("SELECT * FROM tb_administradores ORDER BY ADM_DATA DESC");
	$id = result($results,'ADM_ID');
	$nome = result($results,'ADM_NOME');
	$email = result($results,'ADM_EMAIL');
	$data = result($results,'ADM_DATA');
	$acesso = result($results,'ADM_ACESSO');
	$status = result($results,'ADM_STATUS');
	$tipo = result($results,'ADM_TIPO');
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
				<?php include ('components/notify.php');?>
				<p class="center">
				<?php if ($tipo_user==1){?><a id="insert" href="admins.insert.php" class="btn btn-large btn-primary visible-desktop">CADASTRAR NOVO ADMINISTRADOR</a><?php }?>
				</p>
				<?php call_box(' Visualizar administradores', 'icon-user');?>
					<div class="box-content">
					<?php if(count($id)!=0){?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Nome</th>
								  <th>Último login</th>
								  <th>Email</th>
								  <th>Status</th>
								  <th>Ações</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php for ($i=0;$i<count($id);$i++){?>
							<tr>
								<td title="<?php echo "Administrador de ";if ($tipo[$i]==1){echo 'permissão total.';}else{echo "permissão parcial.";}?>"><?php echo $nome[$i]; ?></td>
								<td class="center" title="<?php echo 'Cadastrado em '.datahora($data[$i]);?>"><?php if($acesso[$i]!==$data[$i]){echo datahora($acesso[$i]);}else{echo "Não entrou ainda.";}; ?></td>
								<td class="center"><?php echo $email[$i]; ?></td>
								<td class="center"><?php echo status($status[$i]);?></td>
								<td class="center">
									<?php if ($tipo_user==1&&($adm!=$id[$i])){?>
									<a class="btn btn-info" href="?<?php if($status[$i]==1){echo "edit=";}else{echo "reedit=";}; echo $id[$i]; ?>">
										<i class="icon-edit icon-white"></i>  
										<?php if($status[$i]==1){echo "Desativar";}else{echo "Ativar";}?>                                           
									</a>
									<?php };?>
								</td>
							</tr>
							<?php };?>
						  </tbody>
						</table>            
					  <?php }else{echo "<center><h3>NENHUM ADMINISTRADOR CADASTRADO AINDA.</h3></center>";}?>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php include('footer.php'); ?>		

    