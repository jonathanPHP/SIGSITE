<?php 
include('header.php');
$path = 'ARQUIVOS';
$url = 'file-manager.php';
include('components/path.php');
?>
			<div class="row-fluid sortable">
				<div class="box span12">
			<?php 
			call_box(' Gerenciador de arquivos', 'icon-folder-open');
			?>
					<div class="box-content">
						<?php 
						$message = array ("Atenção: Antes de manipular qualquer arquivo, certifique-se de que ele não está sendo compartilhado.");
						$box = new form();
						$box -> boxes($message, 0, 'block');
						?>
						<iframe src="components/elfinder-2.0/elfinder.html" frameBorder="0" width="100%" height="600px" scrolling="no"></iframe>
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>
