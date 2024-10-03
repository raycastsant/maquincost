<div class="elementoscortantes index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/elementoscortantes/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></td></div>
    <h3><center><?php echo __('Listado de Elementos Cortantes'); ?></center></h3>
    <hr />
     <div style="float: right;" class="span10">
        <form class="form-search" action="/maquincost/elementoscortantes/index" enctype="multipart/form-data" method="post" accept-charset="iso-8859-1">
         <div class="span">
              <strong>Campo</strong>
              <select name="data[field]" style="width: 145px;" id="filter_field">
                <option value="Tipoelementoscortante.nombre" selected="selected">Tipo</option>
                <option value="Elementoscortante.nombre">Nombre</option>
                <option value="Materialelemento.nombre">Material</option>
                <option value="Formascorte.nombre">Forma de corte</option>
                <option value="Elementoscortante.descripcion">Descripción</option>
                <!-- <option value="Elementoscortante.calzada">Calzada</option> -->
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
          &nbsp;&nbsp;
          <button type="submit" class="btn btn-small"><i class="icon-filter"></i>&nbsp;Filtrar</button>
          <a class="btn btn-small" href="/maquincost/elementoscortantes/index/1"><i class="icon-list"></i>&nbsp;Mostrar todos</a>
        </form>
    </div>
       
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
		<th><?php echo __('No.'); ?></th>
        <th><?php //echo __('Acciones'); ?></th>
        <th><?php echo $this->Paginator->sort('Tipoelementoscortante.nombre', 'Tipo'); ?></th>
        <th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Materialelemento.nombre', 'Material'); ?></th>			
		<th><?php echo $this->Paginator->sort('Formascorte.nombre', 'Forma de corte'); ?></th>
		<th><?php echo $this->Paginator->sort('descripcion', 'Descripción'); ?></th>
		<th><?php echo $this->Paginator->sort('calzada', 'Es calzada'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($elementoscortantes as $elementoscortante): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
        <td>
            <div class="dropdown">
               <a class="btn dropdown-toggle" data-toggle="dropdown">Opciones&nbsp;<span class="caret"></span></a>
               <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <li><a href="/maquincost/elementoscortantes/edit/<?php echo $elementoscortante['Elementoscortante']['id']; ?>" role="button"><i class="icon-pencil"></i>&nbsp;Editar</a></li>   
                  <li><a href="/maquincost/elementocortanteoperaciones/index/<?php echo $elementoscortante['Elementoscortante']['id']; ?>" title="Gestionar las operaciones que soporta el elemento cortante" role="button"><i class="icon-cog"></i>&nbsp;Definir operaciones</a></li>
                  <li><a href="/maquincost/vpcamaterialeselementoscortantes/index/<?php echo $elementoscortante['Elementoscortante']['id']; ?>" title="Gestionar Velocidades, Avances y Profundidades de corte que soporta el elemento para los distintos materiales y operaciones" role="button"><i class="icon-tasks"></i>&nbsp;Velocidades, Avances y Profundidades de corte</a></li>
                  <li class="divider"></li>
                  <form id="form_del_elemto<?php echo $elementoscortante['Elementoscortante']['id']; ?>" method="post" style="display:none;" name="form_del_elemto<?php echo $elementoscortante['Elementoscortante']['id']; ?>" action="/maquincost/elementoscortantes/delete/<?php echo $elementoscortante['Elementoscortante']['id']; ?>"><input type="hidden" value="POST" name="_method"/></form>
                  <li><a onclick="if (confirm(&apos;¿Está seguro que desea eliminar el elemento cortante?&apos;)) {document.form_del_elemto<?php echo $elementoscortante['Elementoscortante']['id']; ?>.submit(); } event.returnValue = false; return false;" href="#"><i class="icon-minus-sign"></i>&nbsp;Eliminar</a></li>
               </ul>  
            </div>
        </td>
        <td><?php echo $elementoscortante['Tipoelementoscortante']['nombre']; ?></td>
        <td><?php echo h($elementoscortante['Elementoscortante']['nombre']); ?>&nbsp;</td>
		<td><?php echo $elementoscortante['Materialelemento']['nombre']; ?></td>
		<td><?php echo $elementoscortante['Formascorte']['nombre']; ?></td>
		<td><?php echo h($elementoscortante['Elementoscortante']['descripcion']); ?>&nbsp;</td>
		<td><?php if($elementoscortante['Elementoscortante']['calzada'] === '1')
                   echo '<center>Si</center>'; 
                  else
                   echo '<center>No</center>'; ?>&nbsp;</td>
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
    $('document').ready(function () 
    {
        $("select#filter_field").val("<?php echo $field; ?>").change();    
    });
</script>