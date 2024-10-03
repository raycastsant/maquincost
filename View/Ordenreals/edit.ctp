<div class="ordenreals container well well-not-padding" style = "width:790px">
<?php echo $this->Form->create('Ordenreal', array()); ?>
	<fieldset>
		<div class="head-form ">
            <h4></a><?php echo __('Orden de trabajo (Real)'); ?></h4>
            <span class="label label-info label-medium">Pieza: <?php echo $piezaData['Pieza']['nombre']; ?></span>
        </div>
        
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
        echo $this->Form->input('consumo_salario', array('class'=>'span2', 'id'=>'consumo_salario', 'type'=>'hidden', 'label'=>array('text'=>'')));
		/* echo $this->Form->input('fecha_cierre', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_cierre&nbsp;'))); */
	?>
    <div class="span" style="margin: 10px 20px;"><button type='submit' class='btn btn-inverse btn-small'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button></div>
    <div style="float: right; margin: 10px 15px;" class="span8">
        <a href="/maquincost/ordenes/edit/<?php echo $this->request->data['Ordenreal']['ordene_id']; ?>"><i class="icon-qrcode"></i>&nbsp;Plan</a>
        &nbsp;<a href="/maquincost/ordenes"><i class="icon-list-alt"></i>&nbsp;Listar órdenes</a>
        <?php if($this->request->data['Ordene']['Planmensualregistro']['planificada'] === '1')
        { ?>
            &nbsp;<a href="/maquincost/planesmensuales/edit/<?php echo $this->request->data['Ordene']['Planmensualregistro']['planesmensuale_id']?>" target="_blank"><i class="icon-folder-close"></i>&nbsp;Plan mensual</a>
        <?php 
        } ?>    
        |&nbsp;<a href="/maquincost/reportes/reporte_orden/<?php echo $this->request->data['Ordenreal']['ordene_id']?>" title="Reporte de la orden" target="_blank"><i class="icon-report"></i>&nbsp;Reporte</a>
        &nbsp;<a style="display: none;" id="link_inf_recepcion" href="/maquincost/informerecepcions/view/<?php echo $this->request->data['Ordenreal']['id']?>" title="Informe de recepción de la pieza" target="_blank"><i class="icon-thumbs-up"></i>&nbsp;Informe de recepción</a>
    </div>
    
    <center><table cellpadding="7" cellspacing="7" class="table table-bordered" style="width: 750px;" border="0">
        <tr>
            <td><?php echo $this->Form->input('numero', array('class'=>'span2', 'value'=>$this->request->data['Ordene']['numero'], 'disabled', 'label'=>array('text'=>'Número'))); ?></td>
            <td><?php echo $this->Form->input('tipotrabajo_id', array('class'=>'span2', 'label'=>array('text'=>'Tipo de trabajo'))); ?></td>
            <td><?php echo $this->Form->input('piezas_elaboradas', array('class'=>'span2', 'label'=>array('text'=>'Piezas elaboradas'))); ?></td>
            <td><?php echo $this->Form->input('pieza_peso_unit', array('class'=>'span2', 'label'=>array('text'=>'Peso de la pieza (kg)'))); ?></td>           
        </tr>
        <tr>
            <td><?php echo $this->Form->input('fecha_inicio', array('class'=>'span2', 'type'=>'text', 'label'=>array('text'=>'Fecha inicio'))); ?></td>
            <td>
                <div class="input text">
                    <label for="OrdenrealHoraInicio">Hora inicio</label>
                    <input name="data[Ordenreal][hora_inicio]" class="span2" type="time" value="<?php echo $this->request->data['Ordenreal']['hora_inicio']; ?>" id="OrdenrealHoraInicio"/>
                </div>
            </td>
            <td><?php echo $this->Form->input('fecha_fin', array('class'=>'span2', 'type'=>'text', 'label'=>array('text'=>'Fecha fin'))); ?></td>
            <td>
                <div class="input text">
                    <label for="OrdenrealHoraFin">Hora fin</label>
                    <input name="data[Ordenreal][hora_fin]" class="span2" type="time" value="<?php echo $this->request->data['Ordenreal']['hora_fin']; ?>" id="OrdenrealHoraFin"/>
                </div>
            </td>
        </tr> 
        <!-- <tr>
            <td><?php echo $this->Form->input('gasto_materiales', array('class'=>'span2', 'label'=>array('text'=>'Gasto de materiales'))); ?></td>
            <td>
                <div id="div_gasto_salario" style="display: none;"><br /><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></center></div>
                <div id="div_gasto_salario_input"><?php echo $this->Form->input('consumo_salario', array('class'=>'span2', 'disabled', 'label'=>array('text'=>'Gasto de salario'))); ?></div>
            </td>
        </tr> -->
        <tr>
            <!-- <td><?php echo $this->Form->input('pieza_costo_unit', array('class'=>'span2', 'label'=>array('text'=>'Costo unitario de la pieza'))); ?></td> -->
            
        </tr> 
        <tr>
            <td colspan="2">
                <div class="span"><?php echo $this->Form->input('materiale_id', array('class'=>'span4', 'label'=>array('text'=>'Material de la pieza'))); ?></div>
                <div class="span"><br /><a class="btn btn-success btn-small" style="cursor: pointer;" id="link_update_precio" data-toggle="tooltip" title="Actualizar el precio del material en dependencia de la selección"><i class="icon-refresh icon-white"></i></a></div>
            </td>
            <td>
                <div id="div_precio_loading"></div>
                <div id="div_precio"><?php echo $this->Form->input('precio_material', array('class'=>'span2', 'label'=>array('text'=>'Precio del material'))); ?></div>
            </td>
            <td><?php echo $this->Form->input('mat_prim_peso_unit', array('class'=>'span2', 'label'=>array('text'=>'Peso del semiproducto (kg)'))); ?></td>
        </tr> 
    </table></center>
    
    <!------ Gastos -------> 
    <div id="div_gastos">
        <center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</center>
    </div>
    <br /><br /><br /><br />
    
    <!------ Tiempos de Maquinado Plan-------------->
    <div class="panel span" style="width: 305px; margin: 0 18px;">
      <div class="panel-head">Tiempos de maquinado (Plan)</div>
       <div id="div_tiempos_maq_plan" style="overflow: scroll; height: 177px;"></div>
    </div>
    
    <!------ Tiempos de Maquinado Real-------------->
    <div class="panel span" style="width: 400px; margin: 0 1px;">
      <div class="panel-head">Tiempos de maquinado (Real)</div>
       <div id="div_tiempos_maq_real" style="overflow: scroll; height: 150px;">
        <script>
            function disable_tiempos_buttons(flag)
            {
                
            }
        </script>
       </div>
       <center><a class="btn btn-small btn-primary" title="Insertar tiempo de maquinado real" id="btn_add_tmaquinado" data-toggle="tooltip" href="/maquincost/tiemposmaquinadoreales/add/<?php echo $this->request->data['Ordenreal']['id']; ?>"><i class="icon-time icon-white"></i>&nbsp;Insertar</a></center>
    </div>
    
    <!------ Horas trabajadas Reales-------------->
     <div class="panel span" style="width: 735px; margin-top: 10px;">
      <div class="panel-head">Horas reales trabajadas</div>
       <div id="div_horas_real" style="overflow: scroll; height: 200px;">
        <script>
            function disable_horas_buttons(flag)
            {
                
            }
        </script>
       </div>
       <center><a class="btn btn-small btn-primary" title="Insertar tiempo real trabajado" id="btn_add_horasreal" data-toggle="tooltip" href="/maquincost/fuerzatrabajoordenes/add/<?php echo $this->request->data['Ordenreal']['id']; ?>"><i class="icon-user icon-white"></i>&nbsp;Insertar</a></center>
    </div>
    
    <!------ Piezas y Materiales -------------->
     <div class="panel span" style="width: 735px; margin-top: 10px;">
      <div class="panel-head">Piezas y materiales</div>
       <div id="div_piezas_materiales" style="overflow: scroll; height: 180px;">
        <script>
            function disable_piezas_materiales_buttons(flag)
            {
                
            }
        </script>
       </div>
       <center><a class="btn btn-small btn-primary" title="Insertar registro de piezas y materiales" id="btn_add_piezas_materiales" data-toggle="tooltip" href="/maquincost/vales/add/<?php echo $this->request->data['Ordenreal']['id']; ?>"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></center>
    </div>
    
   <!-------- Otros datos ------------> 
   <div class="panel span" style="width: 735px; margin-top: 10px;">
    <div class="panel-head">Otros datos</div>
    <center><table cellpadding="4" cellspacing="4" class="table table-bordered" style="width: 730px;" border="0">
        <tr>
            <td><?php echo $this->Form->input('ueb', array('class'=>'span2', 'label'=>array('text'=>'UEB'))); ?></td>
            <td><?php echo $this->Form->input('responsable', array('class'=>'span2', 'label'=>array('text'=>'Responsable'))); ?></td>
            <td><?php echo $this->Form->input('equipo', array('class'=>'span2', 'type'=>'text', 'label'=>array('text'=>'Equipo'))); ?></td>
        </tr>
    </table></center>
   </div> 
   
    <div class="span" style="margin: 5px 45px; float: right;"><?php echo $this->Form->input('cerrada', array('div'=>array('class'=>'control-group span'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>''))); ?>&nbsp;<b>Cerrada</b></div>
   </fieldset>	
</div>
<br />

<script>
    $("#OrdenrealFechaInicio").datepicker();
    $("#OrdenrealFechaFin").datepicker();
    
   //Actualiza el listado de tiempos de maquinado Plan
    function updateTiemposMaquinadoPlan() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {$('#div_tiempos_maq_plan').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_tiempos_maq_plan').html(data);
                   updateTiemposMaquinadoReal();
                   
                }, type:'post', url: '\/maquincost\/cartastecnologicas\/get_tiempos_maquinado_pieza_AJAX\/<?php echo $piezaData['Pieza']['id']; ?>\/<?php echo $this->request->data['Ordene']['id']; ?>'}); 
        return false;
    };
    
   //Actualiza el listado de tiempos de maquinado Real
    function updateTiemposMaquinadoReal() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {$('#div_tiempos_maq_real').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_tiempos_maq_real').html(data);
                   updateOperariosRealList();
                   
                }, type:'post', url: '\/maquincost\/tiemposmaquinadoreales\/get_tiempos_maquinado_ordenreal_AJAX\/<?php echo $this->request->data['Ordenreal']['id']; ?>'}); 
        return false;
    };
    
   //Actualiza el listado de horas reales trabajadas por los operarios
    function updateOperariosRealList() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {$('#div_horas_real').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>');
                                                                  $('#div_gasto_salario').attr('style', '');
                                                                  $('#div_gasto_salario_input').attr('style', 'display: none;');  } ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_horas_real').html(data);
                   updatePiezasMaterialesList();
                   
                }, type:'post', url: '\/maquincost\/fuerzatrabajoordenes\/getOrdenesRealOperarios_AJAX\/<?php echo $this->request->data['Ordenreal']['id']; ?>'}); 
        return false;
    };
    
   //Actualiza el listado de piezas y materiales
    function updatePiezasMaterialesList() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {$('#div_piezas_materiales').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_piezas_materiales').html(data);
                   updateGastos();
                   
                }, type:'post', url: '\/maquincost\/vales\/get_Vales_AJAX\/<?php echo $this->request->data['Ordenreal']['id']; ?>'}); 
        return false;
    };
    
    //Actualiza el gasto de salario
   /* function updateGastoSalario() 
    {
        $.ajax({async:true, data:null, dataType:'html', success:function (data, textStatus) 
        {
            $('#div_gasto_salario').attr('style', 'display: none;');
            $('#div_gasto_salario_input').attr('style', ''); 
            $('#OrdenrealConsumoSalario').prop('value', data);
            $('#consumo_salario').prop('value', data);
           
        }, type:'post', url: '\/maquincost\/fuerzatrabajoordenes\/getOrdenReal_gasto_salario_AJAX\/<?php echo $this->request->data['Ordenreal']['id']; ?>'}); 
        return false;
    };*/
    
    $("#OrdenrealCerrada").click(function() 
    {
        disable_components();
    });
    
    function disable_components()
    {
        flag = $("#OrdenrealCerrada").prop('checked');
        $("#OrdenrealPiezasElaboradas").prop('disabled', flag);
        $("#OrdenrealFechaInicio").prop('disabled', flag);
        $("#OrdenrealFechaFin").prop('disabled', flag);
        $("#OrdenrealGastoMateriales").prop('disabled', flag);
        $("#OrdenrealHoraInicio").prop('disabled', flag);
        $("#OrdenrealHoraFin").prop('disabled', flag);
        $("#OrdenrealPiezaCostoUnit").prop('disabled', flag);
        $("#OrdenrealPiezaPesoUnit").prop('disabled', flag);
        $("#OrdenrealMatPrimPesoUnit").prop('disabled', flag);
        $("#OrdenrealTipotrabajoId").prop('disabled', flag);
        $("#OrdenrealMaterialeId").prop('disabled', flag);
        $("#link_update_precio").prop('disabled', flag);
        $("#OrdenrealPrecioMaterial").prop('disabled', flag);
        
        if(flag == true)
        {
          stylevalue = "display: none";
          $("#link_inf_recepcion").attr('style', '');
        }
        else
        {
          stylevalue = "";
          $("#link_inf_recepcion").attr('style', 'display: none');
        }
        
        $("#btn_add_horasreal").attr('style', stylevalue);        
        $("#btn_add_tmaquinado").attr('style', stylevalue);
        $("#btn_add_piezas_materiales").attr('style', stylevalue);
        
        disable_tiempos_buttons(flag);
        disable_horas_buttons(flag);
        disable_piezas_materiales_buttons(flag);
    }
    
   //Actualiza el costo del material en dependencia del tipo
    function updatePrecioMaterial()
    {           
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) 
            {
                $('#div_precio_loading').html('<br \><div class="loading_gif span"><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></div></center>');
                $('#div_precio').attr('style', 'display: none;');
            }, 
            data:$("#OrdenrealMaterialeId").serialize(), dataType:"html", success:function (data, textStatus) 
            {
                $('#div_precio_loading').html("");
                $('#div_precio').attr('style', '');
                $("#OrdenrealPrecioMaterial").prop('value', data);
            }, 
            type:"post", url:"\/maquincost\/materiales\/getCostoMaterial\/Ordenreal\/materiale_id"
        });
        
        return false;
    };
    
   //Evento del botón que actualiza el precio del material   
    $("#link_update_precio").bind("click", function (event) 
    {                
        updatePrecioMaterial();
    });
    
   //Actualiza los gastos
    function updateGastos() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {$('#div_gastos').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_gastos').html(data);
                   disable_components();
                   
                }, type:'post', url: '\/maquincost\/ordenreals\/updateOrdenRealGastos_AJAX\/<?php echo $this->request->data['Ordenreal']['id']; ?>\/<?php echo $this->request->data['Ordenreal']['piezas_elaboradas']; ?>\/<?php echo $this->request->data['Ordenreal']['mat_prim_peso_unit']; ?>\/<?php echo $this->request->data['Ordenreal']['precio_material']; ?>'}); 
        return false;
    };
        
    $('document').ready(function () 
    {
        //window.open("http://localhost/maquincost/ordenes/edit/2#", "dfgfdgdfg",",menubar,scrollbars,directories,scrollbars,resizable,location,height=400,width=400")
        updateTiemposMaquinadoPlan();
    });
    
    $('#btn_add_tmaquinado').tooltip();
    $('#btn_add_horasreal').tooltip();
    $('#btn_add_piezas_materiales').tooltip();
    $("#link_update_precio").tooltip();
</script>