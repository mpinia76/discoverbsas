<?php
session_start();
function fechasql($fecha){
	$part=explode("/",$fecha);
	$mysql=$part[2]."-".$part[1]."-".$part[0];
	return $mysql;
}
function fechavista($fecha){
	$part=explode("-",$fecha);
	$mysql=$part[2]."/".$part[1]."/".$part[0];
	return $mysql;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script type="text/javascript" src="library/jquery/jquery-1.4.2.min.js"></script>
<!--JQuery Date Picker-->
<script type="text/javascript" src="library/datepicker/date.js"></script>
<!--[if IE]><script type="text/javascript" src="library/datepicker/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="library/datepicker/jquery.datePicker.min-2.1.2.js"></script>
<link href="library/datepicker/datePicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8">
var dhxWins = parent.dhxWins;

var position = dhxWins.window('w_informe_satisfaccion').getPosition(); //id de la ventana

var xpos = position[0];
var ypos = position[1];
$(function()
{
	$('.date-pick').datePicker({startDate:'01/01/2018'})
	$('#start-date').bind(
		'dpClosed',
		function(e, selectedDates)
		{
			var d = selectedDates[0];
			if (d) {
				d = new Date(d);
				$('#end-date').dpSetStartDate(d.addDays(1).asString());
			}
		}
	);
	$('#end-date').bind(
		'dpClosed',
		function(e, selectedDates)
		{
			var d = selectedDates[0];
			if (d) {
				d = new Date(d);
				$('#start-date').dpSetEndDate(d.addDays(-1).asString());
			}
		}
	);
});
function enviar(id){

		if(confirm('¿Seguro desea enviar la encuesta?')){
			createWindow('w_enviar_encuesta','Enviar encuesta','cron-encuesta.php?id='+id,'300','200'); //botones
			setTimeout('dhxWins.window("w_enviar_encuesta").close()', 2000);

		}

}
function modificar(id){


	createWindow('w_modificar_encuesta','Modificar encuesta','modificar_encuesta.php?id='+id,'900','700'); //botones


}
function mostrarGraficos(){

	$('#graficos').show();
	$('#noGraficos').hide();

}
function noMostrarGraficos(){

	$('#graficos').hide();
	$('#noGraficos').show();

}
</script>
<script src="js/createWindow.js"></script>
<style type="text/css">
a.dp-choose-date {
	float: left;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 3px 0;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(http://www.villagedelaspampas.com.ar/scripts/calendar.png) no-repeat;
}
a.dp-choose-date.dp-disabled {
	background-position: 0 -20px;
	cursor: default;
}
input.dp-applied {
	width: 70px;
	float: left;
}
.titulo_secundario {
	font-family: Arial, Helvetica, sans-serif;
	font-size:small;
}
#titulo_pregunta{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:bold;
	border-bottom:#CCCCCC solid 1px;
	padding:3px;
	margin-top:10px;
}
#respuestas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	text-align:center;
	padding:5px;
}
#tabla{
	float:left;
	width:160px;
	height:120px;
	padding:5px;
	text-align:center;
	font-size:10px;
}
</style>
<link rel="STYLESHEET" type="text/css" href="styles/toolbar.css">
<!--/JQuery Date Picker-->
<script>
function findUnidades (){
	$.ajax({
		beforeSend: function(){
			$('#loading').show();
		},
		data: { 'categoria' : $('#categoria').val() },
		url: 'unidades.get.php',
		success: function(data) {
			$('#loading').hide();
			$('#spanUnidades').html(data);
		}
	});

}


</script>
</head>

<body>
<ul id="menu">

	<li onclick="mostrarGraficos()" class="item"><img src="images/if_Cake_206472.png" align="absmiddle" />¿Que piensan nuestros clientes?</li>
	<li onclick="noMostrarGraficos()" class="item"><img src="images/ico_users.png" align="absmiddle" />¿Vamos a consultarles?</li>
	<?php
	include("preguntas.inc.php");
	include_once("config/db.php");
	include_once("functions/util.php");
		$sql = "INSERT INTO usuario_log (usuario_id,nombre,accion,ip)
					VALUES ('".$_SESSION['useridbsas']."','".$_SESSION['usernombrebsas']."','Informes de satisfaccion','".getRealIP()."')";
		mysqli_query($conn,$sql);
	include_once("config/user.php");
	//$conn = mysqli_connect($host, $db_user, $db_pass, $db);
	//mysql_select_db($db);
	?>
</ul>
<?php
$displayGraficos = (isset($_POST['buscar'])||isset($_POST['todos']))?'block':'none';
$displayNoGraficos = (isset($_POST['ver']))?'block':'none';
if (($displayGraficos=='none')&&($displayNoGraficos=='none')) {
	$displayGraficos='block';
	$_POST['todos']=1;
}
?>
<div id="graficos" style="display:<?php echo $displayGraficos;?>">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
<input name="verGraficos" type="hidden" value="1"/>


<table cellpadding="0" cellspacing="0" border="0">
<tr>
	<td align="center"><div class="titulo_secundario" style="float:left; margin-top:3px;">Desde</div></td><td align="center"><div class="titulo_secundario" style="float:left; margin-top:3px;"> hasta </div></td><td align="center"><div class="titulo_secundario" style="float:left; margin-top:3px;"> E-mail </div></td><td align="center"><div class="titulo_secundario" style="float:left; margin-top:3px;">Categor&iacute;as</div></td><td align="center"><div class="titulo_secundario" style="float:left; margin-top:3px;">Unidades</div></td><td></td>
</tr>
<tr>
	<td><input name="checkin" size="5" id="start-date" class="date-pick" value="<?php echo $_POST['checkin']?>" /></td><td><input name="checkout" size="5" id="end-date" class="date-pick" value="<?php echo $_POST['checkout']?>" /> </td><td><input name="email"  id="email" style="float:left" value="<?php echo $_POST['email']?>" /> </td><td><select style="float:left" id="categoria" name="categoria" onChange="findUnidades();">
    <option value="Seleccionar..." selected="selected">Seleccionar...</option>

	<?php


	$sql = "SELECT id,categoria FROM categorias WHERE activa = 1 ORDER BY categoria ASC";
	$rsTemp = mysqli_query($conn,$sql);

	while($rs = mysqli_fetch_array($rsTemp)){

	?>

	<option value="<?php echo $rs['id']?>" <?php if($_POST['categoria'] == $rs['id']){?> selected="selected" <?php } ?>><?php echo $rs['categoria']?> </option>

	<?php } ?>
</select> </td><td><span id="spanUnidades">
<?php
$sql = "SELECT * FROM unidads WHERE categoria_id=".$_POST['categoria']." AND estado = 1 AND activa = 1 AND excluir = 0";

$rsTemp = mysqli_query($conn,$sql);
//echo $sql;
?>
<select name="UnidadId[]" multiple="multiple" style="float:left;height:40px; width:200px; margin:2px 0px" id="UnidadId">
	<?php
	while($rs = mysqli_fetch_array($rsTemp)){

	?>

	<option value="<?php echo $rs['id']?>" <?php if(($_POST['UnidadId'])&&(in_array($rs['id'], $_POST['UnidadId']))){?> selected="selected" <?php } ?>><?php echo $rs['marca'].' '.$rs['modelo'].' '.$rs['patente']?> </option>

	<?php } ?>

</select>



</span></td>
<td>
<div class="titulo_secundario" style="float:left; margin-top:3px;">
<input type="submit" name="buscar" value="Buscar" /> <input type="submit" name="todos" value="Todas las encuestas" />
</div></td>
</tr>
</table>


<div style="clear:both;"></div>
</form>

<?php
//print_r($_POST);
if(isset($_POST['buscar']) and (($_POST['checkin']!="" and $_POST['checkout']!="")or($_POST['email']!="")or($_POST['categoria']!=""))){
	$condicionEmail = ($_POST['email']!="")?" AND clientes.email LIKE '%".$_POST['email']."%'":"";
	$condicionFechas = (($_POST['checkin']!="" and $_POST['checkout']!=""))?" AND reservas.devolucion>='".fechasql($_POST['checkin'])."' AND reservas.devolucion<='".fechasql($_POST['checkout'])."'":"";

	if ($_POST['UnidadId']) {
    		$arrayUnidad = implode(",", $_POST['UnidadId']);

        	$condicionUnidad = " AND unidads.id IN (".$arrayUnidad.")";
        }
        elseif ($_POST['categoria']!='Seleccionar...'){
        	$condicionUnidad = " AND unidads.categoria_id = '".$_POST['categoria']."'";
        }

	$sql = "SELECT encuesta_respuestas.*,encuesta.id, clientes.email
	FROM encuesta INNER JOIN encuesta_respuestas ON encuesta.id=encuesta_respuestas.encuesta_id
	INNER JOIN reservas ON reservas.id=encuesta.reserva_id
	INNER JOIN unidads ON reservas.unidad_id=unidads.id
	INNER JOIN clientes ON reservas.cliente_id=clientes.id
	WHERE 1=1
			".$condicionFechas.$condicionEmail.$condicionUnidad;
	//echo $sql;
}elseif(isset($_POST['todos'])){
	$sql = "SELECT encuesta_respuestas.*,encuesta.id
	FROM encuesta INNER JOIN encuesta_respuestas ON encuesta.id=encuesta_respuestas.encuesta_id";
	$sql1 = "SELECT reservas.*,clientes.nombre_apellido
	FROM reservas INNER JOIN clientes ON clientes.id=reservas.cliente_id
	WHERE (reservas.estado != 2 AND reservas.estado != 3) OR reservas.estado is null";

}
if(isset($_POST)){
	if ($sql) {
	$rsTemp = mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)>0){
		while($rs = mysqli_fetch_array($rsTemp)){
			$encuestas[$rs['id']]=1;
			if(!isset($respuestas[$rs['pregunta_id']][$rs['valor']])){
				$respuestas[$rs['pregunta_id']][$rs['valor']] = 1;
			}else{
				$respuestas[$rs['pregunta_id']][$rs['valor']]++;
			}
		}
		/*foreach($respuestas as $preg=>$resp){
			foreach($resp as $valor=>$cant){
				if($preg=="7a" or $preg=="7b" or $preg=="7c" or $preg=="7d" or $preg=="7e" or $preg=="7f" or $preg=="7g" or $preg=="7h" or $preg=="7i" or $preg=="7j"){
					$servicios[$valor]=$servicios[$valor] + 1;
				}elseif($preg=="7k" or $preg=="7l"){
					$limpieza[$valor]=$limpieza[$valor] + 1;
				}elseif($preg=="7m" or $preg=="7n" or $preg=="7o" or $preg=="7p" or $preg=="7q"){
					$restaurante[$valor]=$restaurante[$valor] + 1;
				}
			}
		}*/
		?>
		<br>
		<div style="text-align:center; font-family: Arial, Helvetica, sans-serif;font-size: 25px;font-weight: bold;">Puntaje <span id="puntaje" style="border: 1px solid #1E679A; width: 100px; height:100px;"></span></div>
		<?php
		//$preguntasContestadas++;
		$sumaPromedios =0;
		$promedios=array();
		foreach($respuestas as $preg=>$resp){
			$etiquetas=array();
			$valores=array();
			$colores=array();

			$total = array_sum($resp);
			//print_r($resp);
			//if($preg!=7){
?>
				<div id="titulo_pregunta">
				<?php echo utf8_encode($pregunta[$preg])?>
				</div>
				<div id="respuestas">
<?php
				foreach($resp as $valor=>$cant){ //genero los valores para los graficos
					//echo $valor."=>".$cant."<br>";
					//if($preg!=7){
						//echo $preg.'-'.$respuesta[$preg][$valor].'-'.$valor;
						$etiquetas[]=$respuesta[$preg][$valor];
						switch ($respuesta[$preg][$valor]) {
							case "Familia":
							 	$color="071dfc";
							break;
							case "Pareja":
							 	$color="c407fc";
							break;
							case "Solo":
							 	$color="07d7fc";
							break;
							case "SI":
							 	$color="136204";
							break;
							case "NO":
							 	$color="ec0617";
							break;
							case 1:
							 	$color="ec0617";
							break;
							case 2:
							 	$color="faab52";
							break;
							case 3:
							 	$color="fafa04";
							break;
							case 4:
							 	$color="2dfa04";
							break;
							case 5:
							 	$color="136204";
							break;
						}
						$colores[]=$color;
					/*}else{
						$etiquetas[]=$valor;
					}*/

					$valores[]=round($cant/$total*100,2);
					//echo $promedios[$preg]."/".$valor."<br>";
					$promedios[$preg] +=$cant*$valor;
				}
				/*print_r($etiquetas);
				print_r($valores);*/
				//print_r($promedios);
				if(($preg!=1)&&($preg!=10)){
					$preguntasContestadas++;
					$sumaPromedios +=$promedios[$preg]/$total;
					//echo $promedios[$preg]."/".count($encuestas)."/".$total;
					?>
					<div style="text-align:left; font-family: Arial, Helvetica, sans-serif;font-size: 15px;font-weight: bold;">Punt. <span id="puntaje<?php echo $preg;?>" style="border: 1px solid #1E679A; width: 100px; height:100px;"><?php echo round($promedios[$preg]/$total,2)?></span></div>
					<?php
				}
?>

				<img src="
				http://chart.apis.google.com/chart?
				chs=600x120
				&chf=bg,s,65432100
				&chd=t:<?php echo implode(",",$valores)?>
				&cht=p3
				&chco=<?php echo implode(",",$colores)?>
				&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
				/>
				<br />Esta pregunta obtuvo <?php echo $total?> respuestas en <?php echo count($encuestas)?> encuestas encontradas
				</div>
<?php

			//}
		} //foreach que recorre las respuesats
	echo "<script> $('#puntaje').html(".round($sumaPromedios/$preguntasContestadas,2).");</script>";
?>

<?php
	}else{ //sino hay resultados
?>
	<p class="titulo_secundario" align="center">No se encontraron encuestas en las fechas seleccionadas</p>
<?php
	}
}
	}

 $ano= (isset($_POST['ano']))?$_POST['ano']:date('Y');
	  $mes= (isset($_POST['mes']))?$_POST['mes']:date('m');
?>
</div>
<div id="noGraficos" style="display:<?php echo $displayNoGraficos;?>">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
<input name="noVerGraficos" type="hidden" value="1"/>
<select id="mes" name="mes">
    <option value="01" <?php if($mes == '01'){?> selected="selected" <?php } ?>>Enero</option>
    <option value="02" <?php if($mes == '02'){?> selected="selected" <?php } ?>>Febrero</option>
    <option value="03" <?php if($mes == '03'){?> selected="selected" <?php } ?>>Marzo</option>
    <option value="04" <?php if($mes == '04'){?> selected="selected" <?php } ?>>Abril</option>
    <option value="05" <?php if($mes == '05'){?> selected="selected" <?php } ?>>Mayo</option>
    <option value="06" <?php if($mes == '06'){?> selected="selected" <?php } ?>>Junio</option>
    <option value="07" <?php if($mes == '07'){?> selected="selected" <?php } ?>>Julio</option>
    <option value="08" <?php if($mes == '08'){?> selected="selected" <?php } ?>>Agosto</option>
    <option value="09" <?php if($mes == '09'){?> selected="selected" <?php } ?>>Septiembre</option>
    <option value="10" <?php if($mes == '10'){?> selected="selected" <?php } ?>>Octubre</option>
    <option value="11" <?php if($mes == '11'){?> selected="selected" <?php } ?>>Noviembre</option>
    <option value="12" <?php if($mes == '12'){?> selected="selected" <?php } ?>>Diciembre</option>
</select>
<select id="ano" name="ano">
    <option <?php if($ano == '2012'){?> selected="selected" <?php } ?>>2012</option>
    <option <?php if($ano == '2013'){?> selected="selected" <?php } ?>>2013</option>
    <option <?php if($ano == '2014'){?> selected="selected" <?php } ?>>2014</option>
    <option <?php if($ano == '2015'){?> selected="selected" <?php } ?>>2015</option>
    <option <?php if($ano == '2016'){?> selected="selected" <?php } ?>>2016</option>
    <option <?php if($ano == '2017'){?> selected="selected" <?php } ?>>2017</option>
    <option <?php if($ano == '2018'){?> selected="selected" <?php } ?>>2018</option>
    <option <?php if($ano == '2019'){?> selected="selected" <?php } ?>>2019</option>
    <option <?php if($ano == '2020'){?> selected="selected" <?php } ?>>2020</option>
    <option <?php if($ano == '2021'){?> selected="selected" <?php } ?>>2021</option>
    <option <?php if($ano == '2022'){?> selected="selected" <?php } ?>>2022</option>
    <option <?php if($ano == '2023'){?> selected="selected" <?php } ?>>2023</option>
    <option <?php if($ano == '2024'){?> selected="selected" <?php } ?>>2024</option>
</select>
<input type="submit" name="ver" id="ver" value="Ver" />
<div style="clear:both;"></div>
</form>
<table width="100%" cellspacing="0" border="1" style="table-layout:fixed;">
<thead>
	<tr>
		<th width="20">Nro. Reserva</th>
		<th width="80">Titular</th>
		<th width="20">F. Devoluci&oacute;n</th>
		<th width="50">E-mail</th>
        <th width="35">Telefono</th>
		<th width="20">Enviado</th>
		<th width="20">Respuesta</th>
		<th width="20">Enviar</th>
		<th width="20">Modificar</th>
	</tr>
</thead>
<tbody>
<?php
function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}
	if(isset($_POST['ver'])){
	$sql1 = "SELECT reservas.*,clientes.nombre_apellido,clientes.email, clientes.codPais, clientes.codArea, clientes.telefono
	FROM reservas INNER JOIN clientes ON clientes.id=reservas.cliente_id

	WHERE
			YEAR(reservas.devolucion)='".$_POST['ano']."' AND  MONTH(reservas.devolucion)='".$_POST['mes']."'
			AND ((reservas.estado != 2 AND reservas.estado != 3) OR reservas.estado is null)
			ORDER BY reservas.devolucion DESC";

	if ($sql1) {
	$rsTemp1 = mysqli_query($conn,$sql1);

	if(mysqli_affected_rows($conn)>0){
		while($rs1 = mysqli_fetch_array($rsTemp1)){
			$enviada=0;
			$sql2 = "SELECT id,respondida,enviada
			FROM encuesta where reserva_id = ".$rs1['id'];

			$rsTemp2 = mysqli_query($conn,$sql2);
			if(mysqli_affected_rows($conn)>0){
				$imgEnviada = "ok.gif";
				if($rs2 = mysqli_fetch_array($rsTemp2)){
					$imgRespuesta = ($rs2['respondida'])?"ok.gif":"bt_delete.png";
					$enviada=$rs2['enviada'];
                    $phone = $rs1['codPais'].$rs1['codArea'].$rs1['telefono']; // Dejar vacio si quieres que el usuario elija a quien enviar el mensaje
                    $actual_link = 'https://www.discoverbuenosairesrentacar.com.ar/encuestas/encuesta.php?id='.$rs2['id'];
                    $message = "Estimado ".$rs1['nombre_apellido']." aprovechamos la oportunidad para invitarlos a participar de nuestra encuesta de satisfaccion. Ingresando al siguiente link";
                    //$message = str_replace(" ", "%20", $message); // Remplazamos los espacios por su equivalente
                    $mensaje = $message.' '.$actual_link;

                    $wa_link = "https://wa.me/$phone?text=".encodeURIComponent($mensaje);
                    $wa_button = '<a href="'.$wa_link.'" target="_blank"  class="item"><img width="16px;" src="images/whatsapp.png" align="absmiddle" /></a>';
				}
				//$enviarEncuesta ="";
			}
			else{
				$imgEnviada = "bt_delete.png";
				$imgRespuesta = "bt_delete.png";

			}
			$enviarEncuesta = '<a href="#" onclick="enviar('.$rs1['id'].')" class="item"><img src="images/mail.png" align="absmiddle" />('.$enviada.') </a>'.$wa_button;
			$modificarEncuesta ="";
			if(($imgRespuesta != "bt_delete.png")&&(ACCION_123)) {
				$modificarEncuesta = '<a href="#" onclick="modificar('.$rs1['id'].')" class="item"><img src="images/ico_users.png" align="absmiddle" /></a>';
			}
			?>



			<tr>
				<td><?php echo $rs1['numero']?></td>
				<td><?php echo $rs1['nombre_apellido']?></td>
				<td><?php echo fechavista($rs1['devolucion'])?></td>
				<td><?php echo $rs1['email']?></td>
                <td><?php echo$rs1['codPais'].$rs1['codArea'].$rs1['telefono']?></td>
				<td style="text-align: center;"><img src="images/<?php echo $imgEnviada?>"></img></td>
				<td style="text-align: center;"><img src="images/<?php echo $imgRespuesta?>"></img></td>
				<td style="text-align: center;"><?php echo $enviarEncuesta?></td>
				<td style="text-align: center;"><?php echo $modificarEncuesta?></td>
			</tr>
			<?php } ?>
		<?php }
	}
	}?>

</tbody>
</table>
</div>


</body>

</html>
