<div class="velocidadrangos container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Velocidadrango', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4>Insertar rango de velocidad</h4>
        <p><?php echo $maquinanombre; ?></p> 
        </div>
        <br />
	<?php
		//echo $this->Form->input('maquina_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'maquina_id&nbsp;')));
        echo $this->Form->input('maquina_id', array('div'=>array('class'=>'control-group'),'class'=>'input','type'=>'hidden', 'value'=>$maquinaid));
		echo $this->Form->input('nombre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'nombre&nbsp;')));
		echo $this->Form->input('vel_min', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'vel_min&nbsp;')));
		echo $this->Form->input('vel_max', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'vel_max&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/velocidadrangos/index/<?php echo $maquinaid; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>