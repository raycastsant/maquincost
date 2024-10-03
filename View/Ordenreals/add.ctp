<div class="ordenreals container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Ordenreal', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Add Ordenreal'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('ordene_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'ordene_id&nbsp;')));
		echo $this->Form->input('piezas_elaboradas', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'piezas_elaboradas&nbsp;')));
		echo $this->Form->input('gasto_materiales', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'gasto_materiales&nbsp;')));
		echo $this->Form->input('fecha_inicio', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_inicio&nbsp;')));
		echo $this->Form->input('hora_inicio', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'hora_inicio&nbsp;')));
		echo $this->Form->input('fecha_fin', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_fin&nbsp;')));
		echo $this->Form->input('hora_fin', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'hora_fin&nbsp;')));
		echo $this->Form->input('fecha_cierre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_cierre&nbsp;')));
		echo $this->Form->input('consumo_salario', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'consumo_salario&nbsp;')));
		echo $this->Form->input('cerrada', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'cerrada&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/ordenreals'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>