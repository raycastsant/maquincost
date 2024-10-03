<div class="planesanuales container well well-not-padding" style = "width:680px">
<?php echo $this->Form->create('Planesanuale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form"><h4></a><?php echo __('Editar plan anual'); ?></h4></div>
        
        <?php
     		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input'));
    	    $y = date("Y");
	   ?>
            <center><table cellpadding="8" cellspacing="8">
                <tr>
                    <td style="text-align: right;">Empresa&nbsp;<input name="data[Planesanuale][empresa]" class="input" maxlength="100" type="text" value="<?php echo $this->request->data['Planesanuale']['empresa']; ?>" id="PlanesanualeEmpresa"/></td>
                    <td style="text-align: right;">Taller&nbsp;<input name="data[Planesanuale][taller]" class="input" maxlength="100" type="text" value="<?php echo $this->request->data['Planesanuale']['taller']; ?>" id="PlanesanualeTaller"/></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Año&nbsp;<input name="data[Planesanuale][anno]" class="input" value="<?php echo $this->request->data['Planesanuale']['anno']; ?>" type="number" id="PlanesanualeAnno"/></td>
                    <td style="text-align: right;">Fecha de elaboración&nbsp;<input name="data[Planesanuale][fecha_elaboracion]" value="<?php echo $this->request->data['Planesanuale']['fecha_elaboracion']; ?>" id="fecha_elaboracion" type="text"/></td>
                </tr>
            </table></center>
	</fieldset>
    
    <hr />
    <div><center>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/planesanuales'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </center></div>	
</div>
    <br />
    <center>
        <a class="btn btn-primary" href="/maquincost/plananualregistros/add/<?php echo $this->request->data['Planesanuale']['id']; ?>">
            <i class="icon-plus-sign icon-white"></i>&nbsp;Insertar registro
        </a>
    </center>
    
    <?php echo $this->element('plananual_registros'); ?>
<div>

</div>
<script>
    $("#fecha_elaboracion").datepicker();

    function setDate()
    {
        year = $("#PlanesanualeAnno").val();
        $("#fecha_elaboracion").datepicker("option", "minDate", year+"-1-1");
        $("#fecha_elaboracion").datepicker("option", "maxDate", year+"-12-31");   
        date = year+"-<?php echo date("m"); ?>-<?php echo date("d"); ?>";
        $("#fecha_elaboracion").prop("value", date); 
    }
    
    $("#PlanesanualeAnno").keyup(function() 
    {
        setDate();
    });
    
    $("#PlanesanualeAnno").click(function() 
    {
        setDate();
    });
</script>