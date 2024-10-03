<div class="planesanuales container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Planesanuale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar plan anual'); ?></h4></div>
        <br />
	<?php
        $y = date("Y");
        $m = date("m");
        $d = date("d");
		echo $this->Form->input('empresa', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Empresa&nbsp;')));
		echo $this->Form->input('taller', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Taller&nbsp;')));
      	echo $this->Form->input('anno', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'value'=>$y, 'label'=>array('class'=>'control-label', 'text'=>'Año&nbsp;')));
		echo $this->Form->input('fecha_elaboracion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'value'=>$y."-".$m."-".$d, 'id'=>'fecha_elaboracion', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha de elaboración&nbsp;')));
	?>
	</fieldset>
    
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/planesanuales'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>

<script>
    $("#fecha_elaboracion").datepicker();
    
    function setDate()
    {
        year = $("#PlanesanualeAnno").val();
        $("#fecha_elaboracion").datepicker("option", "minDate", year+"-1-1");
        $("#fecha_elaboracion").datepicker("option", "maxDate", year+"-12-31");   
        date = year+"-<?php echo date("m"); ?>-<?php echo date("d"); ?>";
        $("#fecha_elaboracion").prop("value", date); 
    }
    
    $("#PlanesanualeAnno").keyup(function() 
    {
        setDate();
    });
    
    $("#PlanesanualeAnno").click(function() 
    {
        setDate();
    });
</script>