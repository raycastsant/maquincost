<div class="materiales container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Materiale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar Material'); ?></h4></div>
        <br />
        <script>
$(function() 
{
    $("#MaterialeFechaUltimaSalida" ).datepicker();
});
</script>
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input'));
		echo $this->Form->input('tiposmateriale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Tipo de material&nbsp;')));
		echo $this->Form->input('codigo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Código&nbsp;')));
		echo $this->Form->input('descripcion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Descripción&nbsp;')));
		echo $this->Form->input('um', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Um&nbsp;')));
		echo $this->Form->input('existencia', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Existencia&nbsp;')));
		echo $this->Form->input('precio_mn', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Precio MN&nbsp;')));
		echo $this->Form->input('precio_mlc', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Precio MLC&nbsp;')));
		echo $this->Form->input('fecha_ultima_salida', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha última salida&nbsp;')));
	?>
	</fieldset>
    
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/materiales'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>