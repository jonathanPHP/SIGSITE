<?php
//INFORMATIONS TO BE CHANGED
$title = "SIGSITE";
$author = "SITE";
$title_site = "Site";
$author_link = "http://www.site.com.br";
$description = "Charisma, a fully featured, responsive, php5, Bootstrap admin template.";
$default_theme = "bootstrap-cerulean.css";
$logo = 'img/logo20.png';
$icon = 'img/favicon.ico';
$imagens_dir = "images/";
$imagens_dir_thumb = "images/thumbs/";
$imagens_posts = "images/posts/";
$imagens_partners = "images/partners/";
$imagens_banner = "images/banner/";
$imagens_banner_thumb = "images/banner/thumbs/";
$default_imagens_posts = 'default.png';
$default_imagens_partners = 'default.png';
error_reporting(E_ALL ^ E_DEPRECATED);
/*----------DATABASE CONECTION----------*/
// MySQL Hostname
$hostname = 'localhost';	
// MySQL Username
$username = 'id3961261_ufrntestes';	
// MySQL Password
$password = 'ufrntestes';	
// MySQL Database
$database = 'id3961261_site';
/*--------------------------------------*/	
$data = date("Y-m-d H:i:s");
include ('mysql.class.php');
$query = new MySQL($database, $username, $password, $hostname);
//$query = mysqli_connect($hostname, $username, $password, $database);
function result(array $result, $field){
$counter = count($result);
for ($i=0;$i<$counter;$i++){
$printed[$i] = $result[$i][$field];
}
return $printed;
}
//USER LOGIN
if(!isset($no_need_login) || !$no_need_login){ 
//session_start();
if (!isset($_SESSION['usuario_logado'])){
//header("Location:login.php?msg=13");
echo '<script> location.replace("login.php?msg=13"); </script>';
}
}
//CALL THE BOX FROM TEMPLATE
function call_box($box_title, $box_icon=''){
include ('window.php');
};
/*--------------FORMS MANIPULATION-------------*/
include ('forms.class.php');
	function datahora($string){
		$ano = substr($string, 0, 4);
		$mes = substr($string, 5, 2);
		$dia = substr($string, 8, 2);
		$hora = substr($string,11,8);
		$datasbr = $dia . "/" . $mes . "/" . $ano. ' &agrave;s '. $hora;
		return $datasbr;
	}
	function data($string){
		$ano = substr($string, 0, 4);
		$mes = substr($string, 5, 2);
		$dia = substr($string, 8, 2);
		$datasbr = $dia . "/" . $mes . "/" . $ano;
		return $datasbr;
	}
	function dataen($string){
		$dia = substr($string, 0, 2);
		$mes = substr($string, 3, 2);
		$ano = substr($string, 5, 4);
		$datasen = $ano . "-" . $mes . "-" . $ano;
		return $datasen;
	}
	function mes($string){
		$mes = substr($string, 5, 2);
		switch ($mes) {
		case '01':$mes = 'Janeiro';break;
		case '02':$mes = 'Fevereiro';break;
		case '03':$mes = 'Março';break;
		case '04':$mes = 'Abril';break;
		case '05':$mes = 'Maio';break;
		case '06':$mes = 'Junho';break;
		case '07':$mes = 'Julho';break;
		case '08':$mes = 'Agosto';break;
		case '09':$mes = 'Setembro';break;
		case '10':$mes = 'Outubro';break;
		case '11':$mes = 'Novembro';break;
		case '12':$mes = 'Dezembro';break;
		}
		return $mes;
	}
	function dia($string){
		$dia = substr($string, 8, 2);
		return $dia;
	}
	function ano($string){
		$ano = substr($string, 0, 4);
		return $ano;
	}
	function telefone($string){
		$ddd = substr($string, 0, 2);
		$p1 = substr($string, 2, 4);
		$p2 = substr($string, 6, 4);
		$datasbr = "(".$ddd.") ".$p1."-".$p2;
		return $datasbr;
	}
	function rg($string){
		$p1 = substr($string, 0, 3);
		$p2 = substr($string, 3, 3);
		$p3 = substr($string, 6, 3);
		$datasbr = $p1.".".$p2.".".$p3;
		return $datasbr;
	}
	function cpf($string){
		$p1 = substr($string, 0, 3);
		$p2 = substr($string, 3, 3);
		$p3 = substr($string, 6, 3);
		$p4 = substr($string, 9, 2);
		$datasbr = $p1.".".$p2.".".$p3."-".$p4;
		return $datasbr;
	}
	function cep($string){
		$p1 = substr($string, 0, 5);
		$p2 = substr($string, 5, 3);
		$datasbr = $p1."-".$p2;
		return $datasbr;
	}
	function tratar_upload($string){
   // pegando a extensao do arquivo
   $partes 		= explode(".", $string);
   $extensao 		= $partes[count($partes)-1];	
   // somente o nome do arquivo
   $nome			= preg_replace('/\.[^.]*$/', '', $string);	
   // removendo simbolos, acentos etc
   $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿRr?';
   $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
   $nome = strtr($nome, utf8_decode($a), $b);
   $nome = str_replace(".","-",$nome);
   $nome = preg_replace( "/[^0-9a-zA-Z\.]+/",'-',$nome);
   return utf8_decode(strtolower($nome.".".$extensao));
} 
	function status($data){
	if ($data==1){
	$data = "<span style=\"color:green;font-weight:bold;\">ATIVO</span>";
	}
	else {
	$data = "<span style=\"color:red;font-weight:bold;\">INATIVO</span>";
	}
	return $data;
	}
/*--------------FILES MANIPULATION-------------*/	

function gera_imagem($field, $path){
$filename_default = $_FILES[$field]['name'];
if($filename_default!=''){
$filename_temp = $_FILES[$field]['tmp_name'];
$name = tratar_upload(utf8_decode($filename_default));
$raiz = getcwd();
$arquivo_de_destino = $raiz . $path . $filename_default;
move_uploaded_file($filename_temp, $arquivo_de_destino);
}
else {$name = '';}
return $name;
}

function gera_miniatura($field, $path, $width, $height, $mode='fill'){
$filename_default   = $_FILES[$field]['name'];
if($filename_default!=''){
$filename_temp = $_FILES[$field]['tmp_name'];
$name = tratar_upload(utf8_decode($filename_default));
$raiz = getcwd();
$arquivo_de_destino = $raiz . $path . $name;
move_uploaded_file($filename_temp, $arquivo_de_destino);
$imageresize = wiImage::load($arquivo_de_destino);
$imageresize = $imageresize->resize($width, $height, $mode);
$imageresize->saveToFile($arquivo_de_destino);
}
else {$name = '';}
return $name;
}
function gera_imagem_miniatura($field, $path1, $path2, $width, $height, $mode='fill'){
$filename_default   = $_FILES[$field]['name'];
if($filename_default!=''){
$filename_temp = $_FILES[$field]['tmp_name'];
$name = tratar_upload(utf8_decode($filename_default));
$raiz = getcwd();
$arquivo_de_destino = $raiz . $path1 . $name;
$arquivo_de_destino2 = $raiz . $path2 . $name;
move_uploaded_file($filename_temp, $arquivo_de_destino);
$imageresize = wiImage::load($arquivo_de_destino);
$imageresize = $imageresize->resize($width, $height, $mode);
$imageresize->saveToFile($arquivo_de_destino2);
}
else {$name = '';}
return $name;
}
function gera_imagem_miniatura_double($field, $path1, $path2, $width1, $height1, $width2, $height2, $mode='fill'){
$filename_default   = $_FILES[$field]['name'];
if($filename_default!=''){
$filename_temp = $_FILES[$field]['tmp_name'];
$name = tratar_upload(utf8_decode($filename_default));
$raiz = getcwd();
$arquivo_de_destino = $raiz . $path1 . $name;
$arquivo_de_destino2 = $raiz . $path2 . $name;
move_uploaded_file($filename_temp, $arquivo_de_destino);
$imageresize1 = wiImage::load($arquivo_de_destino);
$imageresize1 = $imageresize1->resize($width1, $height1, $mode);
$imageresize1->saveToFile($arquivo_de_destino2);
$imageresize2 = wiImage::load($arquivo_de_destino);
$imageresize2 = $imageresize2->resize($width2, $height2, $mode);
$imageresize2->saveToFile($arquivo_de_destino);
}
else {$name = '';}
return $name;
}
function gera_imagens_miniaturas($field, $path1, $path2, $width, $height, $mode='fill'){
$uploads = count($_FILES[$field]['name']);
for ($i=0;$i<$uploads;$i++){
$filename_default = $_FILES[$field]['name'][$i];
$filename_temp = $_FILES[$field]['tmp_name'][$i];
$raiz = getcwd();
$name = tratar_upload(utf8_decode($filename_default));
$arquivo_de_destino = $raiz . $path1 . $name;
$arquivo_de_destino2 = $raiz . $path2 . $name;
move_uploaded_file($filename_temp, $arquivo_de_destino);
$imageresize = wiImage::load($arquivo_de_destino);
$imageresize = $imageresize->resize($width, $height, $mode);
$imageresize->saveToFile($arquivo_de_destino2);
}
}
function contaArquivos($dir,$nivel){
  $d = dir($dir);
  $nivel = $nivel + 1;
  $files = 0;
  while (false !== ($entry = $d->read()))
  {
     if (is_dir($dir.$entry."/")){
        if (($entry!=".") && ($entry!="..")){}
     }
     else
     {
        for($i=1;$i<=$nivel;$i++)
         $files++;
     }
  }
  $d->close();
return $files;
  }
function contaImagens($pasta){
	$qtd_images = 0;	 
	 $arquivos = glob("$pasta{*.jpg,*.png,*.gif,*.bmp}", GLOB_BRACE);
	 foreach($arquivos as $img){ $qtd_images++; };
return $qtd_images;
}
function deletar($field, $path){
$file = $path.$field;
unlink($file);
}
?>