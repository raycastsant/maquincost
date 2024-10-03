<div class="instrumentosmedicions view">
<h2><?php  echo __('Instrumentosmedicion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instrumentosmedicion['Instrumentosmedicion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($instrumentosmedicion['Instrumentosmedicion']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instrumentosmedicion'), array('action' => 'edit', $instrumentosmedicion['Instrumentosmedicion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instrumentosmedicion'), array('action' => 'delete', $instrumentosmedicion['Instrumentosmedicion']['id']), null, __('Are you sure you want to delete # %s?', $instrumentosmedicion['Instrumentosmedicion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instrumentosmedicions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instrumentosmedicion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ctregistros'), array('controller' => 'ctregistros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ctregistro'), array('controller' => 'ctregistros', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ctregistros'); ?></h3>
	<?php if (!empty($instrumentosmedicion['Ctregistro'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cartastecnologica Id'); ?></th>
		<th><?php echo __('Operacione Id'); ?></th>
		<th><?php echo __('Tipooperacione Id'); ?></th>
		<th><?php echo __('Elementoscortante Id'); ?></th>
		<th><?php echo __('Instrumentosauxiliare Id'); ?></th>
		<th><?php echo __('Instrumentosmedicion Id'); ?></th>
		<th><?php echo __('No Orden Operacion'); ?></th>
		<th><?php echo __('Diametro Ini'); ?></th>
		<th><?php echo __('Diametro Fin'); ?></th>
		<th><?php echo __('Longitud Diametro'); ?></th>
		<th><?php echo __('Longitud'); ?></th>
		<th><?php echo __('Prof Corte'); ?></th>
		<th><?php echo __('Cantidad Pasadas'); ?></th>
		<th><?php echo __('Avance'); ?></th>
		<th><?php echo __('Velocidad'); ?></th>
		<th><?php echo __('Revoluciones'); ?></th>
		<th><?php echo __('Tiempo Corte'); ?></th>
		<th><?php echo __('Tiempo Auxiliar'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($instrumentosmedicion['Ctregistro'] as $ctregistro): ?>
		<tr>
			<td><?php echo $ctregistro['id']; ?></td>
			<td><?php echo $ctregistro['cartastecnologica_id']; ?></td>
			<td><?php echo $ctregistro['operacione_id']; ?></td>
			<td><?php echo $ctregistro['tipooperacione_id']; ?></td>
			<td><?php echo $ctregistro['elementoscortante_id']; ?></td>
			<td><?php echo $ctregistro['instrumentosauxiliare_id']; ?></td>
			<td><?php echo $ctregistro['instrumentosmedicion_id']; ?></td>
			<td><?php echo $ctregistro['no_orden_operacion']; ?></td>
			<td><?php echo $ctregistro['diametro_ini']; ?></td>
			<td><?php echo $ctregistro['diametro_fin']; ?></td>
			<td><?php echo $ctregistro['longitud_diametro']; ?></td>
			<td><?php echo $ctregistro['longitud']; ?></td>
			<td><?php echo $ctregistro['prof_corte']; ?></td>
			<td><?php echo $ctregistro['cantidad_pasadas']; ?></td>
			<td><?php echo $ctregistro['avance']; ?></td>
			<td><?php echo $ctregistro['velocidad']; ?></td>
			<td><?php echo $ctregistro['revoluciones']; ?></td>
			<td><?php echo $ctregistro['tiempo_corte']; ?></td>
			<td><?php echo $ctregistro['tiempo_auxiliar']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ctregistros', 'action' => 'view', $ctregistro['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ctregistros', 'action' => 'edit', $ctregistro['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ctregistros', 'action' => 'delete', $ctregistro['id']), null, __('Are you sure you want to delete # %s?', $ctregistro['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ctregistro'), array('controller' => 'ctregistros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
