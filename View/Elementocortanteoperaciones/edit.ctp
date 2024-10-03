<div class="elementocortanteoperaciones container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Elementocortanteoperacione', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar operación'); ?></h4>
        <p>Elemento cortante: <?php echo $elementonombre; ?></p></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('operacione_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Operación&nbsp;')));
		//echo $this->Form->input('elementoscortante_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'elementoscortante_id&nbsp;')));
        echo $this->Form->input('elementoscortante_id', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'value'=>$elementoid));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/elementocortanteoperaciones/index/<?php echo $elementoid; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>