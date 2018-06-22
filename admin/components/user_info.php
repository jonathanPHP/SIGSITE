<?php
				$session = $_SESSION['usuario_logado'];
				$user = $query -> ExecuteSQL("SELECT * FROM tb_administradores WHERE ADM_ID=$session");
				$adm = $user['ADM_ID'];
				$adm_nome = $user['ADM_NOME'];
				?>
				<div class="btn-group pull-right" >
				
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo $adm_nome;?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="profile.php">Perfil</a></li>
						<li class="divider"></li>
						<li><a href="login.php?logout=1">Sair</a></li>
					</ul>
				</div>