<div class="calificacionoperarios container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Calificacionoperario', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar calificador de operario'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Nombre&nbsp;')));
		echo $this->Form->input('tarifa', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Tarifa&nbsp;')));
	?>
	</fieldset>
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/calificacionoperarios'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>