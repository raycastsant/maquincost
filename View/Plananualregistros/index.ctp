<div class="plananualregistros index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/plananualregistros/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Plananualregistros'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('planesanuale_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pieza_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('materiale_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('numeroplano'); ?></th>
					
		<th><?php echo $this->Paginator->sort('modelo'); ?></th>
					
		<th><?php echo $this->Paginator->sort('no_molde_disp_etc'); ?></th>
					
		<th><?php echo $this->Paginator->sort('cantpiezas'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprim_pesounidad'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprim_pesototal'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pieza_pesotunidad'); ?></th>
					
		<th><?php echo $this->Paginator->sort('pieza_pesototal'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprima_largo'); ?></th>
					
		<th><?php echo $this->Paginator->sort('matprima_ancho'); ?></th>
					
		<th><?php echo $this->Paginator->sort('costounidad'); ?></th>
					
		<th><?php echo $this->Paginator->sort('costototal'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_necesita'); ?></th>
					
		<th><?php echo $this->Paginator->sort('fecha_recibe'); ?></th>
					
		<th><?php echo $this->Paginator->sort('observaciones'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($plananualregistros as $plananualregistro): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($plananualregistro['Planesanuale']['anno'], array('controller' => 'planesanuales', 'action' => 'view', $plananualregistro['Planesanuale']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($plananualregistro['Pieza']['nombre'], array('controller' => 'piezas', 'action' => 'view', $plananualregistro['Pieza']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($plananualregistro['Materiale']['descripcion'], array('controller' => 'materiales', 'action' => 'view', $plananualregistro['Materiale']['id'])); ?>
		</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['numeroplano']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['modelo']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['no_molde_disp_etc']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['cantpiezas']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['matprim_pesounidad']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['matprim_pesototal']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['pieza_pesotunidad']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['pieza_pesototal']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['matprima_largo']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['matprima_ancho']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['costounidad']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['costototal']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['fecha_necesita']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['fecha_recibe']); ?>&nbsp;</td>
		<td><?php echo h($plananualregistro['Plananualregistro']['observaciones']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $plananualregistro['Plananualregistro']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $plananualregistro['Plananualregistro']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $plananualregistro['Plananualregistro']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $plananualregistro['Plananualregistro']['id'])); ?>
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