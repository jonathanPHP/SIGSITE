<?php 
if ($_GET['id']){
include ('head.php');
include ('components/main.php');
$id = $_GET['id'];
$results = $query -> ExecuteSQL("SELECT * FROM tb_postagens JOIN tb_administradores ON POS_ADM_ID = ADM_ID JOIN tb_categorias ON POS_CAT_ID = CAT_ID WHERE POS_ID='$id'");
$categoriaR = $results['CAT_NOME'];
$tituloR = $results['POS_TITULO'];
$miniaturaR = $results['POS_IMG'];
$conteudoR = $results['POS_CONTEUDO'];
$statusR = $results['POS_STATUS'];
$administradorR = $results['ADM_NOME'];
$editadoR = $results['POS_EDITADO'];
$imgR = $results['POS_IMG'];
$dataR = $results['POS_DATA'];
?>

<script type="text/javascript">
<?php if($results['CAT_ID']==3){
echo " document.getElementById('eventos').className = 'actives';";
}
else if($results['CAT_ID']==2){
echo " document.getElementById('novidades').className = 'actives';";
}
else{
echo " document.getElementById('portfolio').className = 'actives';";
}
?>
</script>
			<div id="conteudo">
			<div class="titulo"><?php echo $categoriaR;?></div>
			<div style="clear:both;"></div>
			<div class="novidades-post">
			<h4>Publicado em: <?php echo data($dataR);?></h4>
			<h1><?php echo $tituloR;?></h1>
				<?php echo $conteudoR;?>
				</div>
		</div>
		<div style="clear:both;"></div>
		</div>
<?php include ('footer.php');

?>
		</div>
	</body>
</html>
<?php } else{header ("Location: index.php");};?>