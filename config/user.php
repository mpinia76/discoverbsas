<?php
//DATOS DEL USUARIO
session_start();
$user_id = $_SESSION['useridbsas'];
global $user_id;

$sql = "SELECT usuario_permiso.usuario_id, permiso.id,permiso.permiso_grupo_id as grupo_id FROM permiso LEFT JOIN usuario_permiso ON permiso.id=usuario_permiso.permiso_id WHERE usuario_permiso.usuario_id=$user_id ORDER BY permiso_grupo_id";


$rsTemp = mysqli_query($conn,$sql);

while($rs = mysqli_fetch_array($rsTemp)){

	define("MENU_".$rs['grupo_id'],true);
	define("ACCION_".$rs['id'],true);

}

$sql = "SELECT id,permiso_grupo_id as grupo_id FROM permiso ORDER BY permiso_grupo_id";
$rsTemp = mysqli_query($conn,$sql);

if($_SESSION['adminbsas']){ $valor=true; }else{ $valor=false; }

while($rs = mysqli_fetch_array($rsTemp)){

	define("MENU_".$rs['grupo_id'],$valor);
	define("ACCION_".$rs['id'],$valor);

}
?>
