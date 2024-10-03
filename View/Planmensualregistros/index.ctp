<div class="planmensualregistros index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/planmensualregistros/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Planmensualregistros'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('planesmensuale_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pieza_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('materiale_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('establecimiento'); ?></th>
					
		<th><?php echo $this->Paginator->sort('cantpiezas'); ?></th>
					
		<th><?php echo $this->Paginator->sort('costounidad'); ?></th>
					
		<th><?php echo $this->Paginator->sort('costototal'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprim_pesounidad'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprim_pesototal'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprim_ancho'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprim_largo'); ?></th>
					
		<th><?php echo $this->Paginator->sort('observaciones'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($planmensualregistros as $planmensualregistro): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($planmensualregistro['Planesmensuale']['mes'], array('controller' => 'planesmensuales', 'action' => 'view', $planmensualregistro['Planesmensuale']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($planmensualregistro['Pieza']['nombre'], array('controller' => 'piezas', 'action' => 'view', $planmensualregistro['Pieza']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($planmensualregistro['Materiale']['descripcion'], array('controller' => 'materiales', 'action' => 'view', $planmensualregistro['Materiale']['id'])); ?>
		</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['establecimiento']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['cantpiezas']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['costounidad']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['costototal']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['matprim_pesounidad']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['matprim_pesototal']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['matprim_ancho']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['matprim_largo']); ?>&nbsp;</td>
		<td><?php echo h($planmensualregistro['Planmensualregistro']['observaciones']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $planmensualregistro['Planmensualregistro']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $planmensualregistro['Planmensualregistro']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $planmensualregistro['Planmensualregistro']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $planmensualregistro['Planmensualregistro']['id'])); ?>
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