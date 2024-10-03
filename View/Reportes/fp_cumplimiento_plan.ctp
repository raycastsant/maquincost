<div class="container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('cumplimiento_plan', array('class'=>'form-horizontal', 'url'=>'/reportes/cumplimiento_plan')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Parámetros del reporte Cumplimiento del plan'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('annos', array('div'=>array('class'=>'control-group'), 'name'=>'data[anno]', 'label'=>array('class'=>'control-label', 'text'=>'Año&nbsp;')));
        echo $this->Form->input('meses', array('div'=>array('class'=>'control-group'), 'name'=>'data[mes]', 'label'=>array('class'=>'control-label', 'text'=>'Mes&nbsp;')));
	?>
	</fieldset>
    
    <div class='form-actions'>
        <button type='submit' class='btn btn-primary'><i class='icon-search icon-white'></i>&nbsp;Mostrar</button>
    </div>	
</div>

<script>
    $("#cumplimiento_planAnnos").bind("change", function (event) 
    {        
        $.ajax(
        {
            async:true, data:$("#cumplimiento_planAnnos").serialize(), dataType:"html", 
            success:function (data, textStatus) 
            {
                $("#cumplimiento_planMeses").html(data);
            }, 
            type:"post", url:"\/maquincost\/planesmensuales\/getByAnno"
        });
        
        return false;
    });
    
    $('document').ready(function () 
    {
        anno = $("#cumplimiento_planAnnos").val();
        $("select#cumplimiento_planAnnos").val(anno).change();    
    });
</script>