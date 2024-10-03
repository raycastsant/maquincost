<div class="cartastecnologicas container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Cartastecnologica', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Edit Cartastecnologica'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('materiale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'materiale_id&nbsp;')));
		echo $this->Form->input('semiproductoforma_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'semiproductoforma_id&nbsp;')));
		echo $this->Form->input('maquina_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'maquina_id&nbsp;')));
		echo $this->Form->input('pieza_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'pieza_id&nbsp;')));
		echo $this->Form->input('codigo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'codigo&nbsp;')));
		echo $this->Form->input('piezamaquinada', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'piezamaquinada&nbsp;')));
		echo $this->Form->input('cantpiezas', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'cantpiezas&nbsp;')));
		echo $this->Form->input('urlplano', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'urlplano&nbsp;')));
		echo $this->Form->input('codigoplano', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'codigoplano&nbsp;')));
		echo $this->Form->input('semiproducto_diametro', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'semiproducto_diametro&nbsp;')));
		echo $this->Form->input('semiproducto_ancho', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'semiproducto_ancho&nbsp;')));
		echo $this->Form->input('semiproducto_largo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'semiproducto_largo&nbsp;')));
		echo $this->Form->input('semiproducto_peso_neto', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'semiproducto_peso_neto&nbsp;')));
		echo $this->Form->input('semiproducto_peso_bruto', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'semiproducto_peso_bruto&nbsp;')));
		echo $this->Form->input('timpo_prep', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'timpo_prep&nbsp;')));
		echo $this->Form->input('tiempo_total', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'tiempo_total&nbsp;')));
	?>
	</fieldset>
<div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/cartastecnologicas'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>