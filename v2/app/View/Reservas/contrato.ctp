<div class="content">
	<?php echo $this->Html->image('logo_contrato.png'); ?>

    <div class="content2">
      <table width="100%"><tr><td style="width:350px; background-color:#092f87"><h2 style="width:320px;">TITULAR DE LA RESERVA</h2></td><td style="width:25px;"></td><td style="background-color:#092f87"><h2>NRO DE RESERVA/FORMULARIO</h2></td><td class="border2"><?php echo $reserva['Reserva']['numero']; ?></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:125px;"><p style="font-size:12px;">Nombre y Apellido</td><td class="border" style="width:380px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['nombre_apellido']; ?></p></td>
            <td style="width:80px;"><p style="font-size:12px;">DNI/Pasaporte </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['dni']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:50px;"><p style="font-size:12px;">CUIT</td><td class="border" style="width:100px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['cuit']; ?></p></td>
            <td style="width:70px;"><p style="font-size:12px;"><?php echo utf8_encode('Tel�fono'); ?> </td> <td class="border" style="width:140px;"><p style="font-size:12px;"><?php echo $reserva['Cliente']['telefono']; ?></p></td>
            <td style="width:50px;"><p style="font-size:12px;">Email </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['email']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:100px;"><p style="font-size:12px;"><?php echo utf8_encode('Direcci�n real'); ?></td><td class="border" style="width:280px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['direccion']; ?></p></td>
            <td style="width:80px;"><p style="font-size:12px;">Localidad/Provincia </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['localidad']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:80px;"><p style="font-size:12px;">Nacionalidad</td><td class="border" style="width:200px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['nacionalidad']; ?></p></td>
            <td style="width:100px;"><p style="font-size:12px;">Domicilio local </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['domicilio_local']; ?></p></td>
        </tr>
    </table>
    <h2>DATOS CONDUCTORES</h2>
    </div>
    <div class="content3">
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Nombre y Apellido:  <?php echo $reserva['Cliente']['ad_nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">DNI/Pasaporte:  <?php echo $reserva['Cliente']['ad_dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Tel�fono: ').  $reserva['Cliente']['ad_telefono']; ?></p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor1.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">  <?php echo utf8_encode('Direccion: ').$reserva['Cliente']['ad_direccion']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Localidad/Provincia:  <?php echo $reserva['Cliente']['ad_localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;">Nro. Licencia Conducir:  <?php echo $reserva['Cliente']['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Vencimiento:  <?php echo $reserva['Cliente']['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">  <?php echo utf8_encode('Lugar de Emisi�n: ').$reserva['Cliente']['lugar_emision']; ?></p></td>
        </tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>

    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Nombre y Apellido:  <?php echo $reserva['ReservaConductor'][0]['nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">DNI/Pasaporte: <?php echo $reserva['ReservaConductor'][0]['dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"> <?php echo utf8_encode('Tel�fono: ').$reserva['ReservaConductor'][0]['telefono'];?> </p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor2.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Direcci�n: ').$reserva['ReservaConductor'][0]['direccion'];?>  </p></td>
            <td class="border2"><p style="font-size:12px;">Localidad/Provincia:  <?php echo $reserva['ReservaConductor'][0]['localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;">Nro. Licencia Conducir: <?php echo $reserva['ReservaConductor'][0]['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Vencimiento:  <?php echo $reserva['ReservaConductor'][0]['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Lugar de Emisi�n: ').$reserva['ReservaConductor'][0]['lugar_emision'];?> </p></td>
        </tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Nombre y Apellido:  <?php echo $reserva['ReservaConductor'][1]['nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">DNI/Pasaporte: <?php echo $reserva['ReservaConductor'][1]['dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Tel�fono: ').$reserva['ReservaConductor'][1]['telefono'];?> </p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor3.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Direcci�n: ').$reserva['ReservaConductor'][1]['direccion'];?>  </p></td>
            <td class="border2"><p style="font-size:12px;">Localidad/Provincia:  <?php echo $reserva['ReservaConductor'][1]['localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;">Nro. Licencia Conducir: <?php echo $reserva['ReservaConductor'][1]['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Vencimiento:  <?php echo $reserva['ReservaConductor'][1]['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Lugar de Emisi�n: ').$reserva['ReservaConductor'][1]['lugar_emision'];?>  </p></td>
        </tr>
    </table>
    </div>
    <div class="content2">
    <h2>DATOS RESERVA</h2>
    <table width="100%" class="test">
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">Unidad: <?php echo $reserva['Unidad']['unidadContrato']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Total pasajeros:  <?php echo $reserva['Reserva']['pax_adultos'] + $reserva['Reserva']['pax_menores'] ; ?></p></td>
        </tr>
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">Fecha y hora retiro: <?php echo $reserva['Reserva']['retiro'].' '. $reserva['Reserva']['hora_retiro']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Lugar retiro:  <?php echo $reserva['Lugar_Retiro']['lugar']; ?></p></td>
        </tr>
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Fecha y hora devoluci�n: '). $reserva['Reserva']['devolucion'].' '.$reserva['Reserva']['hora_devolucion']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"> <?php echo utf8_encode('Lugar devoluci�n: ').$reserva['Lugar_Devolucion']['lugar']; ?></p></td>
        </tr>
    </table>
    <h2>Cobertura. Seguro incluido (el monto de la franquicia se fija al dorso)</h2>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" style="width:245px;"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER</p></td>
		    <td class="border2" style="width:275px;"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover_plus'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER PLUS</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover_advance'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER ADVANCE</p></td>
    	</tr>
    </table>
    <h2>Extras Anticipados</h2>

    <?php
     //print_r($reserva['ReservaExtra']);
    //if(count($reserva['ReservaExtra']) > 0){
    	$tasa_aeropuerto = 0;
    	$conductor_adicional = 0;
    	$gps = 0;
    	$butaca_bebe = 0;
    	$porta_ski = 0;
    	$cadenas_nieve=0;
    	foreach($reserva['ReservaExtra'] as $extra){
    		if($extra['extra_id']==1){
    			$tasa_aeropuerto = 1;
    		}
    		if($extra['extra_id']==4){
    			$conductor_adicional = 1;
    		}
    		if($extra['extra_id']==5){
    			$gps = 1;
    		}
    		if($extra['extra_id']==2){
    			$butaca_bebe = 1;
    		}
    		if($extra['extra_id']==6){
    			$porta_ski = 1;
    		}
    		if($extra['extra_id']==3){
    			$cadenas_nieve = 1;
    		}
    	}
    //}
    ?>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($tasa_aeropuerto ?'check_circle.png':'uncheck_circle.png'); ?>  Tasa Aeropuerto </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($conductor_adicional ?'check_circle.png':'uncheck_circle.png'); ?>  Conductor Adicional</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image($gps ?'check_circle.png':'uncheck_circle.png'); ?>  GPS </p></td>
    	</tr>
    	<tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($butaca_bebe ?'check_circle.png':'uncheck_circle.png'); ?>  <?php echo utf8_encode('Butaca beb�');?>  </p></td>
		    <!--<td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($porta_ski ?'check_circle.png':'uncheck_circle.png'); ?>  Porta Ski</p></td>-->
		    <td class="border2" colspan="2"><p style="font-size:12px;"><?php echo $this->Html->image($cadenas_nieve ?'check_circle.png':'uncheck_circle.png'); ?>  Otros </p></td>
    	</tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Total alquiler</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo '$'.$total; ?></p></td>
        </tr>

    </table>
     <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Kilometraje</p></td>
            <td style="width:250px;" class="border2"><p style="font-size:12px;">Entrega:</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Devoluci�n: ');?></p></td>
        </tr>

    </table>
     <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Combustible</p></td>
            <td style="width:250px;" class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>   Diesel:</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>   Nafta:</p></td>
        </tr>

    </table>
    <?php echo $this->Html->image('combustible.PNG'); ?>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:500px;color: #fff;background: #092f87;"><p style="font-size:12px;"><?php echo utf8_encode('Extras Devoluci�n');?></p></td>

            <td class="border2">TOTAL $</p></td>
        </tr>

    </table>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Hora extra $ </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Km extra $</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png').utf8_encode('  Reposici�n combustible (1/8) $'); ?> </p></td>
    	</tr>
    	<tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Lavado especial $  </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Asistencia fuera de horario $</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png').utf8_encode('  Reparaci�n $'); ?></p></td>
    	</tr>
    </table>

    <?php echo $this->Html->image('firma.PNG'); ?>
    </div>

</div>
<?php echo $this->Html->image('contrato_dorso.jpg'); ?>
<div class="content">
	<?php echo $this->Html->image('logo_contrato.png'); ?>

    <div class="content2">
    <table width="100%"><tr><td style="width:350px; background-color:#092f87"><h2 style="width:320px;">RESERVATION HOLDER</h2></td><td style="width:25px;"></td><td style="background-color:#092f87"><h2>RESERVATION/FORM NUMBER</h2></td><td class="border2"><?php echo $reserva['Reserva']['numero']; ?></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:140px;"><p style="font-size:12px;">Name and last name</td><td class="border" style="width:375px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['nombre_apellido']; ?></p></td>
            <td style="width:80px;"><p style="font-size:12px;">ID/Passport </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['dni']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:90px;"><p style="font-size:12px;">CUIT/TAX ID</td><td class="border" style="width:80px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['cuit']; ?></p></td>
            <td style="width:50px;"><p style="font-size:12px;">Phone</td> <td class="border" style="width:140px;"><p style="font-size:12px;"><?php echo $reserva['Cliente']['telefono']; ?></p></td>
            <td style="width:50px;"><p style="font-size:12px;">Email</td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['email']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:100px;"><p style="font-size:12px;">Real address</td><td class="border" style="width:280px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['direccion']; ?></p></td>
            <td style="width:80px;"><p style="font-size:12px;">Town/Province </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['localidad']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:80px;"><p style="font-size:12px;">Nationality</td><td class="border" style="width:200px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['nacionalidad']; ?></p></td>
            <td style="width:140px;"><p style="font-size:12px;">Residence address </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['domicilio_local']; ?></p></td>
        </tr>
    </table>
    <h2>DRIVERS DATA</h2>
    </div>
    <div class="content3">
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Name and last name:  <?php echo $reserva['Cliente']['ad_nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">ID/Passport:  <?php echo $reserva['Cliente']['ad_dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Phone: ').  $reserva['Cliente']['ad_telefono']; ?></p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor1.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">  <?php echo utf8_encode('Address: ').$reserva['Cliente']['ad_direccion']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Town/Province:  <?php echo $reserva['Cliente']['ad_localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;">Driver License Number:  <?php echo $reserva['Cliente']['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Expiration:  <?php echo $reserva['Cliente']['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">  <?php echo utf8_encode('Place of issue: ').$reserva['Cliente']['lugar_emision']; ?></p></td>
        </tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>

    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Name and last name:  <?php echo $reserva['ReservaConductor'][0]['nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">ID/Passport: <?php echo $reserva['ReservaConductor'][0]['dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"> <?php echo utf8_encode('Phone: ');?> <?php echo $reserva['ReservaConductor'][0]['telefono']; ?></p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor2.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Address: ');?> <?php echo $reserva['ReservaConductor'][0]['direccion']; ?> </p></td>
            <td class="border2"><p style="font-size:12px;">Town/Province:  <?php echo $reserva['ReservaConductor'][0]['localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;">Driver License Number: <?php echo $reserva['ReservaConductor'][0]['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Expiration:  <?php echo $reserva['ReservaConductor'][0]['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Place of issue: ');?><?php echo $reserva['ReservaConductor'][0]['lugar_emision']; ?> </p></td>
        </tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Name and last name:  <?php echo $reserva['ReservaConductor'][1]['nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">ID/Passport: <?php echo $reserva['ReservaConductor'][1]['dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Phone: ');?> <?php echo $reserva['ReservaConductor'][1]['telefono']; ?></p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor3.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Address: ');?><?php echo $reserva['ReservaConductor'][1]['direccion']; ?>  </p></td>
            <td class="border2"><p style="font-size:12px;">Town/Province:  <?php echo $reserva['ReservaConductor'][1]['localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;">Driver License Number: <?php echo $reserva['ReservaConductor'][1]['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Expiration:  <?php echo $reserva['ReservaConductor'][1]['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Place of issue: ');?>  <?php echo $reserva['ReservaConductor'][1]['lugar_emision']; ?></p></td>
        </tr>
    </table>
    </div>
    <div class="content2">
    <h2>RESERVATION DATA</h2>
    <table width="100%" class="test">
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">Unit: <?php echo $reserva['Unidad']['unidadContrato']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Total passengers:  <?php echo $reserva['Reserva']['pax_adultos'] + $reserva['Reserva']['pax_menores'] ; ?></p></td>
        </tr>
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">Pick up date and time: <?php echo $reserva['Reserva']['retiro'].' '. $reserva['Reserva']['hora_retiro']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Pick up location:  <?php echo $reserva['Lugar_Retiro']['lugar']; ?></p></td>
        </tr>
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Drop off date and time: '). $reserva['Reserva']['devolucion'].' '.$reserva['Reserva']['hora_devolucion']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"> <?php echo utf8_encode('Drop off location: ').$reserva['Lugar_Devolucion']['lugar']; ?></p></td>
        </tr>
    </table>
    <h2>Coverage. Insurance included (the amount of the Waiver is fixed on the back)</h2>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" style="width:245px;"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER</p></td>
		    <td class="border2" style="width:275px;"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover_plus'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER PLUS</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover_advance'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER ADVANCE</p></td>
    	</tr>
    </table>
    <h2>Extras in advance</h2>

    <?php
     //print_r($reserva['ReservaExtra']);
    //if(count($reserva['ReservaExtra']) > 0){
    	$tasa_aeropuerto = 0;
    	$conductor_adicional = 0;
    	$gps = 0;
    	$butaca_bebe = 0;
    	$porta_ski = 0;
    	$cadenas_nieve=0;
    	foreach($reserva['ReservaExtra'] as $extra){
    		if($extra['extra_id']==1){
    			$tasa_aeropuerto = 1;
    		}
    		if($extra['extra_id']==4){
    			$conductor_adicional = 1;
    		}
    		if($extra['extra_id']==5){
    			$gps = 1;
    		}
    		if($extra['extra_id']==2){
    			$butaca_bebe = 1;
    		}
    		if($extra['extra_id']==6){
    			$porta_ski = 1;
    		}
    		if($extra['extra_id']==3){
    			$cadenas_nieve = 1;
    		}
    	}
    //}
    ?>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($tasa_aeropuerto ?'check_circle.png':'uncheck_circle.png'); ?>  Airport fee </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($conductor_adicional ?'check_circle.png':'uncheck_circle.png'); ?>  Aditional driver</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image($gps ?'check_circle.png':'uncheck_circle.png'); ?>  GPS </p></td>
    	</tr>
    	<tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($butaca_bebe ?'check_circle.png':'uncheck_circle.png'); ?>  <?php echo utf8_encode('Baby seat');?>  </p></td>
		    <!--<td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($porta_ski ?'check_circle.png':'uncheck_circle.png'); ?>  Ski locker</p></td>-->
		    <td class="border2" colspan="2"><p style="font-size:12px;"><?php echo $this->Html->image($cadenas_nieve ?'check_circle.png':'uncheck_circle.png'); ?>  Others </p></td>
    	</tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Total rent</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo '$'.$total; ?></p></td>
        </tr>

    </table>
     <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Mileage</p></td>
            <td style="width:250px;" class="border2"><p style="font-size:12px;">Pick Up:</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Drop off: ');?></p></td>
        </tr>

    </table>
     <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Fuel</p></td>
            <td style="width:250px;" class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>   Diesel:</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>   Gasoline:</p></td>
        </tr>

    </table>
    <?php echo $this->Html->image('combustible_EN.PNG'); ?>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:500px;color: #fff;background: #092f87;"><p style="font-size:12px;"><?php echo utf8_encode('Refunds extras');?></p></td>

            <td class="border2">TOTAL $</p></td>
        </tr>

    </table>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Extra hour $ </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Extra Km $</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png').utf8_encode('  Fuel replenishment (1/8) $'); ?> </p></td>
    	</tr>
    	<tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Special wash $  </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Out-of-hours assistance $</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png').utf8_encode('  Repair $'); ?></p></td>
    	</tr>
    </table>

    <?php echo $this->Html->image('firma_EN.PNG'); ?>
    </div>

</div>
<?php echo $this->Html->image('contrato_dorso_EN.jpg'); ?>
<div class="content">
	<?php echo $this->Html->image('logo_contrato.png'); ?>

    <div class="content2">
    <table width="100%"><tr><td style="width:350px; background-color:#092f87"><h2 style="width:320px;">TITULAR DA RESERVA</h2></td><td style="width:25px;"></td><td style="background-color:#092f87"><h2><?php echo utf8_encode('N� DE RESERVA / FORMUL�RIO'); ?></h2></td><td class="border2"><?php echo $reserva['Reserva']['numero']; ?></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:140px;"><p style="font-size:12px;">Nome e sobrenome</td><td class="border" style="width:375px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['nombre_apellido']; ?></p></td>
            <td style="width:80px;"><p style="font-size:12px;">RG / Passaporte </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['dni']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:90px;"><p style="font-size:12px;">CPF/CNPJ</td><td class="border" style="width:80px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['cuit']; ?></p></td>
            <td style="width:50px;"><p style="font-size:12px;">Telefone</td> <td class="border" style="width:140px;"><p style="font-size:12px;"><?php echo $reserva['Cliente']['telefono']; ?></p></td>
            <td style="width:50px;"><p style="font-size:12px;">E-mail</td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['email']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:130px;"><p style="font-size:12px;"><?php echo utf8_encode('Endere�o residencial'); ?></td><td class="border" style="width:250px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['direccion']; ?></p></td>
            <td style="width:80px;"><p style="font-size:12px;">Localidade/Estado </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['localidad']; ?></p></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="width:80px;"><p style="font-size:12px;">Nacionalidade</td><td class="border" style="width:200px;"><p style="font-size:12px;"> <?php echo $reserva['Cliente']['nacionalidad']; ?></p></td>
            <td style="width:140px;"><p style="font-size:12px;"><?php echo utf8_encode('Endere� o local'); ?> </td> <td class="border"><p style="font-size:12px;"><?php echo $reserva['Cliente']['domicilio_local']; ?></p></td>
        </tr>
    </table>
    <h2>DADOS MOTORISTAS</h2>
    </div>
    <div class="content3">
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Nome e Sobrenome:  <?php echo $reserva['Cliente']['ad_nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">RG/Passaporte:  <?php echo $reserva['Cliente']['ad_dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Telefone: ').  $reserva['Cliente']['ad_telefono']; ?></p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor1.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">  <?php echo utf8_encode('Endere�o: ').$reserva['Cliente']['ad_direccion']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Localidade / Estado:  <?php echo $reserva['Cliente']['ad_localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;"><?php echo utf8_encode('N� Carteira de motorista: ').$reserva['Cliente']['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Vencimento:  <?php echo $reserva['Cliente']['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">  <?php echo utf8_encode('Local de emiss�o: ').$reserva['Cliente']['lugar_emision']; ?></p></td>
        </tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>

    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Nome e Sobrenome:  <?php echo $reserva['ReservaConductor'][0]['nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">RG/Passaporte: <?php echo $reserva['ReservaConductor'][0]['dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"> <?php echo utf8_encode('Telefone: ');?> <?php echo $reserva['ReservaConductor'][0]['telefono']; ?></p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor2.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Endere�o: ');?> <?php echo $reserva['ReservaConductor'][0]['direccion']; ?> </p></td>
            <td class="border2"><p style="font-size:12px;">Localidade / Estado:  <?php echo $reserva['ReservaConductor'][0]['localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;"><?php echo utf8_encode('N� Carteira de motorista: ');?><?php echo $reserva['ReservaConductor'][0]['nro_licencia_de_conducir']; ?></p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Vencimento:  <?php echo $reserva['ReservaConductor'][0]['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Local de emiss�o: ');?> <?php echo $reserva['ReservaConductor'][0]['lugar_emision']; ?></p></td>
        </tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:320px;"><p style="font-size:12px;">Nome e Sobrenome:  <?php echo $reserva['ReservaConductor'][1]['nombre_apellido']; ?></p></td>
            <td class="border2" style="width:200px;"><p style="font-size:12px;">RG/Passaporte: <?php echo $reserva['ReservaConductor'][1]['dni']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Telefone: ');?> <?php echo $reserva['ReservaConductor'][1]['telefono']; ?></p></td>
        </tr>
    </table>
     <table width="100%" class="test">
        <tr>
        	<td style="width:10px;"></td>
        	<td style="width:30px;"><?php echo $this->Html->image('conductor3.PNG', array('width'=>'30px','height'=>'30px')); ?></td>
        	<td style="width:10px;"></td>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Endere�o: ');?>  <?php echo $reserva['ReservaConductor'][1]['direccion']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Localidade / Estado:  <?php echo $reserva['ReservaConductor'][1]['localidad']; ?></p></td>

        </tr>
    </table>
    <table width="100%" class="test">
        <tr>
        	<td style="width:25px;"></td>
        	<td style="width:25px;"></td>
            <td class="border2" style="width:280px;"><p style="font-size:12px;"><?php echo utf8_encode('N� Carteira de motorista: ');?><?php echo $reserva['ReservaConductor'][1]['nro_licencia_de_conducir']; ?> </p></td>
            <td class="border2" style="width:170px;"><p style="font-size:12px;">Vencimento:  <?php echo $reserva['ReservaConductor'][1]['vencimiento']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Local de emiss�o: ');?>  <?php echo $reserva['ReservaConductor'][1]['lugar_emision']; ?></p></td>
        </tr>
    </table>
    </div>
    <div class="content2">
    <h2>DADOS DA RESERVA</h2>
    <table width="100%" class="test">
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Ve�culo: ').$reserva['Unidad']['unidadContrato']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Total de passageiros:  <?php echo $reserva['Reserva']['pax_adultos'] + $reserva['Reserva']['pax_menores'] ; ?></p></td>
        </tr>
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;">Data e hora da retirada: <?php echo $reserva['Reserva']['retiro'].' '. $reserva['Reserva']['hora_retiro']; ?></p></td>
            <td class="border2"><p style="font-size:12px;">Local da retirada:  <?php echo $reserva['Lugar_Retiro']['lugar']; ?></p></td>
        </tr>
        <tr>
            <td class="border2" style="width:400px;"><p style="font-size:12px;"><?php echo utf8_encode('Data e hora da devolu��o: '). $reserva['Reserva']['devolucion'].' '.$reserva['Reserva']['hora_devolucion']; ?></p></td>
            <td class="border2"><p style="font-size:12px;"> <?php echo utf8_encode('Local da devolu��o: ').$reserva['Lugar_Devolucion']['lugar']; ?></p></td>
        </tr>
    </table>
    <h2><?php echo utf8_encode('Cobertura. Seguro inclu�do (o valor da franquia � fixada no verso)'); ?></h2>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" style="width:245px;"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER</p></td>
		    <td class="border2" style="width:275px;"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover_plus'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER PLUS</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image($reserva['Reserva']['discover_advance'] ?'check_circle.png':'uncheck_circle.png'); ?>  DISCOVER ADVANCE</p></td>
    	</tr>
    </table>
    <h2>Extras Antecipados</h2>

    <?php
     //print_r($reserva['ReservaExtra']);
    //if(count($reserva['ReservaExtra']) > 0){
    	$tasa_aeropuerto = 0;
    	$conductor_adicional = 0;
    	$gps = 0;
    	$butaca_bebe = 0;
    	$porta_ski = 0;
    	$cadenas_nieve=0;
    	foreach($reserva['ReservaExtra'] as $extra){
    		if($extra['extra_id']==1){
    			$tasa_aeropuerto = 1;
    		}
    		if($extra['extra_id']==4){
    			$conductor_adicional = 1;
    		}
    		if($extra['extra_id']==5){
    			$gps = 1;
    		}
    		if($extra['extra_id']==2){
    			$butaca_bebe = 1;
    		}
    		if($extra['extra_id']==6){
    			$porta_ski = 1;
    		}
    		if($extra['extra_id']==3){
    			$cadenas_nieve = 1;
    		}
    	}
    //}
    ?>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($tasa_aeropuerto ?'check_circle.png':'uncheck_circle.png'); ?>  Taxa Aeroporto </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($conductor_adicional ?'check_circle.png':'uncheck_circle.png'); ?>  <?php echo utf8_encode('Tanque de gasolina pr�-pago'); ?></p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image($gps ?'check_circle.png':'uncheck_circle.png'); ?>  GPS </p></td>
    	</tr>
    	<tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($butaca_bebe ?'check_circle.png':'uncheck_circle.png'); ?>  <?php echo utf8_encode('Cadeirinha Beb�');?>  </p></td>
		    <!--<td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image($porta_ski ?'check_circle.png':'uncheck_circle.png'); ?>  Porta-Ski</p></td>-->
		    <td class="border2" colspan="2"><p style="font-size:12px;"><?php echo $this->Html->image($cadenas_nieve ?'check_circle.png':'uncheck_circle.png'); ?>  Outros </p></td>
    	</tr>
    </table>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Total Aluguel</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo '$'.$total; ?></p></td>
        </tr>

    </table>
     <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;">Quilometragem</p></td>
            <td style="width:250px;" class="border2"><p style="font-size:12px;">Entrega:</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo utf8_encode('Devolu��o: ');?></p></td>
        </tr>

    </table>
     <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:250px;color: #fff;background: #092f87;"><p style="font-size:12px;"><?php echo utf8_encode('Combust�vel'); ?></p></td>
            <td style="width:250px;" class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>   Diesel:</p></td>
            <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>   Gasolina:</p></td>
        </tr>

    </table>
    <?php echo $this->Html->image('combustible_PO.PNG'); ?>
    <table width="100%"><tr><td></td></tr></table>
    <table width="100%">
        <tr>
            <td style="width:500px;color: #fff;background: #092f87;"><p style="font-size:12px;"><?php echo utf8_encode('Extras devolu��o'); ?></p></td>

            <td class="border2">TOTAL $</p></td>
        </tr>

    </table>
    <table width="100%" class="test">
        <tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Hora extra $ </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Km extra $</p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png').utf8_encode(' Reposi��o de combust�vel $'); ?> </p></td>
    	</tr>
    	<tr>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png'); ?>  Lavado especial $ </p></td>
		    <td class="border2" ><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png').utf8_encode(' Assist�ncia fora do hor�rio $');?></p></td>
		    <td class="border2"><p style="font-size:12px;"><?php echo $this->Html->image('uncheck_circle.png').utf8_encode('  Repara��o $'); ?></p></td>
    	</tr>
    </table>

    <?php echo $this->Html->image('firma_PO.PNG'); ?>
    </div>

</div>
<?php echo $this->Html->image('contrato_dorso_PO.jpg'); ?>
