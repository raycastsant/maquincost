<div class="operarios container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Operario', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar Operario'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('calificacionoperario_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Calificador&nbsp;')));
		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Nombre&nbsp;')));
		echo $this->Form->input('dirección', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Dirección&nbsp;')));
		echo $this->Form->input('ci', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'number', 'label'=>array('class'=>'control-label', 'text'=>'CI&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/operarios'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>