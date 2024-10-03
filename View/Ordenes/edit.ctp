<div class="ordenes container well well-not-padding" style = "width:798px">
<?php echo $this->Form->create('Ordene', array()); ?>
	<fieldset>
		<div class="head-form">
            <h4><?php echo __('Orden de trabajo (Plan)'); ?></h4>
            <span class="label label-info label-medium">Pieza: <?php echo $piezaData['Pieza']['nombre']; ?></span>
        </div>
        
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
		echo $this->Form->input('planmensualregistro_id', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'value'=>$this->request->data['Ordene']['planmensualregistro_id'], 'label'=>array('class'=>'control-label', 'text'=>'planmensualregistro_id&nbsp;')));
	/*	
		echo $this->Form->input('cant_materiales', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'cant_materiales&nbsp;')));        
		echo $this->Form->input('salario_plan', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'salario_plan&nbsp;')));
		echo $this->Form->input('tiempo_func_maquinas', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'tiempo_func_maquinas&nbsp;')));
		echo $this->Form->input('cerrada', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'cerrada&nbsp;')));*/
	?>
        <div class="span" style="margin: 10px 15px;"><button type='submit' class='btn btn-inverse btn-small'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button></div>
        <div style="float: right; margin: 10px 15px;" class="span5">
            <a href="/maquincost/ordenreals/edit/<?php echo $this->request->data['Ordenreal'][0]['id']?>"><i class="icon-arrow-right"></i>&nbsp;Seguimiento</a>
            &nbsp;<a href="/maquincost/ordenes"><i class="icon-list-alt"></i>&nbsp;Listar órdenes</a>
            <?php
             if($this->request->data['Planmensualregistro']['planificada'] === '1') 
             {   ?>
                &nbsp;<a href="/maquincost/planesmensuales/edit/<?php echo $this->request->data['Planmensualregistro']['planesmensuale_id']?>" target="_blank"><i class="icon-folder-close"></i>&nbsp;Plan mensual</a>
            <?php 
             } ?>
        </div>
        
        <center><table cellpadding="7" cellspacing="7" class="table table-borderedall" style="width: 770px;" border="0">
            <tr>
                <td>
                    <div class="span"><?php echo $this->Form->input('numero', array('class'=>'span2', 'label'=>array('text'=>'Número'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tipotrabajo_id', array('class'=>'span2', 'label'=>array('text'=>'Tipo de trabajo'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('cant_piezas', array('class'=>'span2', 'label'=>array('text'=>'Cantidad de piezas'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('laboriosidad', array('class'=>'span2', 'label'=>array('text'=>'Laboriosidad'))); ?></div>
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
                            <input name="data[Ordene][hora_solicitud]" class="span2" type="time" value="<?php echo $this->request->data['Ordene']['hora_solicitud']; ?>" id="OrdeneHoraSolicitud"/>
                        </div>
                   </div>
                </td>
            </tr> 
            <tr>
                <td>
                    <div class="span"><?php echo $this->Form->input('materiale_id', array('class'=>'span4', 'name'=>'data[Planmensualregistro][materiale_id]', 'label'=>array('text'=>'Tipo de material'))); ?></div>
                    <div class="span"><br /><a class="btn btn-success btn-small" href="#" id="link_update_precio" data-toggle="tooltip" title="Actualizar el precio del material en dependencia de la selección"><i class="icon-refresh icon-white"></i></a></div>
                    <div class="span"><div id="div_precio_loading"></div><div id="div_precio"><?php echo $this->Form->input('precio_material', array('class'=>'span2', 'label'=>array('text'=>'Precio del material'))); ?></div></div>
                    <div class="span"><?php echo $this->Form->input('peso_pieza', array('class'=>'span2', 'label'=>array('text'=>'Peso de la pieza (kg)'))); ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="span"><?php echo $this->Form->input('tarifa_proyectista', array('class'=>'span2', 'label'=>array('text'=>'Tarifa del proyectista'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tarifa_tecnologo', array('class'=>'span2', 'label'=>array('text'=>'Tarifa del tecnólogo'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tiempo_proyecto', array('class'=>'span2', 'label'=>array('text'=>'Tiempo proyecto (h)'))); ?></div>
                    <div class="span"><?php echo $this->Form->input('tiempo_tecnologia', array('class'=>'span2', 'label'=>array('text'=>'Tiempo tecnología (h)'))); ?></div>
                </td>
            </tr> 
        </table>
       
   <!------ Gastos -------> 
       <div id="div_gastos"></div>
    </fieldset>
    
    <div id="div_cartas_btn">
        <center><a class="btn btn-small" href="#" id="show_cartas_panel_link" data-toggle="tooltip" title="Mostrar el panel de selección de cartas tecnológicas"><i class="icon-tags"></i>&nbsp;Cartas tecnológicas</a></center>
    </div>
    
    <br />
    <center>
    <!------ Cartas tecnológicas -------------->
    <div class="panel" style="width: 730px; display: none;" id="cartas_panel">
        <button type="button" class="close" id="close_cartas_panel_btn" title="Cerrar panel"><i class="icon-remove-circle icon-white"></i>&nbsp;</button>
          <div class="panel-head">Cartas tecnológicas</div>
          <div id="cartas_div" style="overflow: scroll; height: 200px;"></div>
    </div>
    
    <!------ Tiempos de Maquinado -------------->
    <div class="panel" style="width: 730px;">
      <div class="panel-head">Tiempos de maquinado</div>
       <div id="div_tiempos" style="overflow: scroll; height: 150px;"></div>
    </div>
    
    <!------ Horas planificadas -------------->
     <div class="panel" style="width: 730px;">
      <div class="panel-head">Horas planificadas</div>
       <div id="div_horas" style="overflow: scroll; height: 200px;"></div>
       <a class="btn btn-small btn-primary" href="/maquincost/ordenesplanoperarios/add/<?php echo $this->request->data['Ordene']['id']; ?>"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a>
    </div>
    </center>
</div>

<!----------------- Dialogo de gestión de horas de los operarios --------------->
 <!--   <div id="dialog_operarios" class="modal hide fade" style="width: 520px;" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Insertar operario</h3>
        </div>
        <div id="dialog_operarios_body" class="modal-body">
                <?php //echo $this->Form->create('Ordenesplanoperario', array('class'=>'form-horizontal', 'id'=>'sdgdfgdfg')); ?>
            	  <fieldset>
                        <br />
                	<?php
                		/*echo $this->Form->input('ordene_id', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'value'=>$this->request->data['Ordene']['id'], 'label'=>array('class'=>'control-label', 'text'=>'')));
                		echo $this->Form->input('operario_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'operario_id&nbsp;')));
                		echo $this->Form->input('horas', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'horas&nbsp;')));
                		echo $this->Form->input('tarifa', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'tarifa&nbsp;')));
                		echo $this->Form->input('fecha_inicio', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_inicio&nbsp;')));
                		echo $this->Form->input('fecha_terminacion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_terminacion&nbsp;')));
                	*/?>
            	  </fieldset>
                
                <hr />
                <div><center>
                   <a class='btn btn-inverse' class='btn btn-inverse' onclick="saveOperariosForm()"><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</a>
                   <a class='btn' href='/maquincost/ordenesplanoperarios'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
                </center></div>
                <br /> 
         -      </div>  
        </div>
    </div> -->
    
<script>
    $("#OrdeneFechaInicio").datepicker();
    $("#OrdeneFechaFin").datepicker();
    $("#OrdeneFechaSolicitud").datepicker();
    
   //Actualiza el listado de cartas tecnologicas
    function updateCartasList(urltext) 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {vaciar_div();$('#cartas_div').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#cartas_div').html(data);
                   updateTiemposMaquinadoList();
                   updateOperariosList();
                   
                }, type:'post', url: urltext}); 
        return false;
    };
    
   //Actualiza el listado de tiempos de maquinado
    function updateTiemposMaquinadoList() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {vaciar_div_tiempos();$('#div_tiempos').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_tiempos').html(data);
                   
                }, type:'post', url: '\/maquincost\/cartastecnologicas\/get_tiempos_maquinado_pieza_AJAX\/<?php echo $piezaData['Pieza']['id']; ?>\/<?php echo $this->request->data['Ordene']['id']; ?>'}); 
        return false;
    };
    
   //Actualiza el listado de horas trabajadas por los operarios
    function updateOperariosList() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {vaciar_div_horas();$('#div_horas').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_horas').html(data);
                   updateGastos();
                   
                }, type:'post', url: '\/maquincost\/ordenes\/getOrdenesPlanOperarios_AJAX\/<?php echo $this->request->data['Ordene']['id']; ?>'}); 
        return false;
    };
    
   //Actualiza los gastos
    function updateGastos() 
    {
        $.ajax({async:true, beforeSend:function (XMLHttpRequest) {vaciar_div_gastos();$('#div_gastos').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:null, dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_gastos').html(data);
                   updateLaboriosidadValue();
                   
                }, type:'post', url: '\/maquincost\/ordenes\/updateOrdenGastos_AJAX\/<?php echo $this->request->data['Ordene']['id']; ?>\/<?php echo $this->request->data['Ordene']['cant_piezas']; ?>\/<?php echo $this->request->data['Ordene']['peso_pieza']; ?>\/<?php echo $this->request->data['Ordene']['precio_material']; ?>'}); 
        return false;
    };
    
   //Vacea el contenido el div de cartas tecnologicas 
    function vaciar_div()
    {
        $("#cartas_div").html("");
    };
    
   //Vacea el contenido el div de tiempos de maquinado
    function vaciar_div_tiempos()
    {
        $("#div_tiempos").html("");
    };
    
   //Vacea el contenido el div de horas trabajadas
    function vaciar_div_horas()
    {
        $("#div_horas").html("");
    };
    
   //Vacea el contenido el div de gastos
    function vaciar_div_gastos()
    {
        $("#div_gastos").html("");
    };
    
  //Envia el formulario de horas trabajadas de los operarios
  /*  function saveOperariosForm() 
    {
        $('#dialog_operarios').modal('hide');
        
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {vaciar_div_horas();$('#div_horas').html('<center><br /><br /><br /><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')} ,
                data:$("#OrdenesplanoperarioAddForm").serialize(), dataType:'html', success:function (data, textStatus) 
                {
                   $('#div_horas').html(data);
                   
                }, type:'post', url: '\/maquincost\/ordenesplanoperarios\/saveFormDialog_AJAX'}); 
        return false;
    };*/
    
   //Evento del botón que muestra el panel de cartas tecnológicas    
    $("#show_cartas_panel_link").bind("click", function (event) 
    {                
      $("#cartas_panel").attr('style', 'width: 730px;');
      $("#div_cartas_btn").attr('style', 'display: none;');
    });
    
   //Evento del botón que cierra el panel de cartas tecnológicas    
    $("#close_cartas_panel_btn").bind("click", function (event) 
    {                
      $("#cartas_panel").attr('style', 'width: 730px; display: none;');
      $("#div_cartas_btn").attr('style', '');
    });
    
   //Actualiza el valor de la laboriosidad
    function updateLaboriosidadValue()
    {                
        $.ajax(
        {
            async:true, data:null, dataType:"html", success:function (data, textStatus) 
            {
                $("#OrdeneLaboriosidad").prop('value', data);
            }, 
            type:"post", url:"\/maquincost\/ordenes\/getLaboriosidad_AJAX\/<?php echo $this->request->data['Ordene']['id']; ?>"
        });
        
        return false;
    };
    
   //Actualiza el costo del material en dependencia del tipo
    function updatePrecioMaterial()
    {           
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) 
            {
                $('#div_precio_loading').html('<center><br \><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></div></center>');
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
    
  //Actualiza el costo del material en dependencia del tipo
   /*$("#OrdeneMaterialeId").bind("change", function (event) 
    {           
        if(confirm("¿Desea que el sistema actualice el precio del material de forma automática?"))
        {
            $.ajax(
            {
                async:true, beforeSend:function (XMLHttpRequest) 
                {
                    $('#div_precio_loading').html('<center><br \><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></div></center>');
                    $('#div_precio').attr('style', 'display: none;');
                }, 
                data:$("#OrdeneMaterialeId").serialize(), dataType:"html", success:function (data, textStatus) 
                {
                    $('#div_precio_loading').html("");
                    $('#div_precio').attr('style', '');
                    $("#OrdenePrecioMaterial").prop('value', data);
                }, 
                type:"post", url:"\/maquincost\/materiales\/getCostoMaterial"
            });
        }
        
        return false;
    });*/
               
    $('document').ready(function () 
    {
        updateCartasList('\/maquincost\/cartastecnologicas\/get_cartas_from_pieza_ordenplan\/<?php echo $piezaData['Pieza']['id']; ?>\/<?php echo $this->request->data['Ordene']['id']; ?>');
        //updateOperariosList();
        
        $("select#OrdeneMaterialeId").val(<?php echo $this->request->data['Planmensualregistro']['materiale_id']; ?>).change(); 
    });
    
    $("#show_cartas_panel_link").tooltip();
    $("#link_update_precio").tooltip();
</script>