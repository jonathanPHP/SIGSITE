				<div class="box span4">
					<?php call_box("Estatísticas", 'icon-list');
					$portfolios = count($query -> ExecuteSQL("SELECT POS_ID FROM tb_postagens WHERE POS_CAT_ID=1"));
					$novidades = count($query -> ExecuteSQL("SELECT POS_ID FROM tb_postagens WHERE POS_CAT_ID=2"));
					$eventos = count($query -> ExecuteSQL("SELECT POS_ID FROM tb_postagens WHERE POS_CAT_ID=3"));
					$parceiros = count($query -> ExecuteSQL("SELECT PAR_ID FROM tb_parceiros"));
					$qtdarquivos = contaArquivos('files/', 0);
					$qtdimagens = contaImagens('images/');
					?>
					<div class="box-content">
						<ul class="dashboard-list">
							<li>
								<a href="posts.php">
									<i class="icon-comment"></i>                               
									<span class="green"><?php echo $portfolios;?></span>
									Portfólios                                    
								</a>
							</li>
						  <li>
							<a href="posts.php">
							  <i class="icon-comment"></i>
							  <span class="red"><?php echo $novidades;?></span>
							  Novidades
							</a>
						  </li>
						  <li>
							<a href="posts.php">
							  <i class="icon-comment"></i>
							  <span class="blue"><?php echo $eventos;?></span>
							  Eventos                                    
							</a>
						  </li>
						  <li>
							<a href="partners.php">
							  <i class="icon-user"></i>
							  <span class="yellow"><?php echo $parceiros;?></span>
							  Parceiros                                  
							</a>
						  </li>
						  <li>
						  <!--Falta contar os arquivos-->
							<a href="gallery.php">
							  <i class="icon-file"></i>                               
							  <span class="green"><?php echo $qtdimagens;?></span>
							  Imagens                                    
							</a>
						  </li>
						  <li>
							<a href="file-manager.php">
							  <i class="icon-file"></i>
							  <span class="red"><?php echo $qtdarquivos;?></span>
							  Arquivos
							</a>
						  </li>
						</ul>
					</div>
				</div><!--/span-->