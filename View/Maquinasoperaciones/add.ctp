<div class="maquinasoperaciones container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Maquinasoperacione', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Adicionar operación'); ?></h4>
        <p>Máquina: <?php echo $maquinanombre; ?></p></div>
        <br />
	<?php
		//echo $this->Form->input('maquina_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'maquina_id&nbsp;')));
        echo $this->Form->input('maquina_id', array('div'=>array('class'=>'control-group'),'class'=>'input','type'=>'hidden','value'=>$maquinaid));
		echo $this->Form->input('operacione_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Operación&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/maquinasoperaciones/index/<?php echo $maquinaid; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>