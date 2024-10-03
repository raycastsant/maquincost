<div class="informerecepcions container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Informerecepcion', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form ">
            <h4></a><?php echo __('Crear informe de recepción'); ?></h4>
            <span class="label label-info label-medium">Orden: <?php echo $ordenreal['Ordene']['numero']; ?></span>
        </div>
        <br />
	<?php
		echo $this->Form->input('ordenreal_id', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'value'=>$ordenreal['Ordenreal']['id'], 'label'=>array('class'=>'control-label', 'text'=>'')));
		echo $this->Form->input('codigo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Código&nbsp;')));
		echo $this->Form->input('fecha', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha&nbsp;')));
		echo $this->Form->input('empresa', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Empresa&nbsp;')));
		echo $this->Form->input('unidad', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Unidad&nbsp;')));
	?>
	</fieldset>
    <div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a id="link_close" class='btn' href='#'><i class='icon-remove-sign'></i>&nbsp;Cerrar</a>
    </div>	
</div>

<script>   
    $("#InformerecepcionFecha").datepicker();

    $("#link_close").click(function() 
    {
        window.close();
    });
</script>