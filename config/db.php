<?php
//DATOS PARA LA BASE DE DATOS MYSQL


/*$dbhost = "163.10.35.37";
$dbname = "discoverbsas";
$dbuser = "root";
$dbpassword = "secyt";*/

$dbhost = "localhost";
$dbname = "discoverbsas";
$dbuser = "root";
$dbpassword = "";

//CONEXION A LA BASE DE DATOS

/*$conn=mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbname);*/

$conn=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

//CONSULTAS COMUNES
function sql_meses($tabla,$ano,$campo = 'fecha'){
	return "
	ROUND(SUM(IF(MONTH($tabla.$campo)=1 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '1',
	ROUND(SUM(IF(MONTH($tabla.$campo)=2 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '2',
	ROUND(SUM(IF(MONTH($tabla.$campo)=3 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '3',
	ROUND(SUM(IF(MONTH($tabla.$campo)=4 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '4',
	ROUND(SUM(IF(MONTH($tabla.$campo)=5 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '5',
	ROUND(SUM(IF(MONTH($tabla.$campo)=6 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '6',
	ROUND(SUM(IF(MONTH($tabla.$campo)=7 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '7',
	ROUND(SUM(IF(MONTH($tabla.$campo)=8 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '8',
	ROUND(SUM(IF(MONTH($tabla.$campo)=9 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '9',
	ROUND(SUM(IF(MONTH($tabla.$campo)=10 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '10',
	ROUND(SUM(IF(MONTH($tabla.$campo)=11 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '11',
	ROUND(SUM(IF(MONTH($tabla.$campo)=12 AND YEAR($tabla.$campo)=$ano,$tabla.monto,0)),2) as '12'";
}

?>
