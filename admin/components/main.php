<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet"><center style='font-weight:bold;font-size:14px;'>SITE</center></li>
						<li><a class="ajax-link" href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> GERAL</span></a></li>
						<li><a class="ajax-link" href="banner.php"><i class="icon-picture"></i><span class="hidden-tablet"> BANNER</span></a></li>
						<li><a class="ajax-link" href="posts.php"><i class="icon-th-list"></i><span class="hidden-tablet"> POSTAGENS</span></a></li>
						<li class="nav-header hidden-tablet">PÁGINAS</li>
						<?php
						$main_dynamic = $query -> ExecuteSQL("SELECT * FROM tb_paginas");
						$main_link = result($main_dynamic,'PAG_ID');
						$main_name = result($main_dynamic, 'PAG_TITULO');
						for ($j=0;$j<count($main_dynamic);$j++){
						echo '<li><a class="ajax-link" href="pages.edit.php?id='.$main_link[$j].'"><i class="icon-list-alt"></i><span class="hidden-tablet"> '.$main_name[$j].'</span></a></li>';
						}
						?>
						<!--li><a class="ajax-link" href="pages.edit.php?id=1"><i class="icon-list-alt"></i><span class="hidden-tablet"> QUEM SOMOS</span></a></li>
						<li><a class="ajax-link" href="pages.edit.php?id=2"><i class="icon-list-alt"></i><span class="hidden-tablet"> MEMBROS</span></a></li>
						<li><a class="ajax-link" href="pages.edit.php?id=3"><i class="icon-list-alt"></i><span class="hidden-tablet"> MEJ</span></a></li>
						<li><a class="ajax-link" href="pages.edit.php?id=4"><i class="icon-list-alt"></i><span class="hidden-tablet"> SERVIÇOS</span></a></li-->
						<li class="nav-header hidden-tablet">EMPRESA</li>
						<li><a class="ajax-link" href="info.php"><i class="icon-briefcase"></i><span class="hidden-tablet"> INFORMAÇÕES</span></a></li>
						<li><a class="ajax-link" href="partners.php"><i class=" icon-user"></i><span class="hidden-tablet"> PARCEIROS</span></a></li>
						<li class="nav-header hidden-tablet">GERENCIAMENTO</li>
						<li><a class="ajax-link" href="gallery.php"><i class="icon-picture"></i><span class="hidden-tablet"> GALERIA</span></a></li>
						<li><a class="ajax-link" href="file-manager.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> ARQUIVOS</span></a></li>
						<li><a class="ajax-link" href="contacts.php"><i class="icon-envelope"></i><span class="hidden-tablet"> CONTATOS</span></a></li>
						<li><a class="ajax-link" href="admins.php"><i class=" icon-user"></i><span class="hidden-tablet"> ADMINISTRADORES</span></a></li>
						<li><a class="ajax-link" href="profile.php"><i class=" icon-user"></i><span class="hidden-tablet"> MEU PERFIL</span></a></li>
					</ul>
					<!--label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label-->
				</div><!--/.well -->
			</div><!--/span-->
<!-- left menu ends -->