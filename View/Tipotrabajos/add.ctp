<div class="tipotrabajos container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Tipotrabajo', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar tipo de trabajo'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('descripcion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Descripción&nbsp;')));
	?>
	</fieldset>
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/tipotrabajos'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>