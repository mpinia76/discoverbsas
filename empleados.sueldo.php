<?php
session_start();
$user_id = $_SESSION['useridbsas'];
if($user_id == '') { header("Location: index.php"); }

include_once("functions/form.class.php");
include_once("functions/fechasql.php");
include_once("functions/date.php");
include_once("config/db.php");
include_once("functions/abm.php");

//indicar tabla a editar
$tabla = 'empleado_sueldo';

if(isset($_POST['agregar'])){

	$sql = "SELECT sueldo_id FROM $tabla ORDER BY sueldo_id DESC LIMIT 0,1";
	$rs = mysqli_fetch_array(mysqli_query($conn,$sql));
	$sueldo_id = $rs['sueldo_id'] + 1;

	for($i=0; $i<=11; $i++){
		$mes = $i + 1;
		$sql = "INSERT INTO $tabla (
					creado,
					empleado_id,
					sueldo_id,
					ano,
					mes,
					sueldo,
					viaticos,
					asignaciones,
					presentismo,
					aguinaldo,
					creado_por)
				VALUES (
					NOW(),
					'".$_POST['empleado_id']."',
					'".$sueldo_id."',
					'".$_POST['ano']."',
					'".$mes."',
					'".$_POST['sueldo'][$i]."',
					'".$_POST['viaticos'][$i]."',
					'".$_POST['asignaciones'][$i]."',
					'".$_POST['presentismo'][$i]."',
					'".$_POST['aguinaldo'][$i]."',
					$user_id) ";
		mysqli_query($conn,$sql);

	}

	$result = 1;

	$sql = "INSERT INTO empleado_sueldo_0001 (
				empleado_id,
				categoria,
				calificacion,
				seccion,
				sueldo,
				sueldo_id)
			VALUES (
				".$_POST['empleado_id'].",
				'".$_POST['categoria']."',
				'".$_POST['calificacion']."',
				'".$_POST['seccion']."',
				'".$_POST['sueldo_aprox']."',
				'".$sueldo_id."')";
	mysqli_query($conn,$sql);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script type="text/javascript" src="library/jquery/jquery-1.4.2.min.js"></script>

<!--JQuery Uploadify-->
<script type="text/javascript" src="library/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
<script type="text/javascript" src="library/uploadify/swfobject.js"></script>
<link href="library/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<!--/JQuery Uploadify-->

<!--JQuery editor-->
<script type="text/javascript" src="library/jwysiwyg/jquery.wysiwyg.js"></script>
<link rel="stylesheet" href="library/jwysiwyg/jquery.wysiwyg.css" type="text/css" />
<!--/JQuery editor-->

<!--JQuery Date Picker-->
<script type="text/javascript" src="library/datepicker/date.js"></script>
<!--[if IE]><script type="text/javascript" src="library/datepicker/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="library/datepicker/jquery.datePicker.min-2.1.2.js"></script>
<link href="library/datepicker/datePicker.css" rel="stylesheet" type="text/css" />
<style>
a.dp-choose-date {
	float: left;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 3px 0;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(images/calendar.png) no-repeat;
}
a.dp-choose-date.dp-disabled {
	background-position: 0 -20px;
	cursor: default;
}
/* makes the input field shorter once the date picker code
 * has run (to allow space for the calendar icon
 */
input.dp-applied {
	width: 140px;
	float: left;
}
</style>
<!--/JQuery Date Picker-->
<script>

$(function(){

	$('.fecha').datePicker();

});

</script>

<script language="javascript" type="text/javascript">

function vacio(q) {

	//funcion que chequea que los campos no sean espacios en blanco

	for ( i = 0; i < q.length; i++ ) {

			if ( q.charAt(i) != " " ) {

					return true

			}

	}

	return false

}
function valida(F) {

	if(vacio(F.horas_0001.value) == false) {

	alert("Complete la cantidad de horas 0001")

	F.horas_0001.focus();

	return false

	}

	if(vacio(F.horas_0002.value) == false) {

	alert("Complete la cantidad de horas 0002")

	F.horas_0002.focus();

	return false

	}

	if(vacio(F.duracion_jornada.value) == false) {

	alert("Complete la duracion de la jornada")

	F.duracion_jornada.focus();

	return false

	}

	if(F.espacio_trabajo.value == 'null' ) {

	alert("Seleccione el espacio de trabajo")

	F.espacio_trabajo.focus();

	return false

	}

	if(vacio(F.porcentaje_sector_1.value) == false) {

	alert("Complete el porcentaje de sector 1 con un numero de 0 a 100")

	F.porcentaje_sector_1.focus();

	return false

	}

	if(F.porcentaje_sector_1.value > 0 && F.sector_1_id.value == 'null' ) {

	alert("Debe seleccionar un sector 1 de trabajo")

	F.sector_1_id.focus();

	return false

	}

	if(F.porcentaje_sector_2.value > 0 && F.sector_2_id.value == 'null' ) {

	alert("Debe seleccionar un sector 2 de trabajo")

	F.sector_2_id.focus();

	return false

	}
}
function sumMes(i){
	var sum = 0;
	$(".mes_"+i).each(function() {
		sum += parseFloat(this.value);
	});
	$("#mes_"+i).html(sum);
}
</script>

<style>
	body{
		font-family:Arial, Helvetica, sans-serif;
		font-size:12px;
	}
</style>

<link href="styles/form2.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php  include_once("config/messages.php"); ?>

<?php  if(isset($_POST['agregar'])){ ?>
	<script>
	var dhxWins = parent.dhxWins;
	dhxWins.window('w_empleado_view').attachURL('empleados.ficha.php?empleado_id=<?php echo $_POST['empleado_id']?>');
	dhxWins.window('w_emplado_add_salario').close();
	</script>
<?php  } ?>
<div class="container">

	<form method="POST" name="form" action="empleados.sueldo.php" onSubmit="return valida(this);">
	<input type="hidden" name="empleado_id" value="<?php echo $_GET['empleado_id']?>" />
	<input type="hidden" name="creado_por" value="<?php echo $user_id?>" />

	<?php  $ano = $_GET['ano']; ?>
    <?php
	$sql = "SELECT * FROM empleado_sueldo WHERE empleado_id = ".$_GET['empleado_id']." AND ano = $ano ORDER BY sueldo_id DESC LIMIT 0,12";
	$rsTemp = mysqli_query($conn,$sql);
	if($rsTemp){
		while($rs = mysqli_fetch_array($rsTemp)){
			$asignado[$rs['ano']."_".$rs['mes']]['sueldo'] = $rs['sueldo'];
			$asignado[$rs['ano']."_".$rs['mes']]['viaticos'] = $rs['viaticos'];
			$asignado[$rs['ano']."_".$rs['mes']]['asignaciones'] = $rs['asignaciones'];
			$asignado[$rs['ano']."_".$rs['mes']]['presentismo'] = $rs['presentismo'];
			$asignado[$rs['ano']."_".$rs['mes']]['aguinaldo'] = $rs['aguinaldo'];
			$sueldo_id = $rs['sueldo_id'];
		}
	}

	$sql = "SELECT * FROM empleado_pago WHERE empleado_id = ".$_GET['empleado_id']." AND ano = $ano";
	$rsTemp = mysqli_query($conn,$sql);
	if($rsTemp){
		while($rs = mysqli_fetch_array($rsTemp)){
			$pagado[$rs['ano']."_".$rs['mes']] = true;
		}
	}
	?>
    <p><strong>A&ntilde;o:</strong>
		<select size="1" id="ano" name="ano" onchange="document.location.href = 'empleados.sueldo.php?ano='+$('#ano').val()+'&empleado_id=<?php echo $_GET['empleado_id']?>'">
			<option <?php  if($ano == '2011'){ ?> selected="selected" <?php  } ?> value="2011">2011</option>
			<option <?php  if($ano == '2012'){ ?> selected="selected" <?php  } ?> value="2012">2012</option>
			<option <?php  if($ano == '2013'){ ?> selected="selected" <?php  } ?> value="2013">2013</option>
			<option <?php  if($ano == '2014'){ ?> selected="selected" <?php  } ?> value="2014">2014</option>
			<option <?php  if($ano == '2015'){ ?> selected="selected" <?php  } ?> value="2015">2015</option>
            <option <?php  if($ano == '2016'){ ?> selected="selected" <?php  } ?> value="2016">2016</option>
            <option <?php  if($ano == '2017'){ ?> selected="selected" <?php  } ?> value="2017">2017</option>
            <option <?php  if($ano == '2018'){ ?> selected="selected" <?php  } ?> value="2018">2018</option>
            <option <?php  if($ano == '2019'){ ?> selected="selected" <?php  } ?> value="2019">2019</option>
            <option <?php  if($ano == '2020'){ ?> selected="selected" <?php  } ?> value="2020">2020</option>
            <option <?php  if($ano == '2021'){ ?> selected="selected" <?php  } ?> value="2021">2021</option>
            <option <?php  if($ano == '2022'){ ?> selected="selected" <?php  } ?> value="2022">2022</option>
            <option <?php  if($ano == '2023'){ ?> selected="selected" <?php  } ?> value="2023">2023</option>
            <option <?php  if($ano == '2024'){ ?> selected="selected" <?php  } ?> value="2024">2024</option>
		</select>
	</p>
    <?php
	$sql = "SELECT * FROM empleado_sueldo_0001 WHERE sueldo_id = $sueldo_id";
	$rs = mysqli_fetch_array(mysqli_query($conn,$sql));
	?>
	<p><strong>Categoria del trabajador:</strong> <input type="text" name="categoria" size="20" value="<?php echo $rs['categoria']?>" /></p>
	<p><strong>Calificaci&oacute;n:</strong> <input type="text" name="calificacion" size="20" value="<?php echo $rs['calificacion']?>" /></p>
	<p><strong>Secci&oacute;n:</strong> <input type="text" name="seccion" size="20" value="<?php echo $rs['seccion']?>" /></p>
	<p><strong>Sueldo de bolsillo estimado:</strong> <input type="text" name="sueldo_aprox" value="<?php echo $rs['sueldo']?>" size="20" /></p>
	<table cellpadding="0" cellspacing="0">
    	<tr style="font-weight:bold;">
        	<td width="100">Mes</td>
            <td width="100">Salario</td>
            <td width="100">Viaticos</td>
            <td width="100">Asignaciones</td>
            <td width="100">Presentismo</td>
            <td width="100">Aguinaldo</td>
            <td width="100">Total</td>
		</tr>

	<?php  for($i=1; $i<=12; $i++){ ?>

    	<tr>
        	<td><?php echo mes($i)?></td>

            <?php  //if($pagado[$ano."_".$i] or $ano < date('Y') or ($ano == date('Y') and $i < (date('m')-1) ) ){ ?>
            <?php  if($pagado[$ano."_".$i]){ ?>
            	<td><?php echo $asignado[$ano."_".$i]['sueldo']?> <input type="hidden" name="sueldo[]" value="<?php echo $asignado[$ano."_".$i]['sueldo']?>" /></td>
                <td><?php echo $asignado[$ano."_".$i]['viaticos']?> <input type="hidden" name="viaticos[]" value="<?php echo $asignado[$ano."_".$i]['viaticos']?>" /></td>
                <td><?php echo $asignado[$ano."_".$i]['asignaciones']?> <input type="hidden" name="asignaciones[]" value="<?php echo $asignado[$ano."_".$i]['asignaciones']?>" /></td>
                <td><?php echo $asignado[$ano."_".$i]['presentismo']?> <input type="hidden" name="presentismo[]" value="<?php echo $asignado[$ano."_".$i]['presentismo']?>" /></td>
                <td><?php echo $asignado[$ano."_".$i]['aguinaldo']?> <input type="hidden" name="aguinaldo[]" value="<?php echo $asignado[$ano."_".$i]['aguinaldo']?>" /></td>
                <td><?php echo $asignado[$ano."_".$i]['sueldo']+$asignado[$ano."_".$i]['viaticos']+$asignado[$ano."_".$i]['asignaciones']+$asignado[$ano."_".$i]['presentismo']+$asignado[$ano."_".$i]['aguinaldo']?></td>
            <?php  }else{ ?>
            <td>
            <?php  $asignado[$ano."_".$i]['sueldo'] != '' ? $value = $asignado[$ano."_".$i]['sueldo'] : $value = 0; ?>
            <input type="text" name="sueldo[]" value="<?php echo $value?>" size="5" onblur="sumMes('<?php echo $i?>');" class="mes_<?php echo $i?>" />
            </td>
            <td>
            <?php  $asignado[$ano."_".$i]['viaticos'] != '' ? $value = $asignado[$ano."_".$i]['viaticos'] : $value = 0; ?>
            <input type="text" name="viaticos[]" value="<?php echo $value?>" size="5" onblur="sumMes('<?php echo $i?>');" class="mes_<?php echo $i?>" />
            </td>
            <td>
            <?php  $asignado[$ano."_".$i]['asignaciones'] != '' ? $value = $asignado[$ano."_".$i]['asignaciones'] : $value = 0; ?>
            <input type="text" name="asignaciones[]" value="<?php echo $value?>" size="5" onblur="sumMes('<?php echo $i?>');" class="mes_<?php echo $i?>" />
            </td>
            <td>
            <?php  $asignado[$ano."_".$i]['presentismo'] != '' ? $value = $asignado[$ano."_".$i]['presentismo'] : $value = 0; ?>
            <input type="text" name="presentismo[]" value="<?php echo $value?>" size="5" onblur="sumMes('<?php echo $i?>');" class="mes_<?php echo $i?>" />
            </td>
			<td>
            <?php  $asignado[$ano."_".$i]['aguinaldo'] != '' ? $value = $asignado[$ano."_".$i]['aguinaldo'] : $value = 0; ?>
            <input type="text" name="aguinaldo[]" value="<?php echo $value?>" size="5" onblur="sumMes('<?php echo $i?>');" class="mes_<?php echo $i?>" />
            </td>
			<td id="mes_<?php echo $i?>"></td>
            <?php  } ?>
        </tr>
        <script>
		sumMes('<?php echo $i?>');
		</script>

    <?php  } ?>

    </table>

</div>
<p align="center"><input type="submit" value="Guardar" name="agregar" /></p>
</form>

</div>


</body>
</html>
