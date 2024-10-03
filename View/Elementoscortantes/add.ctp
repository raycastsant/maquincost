<div class="elementoscortantes container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Elementoscortante', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar Elemento Cortante'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('materialelemento_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Material&nbsp;')));
		echo $this->Form->input('formascorte_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Forma de Corte&nbsp;')));
		echo $this->Form->input('tipoelementoscortante_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Tipo&nbsp;')));
		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Nombre&nbsp;')));
		echo $this->Form->input('descripcion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Descripción&nbsp;')));
		echo $this->Form->input('calzada', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'checkbox', 'label'=>array('class'=>'control-label', 'text'=>'Es calzada&nbsp;')));
	?>
	</fieldset>
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/elementoscortantes'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>