<div class="materiales container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Materiale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Add Materiale'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('tiposmateriale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'tiposmateriale_id&nbsp;')));
		echo $this->Form->input('codigo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'codigo&nbsp;')));
		echo $this->Form->input('descripcion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'descripcion&nbsp;')));
		echo $this->Form->input('um', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'um&nbsp;')));
		echo $this->Form->input('existencia', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'existencia&nbsp;')));
		echo $this->Form->input('precio_mn', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'precio_mn&nbsp;')));
		echo $this->Form->input('precio_mlc', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'precio_mlc&nbsp;')));
		echo $this->Form->input('fecha_ultima_salida', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_ultima_salida&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/materiales'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>