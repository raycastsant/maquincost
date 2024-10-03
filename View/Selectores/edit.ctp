<div class="selectores container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Selectore', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Edit Selectore'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('velocidadrango_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'velocidadrango_id&nbsp;')));
		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'nombre&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/selectores'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>