<div class="ordenreals index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/ordenreals/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Ordenreals'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('ordene_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('piezas_elaboradas'); ?></th>
					
		<th><?php echo $this->Paginator->sort('gasto_materiales'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
					
		<th><?php echo $this->Paginator->sort('hora_inicio'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_fin'); ?></th>
					
		<th><?php echo $this->Paginator->sort('hora_fin'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_cierre'); ?></th>
					
		<th><?php echo $this->Paginator->sort('consumo_salario'); ?></th>
					
		<th><?php echo $this->Paginator->sort('cerrada'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($ordenreals as $ordenreal): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ordenreal['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $ordenreal['Ordene']['id'])); ?>
		</td>
		<td><?php echo h($ordenreal['Ordenreal']['piezas_elaboradas']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['gasto_materiales']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['hora_inicio']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['fecha_fin']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['hora_fin']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['fecha_cierre']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['consumo_salario']); ?>&nbsp;</td>
		<td><?php echo h($ordenreal['Ordenreal']['cerrada']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ordenreal['Ordenreal']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ordenreal['Ordenreal']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $ordenreal['Ordenreal']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $ordenreal['Ordenreal']['id'])); ?>
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