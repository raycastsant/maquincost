<div class="ordenesplanoperarios index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/ordenesplanoperarios/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Ordenesplanoperarios'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('ordene_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('operario_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('horas'); ?></th>
					
		<th><?php echo $this->Paginator->sort('tarifa'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_terminacion'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($ordenesplanoperarios as $ordenesplanoperario): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ordenesplanoperario['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $ordenesplanoperario['Ordene']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ordenesplanoperario['Operario']['nombre'], array('controller' => 'operarios', 'action' => 'view', $ordenesplanoperario['Operario']['id'])); ?>
		</td>
		<td><?php echo h($ordenesplanoperario['Ordenesplanoperario']['horas']); ?>&nbsp;</td>
		<td><?php echo h($ordenesplanoperario['Ordenesplanoperario']['tarifa']); ?>&nbsp;</td>
		<td><?php echo h($ordenesplanoperario['Ordenesplanoperario']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($ordenesplanoperario['Ordenesplanoperario']['fecha_terminacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ordenesplanoperario['Ordenesplanoperario']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ordenesplanoperario['Ordenesplanoperario']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $ordenesplanoperario['Ordenesplanoperario']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $ordenesplanoperario['Ordenesplanoperario']['id'])); ?>
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