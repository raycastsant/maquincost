<div class="cartastecnologicas container well well-not-padding" style = "width:800px">
<?php echo $this->Form->create('Cartastecnologica', array('class'=>'form-horizontal', 'type'=>'file')); ?>
	<fieldset>
		<!-- <div class="head-form "> -->
            <center>
                <h4></a><?php echo __('Insertar Carta Tecnológica'); ?></h4>
                <span class="label label-info label-medium">Pieza: <?php echo $pieza['Pieza']['nombre']; ?></span>
                <hr style="margin: 0 0;"/>
            </center>
        <!-- </div> -->
        <br />
	<?php
        echo $this->Form->input('pieza_id', array('div'=>array('class'=>'control-group'),'class'=>'input','type'=>'hidden','value'=>$pieza['Pieza']['id']));
	/*  echo $this->Form->input('tiempo_total', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'tiempo_total&nbsp;')));*/
	?>
        
        <div class="span5">
            <img src="#" style="width: 200px; height: 150px" class="img-rounded img-polaroid" title="Imagen del plano" />
            <?php echo $this->Form->input('file', array('div'=>array('class'=>'control-group'), 'type'=>'file', 'label'=>array('class'=>'control-label-my', 'text'=>'<b>Imagen:</b>&nbsp;'))); ?>
        </div>
        <table style="width: 400px;" border="0">
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
            <tr><td><?php echo $this->Form->input('piezamaquinada', array('div'=>array('class'=>'control-group'),'type'=>'checkbox','class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>'Es una pieza maquinada&nbsp;'))); ?></td></tr>
            <td><?php echo $this->Form->input('timpo_prep', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Tiempo de preparación (min)&nbsp;'))); ?></td>
        </table>
        
        <table style="width: 790px;" border="0" cellspacing="6" cellpadding="6">
            <tr>
                <td><?php echo $this->Form->input('fecha_elaboracion', array('div'=>array('class'=>'control-group'), 'class'=>'span2', 'type'=>'text', 'label'=>array('class'=>'control-label-my', 'text'=>'Fecha de elaboración&nbsp;'))); ?></td>
                <td><?php echo $this->Form->input('codigoplano', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>'Código del plano&nbsp;'))); ?></td>
                <td><?php echo $this->Form->input('codigo', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label-my', 'text'=>'Código de carta&nbsp;')));?></td>                
            </tr>
        </table>
        
        <center>
            <table class="table-bordered table-condensed table-striped" style="width: 750px;" >
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
                    <td><?php echo $this->Form->input('semiproducto_peso_neto', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>'Peso neto&nbsp;'))); ?></td>
                    <td><?php echo $this->Form->input('semiproducto_peso_bruto', array('div'=>array('class'=>'control-group'),'class'=>'span2', 'label'=>array('class'=>'control-label-my', 'text'=>'Peso bruto&nbsp;'))); ?></td>
                </tr>
            </table>
        </center>
	</fieldset>
    
    <div>
        <hr />
       <center>
        <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
        <a class='btn' href='/maquincost/piezas'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
       </center>
    </div>	
</div>

<script>
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