<div class="vales index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/vales/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Vales'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('materiale_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('ordenreal_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
					
		<th><?php echo $this->Paginator->sort('unidades'); ?></th>
					
		<th><?php echo $this->Paginator->sort('importe'); ?></th>
					
		<th><?php echo $this->Paginator->sort('no_solicitud'); ?></th>
					
		<th><?php echo $this->Paginator->sort('no_salida'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_solicitud'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_salida'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($vales as $vale): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vale['Materiale']['descripcion'], array('controller' => 'materiales', 'action' => 'view', $vale['Materiale']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vale['Ordenreal']['id'], array('controller' => 'ordenreals', 'action' => 'view', $vale['Ordenreal']['id'])); ?>
		</td>
		<td><?php echo h($vale['Vale']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($vale['Vale']['unidades']); ?>&nbsp;</td>
		<td><?php echo h($vale['Vale']['importe']); ?>&nbsp;</td>
		<td><?php echo h($vale['Vale']['no_solicitud']); ?>&nbsp;</td>
		<td><?php echo h($vale['Vale']['no_salida']); ?>&nbsp;</td>
		<td><?php echo h($vale['Vale']['fecha_solicitud']); ?>&nbsp;</td>
		<td><?php echo h($vale['Vale']['fecha_salida']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $vale['Vale']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $vale['Vale']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $vale['Vale']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $vale['Vale']['id'])); ?>
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