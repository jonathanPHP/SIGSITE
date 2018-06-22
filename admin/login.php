<?php
$no_visible_elements=true;
$no_need_login=true;
print($_SESSION['usuario_logado']);
//session_start();
include('header.php');
if(@$_GET['logout']==1) {
setcookie(session_name($_SESSION['usuario_logado']), '', time()-42000, '/');
session_destroy();
//header("Location:login.php?msg=13");
echo '<script> location.replace("login.php?msg=13"); </script>';
}
session_start();
if (isset($_SESSION['usuario_logado'])){
//header("Location:index.php");
echo '<script> location.replace("index.php"); </script>';
}
// code to verify pass and user
if(@$_POST['username']) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$results = $query -> ExecuteSQL("SELECT * FROM tb_administradores where ADM_LOGIN='$user' and ADM_SENHA='$pass' and ADM_STATUS = 1") or die (print '<script> location.replace("login.php?msg=8"); </script>');

	if ($results['ADM_ID'] != 0) {
		$id = $results['ADM_ID'];
	//update login
	$query -> ExecuteSQL("UPDATE tb_administradores SET ADM_ACESSO = '$data' WHERE ADM_ID = $id");
		//session_start();
		$_SESSION['usuario_logado'] = $id;
		//print($id.'-'.$_SESSION['usuario_logado']);
		//header("Location: index.php");
		echo '<script> location.replace("index.php"); </script>';
	}
	else {
		//header("Location: login.php?msg=8");
		echo '<script> location.replace("login.php?msg=8"); </script>';
	}

}
?>
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Bem-vindo ao <?php echo $title;?></h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<?php
						  include("components/notify.php");
					?>
					<form class="form-horizontal" action="login.php" method="post">
						<fieldset>
							<div class="input-prepend" title="Usuário" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Senha" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" />
							</div>
							<div class="clearfix"></div>
							<!--div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div-->
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">Entrar</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>
