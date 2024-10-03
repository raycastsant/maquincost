<div class="tipousuarios container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Tipousuario', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Add Tipousuario'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('nivel', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'nivel&nbsp;')));
		echo $this->Form->input('descripcion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'descripcion&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/tipousuarios'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>