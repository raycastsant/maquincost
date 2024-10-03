<div class="ordenesplanoperarios container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Ordenesplanoperario', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form ">
            <h4></a><?php echo __('Editar registro de operario'); ?></h4>
            <span class="label label-info label-medium">Orden: <?php echo $ordennumero; ?></span>
        </div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('ordene_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'hidden', 'value'=>$ordenId, 'label'=>array('class'=>'control-label', 'text'=>'ordene_id&nbsp;')));
		echo $this->Form->input('operario_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Operario&nbsp;')));
        echo $this->Form->input('cartasordene_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Carta tecnológica&nbsp;')));
		echo $this->Form->input('horas', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'id'=>'horas_viewvalue', 'disabled', 'label'=>array('class'=>'control-label', 'text'=>'Horas trabajadas (hr)&nbsp;')));
        echo $this->Form->input('horas', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'')));
        echo $this->Form->input('otros_tiempos', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Otros tiempos (hr)&nbsp;')));
		echo $this->Form->input('tarifa', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'id'=>'tarifa_viewvalue', 'disabled', 'label'=>array('class'=>'control-label', 'text'=>'Tarifa&nbsp;')));
        echo $this->Form->input('tarifa', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'')));
		echo $this->Form->input('fecha_inicio', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha de inicio&nbsp;')));
		echo $this->Form->input('fecha_terminacion', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha de terminación&nbsp;')));
	?>
	</fieldset>
    
    <hr />
    <div><center>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/ordenes/edit/<?php echo $ordenId; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </center></div>	
</div>

<script>
   //Actualiza la tarifa en dependencia del operario
    $("#OrdenesplanoperarioOperarioId").bind("change", function (event) 
    {        
        $.ajax(
        {
            async:true, data:$("#OrdenesplanoperarioOperarioId").serialize(), dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#OrdenesplanoperarioTarifa").prop('value', data);
                $("#tarifa_viewvalue").prop('value', data);
            }, 
            type:"post", url:"\/maquincost\/operarios\/getTarifaFromOperario_AJAX"
        });
        
        return false;
    });
    
   //Actualiza las horas en dependencia de la carta tecnologica
    $("#OrdenesplanoperarioCartasordeneId").bind("change", function (event) 
    {        
        $.ajax(
        {
            async:true, data:$("#OrdenesplanoperarioCartasordeneId").serialize(), dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#OrdenesplanoperarioHoras").prop('value', data);
                $("#horas_viewvalue").prop('value', data);
            }, 
            type:"post", url:"\/maquincost\/cartastecnologicas\/get_horas_trabajo_carta_AJAX"
        });
        
        return false;
    });
    
    $("#OrdenesplanoperarioFechaInicio").datepicker();
    $("#OrdenesplanoperarioFechaTerminacion").datepicker();
    
    $('document').ready(function () 
    {
        value = $("select#OrdenesplanoperarioOperarioId").val();
        $("select#OrdenesplanoperarioOperarioId").val(value).change();  
    });
    
</script>