<?php
include_once("config/db.php");
include_once("functions/date.php");
include_once("functions/fechasql.php");
include_once("functions/util.php");
header("Pragma: public");
header("Expires: 0");

$filename = "facturacion_electronica_".$_POST["ano"]."_".$_POST["mes"].".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$meses = array('01'=>'ENERO', '02'=> 'FEBRERO', '03'=> 'MARZO', '04'=> 'ABRIL', '05'=> 'MAYO', '06'=> 'JUNIO', '07'=> 'JULIO', '08'=> 'AGOSTO', '09'=> 'SEPTIEMBRE', '10'=>'OCTUBRE', '11'=> 'NOVIEMBRE', '12'=>'DICIEMBRE');
?>
<table style="border-collapse: collapse;">
<tbody>

<tr>
<th colspan="15" style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">Datos del Cliente</th>
<th colspan="29" style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">Detalles del Comprobante</th>
<th style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">Cantidad De Conceptos</th>
<th colspan="9" style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">Concepto</th>
<th colspan="5" style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">Tributo</th>
</tr>


<tr>


<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">docTipo</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">docNro</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">email</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">emailAlternativo</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">tipoPersona</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">nombre</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">apellido</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">razonSocial</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">condicion</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">direccion</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">ciudad</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">provincia</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">cp</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">telefono</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">celular</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">origen</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">cbteNro</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">cbteFch</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">cae</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">caeFchVto</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">id</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">cbteTipo</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">concepto</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impTotal</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impOpEx</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impTotConc</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impNeto</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impTrib</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">baseImp3</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impIVA3</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">baseImp4</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impIVA4</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">baseImp5</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impIVA5</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">baseImp6</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impIVA6</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">fchServDesde</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">fchServHasta</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">monId</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">monCotiz</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">puntoVenta</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">condicionVta</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">remito</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">observaciones</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">cantConceptos</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">cantidad</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">unidad</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">codigo</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">detalle</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">importe</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">bonificacion</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">alicuota</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impIVA</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">impTotalConcepto</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">idTipoTributo</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">desc</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">baseImp</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">alic</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center; font-weight: bold;border: 0.1pt solid black;vertical-align: middle;">importeTributo</td>

</tr>
<?php $sql = "SELECT R.id, R.retiro, R.devolucion, R.total, C.nombre_apellido, C.cuit, C.dni, C.sexo, CA.categoria, R.estado
FROM reservas R INNER JOIN clientes C ON R.cliente_id = C.id
INNER JOIN unidads U ON R.unidad_id = U.id
INNER JOIN categorias CA ON U.categoria_id = CA.id
WHERE devolucion LIKE '".$_POST["ano"]."-".$_POST["mes"]."%' ORDER BY devolucion ASC";

$rsTemp = mysqli_query($conn,$sql);
$totalGral=0;
while($rs = mysqli_fetch_array($rsTemp)){
	if(($rs['estado']!='2')&&($rs['estado']!='3')){
		$sql = "SELECT * FROM reserva_extras WHERE reserva_id = ".$rs['id'];

		$rsTempExtras = mysqli_query($conn,$sql);
		$no_adelantadas=0;
		while($rsExtras = mysqli_fetch_array($rsTempExtras)){
			if($rsExtras['adelantada'] != 1){
	        	$no_adelantadas = $no_adelantadas + $rsExtras['cantidad'] * $rsExtras['precio'];
	        }
		}
		$sql = "SELECT * FROM reserva_cobros WHERE reserva_id = ".$rs['id'];

		$rsTempDescuentos = mysqli_query($conn,$sql);
		$descontado=0;
		while($rsDescuentos = mysqli_fetch_array($rsTempDescuentos)){
			if($rsDescuentos['tipo'] == "DESCUENTO"){

	        	$descontado += $rsDescuentos['monto_neto'];
	        }
		}
		$total =$rs['total']+ $no_adelantadas-$descontado;
		$total = trim( number_format($total, 2, '.', '') );
		/*$impuesto = $total*(1/100);
		$totalGral += $impuesto;*/
		/*$buscar = 'https://soa.afip.gob.ar/sr-padron/v2/personas/'.trim($rs['dni']);
		$respuesta = file_get_contents($buscar);

		$respuesta = json_decode($respuesta);

		if(($respuesta->success)&&(!$respuesta->data[1])){
			$cuit= $respuesta->data[0];
			$pre_cuit = substr ( $cuit , 0 , 2);
			$dni= substr ( $cuit , 2 , 8);
			$post_cuit = substr($cuit, -1);
			$cuit = $pre_cuit."-".$dni."-".$post_cuit;
		}
		else{
			$cuit=$rs['dni'];
		}*/
		/*if ($rs['sexo']) {
			$dni = str_pad($rs['dni'], 8, "0", STR_PAD_LEFT);
			$cuit=Format_toCuil( $dni, $rs['sexo']);
		}
		else{
			$cuit=$rs['dni'];
		}*/


?>
<tr>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">96</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo $rs['dni']; ?></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">administracion@villagedelaspampas.com.ar</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">1</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo utf8_decode($rs['nombre_apellido']);?></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">1</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">6</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">2</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo $total;?></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo $total;?></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo str_replace('-', '', $rs['retiro']);?></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo str_replace('-', '', $rs['devolucion']);?></td></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">PES</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">1</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">11</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">1</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">1</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">7</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">1</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">Alquiler Unidad Categoria "<?php echo utf8_decode($rs['categoria']);?>"</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo $total;?></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;">0</td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"><?php echo $total;?></td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>
<td style="font-family: Arial; font-size: 10pt; text-align:center;border: 0.1pt solid black;vertical-align: middle;"> </td>

</tr>
<?php }}?>

</tbody>
</table>
