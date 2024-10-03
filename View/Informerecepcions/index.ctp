<div class="informerecepcions index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/informerecepcions/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Informerecepcions'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('ordenreal_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('codigo'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha'); ?></th>
					
		<th><?php echo $this->Paginator->sort('empresa'); ?></th>
					
		<th><?php echo $this->Paginator->sort('unidad'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($informerecepcions as $informerecepcion): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($informerecepcion['Ordenreal']['id'], array('controller' => 'ordenreals', 'action' => 'view', $informerecepcion['Ordenreal']['id'])); ?>
		</td>
		<td><?php echo h($informerecepcion['Informerecepcion']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($informerecepcion['Informerecepcion']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($informerecepcion['Informerecepcion']['empresa']); ?>&nbsp;</td>
		<td><?php echo h($informerecepcion['Informerecepcion']['unidad']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $informerecepcion['Informerecepcion']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $informerecepcion['Informerecepcion']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $informerecepcion['Informerecepcion']['id']), array('class' => 'btn'), __('�Est� seguro que desea eliminar el registro selecionado?', $informerecepcion['Informerecepcion']['id'])); ?>
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