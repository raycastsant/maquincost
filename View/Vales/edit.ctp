<div class="vales container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Vale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar gasto de piezas y materiales'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('materiale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Material&nbsp;')));
		//echo $this->Form->input('ordenreal_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'ordenreal_id&nbsp;')));
		echo $this->Form->input('cantidad', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Unidades&nbsp;')));
		//echo $this->Form->input('unidades', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'unidades&nbsp;')));
        echo $this->Form->input('precio', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'Precio&nbsp;')));
        echo $this->Form->input('precio', array('div'=>array('class'=>'control-group'),'class'=>'input', 'id'=>'precio_input', 'disabled', 'label'=>array('class'=>'control-label', 'text'=>'Precio&nbsp;')));
		echo $this->Form->input('importe', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'Importe&nbsp;')));
        echo $this->Form->input('importe', array('div'=>array('class'=>'control-group'),'class'=>'input', 'id'=>'importe_input', 'disabled', 'label'=>array('class'=>'control-label', 'text'=>'Importe&nbsp;')));
		echo $this->Form->input('no_solicitud', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Vale de entrada&nbsp;')));
		echo $this->Form->input('no_salida', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Vale de salida&nbsp;')));
		//echo $this->Form->input('fecha_solicitud', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_solicitud&nbsp;')));
		//echo $this->Form->input('fecha_salida', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_salida&nbsp;')));
	?>
	</fieldset>
    
    <div class='form-actions'>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/ordenreals/edit/<?php echo $ordenRealId; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </div>	
</div>

<script>
    function setImporte()
    {
        importe = ($("#ValePrecio").prop('value') * $("#ValeCantidad").prop('value'));
        $("#importe_input").prop('value', importe);
        $("#ValeImporte").prop('value', importe);
    }
    
    $("#ValeMaterialeId").bind("change", function (event) 
    {        
        $.ajax(
        {
            async:true, data:$("#ValeMaterialeId").serialize(), dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#precio_input").prop('value', data);
                $("#ValePrecio").prop('value', data);
                
                setImporte();
                
                /*importe = (data * $("#ValeCantidad").prop('value'));
                $("#importe_input").prop('value', importe);
                $("#ValeImporte").prop('value', importe);*/
            }, 
            type:"post", url:"\/maquincost\/materiales\/getCostoMaterial\/Vale\/materiale_id"
        });
        
        return false;
    });
    
    $("#ValeCantidad").click(function() 
    {
         setImporte();
    });
    
    $("#ValeCantidad").keyup(function() 
    {
        setImporte();
    });
    
    $('document').ready(function () 
    {
        value = $("select#ValeMaterialeId").val();
        $("select#ValeMaterialeId").val(value).change();  
    });
</script>