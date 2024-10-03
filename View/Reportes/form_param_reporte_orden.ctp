<div class="operarios container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('reporte_orden', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Parámetros del reporte de orden'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('ordene_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Seleccionar orden&nbsp;')));
	?>
	</fieldset>
    <center><a class="btn btn-link" target="_blank" href="/maquincost/ordenes"><i class='icon-list'></i>&nbsp;Listado de órdenes</a></center>
    <div class='form-actions'>
        <button type='submit' class='btn btn-primary'><i class='icon-search icon-white'></i>&nbsp;Mostrar</button>
    </div>	
</div>