<?php

//agregar el calendario
$this->Js->buffer('$.datepicker.regional[ "es" ]');
$this->Js->buffer('$(".datepicker").datepicker({ dateFormat: "dd/mm/yy", altFormat: "yy-mm-dd" });');
$this->Js->buffer('$("#ReservaTotalEstadia").keyup(updateTotal)');
$this->Js->buffer('
  $("#ClienteEmail2").on(\'paste\', function(e){
    e.preventDefault();
    alert(\'Introduzca el email manualmente\');
  })
');

//formulario
echo $this->Form->create(null, array('url' => '/reservas/crear','inputDefaults' => (array('div' => 'ym-gbox'))));
$disabled = ($grilla==2)?'disabled':'';
?>
<?php echo $this->Form->hidden('Reserva.id'); ?>
<?php echo $this->Form->hidden('Cliente.cuit'); ?>
<?php echo $this->Form->hidden('Cliente.nacionalidad'); ?>
<?php echo $this->Form->hidden('Cliente.codPais'); ?>
<div class="sectionTitle">Formulario de reserva</div>
<div class="ym-grid">
    <div class="ym-g25 ym-gl"><div class="ym-gbox"><span class="fieldName">Creada:</span> <?php echo $reserva['Reserva']['creado']?></div></div>
    <div class="ym-g25 ym-gl"><div class="ym-gbox"><span class="fieldName">Reserva numero:</span> <?php echo $reserva['Reserva']['numero']?></div></div>
    <div class="ym-g25 ym-gl"><div class="ym-gbox"><span class="fieldName">Cargado por:</span> <?php echo $reserva['Usuario']['nombre']." ".$reserva['Usuario']['apellido']?></div></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.reservado_por',array('label' => 'Reservado por:', 'options' => $empleados, 'empty' => 'Seleccionar ...', 'type'=>'select')); ?></div>
</div>

<?php echo $this->Form->hidden('Reserva.actualizado',array('value' => date('Y-m-d H:i:s'))); ?>

<div class="ym-grid">
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Subcanal.canal_id',array('label' => 'Canal de venta','empty' => 'Seleccionar', 'type'=>'select'));?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Reserva.subcanal_id',array('label' => 'Subcanal de venta','empty' => 'Seleccionar', 'type'=>'select'));?></div>
</div>

<div class="sectionTitle">Datos Titular de la Reserva</div>
<?php echo $this->Form->hidden('Cliente.id'); ?>
<div class="ym-grid">
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.nombre_apellido');?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.tipoDocumento',array('type' => 'select', 'empty' => 'Seleccionar ...', 'options' => $tipoDocumento_ops, 'label' => 'Tipo')); ?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.dni',array('label'=>'DNI/Pasaporte'));?></div>
</div>
<div class="ym-grid">
	<div class="ym-g20 ym-gl"><?php echo $this->Form->input('Cliente.sexo',array('empty' => 'Seleccionar', 'type'=>'select', 'options' => $sexos, 'default' => $defaultSexo));?></div>
    <div class="ym-g20 ym-gl"><?php echo $this->Form->input('Cliente.tipoTelefono',array('type' => 'select', 'empty' => 'Seleccionar ...', 'options' => $tipoTelefono_ops, 'label' => 'Tipo')); ?></div>
    <div class="ym-g20 ym-gl"><?php echo $this->Form->input('Cliente.codPaisAux',array('label'=>'Cod. Pais', 'value' => $reserva['Cliente']['codPais'])); ?></div>
    <div class="ym-g20 ym-gl"><?php echo $this->Form->input('Cliente.codArea',array('label'=>'Cod. Area')); ?></div>
    <div class="ym-g20 ym-gl"><?php echo $this->Form->input('Cliente.telefono'); ?></div>
    <!--<div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.celular'); ?></div>-->
</div>
<div class="ym-grid">
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.direccion'); ?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.localidad'); ?></div>
</div>

<div class="ym-grid">
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.nacionalidadAux',array('label'=>'Nacionalidad', 'value' => $reserva['Cliente']['nacionalidad'])); ?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.nacimiento',array('class'=>'datepicker','type'=>'text')); ?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.profesion'); ?></div>
</div>
<div class="ym-grid">
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Reserva.aerolinea'); ?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Reserva.vuelo',array('label'=>'Nro. de vuelo','maxlength'=>'6')); ?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.domicilio_local',array('label'=>'Domicilio de alojamiento')); ?></div>
</div>
<div class="ym-grid">
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.email');; ?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.email2',array('label'=>'Repita el E-mail')); ?></div>
</div>

<div class="sectionSubtitle">Datos Conductor</div>
<div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.titular_conduce',array('label'=>'Titular de reserva conduce','default' => '0')); ?></div>
<div class="ym-grid">
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.ad_nombre_apellido',array('label'=>'Nombre Apellido')); ?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.ad_dni',array('label'=>'DNI/Pasaporte'));?></div>

</div>
<div class="ym-grid">
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.ad_telefono',array('label'=>'Telefono')); ?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.ad_email',array('label'=>'Email')); ?></div>
</div>
<div class="ym-grid">

    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.nro_licencia_de_conducir'); ?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.vencimiento',array('class'=>'datepicker','type'=>'text'));?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Cliente.lugar_emision',array('label'=>'Lugar de emision')); ?></div>
</div>
<div class="ym-grid">
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.ad_direccion',array('label'=>'Direccion')); ?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.ad_localidad',array('label'=>'Localidad')); ?></div>
</div>
<div class="ym-gbox">
    <a onclick="agregar_conductor();">Agregar conductor</a>
</div>
<table width="100%" id="reserva_conductors">
    <div class="sectionSubtitle">Conductores adicionales</div>
    <?php $i = 0;

    if(count($reservaConductors) > 0){
        foreach($reservaConductors as $reservaConductor){
            $i++;
            ?>
            <tr class="border_bottom" id="ReservaConductor<?php echo $i?>">
                <td width="30%">

                    <input type="hidden" class="itemConductor" name="data[ReservaConductorNombreApellido][]" value="<?php echo $reservaConductor['ReservaConductor']['nombre_apellido'];?>"/>

                    <?php echo $reservaConductor['ReservaConductor']['nombre_apellido'];?>
                </td>
                <td width="20%">

                    <input type="hidden" name="data[ReservaConductorDni][]" value="<?php echo $reservaConductor['ReservaConductor']['dni'];?>"/>

                    <?php echo $reservaConductor['ReservaConductor']['dni'];?>
                </td>
                <td width="10%">

                    <input type="hidden" name="data[ReservaConductorTelefono][]" value="<?php echo $reservaConductor['ReservaConductor']['telefono'];?>"/>
                    <input type="hidden" name="data[ReservaConductorEmail][]" value="<?php echo $reservaConductor['ReservaConductor']['email'];?>"/>
                    <input type="hidden" name="data[ReservaConductorNroLicencia][]" value="<?php echo $reservaConductor['ReservaConductor']['nro_licencia_de_conducir'];?>"/>

                    <?php echo $reservaConductor['ReservaConductor']['nro_licencia_de_conducir'];?>
                </td>
                <td width="10%">

                    <input type="hidden" name="data[ReservaConductorVencimiento][]" value="<?php echo $reservaConductor['ReservaConductor']['vencimiento'];?>"/>
                    <input type="hidden" name="data[ReservaConductorLugarEmision][]" value="<?php echo $reservaConductor['ReservaConductor']['lugar_emision'];?>"/>
                    <input type="hidden" name="data[ReservaConductorDireccion][]" value="<?php echo $reservaConductor['ReservaConductor']['direccion'];?>"/>
                    <input type="hidden" name="data[ReservaConductorLocalidad][]" value="<?php echo $reservaConductor['ReservaConductor']['localidad'];?>"/>

                    <?php echo $reservaConductor['ReservaConductor']['vencimiento'];?>
                </td>

                <td align="right" width="50"><a onclick="quitarConductor('<?php echo $reservaConductor['ReservaConductor']['id']?>', <?php echo $i?>);">quitar</a></td>
            </tr>
        <?php  }} ?>

</table>
<!-- reservas conductors -->
<div id="divConductor" style="display: none">
    <div class="ym-grid">
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ReservaConductor.nombre_apellido',array('label'=>'Nombre Apellido')); ?></div>
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ReservaConductor.dni',array('label'=>'DNI/Pasaporte'));?></div>

    </div>
    <div class="ym-grid">
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ReservaConductor.telefono',array('label'=>'Telefono')); ?></div>
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ReservaConductor.email',array('label'=>'Email')); ?></div>
    </div>
    <div class="ym-grid">

        <div class="ym-g33 ym-gl"><?php echo $this->Form->input('ReservaConductor.nro_licencia_de_conducir'); ?></div>
        <div class="ym-g33 ym-gl"><?php echo $this->Form->input('ReservaConductor.vencimiento',array('class'=>'datepicker','type'=>'text'));?></div>
        <div class="ym-g33 ym-gl"><?php echo $this->Form->input('ReservaConductor.lugar_emision',array('label'=>'Lugar de emision')); ?></div>
    </div>
    <div class="ym-grid">
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ReservaConductor.direccion',array('label'=>'Direccion')); ?></div>
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('ReservaConductor.localidad',array('label'=>'Localidad')); ?></div>
    </div>
    <span onclick="addConductor();" class="boton agregar">+ agregar conductor</span>
    <span onclick="cancelConductor();" class="boton cancel">cancelar</span>
</div>
<!-- fin reservas conductors -->
<div class="sectionTitle">Datos Reserva</div>
<div class="ym-grid">
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Unidad.categoria_id',array('empty' => 'Seleccionar', 'type'=>'select', 'disabled' => $disabled));
    if($disabled){
    	echo $this->Form->hidden('Unidad.categoria_id');
    }
    ?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Reserva.unidad_id',array('empty' => 'Seleccionar', 'type'=>'select', 'disabled' => $disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.unidad_id');
    }
    ?></div>
</div>
<div class="ym-grid">
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.lugar_retiro_id',array('options' => $lugars, 'empty' => 'Seleccionar ...', 'type'=>'select', 'disabled' => $disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.lugar_retiro_id');
    }
    ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.retiro',array('class'=>'datepicker','type'=>'text','default'=>$hoy, 'disabled' => $disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.retiro');
    }
    $disabledAux = ($disabled)?'disabled="disabled"':'';
    ?></div>
    <div class="ym-g25 ym-gl"><label for="ReservaHoraRetiro"><div class="ym-gbox required">Retiro (HH:MM)</label><input class="number" type="time" id="ReservaHoraRetiro" name="data[Reserva][hora_retiro]" value="<?php echo $hora_retiro?>" <?php echo $disabledAux?>>
    <?php if($disabled){ ?>
    	<input type="hidden" name="data[Reserva][hora_retiro]"  id="ReservaHoraRetiro" value="<?php echo $hora_retiro; ?>" />

    <?php } ?>
    </div></div>
</div>
<div class="ym-grid">
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.lugar_devolucion_id',array('options' => $lugars, 'empty' => 'Seleccionar ...', 'type'=>'select','disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.lugar_devolucion_id');
    }
    ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.devolucion',array('class'=>'datepicker','type'=>'text','default'=>$hoy,'disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.devolucion');
    }
    ?></div>
	<div class="ym-g25 ym-gl"><label for="ReservaHoraRetiro"><div class="ym-gbox required">Devolucion (HH:MM)</label><input class="number" type="time" id="ReservaHoraDevolucion" name="data[Reserva][hora_devolucion]" value="<?php echo $hora_devolucion?>" <?php echo $disabledAux?>>
	<?php if($disabled){ ?>
    	<input type="hidden" name="data[Reserva][hora_devolucion]" id="ReservaHoraDevolucion" value="<?php echo $hora_devolucion; ?>" />

    <?php } ?>
	</div></div>
</div>
<div class="ym-grid">
    <div class="ym-g25 ym-gl"><div class="ym-gbox"><strong>Total</strong></div></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.pax_adultos',array('label'=>'Mayores', 'type' => 'text', 'class' => 'number','default' => '0','disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.pax_adultos');
    }
    ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.pax_menores',array('label'=>'Menores', 'type' => 'text', 'class' => 'number','default' => '0','disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.pax_menores');
    }
    ?></div>
    <div class="ym-g25 bebes"><?php echo $this->Form->input('Reserva.pax_bebes',array('label'=>'Bebes', 'type' => 'text', 'class' => 'number','default' => '0', 'div' => false,'disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.pax_bebes');
    }
    ?>
</div>
<div class="ym-grid">
    <div class="ym-g25 ym-gl"><div class="ym-gbox"><strong>Seguro</strong></div></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.discover',array('label'=>'Discover','disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.discover');
    }
    ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.discover_plus',array('label'=>'Discover Plus','disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.discover_plus');
    }
    ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Reserva.discover_advance',array('label'=>'Discover Advance','disabled'=>$disabled));
    if($disabled){
    	echo $this->Form->hidden('Reserva.discover_advance');
    }
     ?></div>
</div>
<div class="ym-grid">
    <div class="ym-g100 ym-gr" class="total_estadia">
        <div class="ym-gbox"><strong>Total Alquiler $</strong> <input style="width: 100px;" type="text" name="data[Reserva][total_estadia]" id="ReservaTotalEstadia" value="<?php echo $reserva['Reserva']['total_estadia']?>" <?php echo $disabledAux?>/>
         <?php if($disabled){ ?>
	    	<input style="width: 100px;" type="hidden" name="data[Reserva][total_estadia]" id="ReservaTotalEstadia" value="<?php echo $reserva['Reserva']['total_estadia']?>" />
	    <?php } ?>
        <input type="hidden" id="ReservaTotalEstadiaAnt" name="ReservaTotalEstadiaAnt" value="<?php echo $reserva['Reserva']['total_estadia']?>"/><input type="hidden" id="ReservaPendiente" name="ReservaPendiente" value="<?php echo $pendiente;?>"/></div>
    </div>
</div>

    <div class="sectionSubtitle">Informacion de Facturacion</div>


    <div class="ym-grid">
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.iva',array('type' => 'select', 'options' => $iva_ops, 'empty' => 'Seleccionar ...', 'label' => 'Condicion Impositiva')); ?></div>
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.tipoPersona',array('type' => 'select', 'options' => $tipoPersona_ops, 'empty' => 'Seleccionar ...', 'label' => 'Tipo de Persona')); ?></div>
    </div>

    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.titular_factura',array('label'=>'Facturar a titular de reserva','default' => '0')); ?></div>
    <div class="ym-grid">
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.razon_social',array('label'=>'Nombre Apellido/Razon Social')); ?></div>
        <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Cliente.cuitAux', array('label' => 'CUIT','disabled'=>'disabled', 'value' => $reserva['Cliente']['cuit'])); ?></div>
    </div>
<!-- reservas extras -->
<div class="sectionSubtitle">Extras</div>
<div class="ym-grid">
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Extra.extra_rubro_id',array('label' => 'Seleccione un rubro', 'options' => $extra_rubros, 'empty' => 'Rubro', 'type'=>'select','disabled'=>$disabled)); ?></div>
    <div class="ym-g50 ym-gl" id="extra_subrubros"></div>
    <div class="ym-g25 ym-gl"><div id="btn_add_extra" class="ym-gbox" style="margin-top:5px; display:none;"><span onclick="addExtra();" class="boton agregar">+ agregar</span></div></div>
</div>
<table width="100%" id="reserva_extras">
        <?php $i = 0;
            $total_extras = 0;
            if(count($extras) > 0){
                foreach($extras as $extra){
                    $i++; $total_extras = $total_extras + ($extra['ReservaExtra']['cantidad']*$extra['ReservaExtra']['precio']); ?>
                    <tr class="border_bottom" id="Extra<?php echo $i?>">
                        <td width="25%">
                            <input type="hidden" name="data[ReservaExtraId][]" value="<?php echo $extra['Extra']['id']?>"/>
                            <input type="hidden" name="data[ReservaExtraCantidad][]" value="<?php echo $extra['ReservaExtra']['cantidad']?>"/>
                            <input type="hidden" name="data[ReservaExtraPrecio][]" value="<?php echo $extra['ReservaExtra']['precio']?>"/>
                            <?php echo $extra['Extra']['ExtraRubro']['rubro']?>
                        </td>
                        <td><?php echo $extra['Extra']['ExtraSubrubro']['subrubro'];?> <?php echo $extra['Extra']['detalle']; ?></td>
                        <td align="right" width="100"><span class="extra_cantidad"><?php echo $extra['ReservaExtra']['cantidad']?> x $<span class="extra_tarifa"><?php echo $extra['ReservaExtra']['precio']?></span></td>
                        <td align="right" width="50">$<?php echo $extra['ReservaExtra']['cantidad']*$extra['ReservaExtra']['precio']?></td>
                        <td align="right" width="50"><a onclick="quitarExtra('<?php echo $extra['ReservaExtra']['id']?>', <?php echo $i?>);">quitar</a></td>
                    </tr>
        <?php  }} ?>
</table>
<table width="100%" id="reserva_extras" class="extras_totales" <?php  if($i == 0){  ?> style="display: none;" <?php  } ?>>
    <tr>
        <td colspan="3" align="right"><strong>Total extras</strong></td>
        <td width="50" align="right">$<span class="extra_total"><?php echo $total_extras;?></span></td>
        <td width="50">&nbsp;</td>
    </tr>
</table>
<!-- fin reservas extras -->

<div class="ym-grid">
    <div class="ym-g100 ym-gr" class="total_estadia">
        <div class="ym-gbox"><strong>Tarifa bruta inicial (total estad&iacute;a+extras adelantados) $</strong> <input style="width: 100px;" type="hidden" name="data[Reserva][total]" id="ReservaTotal" value="<?php echo $reserva['Reserva']['total'];?>" /><span id="reservaTotalSpan"><?php echo $reserva['Reserva']['total'];?></span></div>
    </div>
</div>

<div class="sectionSubtitle">Comentarios</div>
<div class="ym-grid">
    <?php echo $this->Form->input('Reserva.comentarios',array('label' => false, 'type' => 'textarea')); ?>
</div>

<?php if($grilla==1){ ?>
<span id="botonGuardar" onclick="guardarSinRefrescar('<?php echo $this->Html->url('/reservas/guardar.json', true);?>',$('form').serialize());" class="boton guardar">Guardar <img src="<?php echo $this->webroot; ?>img/loading_save.gif" class="loading" id="loading_save" /></span>
<span id="botonGuardarErrorReserva1" class="boton guardar" style="display:none">Realice antes la devolucion correspondiente</span>
<span id="botonVolver" onclick="volver();" class="boton volver">Volver a la grilla</span>
<?php }else{

$ventaRefrescar=($grilla==2)?'w_ventas_informe_operaciones':'w_reservas';
$paginaRefrescar=($grilla==2)?'v2/informes/index_ventas_operaciones':'v2/reservas/index';
?>
<span id="botonGuardar" onclick="guardar('<?php echo $this->Html->url('/reservas/guardar.json', true);?>',$('form').serialize(),{id:'<?php echo $ventaRefrescar;?>',url:'<?php echo $paginaRefrescar;?>'});" class="boton guardar">Guardar <img src="<?php echo $this->webroot; ?>img/loading_save.gif" class="loading" id="loading_save" /></span>
<span id="botonGuardarErrorReserva1" class="boton guardar" style="display:none">Realice antes la devolucion correspondiente</span>
<?php } ?>



<?php echo $this->Form->end(); ?>

<script>
$(document).ready(function(){
	$("#ClienteNacionalidadAux").autocomplete({
	source: '<?php echo $this->Html->url('/clientes/autoComplete', true);?>',
	minLength: 2
	});

	$("#ClienteNacionalidadAux").autocomplete({
	select: function(event, ui) {
	selected_id = ui.item.id;

	$("#ClienteNacionalidad").val(selected_id);

	}
	});
	$("#ClienteNacionalidadAux").autocomplete({
	open: function(event, ui) {
	$("#NacionalidadId").remove();
	}
	});
    $("#ClienteCodPaisAux").autocomplete({
        source: '<?php echo $this->Html->url('/clientes/autoCompletePrefijo', true);?>',
        minLength: 2
    });

    $("#ClienteCodPaisAux").autocomplete({
        select: function(event, ui) {
            selected_id = ui.item.id;

            $("#ClienteCodPais").val(selected_id);

        }
    });
    $("#ClienteCodPaisAux").autocomplete({
        open: function(event, ui) {
            $("#CodPaisId").remove();
        }
    });
});
function addExtra(){
    var pattern = /^(([1-9]\d*))$/;
    if(pattern.test($('#ReservaExtraCantidad').val())){
        $.ajax({
          url: '<?php echo $this->Html->url('/reserva_extras/getRow', true);?>',
          data: {'extra_id' : $('#ExtraId').val(), 'cantidad' : $('#ReservaExtraCantidad').val()},
          success: function(data){
              $('#reserva_extras').append(data);
              $('.extras_totales').show();
          },
          dataType: 'html'
        });
    }else{
        alert('Ingrese un numero natural mayor a cero');
        $('#ReservaExtraCantidad').focus();
    }
}
$('#ExtraExtraRubroId').change(function(){
    if($(this).val() != ""){
        $.ajax({
          url: '<?php echo $this->Html->url('/extras/getSubrubrosPrecio', true);?>',
          data: {'rubro_id' : $(this).val() },
          success: function(data){
            $('#btn_add_extra').show();
            $('#extra_subrubros').html(data);
            updateTotal();
          },
          dataType: 'html'
        });
    }else{
        $('#btn_add_extra').hide();
        $('#extra_subrubros').html('');
    }
});
function agregar_conductor(){
    var elementos = $('.itemConductor');
    var size = elementos.size();
    //console.log("Hay " + size + " elementos");
    if (size>1){
        alert('Solo se pueden agregar 2 conductores adicionales')
    }
    else{
        $('#divConductor').show();
    }

}

function addConductor(){
    if ($('#ReservaConductorNombreApellido').val()==''){
        alert('Ingrese un numero Nombre Apellido');
        $('#ReservaConductorNombreApellido').focus();
        return false;
    }
    if ($('#ReservaConductorDni').val()==''){
        alert('Ingrese un DNI/Pasaporte');
        $('#ReservaConductorDni').focus();
        return false;
    }
    if ($('#ReservaConductorTelefono').val()==''){
        alert('Ingrese un Telefono');
        $('#ReservaConductorTelefono').focus();
        return false;
    }
    if ($('#ReservaConductorEmail').val()==''){
        alert('Ingrese un Email');
        $('#ReservaConductorEmail').focus();
        return false;
    }
    if ($('#ReservaConductorNroLicenciaDeConducir').val()==''){
        alert('Ingrese un Nro Licencia De Conducir');
        $('#ReservaConductorNroLicenciaDeConducir').focus();
        return false;
    }
    if ($('#ReservaConductorVencimiento').val()==''){
        alert('Ingrese un Vencimiento');
        $('#ReservaConductorVencimiento').focus();
        return false;
    }
    if ($('#ReservaConductorLugarEmision').val()==''){
        alert('Ingrese un Lugar de Emision');
        $('#ReservaConductorLugarEmision').focus();
        return false;
    }
    if ($('#ReservaConductorDireccion').val()==''){
        alert('Ingrese una Direccion');
        $('#ReservaConductorDireccion').focus();
        return false;
    }
    if ($('#ReservaConductorLocalidad').val()==''){
        alert('Ingrese una Localidad');
        $('#ReservaConductorLocalidad').focus();
        return false;
    }



    $.ajax({
        url: '<?php echo $this->Html->url('/reserva_conductors/getRow', true);?>',
        data: {'nombreApellido' : $('#ReservaConductorNombreApellido').val(), 'dni' : $('#ReservaConductorDni').val()
            , 'telefono' : $('#ReservaConductorTelefono').val(), 'email' : $('#ReservaConductorEmail').val(), 'nroLicencia' : $('#ReservaConductorNroLicenciaDeConducir').val()
            , 'vencimiento' : $('#ReservaConductorVencimiento').val(), 'lugarEmision' : $('#ReservaConductorLugarEmision').val()
            , 'direccion' : $('#ReservaConductorDireccion').val(), 'localidad' : $('#ReservaConductorLocalidad').val()},
        success: function(data){
            $('#reserva_conductors').append(data);
            $('#ReservaConductorNombreApellido').val('');

            $('#ReservaConductorDni').val('');

            $('#ReservaConductorTelefono').val('');

            $('#ReservaConductorEmail').val('');

            $('#ReservaConductorNroLicenciaDeConducir').val('');

            $('#ReservaConductorVencimiento').val('');

            $('#ReservaConductorLugarEmision').val('');

            $('#ReservaConductorDireccion').val('');

            $('#ReservaConductorLocalidad').val('');
            $('#divConductor').hide();
        },
        dataType: 'html'
    });

}
function cancelConductor(){

    $('#ReservaConductorNombreApellido').val('');

    $('#ReservaConductorDni').val('');

    $('#ReservaConductorTelefono').val('');

    $('#ReservaConductorEmail').val('');

    $('#ReservaConductorNroLicenciaDeConducir').val('');

    $('#ReservaConductorVencimiento').val('');

    $('#ReservaConductorLugarEmision').val('');

    $('#ReservaConductorDireccion').val('');

    $('#ReservaConductorLocalidad').val('');
    $('#divConductor').hide();

}
function quitarConductor(reserva_conductor_id, item){

    if(confirm('Seguro desea eliminar el conductor?')){
        $('#ReservaConductor'+item).remove();

    }
}
function updateTotal(){
    var result = 0;
    var extra_total = 0;
    result += parseFloat($('#ReservaTotalEstadia').val());
    $(".extra_tarifa").each(function(index,obj) {
        result += parseFloat($('#'+$(obj).parent().parent().parent().attr('id') + ' .extra_cantidad').text()) * parseFloat($(obj).text());
        extra_total += parseFloat($('#'+$(obj).parent().parent().parent().attr('id') + ' .extra_cantidad').text()) * parseFloat($(obj).text());
    });
    $('#ReservaTotal').val(result);
    $('#reservaTotalSpan').html(result);
    $('.extra_total').html(extra_total);
    if(extra_total == 0){
        $('.extras_totales').hide();
    }
    if(($('#ReservaPendiente').val()==0)&&(parseFloat($('#ReservaTotalEstadia').val())<parseFloat($('#ReservaTotalEstadiaAnt').val()))){
    	 $("#botonGuardar").hide();
    	 $("#botonGuardarErrorReserva1").show();
    	//alert("Realice antes la devolucion correspondiente y luego modifique la tarifa de la estadia por el monto de la devolucion");
    }
    else {
    	$("#botonGuardar").show();
    	 $("#botonGuardarErrorReserva1").hide();
    	}

}

function quitarExtra(reserva_extra_id, item){

    if(confirm('Seguro desea eliminar el extra?')){
        $.ajax({
            url : '<?php echo $this->Html->url('/reserva_extras/controlarEliminacion', true);?>',
            type : 'POST',
            dataType: 'json',
            data: { 'reserva_extra_id' : reserva_extra_id},
            success : function(data){
            	if(data.resultado == 'ERROR'){
                        alert(data.mensaje+' '+data.detalle);
                }
                else{
                $('#Extra'+item).remove();
                updateTotal();
                }
            }
        });
    }
}

$('#SubcanalCanalId').change(function(){
    if($(this).val()!=''){
        $.ajax({
            url: '<?php echo $this->Html->url('/reservas/getSubcanals/', true);?>'+$(this).val(),
            dataType: 'html',

            success: function(data){
                $('#ReservaSubcanalId').html(data);
            }
        });
    }else{
         $('#ReservaSubcanalId').html('');
    }
})

$('#UnidadCategoriaId').change(function(){
    if($(this).val()!=''){
        $.ajax({
            url: '<?php echo $this->Html->url('/reservas/getUnidads/', true);?>'+$(this).val(),
            dataType: 'html',

            success: function(data){
                $('#ReservaUnidadId').html(data);
            }
        });
    }else{
         $('#ReservaUnidadId').html('');
    }
})

$("#ClienteTitularConduce").click( function(){
   if( $(this).is(':checked') ) {
   		$("#ClienteAdNombreApellido").val($("#ClienteNombreApellido").val());
   		$("#ClienteAdDni").val($("#ClienteDni").val());
   		$("#ClienteAdTelefono").val($("#ClienteTelefono").val());
   		$("#ClienteAdEmail").val($("#ClienteEmail").val());
   		$("#ClienteAdDireccion").val($("#ClienteDireccion").val());
   		$("#ClienteAdLocalidad").val($("#ClienteLocalidad").val());
   }
   else{
   		$("#ClienteAdNombreApellido").val('');
   		$("#ClienteAdDni").val('');
   		$("#ClienteAdTelefono").val('');
   		$("#ClienteAdEmail").val('');
   		$("#ClienteAdDireccion").val('');
   		$("#ClienteAdLocalidad").val('');
   }

})
$("#ReservaDiscover").click( function(){
	$("#ReservaDiscoverPlus").prop( "checked", false );
	$("#ReservaDiscoverAdvance").prop( "checked", false );
})

$("#ReservaDiscoverPlus").click( function(){
	$("#ReservaDiscover").prop( "checked", false );
	$("#ReservaDiscoverAdvance").prop( "checked", false );
})

$("#ReservaDiscoverAdvance").click( function(){
	$("#ReservaDiscoverPlus").prop( "checked", false );
	$("#ReservaDiscover").prop( "checked", false );
})

function volver(){
	document.location = "<?php echo $this->Html->url('/informes/index_ventas_grilla2', true);?>";

}

function modificarFacturacion(){
    if (($('#ClienteTipoDocumento').val()=='DNI')&&($('#ClienteNacionalidadAux').val()=='Argentina')){
        $('#ClienteIva').prop( "disabled", false );
        $('#ClienteTipoPersona').prop( "disabled", false );
        $('#ClienteRazonSocial').prop( "disabled", false );

    }
    else{
        $('#ClienteIva').val('');
        $('#ClienteIva').prop( "disabled", true );
        $('#ClienteTipoPersona').val('');
        $('#ClienteTipoPersona').prop( "disabled", true );
        $('#ClienteRazonSocial').val('');
        $('#ClienteRazonSocial').prop( "disabled", true );
        $('#ClienteCuitAux').val('');
        $('#ClienteCuitAux').prop( "disabled", true );
    }

}

$('#ClienteTipoDocumento').change(function(){
    modificarFacturacion();
});

$('#ClienteNacionalidadAux').blur(function(){
    modificarFacturacion();
});

$('#ClienteTipoPersona').change(function(){
    if ($('#ClienteTipoPersona').val()=='Fisica'){

        $('#ClienteCuitAux').prop( "disabled", true );
        $('#ClienteTitularFactura').prop( "disabled", false );

    }
    else{
        $('#ClienteCuitAux').val('');
        $('#ClienteCuitAux').prop( "disabled", false );
        $('#ClienteTitularFactura').prop( "disabled", true );
        $("#ClienteRazonSocial").val('');
        $("#ClienteTitularFactura").prop('checked', false);
    }
});

$("#ClienteTitularFactura").click( function(){
    if( $(this).is(':checked') ) {
        $("#ClienteRazonSocial").val($("#ClienteNombreApellido").val());
        $('#ClienteCuitAux').prop( "disabled", true );
        $.ajax({
            url: '<?php echo $this->Html->url('/clientes/getCuit', true);?>',
            data: {'dni' : $("#ClienteDni").val(),'sexo' : $("#ClienteSexo").val() },
            dataType: 'json',
            success: function(data){

                $('#ClienteCuitAux').val(data.cuit);

            },

        });
    }
    else{
        $("#ClienteRazonSocial").val('');
        $('#ClienteCuitAux').val('');
        $('#ClienteCuitAux').prop( "disabled", false );
    }

})

$('#ClienteCuitAux').change(function(){

    $('#ClienteCuit').val($('#ClienteCuitAux').val());


});

</script>
