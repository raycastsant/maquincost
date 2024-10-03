<div class="container well well-not-padding" style = "width:500px">
<?php echo $this->Form->create('horas_hombre', array('class'=>'form-horizontal', 'url'=>'/reportes/horas_hombre')); ?>
	<fieldset>
		<div class="head-form "><h4></a><?php echo __('Parámetros del reporte Horas-hombre trabajadas'); ?></h4></div>
        <br />
	<?php
		echo $this->Form->input('desde', array('div'=>array('class'=>'control-group'), 'name'=>'data[desde]', 'class'=>'span2', 'id'=>'desde', 'label'=>array('class'=>'control-label', 'text'=>'Desde&nbsp;')));
        echo $this->Form->input('hasta', array('div'=>array('class'=>'control-group'), 'name'=>'data[hasta]', 'class'=>'span2', 'id'=>'hasta', 'label'=>array('class'=>'control-label', 'text'=>'Hasta&nbsp;')));
	?>
	</fieldset>
    
    <div class='form-actions'>
        <button type='submit' class='btn btn-primary'><i class='icon-search icon-white'></i>&nbsp;Mostrar</button>
    </div>	
</div>

<script>
    $(function() 
    {
		$("#desde").keypress(function(event)
        {
             event.preventDefault();
        });
		
		$("#hasta").keypress(function(event)
        {
             event.preventDefault();
        });
		
        $( "#desde" ).datepicker(
        {
            maxDate: "<?php echo date("Y-m-d"); ?>", 
            onClose: function( selectedDate ) 
            {
                $("#hasta").datepicker( "option", "minDate", selectedDate );
            }
        });
      
        $("#hasta").datepicker(
        {
            maxDate: "<?php echo date("Y-m-d"); ?>",
            onClose: function( selectedDate ) 
            {
                if(selectedDate != "")
                $("#desde").datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
</script>