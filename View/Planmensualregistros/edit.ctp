<div class="planmensualregistros container well well-not-padding" style = "width:770px">
<?php echo $this->Form->create('Planmensualregistro', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar registro de plan mensual'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('planesmensuale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'type'=>'hidden', 'value'=>$planMensualId, 'label'=>array('text'=>'&nbsp;')));
        //echo $this->Form->input('costototal', array('div'=>array('class'=>'control-group'),'class'=>'input', 'id'=>'costototal', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'')));
        echo $this->Form->input('costounidad', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'type'=>'hidden', 'value'=>'0', 'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>'')));
        echo $this->Form->input('costototal', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'type'=>'hidden', 'value'=>'0', 'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>'')));
        echo $this->Form->input('matprim_pesototal', array('div'=>array('class'=>'control-group'),'class'=>'input', 'id'=>'matprim_pesototal', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'')));
        echo $this->Form->input('pieza_pesototal', array('div'=>array('class'=>'control-group'),'class'=>'input', 'id'=>'pieza_pesototal', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'')));
        //echo $this->Form->input('precio_material', array('div'=>array('class'=>'control-group'),'class'=>'input', 'name'=>'data[Ordene][precio_material]', 'id'=>'precio_material', 'type'=>'hidden', 'label'=>array('class'=>'control-label', 'text'=>'')));
    ?>
        <center><table cellpadding="3" cellspacing="1" style="width: 720px;" border="0">
            <tr>
                <td style="text-align: right;">Pieza</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('pieza_id', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Número de orden</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('numeroorden', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'value'=>$numeroorden, 'name'=>'data[Ordene][numero]', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Tipo de material</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('materiale_id', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?>
                <td style="text-align: right;">Cantidad de piezas</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('cantpiezas', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <!-- <tr>
                <td style="text-align: right;">Costo unitario</td>
                <td style="text-align: right; width: 100px;"><?php //echo $this->Form->input('costounidad', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'type'=>'hidden', 'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Costo total</td>
                <td style="text-align: right; width: 100px;"><?php //echo $this->Form->input('costototal', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'type'=>'hidden', 'class'=>'input', 'disabled', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr> -->
            <tr>
                <td style="text-align: right;">Materia prima peso unitario (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprim_pesounidad', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Materia prima peso total (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprim_pesototal', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'disabled', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Materia prima ancho (mm)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprim_ancho', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Materia prima largo (mm)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('matprim_largo', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Pieza peso unitario (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('pieza_pesounidad', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
                <td style="text-align: right;">Pieza peso total (kg)</td>
                <td style="text-align: right; width: 100px;"><?php echo $this->Form->input('pieza_pesototal', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'disabled', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">Observaciones</td>
                <td style="text-align: left;" colspan="3"><?php echo $this->Form->input('observaciones', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'span8', 'label'=>array('class'=>'control-label-3', 'text'=>''))); ?></td>
            </tr>
        </table></center>
	</fieldset>
    
    <hr />
    <div><center>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/planesmensuales/edit/<?php echo $planMensualId; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </center></div>	
</div>
<br />

<script>
    /*function setCostoTotal()
    {
         value = ($("#PlanmensualregistroCostounidad").val() * $("#PlanmensualregistroCantpiezas").val());
         $("#PlanmensualregistroCostototal").val(value);    
         $("#costototal").val(value);    
    }*/
    
    function setMatPrimaPesoTotal()
    {
         value = ($("#PlanmensualregistroMatprimPesounidad").val() * $("#PlanmensualregistroCantpiezas").val());
         $("#PlanmensualregistroMatprimPesototal").val(value);    
         $("#matprim_pesototal").val(value);    
    }
    
    function setPiezaPesoTotal()
    {
         value = ($("#PlanmensualregistroPiezaPesounidad").val() * $("#PlanmensualregistroCantpiezas").val());
         $("#PlanmensualregistroPiezaPesototal").val(value);    
         $("#pieza_pesototal").val(value);    
    }
    
   /* $("#PlanmensualregistroCostounidad").keyup(function() 
    {
        setCostoTotal();
    });
    
    $("#PlanmensualregistroCostounidad").click(function() 
    {
         setCostoTotal();  
    });*/
    
    $("#PlanmensualregistroMatprimPesounidad").keyup(function() 
    {
        setMatPrimaPesoTotal();
    });
    
    $("#PlanmensualregistroMatprimPesounidad").click(function() 
    {
         setMatPrimaPesoTotal();  
    });
    
    $("#PlanmensualregistroPiezaPesounidad").keyup(function() 
    {
        setPiezaPesoTotal();
    });
    
    $("#PlanmensualregistroPiezaPesounidad").click(function() 
    {
         setPiezaPesoTotal();  
    });
    
    $("#PlanmensualregistroCantpiezas").keyup(function() 
    {
        //setCostoTotal();
        setMatPrimaPesoTotal(); 
        setPiezaPesoTotal();  
    });
    
    $("#PlanmensualregistroCantpiezas").click(function() 
    {
         //setCostoTotal();  
         setMatPrimaPesoTotal(); 
         setPiezaPesoTotal();  
    });
    
   //Actualiza el costo de la materia prima en dependencia del tipo de material
   /*$("#PlanmensualregistroMaterialeId").bind("change", function (event) 
    {                
        $.ajax(
        {
            async:true, data:$("#PlanmensualregistroMaterialeId").serialize(), dataType:"html", 
            success:function (data, textStatus) 
            {
                //$("#PlanmensualregistroCostounidad").prop('value', data);
                //setCostoTotal();
                $("#precio_material").prop('value', data); 
            }, 
            type:"post", url:"\/maquincost\/materiales\/getCostoMaterial"
        });
        
        return false;
    });*/
    
    $('document').ready(function () 
    {
        value = $("select#PlanmensualregistroMaterialeId").val();
        $("select#PlanmensualregistroMaterialeId").val(value).change();  
    });
</script>