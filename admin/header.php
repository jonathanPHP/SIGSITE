<?php 
include ('components/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $description;?>">
	<meta name="author" content="<?php echo $author;?>">


	<!-- The styles -->
	<link id="bs-css" href="css/<?php echo $default_theme;?>" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>

	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>
	 <script type="text/javascript" src="components/ckeditor/ckeditor.js"></script>
	 <style type="text/css">
.table th,
.table td {
  text-align: center;
}
</style>
	<!-- The php5 shim, for IE6-8 support of php5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://php5shim.googlecode.com/svn/trunk/php5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="../imagens/icon.png">
		
</head>

<body>
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"> 
					<!--img alt="<?php echo $title;?>" src="<?php echo $logo;?>"--> 
					<span><?php echo $title;?></span>
				</a>
				
				<?php include ('components/themes.php');?>
				<?php include ('components/user_info.php');?>
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="../" target="_blank">Visualizar Site</a></li>
						<li><a href="#"><?php include("misc/clock.php");?></a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<?php include ('components/main.php');?>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Aviso!</h4>
					<p>Você precisa ter seu <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> habilitado para acessar esse site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>
