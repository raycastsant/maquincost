<div class="planesmensuales container well well-not-padding" style = "width:680px">
<?php echo $this->Form->create('Planesmensuale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Editar plan mensual'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('id', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'id&nbsp;')));
	/*	echo $this->Form->input('anno', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'anno&nbsp;')));
		echo $this->Form->input('mes', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'mes&nbsp;')));
		echo $this->Form->input('empresa', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'empresa&nbsp;')));
		echo $this->Form->input('taller', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'taller&nbsp;')));
		echo $this->Form->input('fecha_elaboracion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'fecha_elaboracion&nbsp;')));*/
	?>
    
        <center><table cellpadding="8" cellspacing="8">
            <tr>
                <td style="text-align: right;">Empresa&nbsp;<input name="data[Planesmensuale][empresa]" class="input" maxlength="100" type="text" value="<?php echo $this->request->data['Planesmensuale']['empresa']; ?>" id="PlanesmensualeEmpresa"/></td>
                <td style="text-align: right;">Taller&nbsp;<input name="data[Planesmensuale][taller]" class="input" maxlength="100" type="text" value="<?php echo $this->request->data['Planesmensuale']['taller']; ?>" id="PlanesmensualeTaller"/></td>
            </tr>
            <tr>
                <td style="text-align: right;">Año&nbsp;<input name="data[Planesmensuale][anno]" class="input" value="<?php echo $this->request->data['Planesmensuale']['anno']; ?>" type="number" id="PlanesmensualeAnno"/></td>
                <td style="text-align: right;">Mes&nbsp;
                        <select name="data[Planesmensuale][mes]" class="input" id="PlanesmensualeMes">
                    <?php        
                        foreach($meses as $key=>$mes):
                        {  ?> 
                            <option value="<?php echo $key; ?>"><?php echo $mes; ?></option>              
                     <?php   
                        }endforeach;
                        ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">Fecha de elaboración&nbsp;<input name="data[Planesmensuale][fecha_elaboracion]" value="<?php echo $this->request->data['Planesmensuale']['fecha_elaboracion']; ?>" id="fecha_elaboracion" type="text"/></td>
            </tr>
        </table></center>
	</fieldset>
    
    <hr />
    <div><center>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/planesmensuales'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </center></div>	    
</div>

    <br />
    <center>
        <a class="btn btn-primary" href="/maquincost/planmensualregistros/add/<?php echo $this->request->data['Planesmensuale']['id']; ?>">
            <i class="icon-plus-sign icon-white"></i>&nbsp;Insertar registro
        </a>
    </center>
    <?php echo $this->element('planmensual_registros'); ?>

<script>
    $("#fecha_elaboracion").datepicker();   
    $("select#PlanesmensualeMes").val("<?php echo $this->request->data['Planesmensuale']['mes']; ?>");
    
    function setDate()
    {
        year = $("#PlanesmensualeAnno").val();
        $("#fecha_elaboracion").datepicker("option", "minDate", year+"-1-1");
        $("#fecha_elaboracion").datepicker("option", "maxDate", year+"-12-31");   
        date = year+"-<?php echo date("m"); ?>-<?php echo date("d"); ?>";
        $("#fecha_elaboracion").prop("value", date); 
    }
    
    $("#PlanesmensualeAnno").keyup(function() 
    {
         setDate();  
    });
    
    $("#PlanesmensualeAnno").click(function() 
    {
         setDate();  
    });
</script>