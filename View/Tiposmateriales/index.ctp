<div class="tiposmateriales index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/tiposmateriales/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></td></div>
    <h3><center><?php echo __('Tipos de Materiales'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
		<th><?php echo __('No.'); ?></th>
		<th><?php echo $this->Paginator->sort('agrupadormateriale_id', 'Agrupador'); ?></th>
		<th><?php echo $this->Paginator->sort('nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('resistencia_min'); ?></th>
		<th><?php echo $this->Paginator->sort('resistencia_max'); ?></th>
        <th><?php echo $this->Paginator->sort('um'); ?></th>
        
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($tiposmateriales as $tiposmateriale): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tiposmateriale['Agrupadormateriale']['nombre'], array('controller' => 'agrupadormateriales', 'action' => 'view', $tiposmateriale['Agrupadormateriale']['id'])); ?>
		</td>
		<td><?php echo h($tiposmateriale['Tiposmateriale']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($tiposmateriale['Tiposmateriale']['resistencia_min']); ?>&nbsp;</td>
		<td><?php echo h($tiposmateriale['Tiposmateriale']['resistencia_max']); ?>&nbsp;</td>
        <td><?php echo h($tiposmateriale['Tiposmateriale']['um']); ?>&nbsp;</td>
        
		<td class="actions">
			<?php //echo $this->Html->link(__('Ver'), array('action' => 'view', $tiposmateriale['Tiposmateriale']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tiposmateriale['Tiposmateriale']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $tiposmateriale['Tiposmateriale']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $tiposmateriale['Tiposmateriale']['id'])); ?>
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