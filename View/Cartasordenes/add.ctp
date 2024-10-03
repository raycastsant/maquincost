<div class="cartasordenes container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Cartasordene', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Add Cartasordene'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('ordene_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'ordene_id&nbsp;')));
		echo $this->Form->input('cartastecnologica_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'cartastecnologica_id&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/cartasordenes'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>