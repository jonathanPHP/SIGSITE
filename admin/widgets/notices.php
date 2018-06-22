			<?php
			$administradores = count($query -> ExecuteSQL("SELECT ADM_ID FROM tb_administradores"));
			$postagens = count($query -> ExecuteSQL("SELECT POS_ID FROM tb_postagens"));
			$paginas = count($query -> ExecuteSQL("SELECT PAG_ID FROM tb_paginas"));
			$contatos = count($query -> ExecuteSQL("SELECT CON_ID FROM tb_contatos"));
			$contatosnew = count($query -> ExecuteSQL("SELECT CON_ID FROM tb_contatos WHERE CON_STATUS=1"));
			if($query -> ExecuteSQL("SELECT CON_ID FROM tb_contatos WHERE CON_STATUS=1")=='1'){$contatosnew = 0;}
			?>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="Total de <?php echo $administradores;?> administradores." class="well span3 top-block" href="admins.php">
					<span class="icon32 icon-color icon-user"></span>
					<div>Administradores</div>
					<div><?php echo $administradores;?></div>
				</a>

				<a data-rel="tooltip" title="Total de <?php echo $postagens;?> postagens." class="well span3 top-block" href="posts.php">
					<span class="icon32 icon-color icon-book"></span>
					<div>Postagens</div>
					<div><?php echo $postagens;?></div>
				</a>

				<a data-rel="tooltip" title="Total de <?php echo $paginas;?> páginas." class="well span3 top-block" href="pages.php">
					<span class="icon32 icon-color icon-page"></span>
					<div>Páginas</div>
					<div><?php echo $paginas;?></div>
				</a>
				
				<a data-rel="tooltip" title="<?php echo $contatosnew;?> novos contatos." class="well span3 top-block" href="contacts.php">
					<span class="icon32 icon-<?php if($contatosnew>0){echo 'red';}else{echo'color';}?> icon-envelope-<?php if($contatosnew>0){echo 'closed';}else{echo'open';}?>"></span>
					<div>Contatos</div>
					<div><?php echo $contatos;?></div>
					<span class="notification red"><?php echo $contatosnew;?></span>
				</a>
			</div>