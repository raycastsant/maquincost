<div class="planesanuales index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/planesanuales/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Insertar</a></td></div>
    <h3><center><?php echo __('Planes anuales'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
		<th><?php echo __('No.'); ?></th>		
		<th><?php echo $this->Paginator->sort('anno', 'Año'); ?></th>
		<th><?php echo $this->Paginator->sort('empresa'); ?></th>
		<th><?php echo $this->Paginator->sort('taller'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_elaboracion', 'Fecha de elaboración'); ?></th>
        
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($planesanuales as $planesanuale): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td><?php echo h($planesanuale['Planesanuale']['anno']); ?>&nbsp;</td>
		<td><?php echo h($planesanuale['Planesanuale']['empresa']); ?>&nbsp;</td>
		<td><?php echo h($planesanuale['Planesanuale']['taller']); ?>&nbsp;</td>
		<td><?php echo h($planesanuale['Planesanuale']['fecha_elaboracion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $planesanuale['Planesanuale']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $planesanuale['Planesanuale']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $planesanuale['Planesanuale']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $planesanuale['Planesanuale']['id'])); ?>
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