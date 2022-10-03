<?php

//formulario
echo $this->Form->create(null, array('url' => '/descuentos/crear','inputDefaults' => (array('div' => 'ym-gbox'))));

?>
<?php echo $this->Form->hidden('Descuento.id'); ?>


<div class="ym-grid">
	<div class="ym-g80 ym-gl"><?php echo $this->Form->input('Descuento.descuento'); ?></div>
    
    
</div>
<div class="ym-grid">
	<div class="ym-g80 ym-gl"><?php echo $this->Form->input('Descuento.descuento_ingles'); ?></div>
    
    
</div>
<div class="ym-grid">
	<div class="ym-g80 ym-gl"><?php echo $this->Form->input('Descuento.descuento_portugues'); ?></div>
    
    
</div>

<div class="ym-grid">
	 
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.activo',array('label' => 'Disp. en venta on line espa&ntilde;ol')); ?></div>
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.activo_ingles',array('label' => 'Disp. en venta on line ingl&eacute;s')); ?></div>
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.activo_portugues',array('label' => 'Disp. en venta on line portugu&eacute;s')); ?></div>
	 
</div>

<div class="ym-grid">
	  
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.tarjeta',array('label' => 'Permite tarjeta espa&ntilde;ol')); ?></div>
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.tarjeta_ingles',array('label' => 'Permite tarjeta ingl&eacute;s')); ?></div>
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.tarjeta_portugues',array('label' => 'Permite tarjeta portugu&eacute;s')); ?></div>
	 
</div>

<div class="ym-grid">
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.coheficiente',array('label' => 'Coheficiente descuento')); ?></div>
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.parcial',array('label' => 'Coheficiente pago parcial')); ?></div>
	 <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Descuento.orden'); ?></div>
</div>





<span id="botonGuardar" onclick="guardar('<?php echo $this->Html->url('/descuentos/guardar.json', true);?>',$('form').serialize(),{id:'w_descuentos',url:'v2/descuentos/index'});" class="boton guardar">Guardar <img src="<?php echo $this->webroot; ?>img/loading_save.gif" class="loading" id="loading_save" /></span>
<?php echo $this->Form->end(); ?>

<script>

</script>