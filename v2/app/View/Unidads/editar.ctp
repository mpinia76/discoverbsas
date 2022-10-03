<?php
//agregar el calendario
$this->Js->buffer('$.datepicker.regional[ "es" ]');
$this->Js->buffer('$(".datepicker").datepicker({ dateFormat: "dd/mm/yy", altFormat: "yy-mm-dd" });');


//formulario
echo $this->Form->create(null, array('url' => '/unidads/crear','inputDefaults' => (array('div' => 'ym-gbox'))));

?>
<?php echo $this->Form->hidden('Unidad.id'); ?>


<div class="ym-grid">
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Unidad.categoria_id',array('empty' => 'Seleccionar', 'type'=>'select'));?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Unidad.marca');?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Unidad.modelo');?></div>
</div>
<div class="ym-grid">
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Unidad.patente'); ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Unidad.orden',array( 'style' => 'width:60px;')); ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Unidad.capacidad',array('style' => 'width:60px;')); ?></div>
    <div class="ym-g25 ym-gl"><?php echo $this->Form->input('Unidad.km',array( 'style' => 'width:80px;')); ?></div>
</div>
<div class="ym-grid">
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Unidad.habilitacion',array('class'=>'datepicker','type'=>'text'));?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Unidad.baja',array('class'=>'datepicker','type'=>'text'));?></div>
    <div class="ym-g33 ym-gl"><?php echo $this->Form->input('Unidad.periodo'); ?></div>


</div>
<div class="ym-grid">

    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Unidad.estado',array('default' => '1', 'label' => 'Activa')); ?></div>
    <div class="ym-g50 ym-gl"><?php echo $this->Form->input('Unidad.excluir',array('default' => '0', 'label' => 'Excluir de estadisticas')); ?></div>
</div>




<span id="botonGuardar" onclick="guardar('<?php echo $this->Html->url('/unidads/guardar.json', true);?>',$('form').serialize(),{id:'w_unidads',url:'v2/unidads/index'});" class="boton guardar">Guardar <img src="<?php echo $this->webroot; ?>img/loading_save.gif" class="loading" id="loading_save" /></span>
<?php echo $this->Form->end(); ?>

<script>

</script>
