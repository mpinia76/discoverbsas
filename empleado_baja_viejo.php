<?php
//DATOS DEL USUARIO
session_start();
$user_id = $_SESSION['useridbsas'];

include_once("config/db.php");
$sql = "UPDATE empleado SET estado = 0, fecha_baja = NOW(), baja_por = $user_id WHERE id = ".$_POST['empleado_id'];
mysqli_query($conn,$sql);

