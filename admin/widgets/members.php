				<div class="box span4">
					<?php call_box("Administradores", 'icon-user');
						$results = $query -> ExecuteSQL("SELECT * FROM tb_administradores ORDER BY ADM_DATA DESC LIMIT 0,4");
						$id = result($results,'ADM_ID');
						$nome = result($results,'ADM_NOME');
						$email = result($results,'ADM_EMAIL');
						$data = result($results,'ADM_DATA');
						$acesso = result($results,'ADM_ACESSO');
						$status = result($results,'ADM_STATUS');
						$tipo = result($results,'ADM_TIPO');
					?>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
							<?php 
							$adms = new form();
							for ($i=0;$i<count($id);$i++){?>
								<li>
										<img class="dashboard-avatar" alt="<?php echo $nome[$i];?>" src="img/eject.png">
										<strong>Nome:</strong> <a href="admins.php"><?php echo $nome[$i];?>
									</a><br>
									<strong>Desde:</strong> <?php echo datahora($data[$i]);?><br>
									<strong>Status:</strong> 
									<?php 
									
									if($status[$i]==1){
									$adms -> labels('ATIVO', 'success');
									}
									else{
									$adms -> labels('INATIVO', 'warning');
									}
									?>                        
								</li>
							<?php }?>
							</ul>
						</div>
					</div>
				</div><!--/span-->