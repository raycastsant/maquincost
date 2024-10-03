<div class="ctregistros container well well-not-padding" style = "width:750px">
<?php echo $this->Form->create('Ctregistro', array('class'=>'form-horizontal', 'id'=>'CtregistroForm')); ?>
	<fieldset>
		<div class="head-form ">
            <h4><?php echo __('Editar registro de operación'); ?></h4>
            <span class="label label-info label-medium">Carta tecnológica: <?php echo $carta['Cartastecnologica']['codigo']; ?>&nbsp;&nbsp;&nbsp;Pieza: <?php echo $carta['Pieza']['nombre']; ?>&nbsp;&nbsp;&nbsp;Máquina: <?php echo $carta['Maquina']['nombre']; ?></span>
        </div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
        echo $this->Form->input('cartastecnologica_id', array('div'=>array('class'=>'control-group'), 'class'=>'input', 'type'=>'hidden', 'value'=>$carta['Cartastecnologica']['id']));
	?>
     <center>
        <table cellspacing="0" cellpadding="0" border="0" style="width: 700px;">
            <tr>
                <td>
                    <div id="operaciones_loading" style="display: none;"><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></center></div>
                    <div id="operaciones_input">
                        <div class="dropdown span">
                          <a class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;" title="Click para ver opciones">Operación&nbsp;</a>
                             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a onclick="updateOperaciones()" style="cursor: pointer;"><i class="icon-refresh"></i>&nbsp;Actualizar</a></li>
                                <li><a href="/maquincost/operaciones" target="_blank"><i class="icon-hand-right"></i>&nbsp;Gestionar</a></li>                      
                              </ul>
                        </div><?php echo $this->Form->input('operacione_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>''))); ?>
                    </div>
                </td>
                <td><?php echo $this->Form->input('tipooperacione_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>'Tipo&nbsp;'))); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('diametro_ini', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label-my', 'text'=>'Diámetro inicial (mm)&nbsp;'))); ?></td>
                <td><?php echo $this->Form->input('diametro_fin', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label-my', 'text'=>'Diámetro final (mm)&nbsp;'))); ?></td>
            </tr>
        </table>
        <hr style="margin: 5px 10px;" />
        <table cellspacing="0" cellpadding="0" border="0" style="width: 700px;">
            <tr>
                <td>
                    <div id="ecortantes_loading" style="display: none; width: 200px;"><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></center></div>
                    <div id="ecortantes_input">
                        <div class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;" title="Click para ver opciones">Elemento cortante&nbsp;</a>
                             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a onclick="updateECortantes()" style="cursor: pointer;"><i class="icon-refresh"></i>&nbsp;Actualizar</a></li>
                                <li><a href="/maquincost/elementoscortantes" target="_blank"><i class="icon-hand-right"></i>&nbsp;Gestionar</a></li>                      
                              </ul>
                        </div><?php echo $this->Form->input('elementoscortante_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>''))); ?>
                    </div>
                </td>
                <td>
                    <div id="iauxiliares_loading" style="display: none;"><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></center></div>
                    <div id="iauxiliares_input">
                        <div class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;" title="Click para ver opciones">Instrumento auxiliar&nbsp;</a>
                             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a onclick="updateIAuxiliares()" style="cursor: pointer;"><i class="icon-refresh"></i>&nbsp;Actualizar</a></li>
                                <li><a href="/maquincost/instrumentosauxiliares" target="_blank"><i class="icon-hand-right"></i>&nbsp;Gestionar</a></li>                      
                              </ul>
                        </div><?php echo $this->Form->input('instrumentosauxiliare_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>''))); ?>
                    </div>
                </td>
                <td>
                    <div id="imedicion_loading" style="display: none;"><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></center></div>
                    <div id="imedicion_input">
                        <div class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;" title="Click para ver opciones">Instrumento medición&nbsp;</a>
                             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a onclick="updateIMedicion()" style="cursor: pointer;"><i class="icon-refresh"></i>&nbsp;Actualizar</a></li>
                                <li><a href="/maquincost/instrumentosmedicions" target="_blank"><i class="icon-hand-right"></i>&nbsp;Gestionar</a></li>                      
                              </ul>
                        </div><?php echo $this->Form->input('instrumentosmedicion_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>''))); ?>
                    </div>
                </td>
            </tr>
        </table>
        <hr style="margin: 5px 10px;" />
        <table cellspacing="0" cellpadding="0" border="0" style="width: 700px;">
            <tr style="text-align: right;">
                <td><?php echo $this->Form->input('longitud_diametro', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'Longitud/Diámetro (mm)&nbsp;'))); ?></td>
                <td><?php echo $this->Form->input('longitud', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'Longitud (mm)&nbsp;'))); ?></td>
                <td><?php echo $this->Form->input('cantidad_pasadas', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'Cant. de pasadas&nbsp;'))); ?></td>
            </tr>
            <tr style="text-align: right;">
                <td>
                    <div class="control-group">
                        <label for="CtregistroAvance" class="control-label"><a href="#dialog_avances_table" role="button" data-toggle="modal" onclick="mostrar_avances_recomendados()" title="Click para ver recomendaciones"><i class="icon-share-alt"></i>&nbsp;Avance (mm/rpm)&nbsp;</a></label>
                        <input name="data[Ctregistro][avance]" value="<?php echo $this->request->data['Ctregistro']['avance']; ?>" class="span1" step="any" type="number" id="CtregistroAvance"/>
                    </div>
                    <?php //echo $this->Form->input('avance', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'Avance (mm/rpm)&nbsp;'))); ?></td>
                <td>
                    <div class="control-group">
                        <label for="CtregistroVelocidad" class="control-label"><a href="#dialog_velocidades_table" role="button" data-toggle="modal" onclick="mostrar_velocidades_recomendadas()" title="Click para ver recomendaciones"><i class="icon-share-alt"></i>&nbsp;Vel. de corte (m/min)&nbsp;</a></label>
                        <input name="data[Ctregistro][velocidad]" value="<?php echo $this->request->data['Ctregistro']['velocidad']; ?>" class="span1" step="any" type="number" id="CtregistroVelocidad"/>
                    </div>
                    <?php //echo $this->Form->input('velocidad', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'Vel. de corte(m/min)&nbsp;'))); ?></td>
                <td>
                    <div class="control-group">
                        <label for="CtregistroProfCorte" class="control-label"><a href="#dialog_profcortes_table" role="button" data-toggle="modal" onclick="mostrar_profcortes_recomendadas()" title="Click para ver recomendaciones"><i class="icon-share-alt"></i>&nbsp;Profundidad (mm)&nbsp;</a></label>
                        <input name="data[Ctregistro][prof_corte]" value="<?php echo $this->request->data['Ctregistro']['prof_corte']; ?>" class="span1" step="any" type="number" id="CtregistroProfCorte"/>
                    </div>
                    <?php //echo $this->Form->input('prof_corte', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'Profundidad (mm)&nbsp;'))); ?></td>
            </tr>
            <tr style="text-align: right;">
                <td><?php echo $this->Form->input('revoluciones', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'Revoluciones (rpm)&nbsp;'))); ?></td>
                <td><?php echo $this->Form->input('tiempo_corte', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'T. Corte (min)&nbsp;'))); ?></td>
                <td>
                   <div class="control-group">
                        <label for="CtregistroTiempoAuxiliar" class="control-label"><a href="#dialog_tauxiliares" role="button" data-toggle="modal" onclick="mostrar_tiempos_auxiliares()" title="Click para ver los tiempos auxiliares"><i class="icon-share-alt"></i>&nbsp;T. Auxiliar (min)&nbsp;</a></label>
                        <input name="data[Ctregistro][tiempo_auxiliar]" value="<?php echo $this->request->data['Ctregistro']['tiempo_auxiliar']; ?>" class="span1" step="any" type="number" id="CtregistroTiempoAuxiliar"/>
                    </div>
                    <?php //echo $this->Form->input('tiempo_auxiliar', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label', 'text'=>'T. Auxiliar (min)&nbsp;'))); ?></td>
            </tr>
        </table>
        </center>
	</fieldset>
    
    <div>
       <hr /> 
       <center> 
           <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
           <a class='btn' href='/maquincost/cartastecnologicas/edit/<?php echo $carta['Cartastecnologica']['id']; ?>/<?php echo $carta['Pieza']['id']; ?>'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
       </center>
    </div>
</div>

<br />

<!----------------- Dialogo de valores de avance recomendados --------------->
<div id="dialog_avances_table" class="modal hide fade" style="width: 690px;" tabindex="-1" role="dialog" aria-labelledby="insert_avance_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Avances recomendados</h3>
    </div>
    <div id="dialog_avances_body" class="modal-body">
    </div>
</div>
<!----------------- Dialogo de valores de velocidad recomendados --------------->
<div id="dialog_velocidades_table" class="modal hide fade" style="width: 690px;" tabindex="-1" role="dialog" aria-labelledby="insert_velocidad_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Velocidades recomendadas</h3>
    </div>
    <div id="dialog_velocidades_body" class="modal-body">
    </div>
</div>
<!----------------- Dialogo de valores de profundidad de corte recomendados --------------->
<div id="dialog_profcortes_table" class="modal hide fade" style="width: 690px;" tabindex="-1" role="dialog" aria-labelledby="insert_profcorte_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Profundidades de corte recomendadas</h3>
    </div>
    <div id="dialog_profcortes_body" class="modal-body">
    </div>
</div>
<!----------------- Dialogo de tiempos auxiliares --------------->
<div id="dialog_tauxiliares" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="insert_tauxiliar_label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Tiempos auxiliares</h3>
    </div>
    <div id="dialog_tauxiliares_body" class="modal-body">
    </div>
</div>

<script>
    var elementoCteFirstShow = true;  //Para controlar la primera vez que se muestra el formulario y poder establecer el 
                                      //elemento cortante del registro que se está editando
                                       
    //Actualiza el combo de elementos cortantes en dependencia de la operacion seleccionada
    $("#CtregistroOperacioneId").bind("change", function (event) 
    {        
        $.ajax(
        {
            async:true, data:$("#CtregistroOperacioneId").serialize(), dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#CtregistroElementoscortanteId").html(data);
                if(elementoCteFirstShow)
                {
                    $("#CtregistroElementoscortanteId").val("<?php echo $this->request->data['Ctregistro']['elementoscortante_id']; ?>");
                    elementoCteFirstShow = false;
                }
            }, 
            type:"post", url:"\/maquincost\/elementoscortantes\/getByOperacion"
        });
        
        return false;
    });
    
   //Muestra el dialogo de avances recomendados 
    function mostrar_avances_recomendados()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#dialog_avances_body').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')}, 
            data:null, dataType:"html", success:function (data, textStatus) 
            {
                $("#dialog_avances_body").html(data);
            }, 
            type:"post", url:"\/maquincost\/velocidadrangos\/getRecomendedAvances\/"+$("#CtregistroElementoscortanteId").val()+"\/"+
                             <?php echo $tipoMaterialId; ?>+"\/"+$("#CtregistroOperacioneId").val()+"\/"+$("#CtregistroTipooperacioneId").val()+
                             "\/"+<?php echo $carta['Maquina']['id']; ?>
        });
        
        return false;
    }
    
   //Muestra el dialogo de velocidades recomendadas 
    function mostrar_velocidades_recomendadas()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#dialog_velocidades_body').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')}, 
            data:null, dataType:"html", success:function (data, textStatus) 
            {
                $("#dialog_velocidades_body").html(data);
            }, 
            type:"post", url:"\/maquincost\/velocidadrangos\/getRecomendedVelocidades\/"+$("#CtregistroElementoscortanteId").val()+"\/"+
                             <?php echo $tipoMaterialId; ?>+"\/"+$("#CtregistroOperacioneId").val()+"\/"+$("#CtregistroTipooperacioneId").val()+
                             "\/"+<?php echo $carta['Maquina']['id']; ?>
        });
        
        return false;
    }
    
   //Muestra el dialogo de profundidades de corte recomendadas 
    function mostrar_profcortes_recomendadas()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#dialog_profcortes_body').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')}, 
            data:null, dataType:"html", success:function (data, textStatus) 
            {
                $("#dialog_profcortes_body").html(data);
            }, 
            type:"post", url:"\/maquincost\/velocidadrangos\/getRecomendedProfCortes\/"+$("#CtregistroElementoscortanteId").val()+"\/"+
                             <?php echo $tipoMaterialId; ?>+"\/"+$("#CtregistroOperacioneId").val()+"\/"+$("#CtregistroTipooperacioneId").val()+
                             "\/"+<?php echo $carta['Maquina']['id']; ?>
        });
        
        return false;
    }
    
   //Muestra el dialogo de tiempos auxiliares
    function mostrar_tiempos_auxiliares()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#dialog_tauxiliares_body').html('<center><div class="loading_gif span"></center><center><img src="/maquincost/img/loading.gif" alt="Loading..."/>Cargando información...</div></center>')}, 
            data:null, dataType:"html", success:function (data, textStatus) 
            {
                $("#dialog_tauxiliares_body").html(data);
            }, 
            type:"post", url:"\/maquincost\/tiemposauxiliares\/getTiemposAxiliaresAJAX"
        });
        
        return false;
    }
    
    //Actualiza el listado de operaciones
    function updateOperaciones()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#operaciones_loading').attr('style', ''); $('#operaciones_input').attr('style', 'display: none');}, 
            data:null, dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#CtregistroOperacioneId").html(data);
                $('#operaciones_loading').attr('style', 'display: none'); 
                $('#operaciones_input').attr('style', '');
                $("select#CtregistroOperacioneId").val("<?php echo $firstOp; ?>").change();
            }, 
            type:"post", url:"\/maquincost\/operaciones\/getOperaciones_AJAX\/<?php echo $carta['Maquina']['id']; ?>"
        });
    }
    
    //Actualiza el listado de elementos cortantes
    function updateECortantes()
    {
        $("select#CtregistroOperacioneId").val("<?php echo $firstOp; ?>").change(); 
    }
    
    //Actualiza el listado de instrumentos auxiliares
    function updateIAuxiliares()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#iauxiliares_loading').attr('style', ''); $('#iauxiliares_input').attr('style', 'display: none');}, 
            data:null, dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#CtregistroInstrumentosauxiliareId").html(data);
                $('#iauxiliares_loading').attr('style', 'display: none'); 
                $('#iauxiliares_input').attr('style', '');
            }, 
            type:"post", url:"\/maquincost\/instrumentosauxiliares\/getInstrumentosAuxiliares_AJAX"
        });
    }
    
    //Actualiza el listado de instrumentos de medicion
    function updateIMedicion()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#imedicion_loading').attr('style', ''); $('#imedicion_input').attr('style', 'display: none');}, 
            data:null, dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#CtregistroInstrumentosmedicionId").html(data);
                $('#imedicion_loading').attr('style', 'display: none'); 
                $('#imedicion_input').attr('style', '');
            }, 
            type:"post", url:"\/maquincost\/instrumentosmedicions\/getInstrumentosMedicion_AJAX"
        });
    }
   
   //Activar la primera operacion para actualizar el combo de elementos cortantes 
    $('document').ready(function () 
    {
        $("select#CtregistroOperacioneId").val("<?php echo $firstOp; ?>").change();    
    });
</script>