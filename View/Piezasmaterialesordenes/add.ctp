<div class="piezasmaterialesordenes container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Piezasmaterialesordene', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Add Piezasmaterialesordene'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('ordenreal_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'ordenreal_id&nbsp;')));
		echo $this->Form->input('vale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'vale_id&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/piezasmaterialesordenes'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>