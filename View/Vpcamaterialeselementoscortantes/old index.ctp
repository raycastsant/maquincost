<div class="vpcamaterialeselementoscortantes index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/vpcamaterialeselementoscortantes/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Vpcamaterialeselementoscortantes'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('elementoscortante_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('tiposmateriale_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('operacione_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('vel_min_viruta'); ?></th>
					
		<th><?php echo $this->Paginator->sort('vel_max_viruta'); ?></th>
					
		<th><?php echo $this->Paginator->sort('av_min_viruta'); ?></th>
					
		<th><?php echo $this->Paginator->sort('av_max_viruta'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pfc_min_viruta'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pfc_max_viruta'); ?></th>
					
		<th><?php echo $this->Paginator->sort('vel_min_desbaste'); ?></th>
					
		<th><?php echo $this->Paginator->sort('vel_max_desbaste'); ?></th>
					
		<th><?php echo $this->Paginator->sort('av_min_desbaste'); ?></th>
					
		<th><?php echo $this->Paginator->sort('av_max_desbaste'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pfc_min_desbaste'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pfc_max_desbaste'); ?></th>
					
		<th><?php echo $this->Paginator->sort('vel_min_afinar'); ?></th>
					
		<th><?php echo $this->Paginator->sort('vel_max_afinar'); ?></th>
					
		<th><?php echo $this->Paginator->sort('av_min_afinar'); ?></th>
					
		<th><?php echo $this->Paginator->sort('av_max_afinar'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pfc_min_afinar'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pfc_max_afinar'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($vpcamaterialeselementoscortantes as $vpcamaterialeselementoscortante): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vpcamaterialeselementoscortante['Elementoscortante']['id'], array('controller' => 'elementoscortantes', 'action' => 'view', $vpcamaterialeselementoscortante['Elementoscortante']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vpcamaterialeselementoscortante['Tiposmateriale']['id'], array('controller' => 'tiposmateriales', 'action' => 'view', $vpcamaterialeselementoscortante['Tiposmateriale']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vpcamaterialeselementoscortante['Operacione']['nombre'], array('controller' => 'operaciones', 'action' => 'view', $vpcamaterialeselementoscortante['Operacione']['id'])); ?>
		</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_min_viruta']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_max_viruta']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_min_viruta']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_max_viruta']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_min_viruta']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_max_viruta']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_min_desbaste']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_max_desbaste']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_min_desbaste']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_max_desbaste']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_min_desbaste']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_max_desbaste']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_min_afinar']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['vel_max_afinar']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_min_afinar']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['av_max_afinar']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_min_afinar']); ?>&nbsp;</td>
		<td><?php echo h($vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['pfc_max_afinar']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $vpcamaterialeselementoscortante['Vpcamaterialeselementoscortante']['id'])); ?>
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