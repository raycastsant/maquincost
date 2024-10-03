<div class="tiposmateriales container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Tiposmateriale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar Tipo de Material'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('agrupadormateriale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Agrupador&nbsp;')));
		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Nombre&nbsp;')));
		echo $this->Form->input('resistencia_min', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Resistencia Min.&nbsp;')));
		echo $this->Form->input('resistencia_max', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Resistencia Max.&nbsp;')));
        echo $this->Form->input('um', array('div'=>array('class'=>'control-group'),'class'=>'input','placeholder'=>'Unidad de medida', 'label'=>array('class'=>'control-label', 'text'=>'UM de Resistencia&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/tiposmateriales'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>