<div class="profcortes container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Profcorte', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Edit Profcorte'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('selectore_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'selectore_id&nbsp;')));
		echo $this->Form->input('profcorte', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'profcorte&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/profcortes'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>