<div class="well well-not-padding">
    <center><div class="cartastecnologicas well well-not-padding" style="width:100%">
    <?php 
        echo $this->Form->create('Cartastecnologica', array('class'=>'form-horizontal', 'type'=>'file')); 
        $imgH = 220;
        $imgW = 270; 
    ?>
    	<fieldset>
    		<!-- <div class="head-form "> -->
                <center>
                    <h4></a><?php echo __('Editar Carta Tecnológica'); ?></h4>
                    <span class="label label-info label-medium">Pieza: <?php echo $pieza['Pieza']['nombre']; ?></span>
                    <hr style="margin: 0 0;"/>
                </center>
            <!-- </div> -->
            <br />
    	<?php
            $urlplano = $this->request->data['Cartastecnologica']['urlplano'];
            
            echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
            echo $this->Form->input('pieza_id', array('div'=>array('class'=>'control-group'),'class'=>'input','type'=>'hidden','value'=>$pieza['Pieza']['id']));
            echo $this->Form->input('urlplano', array('class'=>'input','type'=>'hidden','value'=>$urlplano));
            
    	/*  echo $this->Form->input('tiempo_total', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'tiempo_total&nbsp;')));*/
    	?>
            <div class="span5">
                <div id="img_menu" class="dropdown"><a class="dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown">
                    <img src="/maquincost/img/planos/<?php echo $urlplano; ?>" style="width: <?php echo $imgW; ?>px; height: <?php echo $imgH; ?>px;" class="img-rounded img-polaroid" title="Imagen del plano" /></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="#" onclick="showFileInput()">Cambiar imagen</a></li>
                        <?php if(!is_null($urlplano))
                        {   ?>
                            <li><a target="_blank" href="/maquincost/img/planos/<?php echo $urlplano; ?>">Descargar imagen</a></li>                            
                       <?php }?>
                    </ul>
                </div>    
                
                <img id="img_plane" src="/maquincost/img/planos/<?php echo $urlplano; ?>" style="width: <?php echo $imgW; ?>px; height: <?php echo $imgH; ?>px; display: none;" class="img-rounded img-polaroid" title="Imagen del plano" />
                <?php echo $this->Form->input('file', array('div'=>array('class'=>'control-group', 'style'=>'display:none', 'id'=>'file_div'), 'type'=>'file', 'label'=>array('class'=>'control-label-my', 'text'=>'<b>Imagen:</b>&nbsp;'))); ?>
            </div> 
            
            <table style="width: 400px;" border="0" cellspacing="0" cellpadding="0">
                <tr><td><?php echo $this->Form->input('materiale_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Material&nbsp;'))); ?></td></tr>
                <tr><td><?php echo $this->Form->input('cantpiezas', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Cantidad de piezas&nbsp;'))); ?></td></tr>
                <tr><td>
                    <div id="maquinas_loading" style="display: none;"><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></center></div>
                    <div id="maquinas_input">
                        <div class="dropdown span"> 
                        <br />
                          <a class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;" title="Click para ver opciones">Máquina herramienta&nbsp;</a>
                             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a id="link_update_maquinas" onclick="updateMaquinas()" style="cursor: pointer;"><i class="icon-refresh"></i>&nbsp;Actualizar</a></li>
                                <li><a href="/maquincost/maquinas" target="_blank"><i class="icon-hand-right"></i>&nbsp;Gestionar</a></li>                      
                              </ul>
                        </div><?php echo $this->Form->input('maquina_id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>''))); ?>
                    </div>
                </td></tr>
                <tr><td><?php echo $this->Form->input('piezamaquinada', array('div'=>array('class'=>'control-group'),'type'=>'checkbox','class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Es una pieza maquinada&nbsp;'))); ?></td></tr>
                <tr><td><?php echo $this->Form->input('fecha_elaboracion', array('div'=>array('class'=>'control-group'), 'class'=>'span2', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha de elaboración&nbsp;'))); ?></td></tr>
                <tr><td><?php echo $this->Form->input('codigoplano', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Código del plano&nbsp;'))); ?></td></tr>
                <tr><td><?php echo $this->Form->input('codigo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Código de carta&nbsp;'))); ?></td></tr>
            </table>
            
            <hr style="margin: 10px 0; margin-top: 10px;"/>
            <table style="width: 750px;" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><?php echo $this->Form->input('timpo_prep', array('div'=>array('class'=>'control-group'),'class'=>'span1', 'label'=>array('class'=>'control-label-my', 'text'=>'Tiempo de preparación (min)&nbsp;'))); ?></td>
                    <td valign="top">T. Auxiliar <span class="label label-warning"><?php echo $tauxiliar; ?> min</span></td>
                    <td valign="top">T. Corte <span class="label label-warning"><?php echo $tcorte; ?> min</span></td>
                    <td valign="top"><b>T. Total</b> <span class="label label-important"><?php echo ($this->request->data['Cartastecnologica']['timpo_prep']+$tauxiliar+$tcorte); ?> min</span></td>                
                </tr>
            </table>
            
            <center>
                <table class="table-bordered table-condensed table-striped" style="width: 770px;" >
                    <th colspan="3">Semiproducto</th>
                    <tr>
                        <td>
                            <div id="formas_loading" style="display: none;"><center><img src="/maquincost/img/loading.gif" alt="Loading..."/></center></div>
                            <div id="formas_input">
                                <div class="dropdown span"> 
                                  <a class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;" title="Click para ver opciones">Forma&nbsp;</a>
                                     <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                        <li><a onclick="updateFormas()" style="cursor: pointer;"><i class="icon-refresh"></i>&nbsp;Actualizar</a></li>
                                        <li><a href="/maquincost/semiproductoformas" target="_blank"><i class="icon-hand-right"></i>&nbsp;Gestionar</a></li>                      
                                      </ul>
                                </div><?php echo $this->Form->input('semiproductoforma_id', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>''))); ?>
                            </div>
                        </td>
                        <td><?php echo $this->Form->input('semiproducto_ancho', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>'Ancho (mm)&nbsp;'))); ?></td>
                        <td><?php echo $this->Form->input('semiproducto_largo', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>'Largo (mm)&nbsp;'))); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('semiproducto_diametro', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>'Diámetro (mm)&nbsp;'))); ?></td>
                        <td><?php echo $this->Form->input('semiproducto_peso_neto', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>'Peso neto (kg)&nbsp;'))); ?></td>
                        <td><?php echo $this->Form->input('semiproducto_peso_bruto', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>'Peso bruto (kg)&nbsp;'))); ?></td>
                    </tr>
                </table>
            </center>
    	</fieldset>
        
        <div>
           <br />
           <center>
               <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
               <a class='btn' href='/maquincost/piezas'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
           </center>
        </div>
    </div></center>
    
    <br />
        <center>
            <a class="btn btn-primary btn-small" href="/maquincost/ctregistros/add/<?php echo $this->request->data['Cartastecnologica']['id']; ?>/<?php echo $this->request->data['Materiale']['tiposmateriale_id']; ?>">
                <i class="icon-plus-sign icon-white"></i>&nbsp;Insertar operación
            </a>
        </center>
         <?php echo $this->element('ct_registros'); ?>
    <br />
</div>

<script>
   //Muestra el fileInput para seleccionar el plano de la pieza
    function showFileInput()
    {
        $("#file_div").attr("style", "");
        $("#img_menu").attr("style", "display: none;");
        $("#img_plane").attr("style", "width: <?php echo $imgW; ?>px; height: <?php echo $imgH; ?>px;");
    }
    
    //Actualiza el listado de maquinas
    function updateMaquinas()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#maquinas_loading').attr('style', ''); $('#maquinas_input').attr('style', 'display: none');}, 
            data:null, dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#CartastecnologicaMaquinaId").html(data);
                $('#maquinas_loading').attr('style', 'display: none'); 
                $('#maquinas_input').attr('style', '');
            }, 
            type:"post", url:"\/maquincost\/maquinas\/getMaquinas_AJAX"
        });
    }
    
    //Actualiza el listado de formas de los semiproductos
    function updateFormas()
    {
        $.ajax(
        {
            async:true, beforeSend:function (XMLHttpRequest) {$('#formas_loading').attr('style', ''); $('#formas_input').attr('style', 'display: none');}, 
            data:null, dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#CartastecnologicaSemiproductoformaId").html(data);
                $('#formas_loading').attr('style', 'display: none'); 
                $('#formas_input').attr('style', '');
            }, 
            type:"post", url:"\/maquincost\/semiproductoformas\/getSemiproductoFormas_AJAX"
        });
    }
    
    $(function() 
    {
		$("#CartastecnologicaFechaElaboracion").keypress(function(event)
        {
             event.preventDefault();
        });
		
        $( "#CartastecnologicaFechaElaboracion" ).datepicker(
        {
            maxDate: "<?php echo date("Y-m-d"); ?>"
        });
    });
</script>