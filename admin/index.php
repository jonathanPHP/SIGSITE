<?php 
include('header.php'); 
$path = 'GERAL';
$url = 'index.php';
include('components/path.php'); 
include ("widgets/notices.php");
?>				
			<div class="row-fluid">
<?php include ("widgets/large-box.php");?>
			</div>					
			<div class="row-fluid sortable">					
<?php
include ("widgets/stats.php");
include ("widgets/traffic.php");
include ("widgets/members.php");
?>
			</div>			         
<?php include('footer.php'); ?>
