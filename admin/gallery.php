<?php 
include('header.php'); 
require('components/wideimage/lib/WideImage.inc.php');
include("components/m2brimagem.class.php");
if (@$_GET['deletar']){
	extract ($_GET);
deletar($deletar, $imagens_dir);
deletar($deletar, $imagens_dir_thumb);
}

$path = 'GALERIA';
$url = 'gallery.php';
include('components/path.php');
include ("components/notify.php");
if(@$_POST['oculto']) {
	extract($_POST);
	gera_imagens_miniaturas('filesToUpload', '/'.$imagens_dir, '/'.$imagens_dir_thumb, 100, 100);
	}
			if (@$_GET['action']=="insert"){
			?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<?php call_box(' Adicionar imagem(ns)', 'icon-picture');?>
					<div class="box-content">
						<form action="gallery.php" method="post" class="form-horizontal" accept-charset="ISO-8859-1" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Imagem(ns): </label>
							  <div class="controls">
								<input class="input-file uniform_on" name="filesToUpload[]" id="filesToUpload" type="file" accept="image/*" multiple="">
								<input type="hidden" name="oculto" id="oculto" value="oculto">
							  </div>
							</div>          
							
							<div class="control-group">
								
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Enviar</button>
							  <span style="margin-left:300px;"><button type="reset" class="btn">Cancelar</button></span>
							</div>
						  </fieldset>
						</form>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<?php }else{?>
			<p class="center"><a id="insert" href="?action=insert" class="btn btn-large btn-primary visible-desktop">ADICIONAR IMAGENS</a></p><?php }?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<?php call_box(' Visualizar imagens', 'icon-picture');?>
					<div class="box-content" >
						<p class="center">
							<button id="toggle-fullscreen" class="btn btn-large btn-primary visible-desktop" data-toggle="button">Modo Tela Cheia</button>
						</p>
						<br/>
						<ul class="thumbnails gallery">
							<?php
//CODIGO PARA VISUALIZAR TODAS AS IMAGENS
	$have_images = 0; 
	$pasta = 'images/thumbs/';	 
	 $arquivos = glob("$pasta{*.jpg,*.png,*.gif,*.bmp}", GLOB_BRACE);
	 foreach($arquivos as $img){ $have_images=1; ?>
							<li id="<?php echo substr($img, 14);?>" class="thumbnail">
								<a style="background:url(<?php echo $img;?>)" title="<?php echo substr($img, 14);?>" href="<?php echo "images/".substr($img, 14);//sem thumbs?>"><img class="grayscale" src="<?php echo $img;?>" alt="<?php echo $img;?>"></a>
							</li>
							<?php } if($have_images==0){
							echo "<h3 style='text-align: center;'>NENHUMA IMAGEM ENCONTRADA.</h3>";
							}?>	
						</ul>
					</div>
				</div><!--/span-->
			</div><!--/row-->
    
<?php include('footer.php'); ?>
