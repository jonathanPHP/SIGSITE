<?php 
include ('head.php');
include ('components/main.php');
	$banner = $query -> ExecuteSQL("SELECT * FROM tb_banner JOIN tb_administradores ON BAN_ADM_ID = ADM_ID ORDER BY BAN_DATA DESC");
	$banner_id = result($banner,'BAN_ID');
	$banner_administrador = result($banner,'ADM_NOME');
	$banner_data = result($banner,'BAN_DATA');
	$banner_img = result($banner,'BAN_IMG');
	$banner_descricao = result($banner,'BAN_DESCRICAO');
	$banner_status = result($banner,'BAN_STATUS');
	
	$portfolio = $query -> ExecuteSQL("SELECT * FROM tb_postagens JOIN tb_administradores ON POS_ADM_ID = ADM_ID JOIN tb_categorias ON POS_CAT_ID = CAT_ID WHERE POS_CAT_ID=1 AND POS_STATUS=1 ORDER BY POS_EDITADO DESC LIMIT 0,4");
	$portfolio_id = result($portfolio,'POS_ID');
	$portfolio_categoria = result($portfolio,'CAT_NOME');
	$portfolio_administrador = result($portfolio,'ADM_NOME');
	$portfolio_titulo = result($portfolio,'POS_TITULO');
	$portfolio_conteudo = result($portfolio,'POS_CONTEUDO');
	$portfolio_data = result($portfolio,'POS_DATA');
	$portfolio_status = result($portfolio,'POS_STATUS');
	$portfolio_editado = result($portfolio,'POS_EDITADO');
	$portfolio_img = result($portfolio,'POS_IMG');
	
	$novidades = $query -> ExecuteSQL("SELECT * FROM tb_postagens JOIN tb_categorias ON POS_CAT_ID = CAT_ID JOIN tb_administradores ON POS_ADM_ID = ADM_ID WHERE POS_CAT_ID=2 AND POS_STATUS=1 ORDER BY POS_EDITADO DESC LIMIT 0,4 ");
	$novidades_id = result($novidades, 'POS_ID');
	$novidades_categoria = result($novidades, 'CAT_NOME');
	$novidades_administrador = result($novidades, 'ADM_NOME');
	$novidades_titulo = result($novidades, 'POS_TITULO');
	$novidades_conteudo = result($novidades, 'POS_CONTEUDO');
	$novidades_data = result($novidades, 'POS_DATA');
	$novidades_status = result($novidades, 'POS_STATUS');
	$novidades_editado = result($novidades, 'POS_EDITADO');
	$novidades_img = result($novidades, 'POS_IMG');
	
	$parceiros = $query -> ExecuteSQL("SELECT * FROM tb_parceiros JOIN tb_administradores ON PAR_ADM_ID = ADM_ID ORDER BY PAR_DATA DESC");
	$parceiros_id = result($parceiros, 'PAR_ID');
	$parceiros_administrador = result($parceiros, 'ADM_NOME');
	$parceiros_nome = result($parceiros, 'PAR_NOME');
	$parceiros_url = result($parceiros, 'PAR_URL');
	$parceiros_data = result($parceiros, 'PAR_DATA');
	$parceiros_informacoes = result($parceiros, 'PAR_INFORMACOES');
	$parceiros_status = result($parceiros, 'PAR_STATUS');
	$parceiros_imgs = result($parceiros, 'PAR_IMG');
?>
			<div id="banner">
			<div id="featured"> 
			<?php for ($i=0;$i<count($banner_id);$i++){
			echo '<img src="admin/'.$imagens_banner.$banner_img[$i].'" data-caption="#htmlCaption'.$i.'"/></a>';
			}?>
			</div>
		<!-- Captions for Orbit -->
			<?php for ($i=0;$i<count($banner_id);$i++){
			echo '<span class="orbit-caption" id="htmlCaption'.$i.'">'.$banner_descricao[$i].'</span>';
			}?>
		</div>	
			<div id="conteudo">
				<div class="e">
					<img src="imagens/ufrn-brasao.png">
				</div>
				<div class="sobre-eject"><?php echo $preview;?></div>
			</div>
			<div style="clear:both;"></div>
			<hr>
			<!--div id="conteudo">
				<div class="titulo">Novidades</div>
				<div style="clear:both;"></div>
				<div class="novidades">
				
					<?php 
					for ($i=0;$i<count($novidades_id);$i++){
					if ($i==0){
					?>
					<div class="novidades-left">
						<div class="foto-novidades">
							<img src="imagens/port.jpg">
						</div>
						<div class="date">
							<spam><?php echo substr(mes($novidades_data[$i]), 0, 3);?></spam><br/>
							<b><?php echo dia($novidades_data[$i]);?></b>
							<spam><?php echo ano($novidades_data[$i]);?></spam>
						</div>
						<div class="post-novidades">
							<a href="posts.php?id=<?php echo $novidades_id[$i];?>"><h1><?php echo $novidades_titulo[$i];?></h1>
							<?php echo substr($novidades_conteudo[$i], 0, 200).'...';?>
							Continuar lendo...</a>
						</div>
					</div>
					<div class="novidades-right">
					<?php }else {?>
						<div class="lista-post-novidades">
							<div class="novi-foto"><img src="admin/<?php if($novidades_img[$i]!=''){echo $imagens_posts.$novidades_img[$i];}else{echo $imagens_posts.$default_imagens_posts;}?>"></div>
							<div class="date">
							<spam><?php echo substr(mes($novidades_data[$i]), 0, 3);?></spam><br/>
							<b><?php echo dia($novidades_data[$i]);?></b>
							<spam><?php echo ano($novidades_data[$i]);?></spam>
						</div>
						<div class="recente-post-novidades">
							<a href="posts.php?id=<?php echo $novidades_id[$i];?>"><h1><?php echo $novidades_titulo[$i];?></h1></a>
						</div>
						</div>
					<?php }
						  }
						  echo '</div>';
						  ?>
				</div>
			</div>
			<div style="clear:both;"></div>
<hr>
		<div id="conteudo">
			<div class="titulo">Portfólio</div>
			<div style="clear:both;"></div>
			<div class="port">
			<?php for ($i=0;$i<count($portfolio_id);$i++){?>
				<div class="portfolio">
					<a href="posts.php?id=<?php echo $portfolio_id[$i];?>"><div class="port-foto">
					<img src="admin/<?php if($portfolio_img[$i]!=''){echo $imagens_posts.$portfolio_img[$i];}else{echo $imagens_posts.$default_imagens_posts;}?>"></div>
					<div class="post-portfolio">
						<h1><?php echo $portfolio_titulo[$i];?></h1>
						<?php echo substr($portfolio_conteudo[$i], 0, 50);?></a>
					</div>
				</div>
			<?php }?>
			</div>
		</div>
<div style="clear:both;"></div>
<hr-->
		<div id="conteudo">
			<div id="parceiros">
				<div class="titulo">Parceiros</div>
				<div style="clear:both"></div>
					<!--- DISPLAY CONTAINER -->
    <div id="containeer">
    	<!--- NAVIGATION BUTTONS -->
    <a href="javascript:void(0)" onclick="PreviousSlide()" id="PreviousButton" style="margin-right: 10px;" class="nave-parc-left">
        <img src="imagens/esquerda.png"></a>
    <a href="javascript:void(0)" onclick="NextSlide()" id="NextButton" class="nave-parc-right">
    	<img src="imagens/direita.png"></a>
        <style type="text/css">
		/*area dos parceiros*/
			#slider-wrappeer {
    			width: <?php echo count($parceiros_id)*150+280;?>px;
			}
		</style>
		<!-- OUTTER WRAPPER -->
        <div id="slider-wrappeer">
			<?php for ($i=0;$i<count($parceiros_id);$i++){?>
		   <!-- SLIDE <?php echo $i;?> -->
            <div id="slide<?php echo $i;?>" class="slide">
                <div class="parc"><a href="<?php echo $parceiros_url[$i];?>" target="_blank"><img src="<?php if($parceiros_imgs[$i]!=''){echo 'admin/'.$imagens_partners.$parceiros_imgs[$i];}else{echo 'admin/'.$imagens_partners.$default_imagens_partners;}?>"></a></div>
            </div>
			<?php }?>
        </div>
    </div>
			</div>
		</div>
		</div>

		<div style="clear:both;"></div>
<?php include ('footer.php');?>
	</body>
</html>