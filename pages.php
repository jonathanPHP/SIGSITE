<?php 
if ($_GET['id']){
include ('head.php');
include ('components/main.php');
$id = $_GET['id'];
$results = $query -> ExecuteSQL("SELECT * FROM tb_paginas JOIN tb_administradores ON PAG_ADM_ID = ADM_ID WHERE PAG_ID='$id'");
$tituloR = $results['PAG_TITULO'];
$conteudoR = $results['PAG_CONTEUDO'];
$statusR = $results['PAG_STATUS'];
$administradorR = $results['ADM_NOME'];
$editadoR = $results['PAG_EDITADO'];
$dataR = $results['PAG_DATA'];
?>
			<div id="conteudo">
			<div class="titulo"><?php echo $tituloR;?></div>
			<div style="clear:both;"></div>
			<div class="novidades-post">
			<h4>Publicado em: <?php echo data($dataR);?></h4>
			<h1><?php echo $tituloR;?></h1>
				<?php echo $conteudoR;?>
				</div>
		</div>
		<div style="clear:both;"></div>
		</div>
<?php include ('footer.php');?>
		</div>
	</body>
</html>
<?php } else{header ("Location: index.php");};?>