<div class="ordenes container well well-not-padding" style = "width:798px">
<?php echo $this->Form->create('Ordene', array()); ?>
	<fieldset>
		<div class="head-form">
            <h4><?php echo __('Emitir orden de tabajo'); ?></h4>
            <span class="label label-info label-medium">Pieza
            <?php 
                if(is_null($pieza_id))
                 echo $this->Form->input('pieza_id', array('div'=>array('class'=>'control-group', 'style'=>' padding-top: 10px;'),'class'=>'input', 'label'=>array('class'=>'control-label-3', 'text'=>''))); 
                else
                {
                  echo ": <b>".$pieza_nombre."</b>"; 
                  echo $this->Form->input('pieza_id', array('class'=>'input', 'type'=>'hidden', 'value'=>$pieza_id)); 
                } 
            ?></span>
        </div>
        
        <div class="span" style="margin: 10px 15px;"><button type='submit' class='btn btn-inverse btn-small'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button></div>
        
        <center><table cellpadding="7" cellspacing="7" class="table table-borderedall" style="width: 770px;" border="0">
            <tr>
                <td>
                    <div class="span"><?php echo $this->Form->input('numero', array('class'=>'span2', 'value'=>$orden_number, 'label'=>array('text'=>'Número'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tipotrabajo_id', array('class'=>'span3', 'label'=>array('text'=>'Tipo de trabajo'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('cant_piezas', array('class'=>'span2', 'value'=>'0', 'label'=>array('text'=>'Cantidad de piezas'))); ?></div>
                    <!-- <div class="span"><?php //echo $this->Form->input('laboriosidad', array('class'=>'span2', 'label'=>array('text'=>'Laboriosidad'))); ?></div> -->
                   <!-- <div class="span"><?php //echo $this->Form->input('planificada', array('class'=>'input', 'label'=>array('text'=>''))); ?></div> 
                    <div class="span">Planificada</div> -->
                </td>
            </tr>
            <tr>
                <td>
                    <div class="span"><?php echo $this->Form->input('fecha_inicio', array('class'=>'span2', 'type'=>'text', 'label'=>array('text'=>'Fecha de inicio'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('fecha_fin', array('class'=>'span2', 'type'=>'text', 'label'=>array('text'=>'Fecha fin'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('fecha_solicitud', array('class'=>'span2', 'type'=>'text', 'label'=>array('text'=>'Fecha de solicitud'))); ?></div>
                    <div class="span">
                        <div class="input text">
                            <label for="OrdeneHoraSolicitud">Hora de solicitud</label>
                            <input name="data[Ordene][hora_solicitud]" class="span2" type="time" id="OrdeneHoraSolicitud"/>
                        </div>
                   </div>
                </td>
            </tr> 
            <tr>
                <td>
                    <div class="span"><?php echo $this->Form->input('materiale_id', array('class'=>'span4', 'label'=>array('text'=>'Tipo de material'))); ?></div>
                    <div class="span"><br /><a class="btn btn-success btn-small" href="#" id="link_update_precio" data-toggle="tooltip" title="Actualizar el precio del material en dependencia de la selección"><i class="icon-refresh icon-white"></i></a></div>
                    <div class="span"><div id="div_precio_loading"></div><div id="div_precio"><?php echo $this->Form->input('precio_material', array('class'=>'span2', 'label'=>array('text'=>'Precio del material'))); ?></div></div>
                    <div class="span"><?php echo $this->Form->input('peso_pieza', array('class'=>'span2', 'value'=>'0', 'label'=>array('text'=>'Peso de la pieza (kg)'))); ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="span"><?php echo $this->Form->input('tarifa_proyectista', array('class'=>'span2', 'value'=>'0', 'label'=>array('text'=>'Tarifa del proyectista'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tarifa_tecnologo', array('class'=>'span2', 'value'=>'0', 'label'=>array('text'=>'Tarifa del tecnólogo'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tiempo_proyecto', array('class'=>'span2', 'value'=>'0', 'label'=>array('text'=>'Tiempo proyecto (h)'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tiempo_tecnologia', array('class'=>'span2', 'value'=>'0', 'label'=>array('text'=>'Tiempo tecnología (h)'))); ?></div>
                </td>
            </tr> 
        </table>
</div>
<br />
    
<script>
    $("#OrdeneFechaInicio").datepicker();
    $("#OrdeneFechaFin").datepicker();
    $("#OrdeneFechaSolicitud").datepicker();
    
   //Actualiza el costo del material en dependencia del tipo
    function updatePrecioMaterial()
    {           
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) 
            {
                $('#div_precio_loading').html('<center><br \><div class="loading_gif span" style="width: 120px;"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></div></center>');
                $('#div_precio').attr('style', 'display: none;');
            }, 
            data:$("#OrdeneMaterialeId").serialize(), dataType:"html", success:function (data, textStatus) 
            {
                $('#div_precio_loading').html("");
                $('#div_precio').attr('style', '');
                $("#OrdenePrecioMaterial").prop('value', data);
            }, 
            type:"post", url:"\/maquincost\/materiales\/getCostoMaterial\/Planmensualregistro\/materiale_id"
        });
        
        return false;
    };
    
   //Evento del botón que actualiza el precio del material   
    $("#link_update_precio").bind("click", function (event) 
    {                
        updatePrecioMaterial();
    });
    
    $("#link_update_precio").tooltip();
</script>