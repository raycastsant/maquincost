<div class="fuerzatrabajoordenes container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Fuerzatrabajoordene', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar horas reales trabajadas'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('operario_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Operario&nbsp;')));
		echo $this->Form->input('ordenreal_id', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'value'=>$ordenrealId, 'label'=>array('class'=>'control-label', 'text'=>'')));
		//echo $this->Form->input('formapago_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'formapago_id&nbsp;')));
		echo $this->Form->input('fechacomienzo', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha de comienzo&nbsp;')));
		echo $this->Form->input('fechaterminacion', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha de terminación&nbsp;')));
		echo $this->Form->input('totalhoras', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'value'=>'0', 'label'=>array('class'=>'control-label', 'text'=>'Horas trabajadas&nbsp;')));
        echo $this->Form->input('tarifa', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'id'=>'tarifa_viewvalue', 'disabled', 'label'=>array('class'=>'control-label', 'text'=>'Tarifa&nbsp;')));
		echo $this->Form->input('tarifa', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'Tarifa&nbsp;')));
       	echo $this->Form->input('salario', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'id'=>'salario_viewvalue', 'disabled', 'label'=>array('class'=>'control-label', 'text'=>'Salario&nbsp;')));
        echo $this->Form->input('salario', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'')));
		//echo $this->Form->input('importe', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'importe&nbsp;')));
	?>
	</fieldset>
    <div class='form-actions'>
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/ordenreals/edit/<?php echo $ordenrealId; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>

<script>
   //Actualiza el valor del salario en dependencia de la tarifa y las horas trabajadas
    function setSalario()
    {
        salario = $("#FuerzatrabajoordeneTarifa").val() * $("#FuerzatrabajoordeneTotalhoras").val();
        $("#salario_viewvalue").prop('value', salario);
        $("#FuerzatrabajoordeneSalario").prop('value', salario);
    }
    
   //Actualiza la tarifa en dependencia del operario
    $("#FuerzatrabajoordeneOperarioId").bind("change", function (event) 
    {        
        $.ajax(
        {
            async:true, data:$("#FuerzatrabajoordeneOperarioId").serialize(), dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#FuerzatrabajoordeneTarifa").prop('value', data);
                $("#tarifa_viewvalue").prop('value', data);
                setSalario();
            }, 
            type:"post", url:"\/maquincost\/operarios\/getTarifaFromOperario_AJAX\/Fuerzatrabajoordene"
        });
        
        return false;
    });
    
    $("#FuerzatrabajoordeneTotalhoras").click(function() 
    {
         setSalario();
    });
    
    $("#FuerzatrabajoordeneTotalhoras").keyup(function() 
    {
        setSalario();
    });
    
    $("#FuerzatrabajoordeneFechacomienzo").datepicker();
    $("#FuerzatrabajoordeneFechaterminacion").datepicker();
    
    $('document').ready(function () 
    {
        value = $("select#FuerzatrabajoordeneOperarioId").val();
        $("select#FuerzatrabajoordeneOperarioId").val(value).change();  
    });
</script>