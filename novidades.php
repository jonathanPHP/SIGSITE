<?php 
include ('head.php');
include ('components/main.php');
$id=2;
	$post = $query -> ExecuteSQL("SELECT * FROM tb_postagens JOIN tb_administradores ON POS_ADM_ID = ADM_ID JOIN tb_categorias ON POS_CAT_ID = CAT_ID WHERE POS_CAT_ID=$id AND POS_STATUS=1 ORDER BY POS_EDITADO DESC LIMIT 0,4");
	$post_id = result($post,'POS_ID');
	$post_categoria = result($post,'CAT_NOME');
	$post_administrador = result($post,'ADM_NOME');
	$post_titulo = result($post,'POS_TITULO');
	$post_conteudo = result($post,'POS_CONTEUDO');
	$post_data = result($post,'POS_DATA');
	$post_status = result($post,'POS_STATUS');
	$post_editado = result($post,'POS_EDITADO');
	$post_img = result($post,'POS_IMG');
?>
		<div id="conteudo">
			<div class="titulo">Novidades</div>
			<div style="clear:both;"></div>
			<!--center><h1><br /><br /><p>BREVE MAIORES INFORMAÇÕES. </p><p>AGUARDE.</p></h1></center-->
			<div style="clear:both;"></div>
			<div class="port">
			<?php for ($i=0;$i<count($post_id);$i++){?>
				<div class="portfolio">
					<a href="posts.php?id=<?php echo $post_id[$i];?>"><div class="port-foto">
					<img src="admin/<?php if($post_img[$i]!=''){echo $imagens_posts.$post_img[$i];}else{echo $imagens_posts.$default_imagens_posts;}?>"></div>
					<div class="post-portfolio">
						<h1><?php echo $post_titulo[$i];?></h1>
						<?php echo substr($post_conteudo[$i], 0, 50);?></a>
					</div>
				</div>
			<?php }?>
		</div>
		</div>
		</div>
</div>
		<div style="clear:both;"></div>
<?php include ('footer.php');?>
		</div>
	</body>
</html>