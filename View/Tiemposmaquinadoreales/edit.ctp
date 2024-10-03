<div class="tiemposmaquinadoreales container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Tiemposmaquinadoreale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar tiempo real de maquinado'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('ordenreal_id', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'value'=>$ordenrealId, 'label'=>array('class'=>'control-label', 'text'=>'')));
		echo $this->Form->input('maquina_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Máquina&nbsp;')));
		echo $this->Form->input('tiempo_auxiliar', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Tiempo auxiliar (min)&nbsp;')));
		echo $this->Form->input('tiempo_corte', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Tiempo de corte (min)&nbsp;')));
	?>
	</fieldset>
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/ordenreals/edit/<?php echo $ordenrealId; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>