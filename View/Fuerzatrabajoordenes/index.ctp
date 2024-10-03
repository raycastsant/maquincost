<div class="fuerzatrabajoordenes index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/fuerzatrabajoordenes/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Fuerzatrabajoordenes'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('operario_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('ordenreal_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('formapago_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('salario'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fechacomienzo'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fechaterminacion'); ?></th>
					
		<th><?php echo $this->Paginator->sort('totalhoras'); ?></th>
					
		<th><?php echo $this->Paginator->sort('tarifa'); ?></th>
					
		<th><?php echo $this->Paginator->sort('importe'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($fuerzatrabajoordenes as $fuerzatrabajoordene): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fuerzatrabajoordene['Operario']['id'], array('controller' => 'operarios', 'action' => 'view', $fuerzatrabajoordene['Operario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($fuerzatrabajoordene['Ordenreal']['id'], array('controller' => 'ordenreals', 'action' => 'view', $fuerzatrabajoordene['Ordenreal']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($fuerzatrabajoordene['Formapago']['id'], array('controller' => 'formapagos', 'action' => 'view', $fuerzatrabajoordene['Formapago']['id'])); ?>
		</td>
		<td><?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['salario']); ?>&nbsp;</td>
		<td><?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['fechacomienzo']); ?>&nbsp;</td>
		<td><?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['fechaterminacion']); ?>&nbsp;</td>
		<td><?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['totalhoras']); ?>&nbsp;</td>
		<td><?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['tarifa']); ?>&nbsp;</td>
		<td><?php echo h($fuerzatrabajoordene['Fuerzatrabajoordene']['importe']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $fuerzatrabajoordene['Fuerzatrabajoordene']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $fuerzatrabajoordene['Fuerzatrabajoordene']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $fuerzatrabajoordene['Fuerzatrabajoordene']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $fuerzatrabajoordene['Fuerzatrabajoordene']['id'])); ?>
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