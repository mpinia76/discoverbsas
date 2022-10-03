<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
session_start();
include_once("model/form.class.php");
include_once("config/db.php");
include_once("functions/abm.php");
include_once("functions/util.php");
if(isset($_GET['exit']) and $_GET['exit']=="on"){
	$sql = "INSERT INTO usuario_log (usuario_id,nombre,accion,ip)
			VALUES ('".$_SESSION['useridbsas']."','".$_SESSION['usernombrebsas']."','logout','".getRealIP()."')";
	mysqli_query($conn,$sql);
    session_destroy();
    setcookie("useridbsas","",time()-3600);
     header('Location: http://localhost:8080/discovergral');
}else if($_SESSION['useridbsas'] != ''){
    header('Location: desktop.php');
}else header('Location: http://localhost:8080/discovergral');


if(isset($_POST['ingresar'])){
	$user = $_POST['email'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM usuario WHERE email = '$user' AND password='$pass'";

	$rsTemp = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($rsTemp);

	if($total == 1){
		$rs = mysqli_fetch_array($rsTemp);
		$_SESSION['useridbsas'] = $rs['id'];
		$_SESSION['userdnibsas'] = $rs['dni'];
		$_SESSION['usernombrebsas'] = $rs['nombre']." ".$rs['apellido'];
        setcookie('useridbsas',$rs['id'],time()+60*60*24,'/');
       $sql = "INSERT INTO usuario_log (usuario_id,nombre,accion,ip)
			VALUES ('".$_SESSION['useridbsas']."','".$_SESSION['usernombrebsas']."','login','".getRealIP()."')";
	mysqli_query($conn,$sql);
		if($rs['admin'] == 1){ $_SESSION['adminbsas'] = true; }
		header("Location: desktop.php#");
	}else{
		header('Location: http://localhost:8080/discovergral/index.php?result=2');
	}
}
$campos['email'] 	= array('text','E-mail',1);
$campos['password'] = array('text','Password',0,'','','password');

$form = new Form();
$form->setLegend('Ingresar al sistema'); //nombre del form
$form->setAction('index.php'); //a donde hacer el post
$form->setBotonValue('Ingresar'); //leyenda del boton
$form->setBotonName('ingresar');
$form->setCampos($campos);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Discover Online!</title>
<link href="styles/form.css" rel="stylesheet" type="text/css" />
<?=$form->printJS()?>
<style>
body{
margin:0;
}
</style>
</head>

<body>
<div id="wrapper" style="width:250px; margin-left:auto; margin-right:auto; margin-top:150px;">
<img src="images/logo.png" /><br /><br />
<? if(isset($result) and $result == 2){ ?>
	<div id="mensaje" class="ok"><p><img src="images/error.gif" align="absmiddle" /> Datos incorrectos</p></div>
<? } ?>
<?=$form->printHTML()?>
</div>

</body>
</html>
