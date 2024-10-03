<div class="cartastecnologicas index">
	<div class="span"><a class="btn btn-inverse" target="_blank" href="/maquincost/cartastecnologicas/index_pdf.pdf"><i class="icon-file icon-white"></i>&nbsp;Exportar a PDF</a></div>
    <h3><center><?php echo __('Listado de Cartas Tecnológicas'); ?></center></h3>
    <hr />
    <div class="span"><a class="btn btn-primary" href="/maquincost/cartastecnologicas/add_pieza_selector_form"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></div>
    <div style="float: right;" class="span11">
        <form class="form-search" action="/maquincost/cartastecnologicas/index" enctype="multipart/form-data" method="post" accept-charset="iso-8859-1">
         <div class="span">
              <strong>Campo</strong>
              <select name="data[field]" style="width: 90px;" id="filter_field">
                <option value="Cartastecnologica.codigo" selected="selected">Código</option>
                <option value="Cartastecnologica.fecha_elaboracion">Fecha</option>
                <option value="Maquina.nombre">Máquina</option>
                <option value="Pieza.nombre">Pieza</option>
              </select>
          </div>
          <div class="span" id="div_one_input">
              <strong>Contiene</strong>
              <?php
	               if(isset($value))
                    $inputvalue = 'value="'.$value.'"';
                   else
                    $inputvalue = '';
              ?>
              <input type="text" name="data[value]" <?php echo $inputvalue; ?> class="input-medium search-query"/>
          </div>
          <div class="span" id="div_two_inputs" style="display: none;">
            <?php
	               if(isset($value1))
                    $inputvalue1 = 'value="'.$value1.'"';
                   else
                    $inputvalue1 = '';
                    
                   if(isset($value2))
                    $inputvalue2 = 'value="'.$value2.'"';
                   else
                    $inputvalue2 = '';
            ?>
              <strong>Desde</strong>
              <input type="text" name="data[value1]" <?php echo $inputvalue1; ?> class="input-small search-query" id="desde"/>
              <strong>Hasta</strong>
              <input type="text" name="data[value2]" <?php echo $inputvalue2; ?> class="input-small search-query" id="hasta"/>
          </div>
          &nbsp;&nbsp;
          <button type="submit" class="btn btn-small"><i class="icon-filter"></i>&nbsp;Filtrar</button>
          <a class="btn btn-small" href="/maquincost/cartastecnologicas/index/1"><i class="icon-list"></i>&nbsp;Mostrar todos</a>
        </form>
    </div>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
		<th><?php echo __('No.'); ?></th>
        			
		<th><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
        <th><?php echo $this->Paginator->sort('Pieza.nombre', 'Pieza'); ?></th>
        <th><?php echo $this->Paginator->sort('Maquina.nombre', 'Máquina'); ?></th>
        <th><?php echo $this->Paginator->sort('fecha_elaboracion', 'Fecha elaboración'); ?></th>				
					
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($cartastecnologicas as $cartastecnologica): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
        <td><?php echo h($cartastecnologica['Cartastecnologica']['codigo']); ?>&nbsp;</td>
        <td><?php echo $cartastecnologica['Pieza']['nombre']; ?></td>
		<td><?php echo $cartastecnologica['Maquina']['nombre']; ?></td>
        <td><?php echo $cartastecnologica['Cartastecnologica']['fecha_elaboracion']; ?></td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $cartastecnologica['Cartastecnologica']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cartastecnologica['Cartastecnologica']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $cartastecnologica['Cartastecnologica']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $cartastecnologica['Cartastecnologica']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('<center>P&aacute;gina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, comenzando en el {:start}, terminando en el {:end}</center>')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<script>
    $("#filter_field").bind("change", function (event) 
    {        
        filter = $("#filter_field").val();
        if(filter == "Cartastecnologica.fecha_elaboracion")
        {
            $("#div_one_input").attr('style', 'display: none;');
            $("#div_two_inputs").attr('style', '');
        }
        else
        {
            $("#div_one_input").attr('style', '');
            $("#div_two_inputs").attr('style', 'display: none;');
        }
    });
    
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
    
    $('document').ready(function () 
    {
        $("select#filter_field").val("<?php echo $field; ?>").change();    
    });
</script>