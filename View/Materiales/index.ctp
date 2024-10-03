<br />
<div class="materiales index">
	
    <h3><center><?php echo __('Listado de Materiales'); ?></center></h3>
       
         <div class="accordion well container" id="accordion2" style="width: 600px;">
             <a class="btn btn btn-success" onclick="if (confirm(&#039;Se actualizará la tabla de Productos. ¿Está seguro que desea proceder?&#039;)) { document.form_update_db.submit(); } event.returnValue = false; return false;"><i class="icon-repeat icon-white"></i>&nbsp;Actualizar Base de Datos</a>
             <br />
             <br />
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    <i class="icon-filter"></i>&nbsp;Filtros para la importación de los datos
                  </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                  <div class="accordion-inner">
                  <div id="saveAlert" class="alert alert-warning" data-alert="alert" style="text-align: justify">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-circle"></i></button>
                    Para aplicar los filtros escriba las palabras clave por las que desea filtrar separadas por el signo <b>'+'</b> para cada campo de texto.
                    Por ejemplo, si desea buscar los códigos que contengan los valores <b>'59652583'</b> o <b>'1962164'</b>, escriba <b>59652583+1962164</b> en el campo de texto para filtrar
                    por <b>Código</b>. De forma similar puede aplicar los filtros para el campo <b>Descripción</b>.
                  </div>
                    <center>
                    <table>
                        <tr>
                            <td><b>Por Código</b></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><b>Por Descripción</b></td>
                        </tr>
                          <form action="/maquincost/materiales/importFromMDB" name="form_update_db" id="form_update_db" style="display:none;" method="post">
                            <input type="hidden" name="_method" value="POST"/>
                            <td><textarea name="data[filter_codigo]" id="filter_codigo" rows="3"></textarea></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><textarea name="data[filter_desc]" id="filter_desc" rows="3"></textarea></td>
                          </form>
                        <tr>
                        </tr>
                    </table>
                    </center>
                  </div>
                </div>
              </div>
        </div>
        
    <div class="well" style="height: 25px; width: 100%;">
        <form class="form-search" action="/maquincost/materiales/index" enctype="multipart/form-data" method="post" accept-charset="iso-8859-1">
         <div class="span">
              <strong>Campo</strong>
              <select name="data[field]" style="width: 150px;" id="filter_field">
                <option value="Materiale.almacen_desc" selected="selected">Almacén</option>
                <option value="Materiale.codigo">Código</option>
                <option value="Materiale.almacen_codigo">Código almacén</option>
                <option value="Materiale.descripcion">Descripción</option>
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
          
       <!--   <div class="span" id="div_two_inputs" style="display: none;">
            <?php
	               /*if(isset($value1))
                    $inputvalue1 = 'value="'.$value1.'"';
                   else
                    $inputvalue1 = '';
                    
                   if(isset($value2))
                    $inputvalue2 = 'value="'.$value2.'"';
                   else
                    $inputvalue2 = '';*/
            ?>
              <strong>Desde</strong>
              <input type="text" name="data[value1]" <?php echo $inputvalue1; ?> class="input-small search-query" id="desde"/>
              <strong>Hasta</strong>
              <input type="text" name="data[value2]" <?php echo $inputvalue2; ?> class="input-small search-query" id="hasta"/>
          </div>    -->
          
          &nbsp;&nbsp;
          <button type="submit" class="btn btn-small"><i class="icon-filter"></i>&nbsp;Filtrar</button>
          <a class="btn btn-small" href="/maquincost/materiales/index/1"><i class="icon-list"></i>&nbsp;Mostrar todos</a>
        </form>
    </div>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('tiposmateriale_id', 'Tipo de material'); ?></th>
		<th><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>		
		<th><?php echo $this->Paginator->sort('descripcion', 'Descripción'); ?></th>
		<th><?php echo $this->Paginator->sort('um'); ?></th>			
		<th><?php echo $this->Paginator->sort('existencia'); ?></th>					
		<th><?php echo $this->Paginator->sort('precio_mn'); ?></th>
		<th><?php echo $this->Paginator->sort('precio_mlc'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_ultima_salida', 'Última salida'); ?></th>
        <th><?php echo $this->Paginator->sort('almacen_codigo', 'Código almacén'); ?></th>
        <th><?php echo $this->Paginator->sort('almacen_desc', 'Almacén'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($materiales as $materiale): 
    {
    	$counter +=1; ?>
    	<tr>
    		<td><?php echo $counter;?>&nbsp;</td>
    		<td>
    			<?php 
                      $tipoMaterial = $materiale['Tiposmateriale']['nombre'];
                      if($tipoMaterial !== 'Indefinido')
                       $tipoMaterial .= " ".$materiale['Tiposmateriale']['resistencia_min']."-".$materiale['Tiposmateriale']['resistencia_max']." ".$materiale['Tiposmateriale']['um'];
                          
                      echo $tipoMaterial; ?>
    		</td>
    		<td><?php echo h($materiale['Materiale']['codigo']); ?>&nbsp;</td>
    		<td><?php echo h($materiale['Materiale']['descripcion']); ?>&nbsp;</td>
    		<td><?php echo h($materiale['Materiale']['um']); ?>&nbsp;</td>
    		<td><?php echo h($materiale['Materiale']['existencia']); ?>&nbsp;</td>
    		<td><?php echo h($materiale['Materiale']['precio_mn']); ?>&nbsp;</td>
    		<td><?php echo h($materiale['Materiale']['precio_mlc']); ?>&nbsp;</td>
    		<td><?php echo h($materiale['Materiale']['fecha_ultima_salida']); ?>&nbsp;</td>
            <td><?php echo h($materiale['Materiale']['almacen_codigo']); ?>&nbsp;</td>
            <td><?php echo h($materiale['Materiale']['almacen_desc']); ?>&nbsp;</td>
    		<td class="actions">
    			<?php //echo $this->Html->link(__('Ver'), array('action' => 'view', $materiale['Materiale']['id']),array('class' => 'btn')); ?>
    			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $materiale['Materiale']['id']),array('class' => 'btn')); ?>
    			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $materiale['Materiale']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $materiale['Materiale']['id'])); ?>
    		</td>
    	</tr>
<?php }
      endforeach; ?>
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
       
    });
    
    $('document').ready(function () 
    {
        $("select#filter_field").val("<?php echo $field; ?>").change();    
    });
</script>