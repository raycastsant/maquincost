<div class="operarios container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('listado_elementos_cortantes', array('class'=>'form-horizontal', 'url'=>'/reportes/listado_elementos_cortantes')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Parámetros del reporte de elementos cortantes'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('elemento_id', array('div'=>array('class'=>'control-group'), 'name'=>'data[elemento_id]', 'id'=>'elemento_id', 'label'=>array('class'=>'control-label', 'text'=>'Seleccionar elemento&nbsp;')));
	?>
	</fieldset>
    
    <div class='form-actions'>
        <button type='submit' class='btn btn-primary'><i class='icon-search icon-white'></i>&nbsp;Mostrar</button>
    </div>	
</div>