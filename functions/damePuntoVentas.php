<?php
include_once("../config/db.php");

$descarga 		= $_GET['descargas'];
$puntos = $_GET['puntos'];
?>

<select size="1" name="puntos" id="puntos">
    <?php
    $sql = "SELECT id, CONCAT(numero,' ', cuit,' ', descripcion,' ', direccion) as punto FROM punto_ventas ";

    $sql .=($descarga=='descarga1')?"WHERE ivaVentas = 1 ":" WHERE id = 2 ";

    $rsTemp = mysqli_query($conn,$sql);
    while($rs = mysqli_fetch_array($rsTemp)){

        ?>

        <option value="<?php echo $rs['id']?>" <?php if($puntos == $rs['id']){?> selected="selected" <?php } ?>><?php echo $rs['punto']?> </option>

    <?php } ?>

</select>
