<div class="planesmensuales container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('Planesmensuale', array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Insertar plan mensual'); ?></h4></div>
        <br />
	<?php
        $y = date("Y");
        $m = date("m");
        $d = date("d");
		echo $this->Form->input('anno', array('div'=>array('class'=>'control-group'),'class'=>'input', 'value'=>$y, 'label'=>array('class'=>'control-label', 'text'=>'Año&nbsp;')));
		//echo $this->Form->input('mes', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Mes&nbsp;')));
        ?>
        <div class="control-group">
            <label for="PlanesmensualeMes" class="control-label">Mes&nbsp;</label>
            <select name="data[Planesmensuale][mes]" class="input" id="PlanesmensualeMes">
    <?php        
        foreach($meses as $key=>$mes):
        {
        ?> 
            <option value="<?php echo $key; ?>"><?php echo $mes; ?></option>              
     <?php   
        }endforeach;
        ?>
            </select>
        </div>
     <?php
		echo $this->Form->input('empresa', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Empresa&nbsp;')));
		echo $this->Form->input('taller', array('div'=>array('class'=>'control-group'),'class'=>'input', 'label'=>array('class'=>'control-label', 'text'=>'Taller&nbsp;')));
		echo $this->Form->input('fecha_elaboracion', array('div'=>array('class'=>'control-group'),'class'=>'input', 'value'=>$y."-".$m."-".$d, 'id'=>'fecha_elaboracion', 'type'=>'text', 'label'=>array('class'=>'control-label', 'text'=>'Fecha de elaboración&nbsp;')));
	?>
	</fieldset>
    
    <hr />
    <div><center>
       <button type='submit' class='btn btn-inverse'><i class='icon-ok-sign icon-white'></i>&nbsp;Guardar</button>
       <a class='btn' href='/maquincost/planesmensuales'><i class='icon-remove-sign'></i>&nbsp;Cancelar</a>
    </center></div>	
</div>

<script>
    $("#fecha_elaboracion").datepicker();   
    
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