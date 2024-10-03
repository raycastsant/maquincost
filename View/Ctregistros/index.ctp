<div class="ctregistros index">
	<div class="span"><a class="btn btn-primary" href="/maquincost/ctregistros/add"><i class="icon-plus-sign icon-white"></i>&nbsp;Nuevo</a></td></div>
    <h3><center><?php echo __('Listado de Ctregistros'); ?></center></h3>
    
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo __('No.'); ?></th>
					
		<th><?php echo $this->Paginator->sort('cartastecnologica_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('operacione_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('tipooperacione_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('elementoscortante_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('instrumentosauxiliare_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('instrumentosmedicion_id'); ?></th>
					
		<th><?php echo $this->Paginator->sort('no_orden_operacion'); ?></th>
					
		<th><?php echo $this->Paginator->sort('diametro_ini'); ?></th>
					
		<th><?php echo $this->Paginator->sort('diametro_fin'); ?></th>
					
		<th><?php echo $this->Paginator->sort('longitud_diametro'); ?></th>
					
		<th><?php echo $this->Paginator->sort('longitud'); ?></th>
					
		<th><?php echo $this->Paginator->sort('prof_corte'); ?></th>
					
		<th><?php echo $this->Paginator->sort('cantidad_pasadas'); ?></th>
					
		<th><?php echo $this->Paginator->sort('avance'); ?></th>
					
		<th><?php echo $this->Paginator->sort('velocidad'); ?></th>
					
		<th><?php echo $this->Paginator->sort('revoluciones'); ?></th>
					
		<th><?php echo $this->Paginator->sort('tiempo_corte'); ?></th>
					
		<th><?php echo $this->Paginator->sort('tiempo_auxiliar'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
			<?php $arrayParams = $this->Paginator->params();  $page = $arrayParams['page']; $pageLimit = $arrayParams['limit'];?>
<?php
	$counter = ($page-1)*$pageLimit;
	foreach ($ctregistros as $ctregistro): 
	$counter +=1; ?>
	<tr>
		<td><?php echo $counter;?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ctregistro['Cartastecnologica']['id'], array('controller' => 'cartastecnologicas', 'action' => 'view', $ctregistro['Cartastecnologica']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ctregistro['Operacione']['id'], array('controller' => 'operaciones', 'action' => 'view', $ctregistro['Operacione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ctregistro['Tipooperacione']['id'], array('controller' => 'tipooperaciones', 'action' => 'view', $ctregistro['Tipooperacione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ctregistro['Elementoscortante']['id'], array('controller' => 'elementoscortantes', 'action' => 'view', $ctregistro['Elementoscortante']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ctregistro['Instrumentosauxiliare']['id'], array('controller' => 'instrumentosauxiliares', 'action' => 'view', $ctregistro['Instrumentosauxiliare']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ctregistro['Instrumentosmedicion']['id'], array('controller' => 'instrumentosmedicions', 'action' => 'view', $ctregistro['Instrumentosmedicion']['id'])); ?>
		</td>
		<td><?php echo h($ctregistro['Ctregistro']['no_orden_operacion']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['diametro_ini']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['diametro_fin']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['longitud_diametro']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['longitud']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['prof_corte']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['cantidad_pasadas']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['avance']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['velocidad']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['revoluciones']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['tiempo_corte']); ?>&nbsp;</td>
		<td><?php echo h($ctregistro['Ctregistro']['tiempo_auxiliar']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ctregistro['Ctregistro']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $ctregistro['Ctregistro']['id']),array('class' => 'btn')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $ctregistro['Ctregistro']['id']), array('class' => 'btn'), __('¿Está seguro que desea eliminar el registro selecionado?', $ctregistro['Ctregistro']['id'])); ?>
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